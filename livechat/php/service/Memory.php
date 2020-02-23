<?php

class Memory extends Service
{
    // Constants
    
    const BUFFER_FILE = 'data/memory.dat';
    
    // Fields
    
    private $data;
    private $modified = false;
    
    // Methods
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $this->data = $this->getFileData();
    }
    
    public function onRemove()
    {
        parent::onRemove();
        
        // -----
        
        if($this->modified)
        {
            // Update the file
            
            $this->data = $this->mergeData($this->getFileData(), $this->data);
            
            file_put_contents(ROOT_DIR . '/../' . self::BUFFER_FILE, $this->createIniString($this->data));
        }
    }
    
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        
        $this->modified = true;
    }
    
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
    
    public function remove($key)
    {
        unset($this->data[$key]);
        
        $this->modified = true;
    }
    
    public function clear()
    {
        $this->setData(array());
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function setData($data)
    {
        $this->data = $data;
        
        $this->modified = true;
    }
    
    protected function createIniString($entries)
    {
        $arr = array();
        
        foreach($entries as $key => $value)
        {
            if(is_array($value))
            {
                $arr[] = "[$key]";
                
                foreach($value as $skey => $sval) $arr[] = "$skey=" . (is_numeric($sval) ? $sval : '"' . $sval . '"');
            }
            else $arr[] = "$key=" . (is_numeric($value) ? $value : '"' . $value . '"');
        }
        
        return implode("\r\n", $arr);
    }
    
    protected function getFileData()
    {
        return parse_ini_file(ROOT_DIR . '/../' . self::BUFFER_FILE, true);
    }
    
    protected function mergeData($curr, $new)
    {
        $result = array_replace($curr, $new);
        
        foreach(array_keys($curr) as $key)
        {
            if(!isset($new[$key])) unset($result[$key]);
        }
        
        return $result;
    }
}

?>
