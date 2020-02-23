<?php

require_once ROOT_DIR . '/lib/JSON.php';

// Main application class

class Application
{
    // Fields
    
    private $services;
    
    // Constructor
    
    public function __construct()
    {
        $this->services = ServiceContainer::getInstance();
    }
    
    // Methods
    
    public function config()
    {
        // Setup the services
        
        $this->services->registerService('memory',             'Memory');
        $this->services->registerService('events',             'Events');
        $this->services->registerService('filesystem',         'Filesystem');
        $this->services->registerService('mailer',             'Mailer');
        $this->services->registerService('config',             'Configuration');
        $this->services->registerService('db',                 'Database');
        $this->services->registerService('http',               'Http');
        $this->services->registerService('request',            'Request');
        $this->services->registerService('session',            'Session');
        $this->services->registerService('router',             'Router');
        $this->services->registerService('security',           'Security');
        $this->services->registerService('validation',         'Validation');
        $this->services->registerService('model_validation',   'ModelValidation');
        $this->services->registerService('models',             'Repository');
        $this->services->registerService('views',              'Repository');
        $this->services->registerService('controllers',        'Repository');
        $this->services->registerService('user',               'User');
        $this->services->registerService('guest',              'Guest');
        $this->services->registerService('auth',               'Authentication');
        $this->services->registerService('firewall',           'Firewall');
        $this->services->registerService('template_interface', 'TemplateInterface');
        $this->services->registerService('image_resizer',      'ImageResizer');
        $this->services->registerService('color_calculator',   'ColorCalculator');
    }
    
    public function run($request)
    {
        $response = null;
        
        // Authorize

        $authorized = $this->services->get('firewall')->canAccessPath($request->getRoute());
        
        if($authorized)
        {
            // Find the matching action

            $action = $this->services->get('router')->getAction($request->getRoute());

            if($action)
            {
                // Run the action and return the response

                $controller = $action['controller'];
                $actionName = $action['action'];

                // Inject services to the controller

                $controller->setServiceContainer($this->services);

                // Run the action

                $result = $controller->$actionName();

                if($result instanceof Response)
                {
                    $response = $result;
                }
                else
                {
                    $response = new Response($result);
                }
            }
            else
            {
                // Return the "Not Found" HTTP response
                
                $response = new Response('Route not found (' . $request->getRoute() . ')', null, 404);
            }
        }
        else
        {
            /*
            // Return the "Access denided" HTTP response
            
            return new Response('Access denied (' . $request->getRoute() . ')', null, 403);
            */
            
            // Redirect to the login page
            
            $loginAction = $this->services->get('firewall')->getLoginAction();
            $loginPath   = $this->services->get('router')->getRoute($loginAction);
            
            $response = new Response('', array(array('Location', $loginPath), 303));
        }
        
        // Clean
        
        $this->services->clean();
        
        // Return the response
        
        return $response;
    }
}

?>
