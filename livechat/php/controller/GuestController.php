<?php

class GuestController extends Controller
{
    // Update user's last acitvity time
    
    public function stayAliveAction()
    {
        UserModel::repo()->stayAlive($this->get('guest')->getId());
        
        return $this->json(array('success' => true));
    }
    
    // Get online guests
    
    public function getOnlineAction()
    {
        $guests = UserModel::repo()->findBy(array(
        
            'roles' => array('LIKE', '%GUEST%'))
        );
        
        $result = array();
        
        if($guests)
        {
            foreach($guests as $guest)
            {
                if($guest->hasValidSession())
                {
                    $result[] = $guest;
                }
            }
        }
        
        return $this->json($result);
    }
    
    // Update guest's typing status
    
    public function updateTypingStatusAction()
    {
        $request      = $this->get('request');
        $userId       = $this->get('guest')->getId();
        $secondUserId = $request->postVar('secondUserId');
        
        if($userId)
        {
            $status = $request->postVar('status');

            UserModel::repo()->updateTypingStatus($userId, $secondUserId, $status == true);
            
            return $this->json(array('success' => true));
        }
        
        return $this->json(array('success' => false));
    }
    
    // Get user(s) typing status(es)
    
    public function getTypingStatusAction()
    {
        $request = $this->get('request');
        $userId  = $this->get('guest')->getId();
        $userIds = $request->postVar('ids');
        
        if($userId)
        {
            if(is_array($userIds))
            {
                $results = array();

                foreach($userIds as $id)
                {
                    $results[$id] = UserModel::repo()->getTypingStatus($userId, $id);
                }

                return $this->json(array('success' => true, 'results' => $results));
            }
        }
        
        return $this->json(array('success' => false));
    }
}

?>
