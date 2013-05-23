<?php

use Entities\PortalUser;
use Entities\LabtabUser;

class DonorsController extends Zend_Controller_Action
{

    public function init()
    {
			$this->_em = \Zend_Registry::get('doctrineEm');        
      $this->_repo = $this->_em->getRepository('Labtab:Donor');
      $this->_flash = $this->_helper->getHelper('FlashMessenger');
     	$this->log = \Zend_Registry::get('logger');

     	if (array_key_exists('ajax',$this->getRequest()->getPost()))
     	{
     		$this->_helper->layout()->disableLayout();
     	}
     	
    }

    public function indexAction()
    {

    	// all labtab users
    	$labtabRepo = $this->_em->getRepository('Labtab:LabtabUser');
   		$this->view->labtabUsers = $labtabRepo->findAll();
    				
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


    public function fetchdonortableAction()
    {
    	$this->_helper->layout()->disableLayout();
    	$request = $this->getRequest();
    	if ($request->isPost())
    	{
    		$d = new \Labtab\Entity\DonorContactInfo;
    		$postData = $request->getPost();
    		$this->view->donors = $d->getDonorsSearched($postData);
    	}
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
    	// all labtab users
    	$labtabRepo = $this->_em->getRepository('Labtab:LabtabUser');
   		$this->view->labtabUsers = $labtabRepo->findAll();
    	
   		$request = $this->getRequest();
    	if ($request->isPost())
    	{ 
    		$this->getHelper('viewRenderer')->setNoRender();    		
    		$post = $this->getRequest()->getPost();

				$post['from'] = $post['org_name'];			
				$post['dob'] = new \DateTime($post['dob']);
				
				$donor = new \Labtab\Entity\DonorContactInfo($post);
				$donor->setDateTimeEntered(new \DateTime());
				$donor->setInsertionMethod(1);

				$donor->writeJson();
				$donor->insertSsn();
				$this->_em->persist($donor);

				$this->_em->flush();
				$donor->save1m();
				echo "success";
				return;				
		}
	}
}