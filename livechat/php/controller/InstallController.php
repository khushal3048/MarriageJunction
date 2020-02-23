<?php

class InstallController extends Controller
{
    public function indexAction()
    {
        $data = array('submit' => false);
        
        if($this->get('request')->isPost())
        {
            $config = $this->get('config');
            
            // Generate the queries
            
            try
            {
                $sql = file_get_contents(ROOT_DIR . '/../sql/install_' . $config->data['dbType'] . '.sql');
                $sql = str_replace('%db_name%', $config->data['dbName'], $sql);

                // Create the database and tables

                $data['submit']  = true;
                $data['success'] = @$this->get('db')->execute($sql);
            }
            catch(Exception $e)
            {
                $data['success']  = false;
                $data['errorMsg'] = $e->getMessage();
            }
            
            if($data['success'])
            {
                $config->updateAppSettings(array('installed' => true));
            }
            else
            {
                $data['error'] = 'There was an error during the installation. Please make sure that all of your database settings in <b><i>config.php</i></b> are correct. Remember that some hosting solutions may require that you first manually create a MySQL database before running this script.';
            }
        }
        
        return $this->render('admin/install.html', $data);
    }
    
    public function uninstallAction()
    {
        $data = array('submit' => false);
        
        if($this->get('request')->isPost())
        {
            $config = $this->get('config');
            
            // Generate the queries
            
            try
            {
                $sql = file_get_contents(ROOT_DIR . '/../sql/uninstall_' . $config->data['dbType'] . '.sql');
                $sql = str_replace('%db_name%', $config->data['dbName'], $sql);

                // Delete the whole database

                $data['submit']  = true;
                $data['success'] = @$this->get('db')->execute($sql);
            }
            catch(Exception $e)
            {
                $data['success']  = false;
                $data['errorMsg'] = $e->getMessage();
            }
            
            if($data['success'])
            {
                $config = $this->get('config');
                $config->updateAppSettings(array('installed' => false));
            }
            else
            {
                $data['error'] = 'There was an error during the uninstallation';
            }
        }
        
        return $this->render('admin/uninstall.html', $data);
    }
}

?>
