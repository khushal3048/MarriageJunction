<?php

class UserModel extends Model
{
    const GUEST_SESSION_TIME  = 600; // 10 minutes (in seconds)
    const TYPING_STATUS_TIME  =   5; // lifetime of the typing status validity
    const TYPING_CLEAR_TIME   = 600; // 10 minutes (in seconds)
    const ONLINE_TIME         =  15;
    const AVATAR_SIZE         =  40;
    const DEFAULT_AVATARS_DIR = 'upload/default-avatars';
    
    // Static methods
    
    public static function getDefaultAvatars()
    {
        $result = array();
        
        // Read all images from the default avatars directory
        
        foreach(glob(ROOT_DIR . '/../' . self::DEFAULT_AVATARS_DIR . '/*') as $path)
        {
            $result[] = self::DEFAULT_AVATARS_DIR . '/' . basename($path);
        }
        
        return $result;
    }
    
    // Getters & setters
    
    public function getTableName()
    {
        return 'chat_user';
    }
    
    public function getColumns()
    {
        return array('name', 'mail', 'password', 'image', 'roles', 'last_activity', 'info');
    }
    
    public function getData($raw = false)
    {
        $data = parent::getData();
        
        if(!$raw)
        {
            // Hide the password field

            unset($data['password']);
        }
        
        // Remove all integer indexed entries
        
        for($i=  0; $i < count($data); $i++)
        {
            unset($data[$i]);
        }
        
        return $data;
    }
    
    public function toJson()
    {
        $data = $this->getData();
        
        // Hide the password field
        
        unset($data['password']);
        
        return $data;
    }
    
    // Methods
    
    public function hasRole($role)
    {
        return is_array($this->roles) && array_search($role, $this->roles) !== false;
    }
    
    public function stayAlive($id)
    {
        self::$db->execute(
        
            'UPDATE ' . $this->getTableName() . ' SET last_activity = ? WHERE id = ?',
            
            array(date('Y-m-d H:i:s'), $id)
        );
    }
    
    public function updateTypingStatus($id, $secondUserId, $isTyping)
    {
        $memory = self::$services->get('memory');
        $time   = time();
        
        // Check if it's time to clear the memory
        
        $lastClearTime = $memory->get('lastClearTime');
        
        if($lastClearTime + self::TYPING_CLEAR_TIME < $time)
        {
            $memory->clear();
            $memory->set('lastClearTime', $time);
        }
        
        // Update user's status
        
        if($isTyping) $memory->set('t' . $id . '-' . $secondUserId, $time);
        else          $memory->remove('t' . $id . '-' . $secondUserId);
    }
    
    public function getTypingStatus($id, $secondUserId)
    {
        $memory = self::$services->get('memory');
        $time   = time();
        
        $status = $memory->get('t' . $secondUserId . '-' . $id);
        
        if(empty($status)) return false;
        
        return $status + self::TYPING_STATUS_TIME >= $time;
    }
    
    public function clearOfflineGuests()
    {
        // Clear users that are not alive anymore
        
        self::$db->execute(
        
            'DELETE FROM ' . $this->getTableName() . ' WHERE roles = ? AND last_activity < ?',
            
            array('GUEST', date('Y-m-d H:i:s', time() - self::GUEST_SESSION_TIME))
        );
    }
    
    public function generateGuest($name, $mail)
    {
        return new UserModel(array(
        
            'name'          => $name . '-' . time(),
            'mail'          => $mail,
            'password'      => 'x',
            'roles'         => array('GUEST'),
            'last_activity' => date('Y-m-d H:i:s')
        ));
    }
    
    public function hasValidSession()
    {
        $lastActivityTime = strtotime($this->last_activity);
        
        return time() - $lastActivityTime <= self::GUEST_SESSION_TIME;
    }
    
    public function isOperatorOnline()
    {
        $operators = UserModel::repo()->findBy(array('roles' => array('LIKE', '%OPERATOR%')));
        
        if($operators)
        {
            foreach($operators as $operator)
            {
                $lastActivityTime = strtotime($operator->last_activity);
                
                if(time() - $lastActivityTime <= self::ONLINE_TIME) // Operator considered on-line
                {
                    return true;
                }
            }
        }
        
        // No operator on-line
        
        return false;
    }
    
    public function getAllOnline()
    {
        $users  = UserModel::repo()->findAll();
        $result = array();
        
        if($users)
        {
            foreach($users as $user)
            {
                $lastActivityTime = strtotime($user->last_activity);
                
                if(time() - $lastActivityTime <= self::ONLINE_TIME) // Operator considered on-line
                {
                    // Hide the password field
                    
                    $result[] = $user->getData();
                }
            }
        }
        
        return $result;
    }
    
    public function getGuestsOnline()
    {
        $users  = UserModel::repo()->findBy(array('roles' => array('LIKE', '%GUEST%')));
        $result = array();
        
        if($users)
        {
            foreach($users as $user)
            {
                $lastActivityTime = strtotime($user->last_activity);
                
                if(time() - $lastActivityTime <= self::ONLINE_TIME) // Considered on-line
                {
                    // Hide the password field
                    
                    $result[] = $user->getData();
                }
            }
        }
        
        return $result;
    }
    
    public function countGuestsOnline()
    {
        $users = UserModel::repo()->findBy(array('roles' => array('LIKE', '%GUEST%')));
        $count = 0;
        
        if($users)
        {
            foreach($users as $user)
            {
                $lastActivityTime = strtotime($user->last_activity);
                
                if(time() - $lastActivityTime <= self::ONLINE_TIME) $count++;
            }
        }
        
        return $count;
    }
    
    public static function repo()
    {
        return new UserModel;
    }
    
    public function preSave()
    {
        $result = parent::preSave();
        
        if(isset($result['roles'])) $result['roles'] = implode(',', $result['roles']);
        if(isset($result['info']))  $result['info']  = json_encode($result['info']);
        
        return $result;
    }
    
    public function postRead($data)
    {
        $data = parent::postRead($data);
        
        if(isset($data['roles'])) $data['roles'] = explode(',', $data['roles']);
        if(isset($data['info']))  $data['info']  = json_decode($data['info']);
        
        return $data;
    }
}

?>
