<?php

class Guest extends Service
{
    // Fields
    
    private $id;
    private $name;
    private $roles;
    
    // Methods
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $user = $this->get('auth')->getGuest();
        
        if(!empty($user))
        {
            $this->id    = $user['id'];
            $this->name  = $user['name'];
            $this->roles = $user['roles'];
        }
        else
        {
            $this->id    = null;
            $this->name  = 'Guest';
            $this->roles = array('GUEST');
        }
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getRoles()
    {
        return $this->roles;
    }
    
    public function hasRole($role)
    {
        return array_search($role, $this->roles) !== false;
    }
    
    public function hasRoles($roles)
    {
        foreach($roles as $role)
        {
            if(!$this->hasRole($role))
            {
                return false;
            }
        }
        
        return true;
    }
    
    public function hasSomeRoles($roles)
    {
        foreach($roles as $role)
        {
            if($this->hasRole($role))
            {
                return true;
            }
        }
        
        return false;
    }
}

?>
