<?php

class Configuration extends Service
{
    public $data;
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $this->data = include ROOT_DIR . '/config/config.php';
        
        $this->data['appSettings'] = $this->readAppSettings();
    }
    
    public function mergeAppSettings($data)
    {
        $this->data['appSettings'] = array_merge($this->data['appSettings'], $data);
    }
    
    public function updateAppSettings($data)
    {
        $this->mergeAppSettings($data);
        
        $content = '';
        
        foreach($this->data['appSettings'] as $key => $value)
        {
            $content .= "$key=$value\n";
        }
        
        $file = fopen(ROOT_DIR . '/config/app.settings.php', 'w');
        
        fwrite($file, $content);
        fclose($file);
    }
    
    private function readAppSettings()
    {
        $lines = file(ROOT_DIR . '/config/app.settings.php');
        
        $result = array();
        
        foreach($lines as $line)
        {
            $parts = explode('=', $line, 2);
            
            if(count($parts) === 2)
            {
                $result[$parts[0]] = trim($parts[1]);
            }
        }
        
        return $result;
    }
}

?>