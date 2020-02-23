<?php

class AdminController extends Controller
{
    const SOUNDS_DIR = 'audio';
    
    // Show admin/operator's main page
    
    public function indexDevAction()
    {
        $user        = $this->get('user');
        $appSettings = $this->get('config')->data['appSettings'];
        
        if($user->hasRole('ADMIN'))
        {
            $userData = $user->getData();
        }
        else
        {
            $userEntry = UserModel::repo()->find($user->getId());
            $userData  = $userEntry->getData();
        }
        
        return $this->render('admin/index.html', array(
        
            'userData'       => json_encode($userData),
            'installed'      => $appSettings['installed'],
            'messageSound'   => $appSettings['messageSound'],
            'defaultAvatars' => json_encode($this->getDefaultAvatars()),
            'messageSounds'  => $this->getMessageSounds()
        ));
    }
    
    // Show admin/operator's main page (minified)
    
    public function indexAction()
    {
        $user        = $this->get('user');
        $appSettings = $this->get('config')->data['appSettings'];
        
        if($user->hasRole('ADMIN'))
        {
            $userData = $user->getData();
        }
        else
        {
            $userEntry = UserModel::repo()->find($user->getId());
            $userData  = $userEntry->getData();
        }
        
        return $this->render('admin/index.min.html', array(
        
            'userData'       => json_encode($userData),
            'installed'      => $appSettings['installed'],
            'messageSound'   => $appSettings['messageSound'],
            'defaultAvatars' => json_encode($this->getDefaultAvatars()),
            'messageSounds'  => $this->getMessageSounds()
        ));
    }
    
    // Get the templates for SPA
    
    public function templatesAction()
    {
        return $this->render('admin-templates.html');
    }
    
    // Get default profile images
    
    protected function getDefaultAvatars()
    {
        $avatars  = UserModel::getDefaultAvatars();
        $template = $this->get('template_interface');
        
        // Make all the names absolute asset paths
        
        $i = 0;
        
        foreach($avatars as $a)
        {
            $avatars[$i++] = $template->asset($a);
        }
        
        return $avatars;
    }
    
    // Get default new message sounds
    
    protected function getMessageSounds()
    {
        $sounds = array();
        
        // Read all sounds from the default sounds directory
        
        foreach(glob(ROOT_DIR . '/../' . self::SOUNDS_DIR . '/*') as $path)
        {
            $sounds[basename($path, '.mp3')] = self::SOUNDS_DIR . '/' . basename($path);
        }
        
        return $sounds;
    }
}

?>
