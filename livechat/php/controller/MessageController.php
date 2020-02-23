<?php

class MessageController extends Controller
{
    // Get new messages for the logged-in guest
    
    public function getNewAction()
    {
        $userId = $this->get('guest')->getId();
        
        $messages = null;
        
        if($userId)
        {
            $db = $this->get('db');
            
            $messages = MessageModel::repo()->findBy(array(
            
                'to_id'    => $userId, 'is_new' => 'y',
                'datetime' => array('>=', date('Y-m-d H:i:s', time() - MessageModel::NEW_TALK_TIME_DELAY))
            ));
            
            // Mark messages as read
            
            MessageModel::repo()->archiveMessagesToGuest($userId);
        }
        
        return $this->json($messages ? $messages : array());
    }
    
    // Get last messages for the logged-in guest
    
    public function getLastAction()
    {
        $guest     = $this->get('guest');
        $guestId   = $guest->getId();
        
        if(!$guestId) return $this->json(array('success' => false));
        
        $lastMsgId = $this->get('request')->postVar('lastMsgId');
        
        $query = array('datetime' => array('>=', date('Y-m-d H:i:s', time() - MessageModel::NEW_TALK_TIME_DELAY)));
        
        if(!empty($lastMsgId))
        {
            $query['id'] = array('<', $lastMsgId);
        }
        
        $messages = MessageModel::repo()->findBy($query);
        
        // Filter messages for the talk
        
        $result = array();
        
        if(!empty($messages))
        {
            foreach($messages as $message)
            {
                if($message->from_id == $guest->getId() || $message->to_id == $guest->getId()) $result[] = $message;
            }
        }
        
        return $this->json(array('success' => true, 'messages' => $result));
    }
    
    // Get new messages from guests
    
    public function operatorGetNewAction()
    {
        $user     = $this->get('user');
        $messages = MessageModel::repo()->findBy(array(
            
            'is_new'   => 'y',
            'datetime' => array('>=', date('Y-m-d H:i:s', time() - MessageModel::NEW_TALK_TIME_DELAY))
        ));
        
        // Filter messages from guests
        
        $result = array();
        
        if(!empty($messages))
        {
            foreach($messages as $message)
            {
                if($message->to_user_info == MessageModel::USER_INFO_ALL || $message->to_id == $user->getId())
                {
                    $result[] = $message;
                }
            }
        }
        
        // Mark any outdated messages as read
        
        MessageModel::repo()->archiveOutdatedMessages();
        
        return $this->json(array('success' => true, 'messages' => $result));
    }
    
    // Get last messages between operator and a given guest
    
    public function operatorGuestGetLastAction()
    {
        $operator  = $this->get('user');
        $request   = $this->get('request');
        $guestId   = $request->postVar('guestId');
        $lastMsgId = $request->postVar('lastMsgId');
        
        $query = array('datetime' => array('>=', date('Y-m-d H:i:s', time() - MessageModel::NEW_TALK_TIME_DELAY)));
        
        if(!empty($lastMsgId))
        {
            $query['id'] = array('<', $lastMsgId);
        }
        
        $messages = MessageModel::repo()->findBy($query);
        
        // Filter messages for the talk
        
        $result = array();
        
        if(!empty($messages))
        {
            foreach($messages as $message)
            {
                if(
                    ($message->from_id == $operator->getId() && $message->to_id   == $guestId) ||
                    ($message->to_id   == $operator->getId() && $message->from_id == $guestId)
                )
                {
                    $result[] = $message;
                }
            }
        }
        
        return $this->json(array('success' => true, 'messages' => $result));
    }
    
    // Send message globally (only for guests)
    
    public function broadcastAction()
    {
        $request    = $this->get('request');
        $validators = $this->get('model_validation');
        
        // Get the input
        
        $from = $this->get('guest')->getId();
        $body = $request->postVar('body');
        
        $to = -1; // Special value used for broadcasting
        
        $talkId = 0;
        
        // Validate the input
        
        $errors = $validators->validateMessage(array(
        
            'from' => $from,
            'to'   => $to,
            'body' => $body
        ));
        
        if(count($errors) === 0)
        {
            // Get the users data (to_user_info is initially set to broadcast info)
            
            $fromUser = UserModel::repo()->find($from);
            
            if(empty($fromUser))
            {
                return $this->json(array('success' => false));
            }
            
            // Create the message
            
            $msg = new MessageModel(array(
            
                'from_id'        => $from,
                'to_id'          => $to,
                'body'           => $body,
                'talk_id'        => $talkId,
                'from_user_info' => $fromUser->getData()
            ));
            
            $msg->save();
            
            // Return a successful response
            
            return $this->json(array('success' => true, 'talkId' => $msg->talk_id));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => $errors));
    }
    
    // Send message from the logged-in user/guest to another one
    
    public function sendAction()
    {
        $request    = $this->get('request');
        $validators = $this->get('model_validation');
        
        // Get the input
        
        $from = $this->get('user')->getId();
        $to   = $request->postVar('to');
        $body = $request->postVar('body');
        
        $talkId = 0;
        
        // Validate the input
        
        $errors = $validators->validateMessage(array(
        
            'from' => $from,
            'to'   => $to,
            'body' => $body
        ));
        
        if(count($errors) === 0)
        {
            // Get the users data (to_user_info is initially set to broadcast info)
            
            $fromUser = UserModel::repo()->find($from);
            $toUser   = UserModel::repo()->find($to);
            
            if(empty($fromUser) || empty($toUser))
            {
                return $this->json(array('success' => false));
            }
            
            // Create the message
            
            $msg = new MessageModel(array(
            
                'from_id'        => $from,
                'to_id'          => $to,
                'body'           => $body,
                'talk_id'        => $talkId,
                'from_user_info' => $fromUser->getData(),
                'to_user_info'   => $toUser->getData()
            ));
            
            $msg->save();
            
            // Return a successful response
            
            return $this->json(array('success' => true, 'to' => $to, 'message' => $msg));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => $errors));
    }
    
    // Get logged-in user messages history
    
    public function getHistoryAction()
    {
        $userId = $this->get('user')->getId();
        
        $messages = null;
        
        if($userId)
        {
            $messages = MessageModel::repo()->findBy(array('to_id' => $userId, 'from_id' => $userId), 'OR');
        }
        
        return $this->json($messages ? $messages : array());
    }
    
    // Get history of the given user
    
    public function getUserHistoryAction()
    {
        $request = $this->get('request');
        $userId  = $request->postVar('id');
        
        $messages = MessageModel::repo()->findBy(array('to_id' => $userId, 'from_id' => $userId), 'OR');
        
        return $this->json($messages ? $messages : array());
    }
    
    // Search through history
    
    public function queryHistoryAction()
    {
        $request   = $this->get('request');
        $queryData = $request->postVar('query', false);
        
        $query = json_decode($queryData, true);
        
        // Handle date filtering
        
        $fromDate = !empty($query['fromDate']) ? new DateTime($query['fromDate']) : new DateTime('01/01/1900');
        $toDate   = !empty($query['toDate'])   ? new DateTime($query['toDate'])   : new DateTime('+ 100 years');
        
        $fromDate = $fromDate->format('Y-m-d H:i:s');
        $toDate   = $toDate->format('Y-m-d H:i:s');
        
        unset($query['fromDate']);
        unset($query['toDate']);
        
        $query['datetime'] = array('BETWEEN', $fromDate, $toDate);
        
        $results = MessageModel::repo()->queryHistory($query);
        
        return $this->json($results ? $results : array());
    }
}

?>
