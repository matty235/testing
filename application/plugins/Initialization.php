<?php 
/**
 * Application initialization plugin
 * 
 * @uses Zend_Controller_Plugin_Abstract
 */
class Application_Plugin_Initialization extends Zend_Controller_Plugin_Abstract
{
	
	private $env;
    /**
 * @return the $env
 */
   public function getEnv() {
      return $this->env;
   }

	/**
 * @param field_type $env
 */
   public function setEnv($env) {
      $this->env = $env;
   }

	/**
     * Constructor
     * 
     * @param  string $env Execution environment
     * @return void
     */
    public function __construct($env)
    {
		  $this->setEnv($env);
    }

    /**
     * Route startup hook
     * 
     * @param  Zend_Controller_Request_Abstract $request
     * @return void
     */
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
			 
			date_default_timezone_set('America/New_York'); 
			$uri = $request->getRequestUri();
		
			$site_url = 'http' . ((array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS'] == 'on') ? 's':'') . '://' . $_SERVER['HTTP_HOST'] ;
			$_SESSION['site_url'] = $site_url;
			
			// adding fireBug Writer
			$reg = Zend_Registry::getInstance();
			$logger = new Zend_Log();
			$writer = new Zend_Log_Writer_Firebug();
			$logger->addWriter($writer);
			$reg->set('logger',$logger);
	
			// get session
			$auth = Zend_Auth::getInstance();		 
			$auth->getStorage();
	
			$logger->log("Request URI: $uri",7);
					
			$this->setRoutes();
			
			
			if ($auth->hasIdentity()) 
			{     
			    // logged in 
			    $user = $auth->getIdentity();				
			}
			else 
			{   
				// not logged in
			    $reg->set('uid', 0);
			 }	
		 
			$logger->log($_SESSION,7);
		}
 

    /**
     * Pre Dispatch hook
     *
     * @param  Zend_Controller_Request_Abstract $request
     * @return void
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
		
    	$allowedAnon = array(
    		'auth',
    		'error',
   			'login',
   			'logout'		
    	);

   		$c = $request->getControllerName();
			$a = $request->getActionName();
			$auth = Zend_Auth::getInstance();						
			$reg = Zend_Registry::getInstance();
			
			$reg->get('logger')->log("Pre Dispatch $c - $a", 7);
			
			// if not logged in -> login page
			if (!$auth->hasIdentity() && !in_array($c, $allowedAnon))
			{
				$request->setActionName('index');
				$request->setControllerName('auth');
				
			}					
		   	    	
    }	
    
    /**
     * sets custom routes for application
     * @return Application_Plugin_Initialization
     */
    public function setRoutes() 
    {

		 $router = Zend_Controller_Front::getInstance()->getRouter();

		 $router->addRoute('specimens',new Zend_Controller_Router_Route('specimens.php', array(
		 		'controller' => 'index',
		 		'action' => 'index',
		 )));
		 
		 $router->addRoute('login',new Zend_Controller_Router_Route('login/:category', array(
		  'controller' => 'auth',
		  'action' => 'index',
		 )));
		 
		 $router->addRoute('getPassword',new Zend_Controller_Router_Route('getPassword.php', array(
		 		'controller' => 'auth',
		 		'action' => 'getPassword',
		 )));
		 
		 $router->addRoute('checkPassword',new Zend_Controller_Router_Route('getPassword/do_change_password.php', array(
		 		'controller' => 'auth',
		 		'action' => 'getPassword',
		 )));

		 $router->addRoute('resetPassword',new Zend_Controller_Router_Route('password/reset/key/:key/email/:email', array(
		 		'controller' => 'auth',
		 		'action' => 'confirmReset',
		 		'key' => null,
		 		'email' => null,
		 )));
		 
		 
		 $router->addRoute('logout',new Zend_Controller_Router_Route_Regex('logout(.*)', array(
		 		'controller' => 'auth',
		 		'action' => 'logout',
		 )));
		 
		 
		 
  	 return $this;		 
    }
    
    
    /**
     * Post Dispatch hook
     *
     * @param  Zend_Controller_Request_Abstract $request
     * @return void
     */
    
    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
    	$reg = Zend_Registry::getInstance();
    	$c = $request->getControllerName();
    	$a = $request->getActionName();
    	$reg->get('logger')->log("Post Dispatch: $c - $a", 7);
    }
    
}