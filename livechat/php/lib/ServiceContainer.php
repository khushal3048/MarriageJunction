<?php

class ServiceContainer
{
    private static $instance = null;
    
    private $services     = array();
    private $constructors = array();
    
    // Constructor
    
    private function __construct()
    {
        self::$instance = $this;
    }
    
    public static function getInstance()
    {
        if(self::$instance == null)
        {
            new ServiceContainer();
        }
        
        return self::$instance;
    }
    
    // Methods
    
    public function get($id)
    {
        // Create the service if not already availabe
        
        if(!isset($this->services[$id]) && isset($this->constructors[$id]))
        {
            $this->services[$id] = new $this->constructors[$id];
            $this->services[$id]->setServiceContainer($this);
        }
        
        // Return the service
        
        return $this->services[$id];
    }
    
    public function registerService($id, $ServiceClass)
    {
        // Store the service constructor
        
        $this->constructors[$id] = $ServiceClass;
    }
    
    public function clean()
    {
        // Remove the registered services
        
        foreach($this->services as $service)
        {
            $service->onRemove();
        }
        
        $this->services = array();
    }
}

?>
