<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	public function run()
	{
		$front = Zend_Controller_Front::getInstance();
		
		Zend_Registry::set('config', $this->getOptions());
		
		$front->registerPlugin(new Application_Plugin_Initialization('dev'));
		
		$response = $front->dispatch();
	}
}

