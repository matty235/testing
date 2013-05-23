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
    	/* $this->loadConfig()
				 ->initView()
				 ->initDb()
				 ->setRoutes()
				 ->setPlugins()
				 ->setActionHelpers()
				 ->setControllerDirectory(); */
		 
		date_default_timezone_set('America/New_York'); 
		$uri = $request->getRequestUri();

		// adding fireBug Writer
		$reg = Zend_Registry::getInstance();
		$logger = new Zend_Log();
		$writer = new Zend_Log_Writer_Firebug();
		$logger->addWriter($writer);
		$reg->set('logger',$logger);

		// get session
		$auth = Zend_Auth::getInstance();		 
		$auth->getStorage();

		// acl (may not be needed yet)
		//$acl = new Application_Acl();    
		
//		$this->initDb();
		$this->setRoutes();
		
		// get config vals from the db
/*
		$dconfig = array();
		$select = $reg->get('db')->select()->from('configs');
   	$stmt = $select->query();
   	$result = $stmt->fetchAll();
   	foreach ($result as $cat){
   		$dconfig[$cat['config_name']] = $cat['config_value'];				
   	}
   	$reg->set('dconfig',$dconfig);
*/		
		
		
		if ($auth->hasIdentity()) 
		{     
		    // logged in 
		    $id = $auth->getIdentity();
		    
		    $reg->set('uid', $id->user_id);
		  //  $reg->set('urole', constant($id->role_id));
		   // $u = new Application_Model_Users($id);
		   // $c = $u->getContactInfo();
		    //$reg->set('uname', $c['fullname']);
		    
		}
		
		else 
		{   
			// not logged in
		    $reg->set('uid', 0);
		    //$reg->set('urole',ANON);
		 }	
	 
		$logger->log($_SESSION,1);
		$logger->log(Zend_Registry::getInstance(),5);
		 
    }

    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
    	
    	#SUPER_ADMIN,SITE_ADMIN,HOA_ADMIN,HOA_REP,HOA_MEMBER,GUEST_USER
    	#PENDING_USER, UNVERIFIED_USER, ANON, DELETED_USER
			$c = $request->getControllerName();
			$a = $request->getActionName();
    	$reg = Zend_Registry::getInstance();
			if (!$reg->isRegistered('uid') || $reg->get('uid') == 0 )
			{
				$request->setActionName('index');
				$request->setControllerName('auth');
				$_SESSION['uri']['redirect'] = $_SERVER['REQUEST_URI'];
			}					
		   	    	
    }	
    
    /**
     * sets custom routes for application
     * @return Application_Plugin_Initialization
     */
    public function setRoutes() 
    {

/*
		 $router = Zend_Controller_Front::getInstance()->getRouter();

		 $router->addRoute('events',new Zend_Controller_Router_Route('events/page/:page', array(
		  	'controller' => 'events',
		  	'action' => 'index',
		  	'page' => 1,
		 	'filter' =>''
		 )));

		 $router->addRoute('events3',new Zend_Controller_Router_Route('events/filter/:filter', array(
		 	'controller' => 'events',
		 	'action' => 'index',
		 	'page' => 1,
		 	'filter' => ''
		 )));		 
		 
		 $router->addRoute('events2',new Zend_Controller_Router_Route('events/filter/:filter/page/:page', array(
	 		'controller' => 'events',
	 		'action' => 'index',
	 		'page' => 1,
	 		'filter' => ''
		 )));

		 $router->addRoute('groups',new Zend_Controller_Router_Route('groups/view/:id', array(
		  'controller' => 'groups',
		  'action' => 'view',
		  'id' => 1
		 )));		 

		 $router->addRoute('groupsjoin',new Zend_Controller_Router_Route('groups/join/:id', array(
		 		'controller' => 'groups',
		 		'action' => 'join',
		 		'id' => null
		 )));
		 
		 $router->addRoute('groupscat',new Zend_Controller_Router_Route('groups/cat/:cat', array(
		  'controller' => 'groups',
		  'action' => 'index',
		  'cat' => 0
		 )));	
		 		 
		 $router->addRoute('bulletinp',new Zend_Controller_Router_Route('bulletin/page/:page', array(
		  'controller' => 'bulletin',
		  'action' => 'index',
		  'page' => 1
		 )));		 

		 $router->addRoute('bulletinc',new Zend_Controller_Router_Route('bulletin/category/:category', array(
		  'controller' => 'bulletin',
		  'action' => 'index',
		  'category' => 0,
		 )));		 

		 $router->addRoute('bulletin',new Zend_Controller_Router_Route('bulletin/category/:category/page/:page', array(
		  'controller' => 'bulletin',
		  'action' => 'index',
		  'category' => 0,
		 'page' => 1
		 )));		 
		 
		 $router->addRoute('register',new Zend_Controller_Router_Route('register', array(
		  'controller' => 'contacts',
		  'action' => 'register',
		 )));
		 
		 $router->addRoute('login',new Zend_Controller_Router_Route('login', array(
		  'controller' => 'auth',
		  'action' => 'index',
		 )));
		 
	
*/
  	 return $this;		 
    }

}