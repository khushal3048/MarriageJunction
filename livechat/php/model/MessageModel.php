<?php

class MessageModel extends Model
{
    // Constants
    
    const TALK_ID_ALL         = -1;
    const TALK_ID_CANCELLED   = -2;
    const USER_INFO_ALL       = 'all';
    const NEW_TALK_TIME_DELAY = 900; // how long does it take to group message in a separate talk: 15 minutes (in seconds)
    
    // Defaults
    
    public $is_new = 'y';
    
    // Constructor
    
    public function initialize()
    {
        parent::initialize();
        
        $this->talk_id      = self::TALK_ID_ALL;
        $this->to_id        = self::TALK_ID_ALL;
        $this->to_user_info = self::USER_INFO_ALL;
    }
    
    // Getters & setters
    
    public function getTableName()
    {
        return 'user_chat_message';
    }
    
    public function getColumns()
    {
        return array('from_id', 'to_id', 'body', 'datetime', 'talk_id', 'is_new', 'from_user_info', 'to_user_info');
    }
    
    // Methods
    
    public static function repo()
    {
        return new MessageModel;
    }
    
    public function preSave()
    {
        $result = parent::preSave();
        
        if(!isset($this->id)) // New message
        {
            $fromUser    = new UserModel((array) $result['from_user_info']);
            $toUser      = new UserModel((array) $result['to_user_info']);
            $isGuest     = !$fromUser->hasRole('OPERATOR');
            $guestInTalk = false;
            
            $lastMessages = $this->getUserLastMessages($this->from_id, $this->to_id, $isGuest);
            $lastMessage  = null;
            
            // Group message into a talk
            
            if(empty($lastMessages)) // Generate a new talk
            {
                $this->talk_id = $this->generateTalkId();
            }
            else
            {
                $lastMessage = end($lastMessages);
                
                if($isGuest)
                {
                    // Continue the current talk

                    $this->talk_id = $lastMessage->talk_id;
                }
                else
                {
                    if(!$toUser->hasRole('OPERATOR')) // Target user is a guest
                    {
                        // Check if guest is already talking with an operator
                        
                        foreach($lastMessages as $msg)
                        {
                            if($msg->to_id == $this->to_id)
                            {
                                $guestInTalk = true;
                                
                                if($msg->from_id == $this->from_id)
                                {
                                    $lastMessage = $msg;
                                    
                                    $this->talk_id = $msg->talk_id;
                                }
                            }
                            else if($msg->to_id == self::TALK_ID_ALL)
                            {
                                $lastMessage = $msg;
                                
                                $this->talk_id = $msg->talk_id;
                            }
                        }
                    }
                    
                    if($this->talk_id == self::TALK_ID_ALL) $this->talk_id = $this->generateTalkId();
                }
            }
            
            // Assign talk to an operator
            
            if($this->to_id != self::TALK_ID_CANCELLED && !($fromUser->hasRole('OPERATOR') && $toUser->hasRole('OPERATOR')))
            {
                // Assign message to talk's operator, if any
                
                if($this->to_id == self::TALK_ID_ALL && $lastMessage->to_id != self::TALK_ID_ALL) // it's sent as a "broadcast" message, but has a talk already
                {
                    if($lastMessage->from_id == $this->from_id)
                    {
                        $this->to_id        = $lastMessage->to_id;
                        $this->to_user_info = $lastMessage->to_user_info;
                    }
                    else if($lastMessage->to_id === $this->from_id)
                    {
                        $this->to_id        = $lastMessage->from_id;
                        $this->to_user_info = $lastMessage->from_user_info;
                    }
                }
                else if(!$isGuest) // Operator writes to a guest
                {
                    if($lastMessage)
                    {
                        if($lastMessage->to_id == self::TALK_ID_ALL || $lastMessage->talk_id == $this->talk_id) // operator "takes" the talk
                        {
                            $operator = $fromUser;
                            $guest    = $toUser;

                            // Assign operator to messages in the talk and mark the messages as read

                            self::$db->execute(

                                'UPDATE ' . $this->getTableName() . ' SET to_id = ?, is_new = ? WHERE from_id = ? AND (to_id = ? OR to_id = ?) AND talk_id = ?',
                                array($operator->id, 'n', $guest->id, self::TALK_ID_ALL, $operator->id, $this->talk_id)
                            );
                        }
                        else if($guestInTalk) // Operator message is cancelled
                        {
                            $this->to_id = self::TALK_ID_CANCELLED;
                            $this->id    = self::CANCEL_SAVE_ID;
                        }
                    }
                }
            }

            // Encode from/to users data

            $result = $this->getData();

            if($result['from_user_info'] !== self::USER_INFO_ALL) $result['from_user_info'] = json_encode($result['from_user_info']);
            if($result['to_user_info']   !== self::USER_INFO_ALL) $result['to_user_info']   = json_encode($result['to_user_info']);
        }
        
        return $result;
    }
    
