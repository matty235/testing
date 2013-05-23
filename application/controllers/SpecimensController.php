<?php

use Entities\Specimen;

class SpecimensController extends Zend_Controller_Action
{

    public function init()
    {
    		/* @var $this->_em Doctrine_ORM_EntityManager */
        $this->_em = \Zend_Registry::get('doctrineEm');
                
        $this->_repo = $this->_em->getRepository('Labtab:Specimen');
        $this->_flash = $this->_helper->getHelper('FlashMessenger');
     		$this->log = \Zend_Registry::get('logger');    
     		
     		if (array_key_exists('ajax',$this->getRequest()->getPost()))
     		{
     			$this->_helper->layout()->disableLayout();
     			//$this->getHelper('viewRenderer')->setNoRender();
     		}     		
    }

    public function indexAction()
    {
	
    			
    }

    public function getspecimensAction()
    {
    	$this->_helper->layout()->disableLayout();
    	$request = $this->getRequest();
    	if ($request->isPost())
    	{
    		$s = new \Labtab\Entity\Specimen;
    		$postData = $request->getPost();
    		$this->view->specimens = $s->getSpecimensSearched($postData);
    	}
    }

    public function updatefirstviewAction()
    {
    	if ($this->getRequest()->isPost())
    		$post = $this->getRequest()->getPost();
    	else exit;

    	$firstView = $this->_repo->find($post['number'])->getFirstView();
    	
    	if ($post['seal_condition'] == \Labtab\Entity\Enum_Seal::SEAL_CONDITION_ORG_CONTACTED)
    	{
    		$firstView->setEmailOrgContacted($post['email']);
    		$firstView->setSealCondition($post['seal_condition']);    		
    		$firstView->setOrgContacted(1);    		
    		$firstView->setDateTimeOrgContacted(new \DateTime());
    	}    		   
    	else 
    	{
    		$firstView->setEmail($post['email']);
    		$firstView->setSealCondition($post['seal_condition']);
    		$firstView->setDateTimeSealResponse(new \DateTime());    		
    		$firstView->setDateTimeOrgContacted(null);
    	}

    	$this->_em->persist($firstView);
    	$this->_em->flush();

			$this->getHelper('viewRenderer')->setNoRender();			
    	echo "success";    	

    }
    
    
    public function firstviewAction()
    {
    	
    	$number = $this->getRequest()->getParam('number');    

    	// Labtab_Entity_Specimen
    	$s = $this->_repo->find($number);
    	
    	// Labtab_Entity_LabtabUser
    	$u = $this->_em->getRepository('Labtab:LabtabUser')
    		->find($s->getFrom());
	
    	// Labtab_Entity_SpecimenFirstView
    	$seal = $s->getFirstView();

    	// array Labtab_Entity_PortalUser
    	$portalUsers = $u->getPortalUsers();
    	
			$this->view->orgName = $u->getOrgName();    	
    	$this->view->number = $number;		
    	$this->view->firstView = $seal;
    	$this->view->portalUsers = $portalUsers;
    	
    	if ($seal)
    				$this->view->sealCondition = $seal->getSealCondition();    		

    
    }

    public function detailAction()
    {
    	
     	\Zend_Registry::get('logger')->log($_SESSION,7);
    	$request = $this->getRequest();

    	$number = $request->getParam('number');
    	$this->view->number = $number;
    
    	$s = $this->_repo->find($number);
    	$this->view->specimen = $s;
    
    	// files
    	$this->view->files = $s->getFiles();
    
    	$seal = $s->getFirstView();

    	if ($_SESSION['user_type'] == 'internal')
    	{
    		
    		if (!$seal || $seal->getSealConditionName() == '' || $seal->getSealConditionName() == 'seal_bad')
    		{
    			header("Location: /specimens/firstView/number/" . $number);
    			exit;
	    		}
		
	    	$pos = $s->getPocPositiveList();
	    
	    	$this->view->validate = $s->getValidation();
	    	$this->view->screen = $s->getScreen();

    	}
    }


  public function finalizeAction()
  {
  	if ($this->getRequest()->isPost())
  		$post = $this->getRequest()->getPost();
  	else exit;

		if (array_key_exists('password',$post))
		{
			$auth = $_SESSION['Zend_Auth']['storage'];
			$u = $this->_em->getRepository('Labtab:PortalUser')
				->find($auth);
				
			if ($post['password'] != $u->getPw())
			{
				echo 'Authentification Failed';
				exit;
			}
		}

  	$s = $this->_repo->find($post['number']);  
		$s->finalize($post);
		$this->getHelper('viewRenderer')->setNoRender();
		echo 'success';
	}

  public function unfinalizedAction()
  {
  	
  }
    
}	