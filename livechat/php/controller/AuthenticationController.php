<?php

class AuthenticationController extends Controller
{
    public function isGuestLoggedInAction()
    {
        // Check if there is someone already logged-in
        
        $id = $this->get('guest')->getId();
        
        if($id !== null)
        {
            // Check if the user's session is still valid
            
            $user = UserModel::repo()->find($id);
            
            if($user && $user->hasValidSession())
            {
                // Update user's information
                
                $user->info = json_decode($this->get('request')->postVar('info', false));
                $user->save();
                
                return $this->json(array(
                
                    'success' => true,
                    'name'    => substr($user->name, 0, strrpos($user->name, '-', -1)),
                    'mail'    => $user->mail,
                    'image'   => $user->image
                ));
            }
            else
            {
                // Clear guest's identity
                
                $this->get('auth')->clearGuest();
            }
        }
        
        return $this->json(array('success' => false));
    }
    
    public function loginGuestAction()
    {
        // Check if there is someone already logged-in
        
        $id = $this->get('guest')->getId();
        
        if($id !== null)
        {
            // Check if the user's session is still valid
            
            $user = UserModel::repo()->find($id);
            
            if($user && $user->hasValidSession())
            {
                return $this->json(array('success' => true));
            }
            else
            {
                // Clear guest's identity
                
                $this->get('auth')->clearGuest();
            }
        }
        
        // Get the input
        
        $request = $this->get('request');
        
        $name  = $request->postVar('name');
        $mail  = $request->postVar('mail');
        $image = $request->postVar('image');
        $info  = $request->postVar('info', false);
        
        // Validate the input
        
        $errors = $this->get('model_validation')->validateLoginData(compact('name', 'mail'));
        
        if(count($errors) === 0)
        {
            //Generate the temporary user

            $user = UserModel::repo()->generateGuest($name, $mail);
            
            $user->image = $image;
            $user->info  = json_decode($info);
            
            if($user->save())
            {
                // Store the user in session

                $this->get('auth')->setGuest($user->id, $user->name, $user->roles);

                // Return a success response

                return $this->json(array('success' => true));
            }
        }

        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => $errors));
    }
    
    public function loginAction()
    {
        $security = $this->get('security');
        $request  = $this->get('request');
        $config   = $this->get('config');
        
        // Redirect if already logged in
        
        if($this->get('user')->getId())
        {
            return $this->redirect('Admin:index');
        }
        
        $errors   = false;
        $username = '';
        
        if($request->isPost())
        {
            // Get credentials

            $username = $security->escapeString  ($request->postVar('name'));
            $password = $security->encodePassword($request->postVar('password'));
            
            // Check if user exists and passwords match

            $userToken = null;

            if(
                $username == $config->data['superUser'] &&
                $password == $security->encodePassword($config->data['superPass'])
            )
            {
                // Super user

                $userToken = array(

                    'id'    => '-1',
                    'name'  => 'admin',
                    'roles' => array('ADMIN')
                );
            }
            else
            {
                $userEntry = UserModel::repo()->findOneBy(array('mail' => $username, 'roles' => array('LIKE', '%OPERATOR%')));
                
                if(isset($userEntry->password))
                {
                    if($password == $userEntry->password)
                    {
                        $userToken = array(

                            'id'    => $userEntry->id,
                            'name'  => $userEntry->name,
                            'roles' => $userEntry->roles
                        );
                    }
                }
            }

            // Store user's identity in the session

            if($userToken)
            {
                $this->get('auth')->setUser($userToken['id'], $userToken['name'], $userToken['roles']);

                // Redirect to admin's panel

                return $this->redirect('Admin:index');
            }
            
            $errors = true;
        }
        
        return $this->render('admin/login.html', array(
        
            'name'   => $username,
            'errors' => $errors
        ));
    }
    
    public function logoutAction()
    {
        // Clear user's identity
        
        $this->get('auth')->clearUser();
        
        // Redirect
        
        return $this->redirect('Authentication:login');
    }
}

?>
