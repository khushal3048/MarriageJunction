<?php

class ConfigController extends Controller
{
    // Get chat settings
    
    public function getSettingsAction()
    {
        $config = $this->get('config');
        
        return $this->json(array(
        
            'success' => true,
            
            'settings' => $config->data['appSettings']
        ));
    }
    
    // Update chat settings
    
    public function updateSettingsAction()
    {
        $config   = $this->get('config');
        $settings = $this->get('request')->postVars();
        
        // Join new values with the current settings
        
        $config->updateAppSettings($settings);
        
        return $this->json(array('success' => true));
    }
    
    // Reset to defaults
    
    public function resetSettingsAction()
    {
        $config = $this->get('config');
        
        $config->updateAppSettings($config->data['defaultSettings']);
        
        // Send all the settings
        
        return $this->json(array('success' => true, 'settings' => $config->data['appSettings']));
    }
}

?>
