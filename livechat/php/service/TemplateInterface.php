<?php

class TemplateInterface extends Service
{
    public $user;
    public $request;
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $this->user    = $this->get('user');
        $this->request = $this->get('request');
    }
    
    public function asset($file)
    {
        return $this->request->getRootUrl() . '/' . $file;
    }
    
    public function path($actionName)
    {
        return $this->request->getRootUri() . '/' . $this->get('router')->getRoute($actionName);
    }
}

?>