    public function postRead($data)
    {
        $data = parent::postRead($data);
        
        $data['from_user_info'] = json_decode($data['from_user_info'], true);
        $data['to_user_info']   = json_decode($data['to_user_info'],   true);
        
        return $data;
    }
    
    public function queryHistory($query)
    {
        if(empty($query)) $query = array();
        
        $q = array();
        
        if(isset($query['datetime'])) $q['datetime'] = $query['datetime'];
        
        $dbResults = $this->findBy($q, 'AND', array('datetime' => 'DESC'));
        
        // Group the results into "talk" groups
        
        $groups = array();
        
        foreach($dbResults as $message)
        {
            if(!isset($groups[$message->talk_id])) $groups[$message->talk_id] = array();
            
            $groups[$message->talk_id][] = $message;
        }
        
        // Filter by from_user_info and to_user_info fields
        
        $filteredResults = array();
        
        if(isset($query['name']) || isset($query['mail']))
        {
            foreach($groups as $group)
            {
                $addEntry = false;

                // Add the group to search results if any entry matches the filter

                foreach($group as $message)
                {
                    $fromUser = $message->from_user_info;
                    $toUser   = $message->to_user_info;

                    if(isset($query['name']))
                    {
                        if(stripos($fromUser['name'], $query['name']) !== false || stripos($toUser['name'], $query['name']) !== false)
                        {
                            $addEntry = true;
                        }
                    }

                    if(isset($query['mail']))
                    {
                        if(stripos($fromUser['mail'], $query['mail']) !== false || stripos($toUser['mail'], $query['mail']) !== false)
                        {
                            $addEntry = true;
                        }
                    }

                    if($addEntry) break;
                }

                if($addEntry) $filteredResults[] = $group;
            }
        }
        else
        {
            $filteredResults = array_values($groups);
        }
        
        $results = $filteredResults;
        
        return $results;
    }
    
    public function generateTalkId()
    {
        // Find the last talk ID
        
        $result = self::$db->queryOne('SELECT MAX(talk_id) AS talk_id FROM ' . MessageModel::repo()->getTableName());
        
        return $result['talk_id'] + 1;
    }
    
    public function getUserLastMessages($userId, $toId, $isGuest = false)
    {
        // Get last messages
        
        $lastMessages = $this->findBy(array(
        
            'datetime' => array('>=', date('Y-m-d H:i:s', time() - self::NEW_TALK_TIME_DELAY))
        ));
        
        $messages = array();
        
        if(!empty($lastMessages))
        {
            // Filter messages related to this user
            
            foreach($lastMessages as $message)
            {
                if($isGuest) // Guest to operator
                {
                    if($message->from_id == $userId || $message->to_id == $userId)
                    {
                        $messages[] = $message;
                    }
                }
                else // Operator to operator / operator to guest
                {
                    if(
                         $message->from_id == $userId || $message->to_id == $userId || $message->to_id == $toId ||
                        ($message->from_id == $toId   && $message->to_id == self::TALK_ID_ALL)
                    )
                    {
                        $messages[] = $message;
                    }
                }
            }
        }
        
        return $messages;
    }
    
    public function archiveMessagesToGuest($guestId)
    {
        // Mark last messages to the guest as read
        
        self::$db->query('UPDATE ' . $this->getTableName() . ' SET is_new = "n" WHERE to_id = ? AND is_new = "y"', array($guestId));
    }
    
    public function archiveOutdatedMessages()
    {
        // Mark messages from offline guests as read
        
        self::$db->query(
        
            'UPDATE ' . $this->getTableName() . ' m INNER JOIN ' . UserModel::repo()->getTableName() . ' u ON m.from_id = u.id ' .
            'SET m.is_new = "n" WHERE u.last_activity < "' . date('Y-m-d H:i:s', time() - UserModel::GUEST_SESSION_TIME) . '"'
        );
    }
}

?>
