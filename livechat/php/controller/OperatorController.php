<?php

class OperatorController extends Controller
{
    // Update user's last acitvity time
    
    public function stayAliveAction()
    {
        UserModel::repo()->stayAlive($this->get('user')->getId());
        
        return $this->json(array('success' => true));
    }
    
    // Update user's typing status
    
    public function updateTypingStatusAction()
    {
        $request      = $this->get('request');
        $userId       = $this->get('user')->getId();
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
        $userId  = $this->get('user')->getId();
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
    
    // Update the given profile
    
    public function updateAction()
    {
        $request     = $this->get('request');
        $security    = $this->get('security');
        $currentUser = $this->get('user');
        
        // Get the input
        
        $id       = $request->postVar('id');
        $name     = $request->postVar('name');
        $mail     = $request->postVar('mail');
        $roles    = $request->postVar('roles');
        $image    = $request->postVar('image');
        $password = null;
        
        if($currentUser->getId() === $id || $currentUser->hasRole('ADMIN'))
        {
            $password = $request->postVar('password');
        }
        
        $errors = array();
        
        // Get the user
        
        $user = UserModel::repo()->find($id);
        
        if($user && ($currentUser->getId() === $user->id || $currentUser->hasRole('ADMIN')))
        {
            // Check if current password is correct

            if(!$currentUser->hasRole('ADMIN') && !empty($password))
            {
                $currPassword = $security->encodePassword($request->postVar('currPassword'));
                
                if($currPassword !== $user->password)
                {
                    $errors['password'] = 'Password: Current password is incorrect';
                }
            }
            
            if(count($errors) === 0)
            {
                // Set new properties

                $user->setRawData(compact('name', 'mail', 'password', 'roles', 'image'));
                
                // Validate the input

                $errors = $this->get('model_validation')->validateUser($user->getData(true), !empty($password));

                if(count($errors) === 0)
                {
                    // Update the user

                    if(!empty($password)) $user->password = $this->get('security')->encodePassword($user->password);
                    
                    $user->save();

                    // Return a successful response

                    return $this->json(array('success' => true));
                }
            }
            
            // Return an error response
            
            return $this->json(array('success' => false, 'errors' => $errors));
        }
        else if($currentUser->hasRole('ADMIN') && !empty($password))
        {
            return $this->createAction();
        }
        
        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => array('error' => 'User not found')));
    }
    
    // Get default profile images
    
    public function getDefaultAvatarsAction()
    {
        $avatars  = UserModel::getDefaultAvatars();
        $template = $this->get('template_interface');
        
        // Make all the names absolute asset paths
        
        $i = 0;
        
        foreach($avatars as $a)
        {
            $avatars[$i++] = $template->asset($a);
        }
        
        return $this->json(array('success' => true, 'avatars' => $avatars));
    }
    
    // Upload the profile image
    
    public function uploadAvatarAction()
    {
        // Get the input
        
        $request = $this->get('request');
        
        $id   = $request->postVar('userId');
        $file = $request->file('avatar');
        
        // Get the user
        
        $user = UserModel::repo()->find($id);
        
        if($user)
        {
            // Resize and save the image
            
            $filename = $this->get('security')->randomString(64) . '.' . $file['ext'];
            
            $inputPath  = $file['tmp_name'];
            $webPath    = 'upload/avatars/' . $filename;
            $outputPath = ROOT_DIR . '/../' . $webPath;
            
            $this->get('image_resizer')->resize($inputPath, $outputPath, UserModel::AVATAR_SIZE, UserModel::AVATAR_SIZE);
            
            // Update the model
            
            $user->image = $request->getRootUrl() . '/' . $webPath;
            $user->save();
            
            return $this->json(array('success' => true, 'image' => $user->image), true);
        }
        
        return $this->json(array('success' => false, 'error' => 'User not found'));
    }
    
    // Get all operators
    
    public function listAction()
    {
        // Get the user
        
        $users = UserModel::repo()->findBy(array('roles' => array('LIKE', '%OPERATOR%')));
        
        if($users)
        {
            // Hide the password fields
            
            foreach($users as $user)
            {
                unset($user->password);
            }
            
            // Return a successful response
            
            return $this->json(array('success' => true, 'users' => $users));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false));
    }
    
    // Create new operator
    
    public function createAction()
    {
        $request = $this->get('request');
        
        // Get the input
        
        $name     = $request->postVar('name');
        $mail     = $request->postVar('mail');
        $password = $request->postVar('password');
        
        $roles = array('OPERATOR');
        
        // Validate the input
        
        $user = new UserModel(compact('name', 'mail', 'password', 'roles'));
        
        $errors = $this->get('model_validation')->validateUser($user->getData(true));
        
        if(count($errors) === 0)
        {
            // Create the user
            
            $user->password = $this->get('security')->encodePassword($user->password);
            
            if($user->save())
            {
                // Return a successful response

                return $this->json(array('success' => true, 'id' => $user->id));
            }
            
            $errors = array('Couldn\'t save the user');
        }
        
        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => $errors));
    }
    
    // Remove an operator
    
    public function deleteAction()
    {
        $request = $this->get('request');
        
        // Get the input
        
        $id = $request->postVar('id');
        
        // Get the user
        
        $user = UserModel::repo()->find($id);
        
        if($user)
        {
            // Remove the user
            
            $user->remove();
            
            // Return a successful response
            
            return $this->json(array('success' => true));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false));
    }
    
    // Get user
    
    public function getAction()
    {
        $request = $this->get('request');
        
        // Get the input
        
        $id = $request->postVar('id');
        
        // Get the user
        
        $user = UserModel::repo()->find($id);
        
        if($user)
        {
            // Hide the password field
            
            unset($user->password);
            
            // Return a successful response
            
            return $this->json(array('success' => true, 'user' => $user));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false));
    }
    
    // Check whether there's any operator on-line
    
    public function isOnlineAction()
    {
        // Hide operators' presence if maximum number of connections has been exceeded
        
        $user = $this->get('guest');
        
        if(!$user->getId())
        {
            $config       = $this->get('config');
            $guestsOnline = UserModel::repo()->countGuestsOnline();
            
            if($guestsOnline >= $config->data['appSettings']['maxConnections'])
            {
                return $this->json(array('success' => false));
            }
        }
        
        return $this->json(array('success' => UserModel::repo()->isOperatorOnline()), array(), 'json', array(
            
            array('Cache-Control', 'no-cache, no-store, must-revalidate'),
            array('Pragma', 'no-cache'),
            array('Expires', '0')
        ));
    }
    
    // Get all on-line users
    
    public function getOnlineUsersAction()
    {
        return $this->json(array('success' => true, 'users' => UserModel::repo()->getAllOnline()));
    }
}

?>
