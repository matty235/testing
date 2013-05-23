<?php

use Entities\PortalUser;
use Entities\LabtabUser;

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
			$this->_em = \Zend_Registry::get('doctrineEm');        
      $this->_repo = $this->_em->getRepository('Labtab:LabtabUser');
      $this->_flash = $this->_helper->getHelper('FlashMessenger');
     	$this->log = \Zend_Registry::get('logger');

     	if (array_key_exists('ajax',$this->getRequest()->getPost()))
     	{
     		$this->_helper->layout()->disableLayout();
     		$this->getHelper('viewRenderer')->setNoRender();
     	}
     	
    }

    public function indexAction()
    {

    	// all labtgab users   		
   		$this->view->labtabUsers = $this->_repo->findAll();
    				
   		// get all Portal Users linked back to their organization
   		$portalUsers = array();   		
   		$portRepo = $this->_em->getRepository('Labtab:PortalUser');
			foreach ($portRepo->findAll() as $p)
			{
				$u = array_merge( $p->getLabtabUser()->toArray(), $p->toArray());
				$portalUsers []= $u;
			}

			$this->view->portalUsers = $portalUsers;
    }

    
    public function deleteAction()
    {    	
    	$request = $this->getRequest();
    	if ($request->isPost())
    	{
    		$portRepo = $this->_em->getRepository('Labtab:PortalUser');
    		$user = $portRepo->find($request->getParam('email'));
    		$oneM = $user->get1m();
    		$this->_em->remove($user);
    		$this->_em->remove($oneM);    		
    		$this->_em->flush();
    		echo 'success';
    	}
    }
    
    public function createAction()
    {
    	$request = $this->getRequest();
    	if ($request->isPost())
    	{    		
    		$post = $this->getRequest()->getPost();
    		$user = new \Labtab\Entity\PortalUser($post);
    		$labtab = $this->_repo->find($post['labtab_username']);
//    		$user = new \Labtab_\ntity_PortalUser($post);
    		
    		$user->setUserType($labtab->getUserType());    		
    		$user->setPw('password');
    		$this->_em->persist($user);
    		
    		$oneM = new \Labtab\Entity\OneMLabtabPortal($post);
    		$oneM->setPortalUsername($user->getEmail());
    		$this->_em->persist($oneM);
    		
    		$this->_em->flush();
    		echo 'success';
    	}
    }
    
//			$q = $this->_em->createQuery("select s, d from Labtab\Entity\Specimen s join  d ");
//			var_dump($q->getResult());
			
/*			foreach ($q->getResult() as $s)
			{
				var_dump($user->getPortalUser());
				var_dump($user->getLabtabUser());
			}
*/
/*
			$specRepo = $this->_em->getRepository('Labtab:Specimen');

			$user = $this->_repo->find($email);		
			var_dump($user);
			foreach ($user->getLabtabUser() as $u)
				var_dump($u);
	*/		
			
/*
 *   CREATE USER -- 			
			$newUser['org_name'] = $org_name;
			$newUser['first_name'] = $first_name;
			$newUser['last_name'] = $last_name;
			$newUser['email'] = $email;
		
			$user = new \Labtab\Entity\PortalUser;
			$user->createUser($newUser);
			die('success');
			

    // $row['userFname'] = 'smart';
    // $row['userLname'] = 'smart2';
  // $row['email'] = 'b3@webbender.local';
  // $row['pw'] = 'test';
//   $row['userType'] = false;
   
//   $user = new \Labtab\Entity\PortalUser($row);
   //$user->setEmail($row['email']	);
   //$user->setUserFname($row['userFname']);
  //  $this->log->log($user, 5);
     			
     			
	//	$this->_em->persist($user);     			
		
//		$this->_em->flush();
	*/	
		
}

