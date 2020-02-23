<?php

class Session extends Service
{
    const SESSION_NAMESPACE = 'mirrormx_customer_chat';
    
    public function __construct()
    {
        // Start session handling
        
        session_start();
        
        // Create the namespace
        
        if(empty($_SESSION[self::SESSION_NAMESPACE]))
        {
            $_SESSION[self::SESSION_NAMESPACE] = array();
        }
    }
    
    public function get($key)
    {
        return isset($_SESSION[self::SESSION_NAMESPACE][$key]) ? $_SESSION[self::SESSION_NAMESPACE][$key] : null;
    }
    
    public function set($key, $value)
    {
        $_SESSION[self::SESSION_NAMESPACE][$key] = $value;
    }
    
    public function remove($key)
    {
        unset($_SESSION[self::SESSION_NAMESPACE][$key]);
    }
}

?>
