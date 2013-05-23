<?php

use Entities\PortalUser;
use Entities\Specimen;

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
      $this->_em = \Zend_Registry::get('doctrineEm');        
      $this->_repo = $this->_em->getRepository('Labtab:PortalUser');
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

    }

}

