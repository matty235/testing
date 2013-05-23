<?php

class AuthController extends Zend_Controller_Action
{

  public function init()
  {
  	$this->_em = \Zend_Registry::get('doctrineEm');
  	$this->_repo = $this->_em->getRepository('Labtab:PortalUser');
  	$this->_flash = $this->_helper->getHelper('FlashMessenger');
  	$this->_log = \Zend_Registry::get('logger');  	
  	
  	$request = $this->getRequest();
  	$ajax = $request->getPost();
  	
  	if (array_key_exists('ajax',$ajax))
  	{
  		$this->_helper->layout()->disableLayout();
  		$this->getHelper('viewRenderer')->setNoRender();
  	}
  }

  /**
   *	Process login or display form
   */
  public function indexAction()
  {
  	
  	$form = new Labtab_Form_Login();  	
  	$request = $this->getRequest();
  	
  	if ($request->isPost()) 
  	{
			// attempted login
  		if ($form->isValid($request->getPost())) 
      {
        if ($this->_process($form->getValues())) 
        {
        	// verified
					die( "success");    	
				}
			else
				die("incorrect credentials");			
      }			
  	}    		
  	// else just display form
  }
  

	/**
	*	Forgotten password form- create hash
	*/
  public function getpasswordAction()
  {
		$form = new Labtab_Form_Password();
		$request = $this->getRequest();
  	if ($request->isPost()) 
  	{
			$postData = $request->getPost();

  		if ($form->isValid($postData)) 
  		{	  			
  			// Labtab_Entity_PortalUser
  			$user = $this->_repo->find($postData['email']);	
  			
  			// Labtab_Entity_PwReset
  			$reset = new \Labtab\Entity\PwReset($user->getEmail());
				$this->_em->persist($reset);
				$this->_em->flush();

				// send the link
				$reset->send();
				
				die("success");
  		}
	  }	        		
  }

  
  /**
  *	Forgotten password - confirm reset hash
  */
  public function confirmresetAction()
  {

  	$invalid = false;

  	// password change form
  	$form = new Labtab_Form_Password();

  	// what data have we been passed?
  	$request = $this->getRequest();
  	$email = $this->getRequest()->getParam('email', null);
  	$key = $this->getRequest()->getParam('key', null);
  	
  	// -- verify the data  	
  	$reset = $this->_em->getRepository('Labtab:PwReset')->findOneBy(array('id' => $key, 'email' => $email));
 
  	// verify key and email
  	if ($reset === null)
  	{
  		$this->_helper->getHelper('FlashMessenger')->addMessage('Password reset failed.');
  		$invalid = true;
  	}
  	
  	// verify unused
		else if ($reset->getUsed())
		{
			$this->_helper->getHelper('FlashMessenger')
				->addMessage("This link has already been used to reset the password. Generate a new link from the reset page");
			$invalid = true;
		}
		
  	// verify the expiration
  	else if ($reset->isExpired())
  	{
  		$this->_helper->getHelper('FlashMessenger')->addMessage("The one hour time has expired on the link.");
  		$invalid = true;
  	}

  	// redirect or die
  	if ($invalid)
  	{
  		// if it's not an ajax call
  		if ($this->_helper->layout()->isEnabled())
  			return $this->_helper->redirector('index','index');
  		else die('failure');	
  	}
  		
  	// has the form been completed?
  	else if ($request->isPost())
  	{
  		$postData = $request->getPost();
  		Zend_Registry::getInstance()->get('logger')->log($postData, 7);
  		if ($form->isValid($postData))
  		{
  			$reset->activate($postData['password']);
  			die('success');	
  		}	
  	}
  	
  	// show the form
 		$this->view->email = $email;	
 		$this->view->key = $key;
  }
  
  
  
	/**
	*	User following a "verify email" link sent via email
	*/	
  public function verifyAction()
  {
		$request = $this->getRequest();
		$hash = $request->getParam('email');
		$user = new Application_Model_Users();
		if ($user->verifyEmail($hash))
		{
			$this->_helper->getHelper('FlashMessenger')->addMessage('Thank you, your email has been verified.');	
		}
		else 
		{
			// did not verify 
		}
		return $this->_helper->redirector('index'); // back to login page
  }
  
  protected function _process($values)	
  {
    // Get our authentication adapter and check credentials
    $adapter = $this->_getAuthAdapter();
    $adapter->setIdentity($values['email']); 
    $adapter->setCredential($values['pw']);

    $auth = Zend_Auth::getInstance();
    $result = $auth->authenticate($adapter);
    if ($result->isValid())  
    {
    	//error_reporting(0);
    	// successfully validated credentials
        $userData = $adapter->getResultRowObject();
        //$this->_log->log($user,7);
        $user = $this->_repo->find($userData->email);
        
        $user->login();
        $auth->getStorage()->write($user->getEmail());
                        
        return true;
    }
    return false;
  }

  protected function _getAuthAdapter()
  {
    $dbAdapter = Zend_Db_Table::getDefaultAdapter();
    $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
    
    $authAdapter->setTableName('portal_user')
        ->setIdentityColumn('email')
        ->setCredentialColumn('pw');
    //  ->setCredentialTreatment('SHA1(CONCAT(?,salt))');
                
    return $authAdapter;
  }

  public function logoutAction()
  {
		Zend_Auth::getInstance()->clearIdentity();
		setcookie("PHPSESSID","",time()-3600,"/");
		unset($_SESSION);
		$this->_helper->getHelper('FlashMessenger')->addMessage('You have been successfully logged out.');	
		$this->_helper->redirector('index','index'); // back to login page  
  }

}