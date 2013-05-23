<?php

class Zend_View_Helper_GetWelcome extends Zend_View_Helper_Abstract
{
   
	public function getWelcome() 
	{
   	$auth = Zend_Auth::getInstance();
   	$auth->getStorage();
   	
   	if ($auth->hasIdentity())
		{
			$return = '
          <div class="up_nav">

	          <div class="up_nav_left"></div>
			
		        <div class="up_nav_mid">
		            <ul>
		                <li><a class="top_link" href="/logout.php">Logout</a></li>
		                <li >|</li>
		                <li>Welcome! ' . $_SESSION['fname'] . '</li>
		            </ul>
		        </div>

						<div class="up_nav_right"></div>
          	
          	<div class="clear"></div>

	        </div>
			
			';	
	    return $return;
   	}	
  	 	
	}

}
