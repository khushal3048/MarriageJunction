<?php

class Database extends Service
{
    // Fields
    
    private $db;
    
    // Constructor
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $config     = $this->get('config');
        $connection = isset($config->data['appSettings']['installed']) && $config->data['appSettings']['installed'] ? $config->data['dbConnection'] : $config->data['dbConnectionRaw'];
        
        $this->db = new PDO($connection, $config->data['dbUser'], $config->data['dbPassword']);
    }
    
    // Methods
    
    public function execute($q, $params = null)
    {
        try
        {
            $statement = $this->db->prepare($q);
            
            if($statement)
            {
                return $statement->execute($params);
            }
        }
        catch(Exception $e)
        {
            return false;
        }
        
        return false;
    }
    
    public function query($q, $params = null)
    {
        try
        {
            $statement = $this->db->prepare($q);
            
            if($statement)
            {
                $statement->execute($params);
                
                return $statement->fetchAll();
            }
        }
        catch(Exception $e)
        {
            return false;
        }
        
        return false;
    }
    
    public function queryOne($q, $params = null)
    {
        try
        {
            $statement = $this->db->prepare($q);
            
            if($statement)
            {
                $statement->execute($params);
                
                return $statement->fetch();
            }
        }
        catch(Exception $e)
        {
            return false;
        }
        
        return false;
    }
    
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}

?>
