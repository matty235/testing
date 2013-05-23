<?php

class Zend_View_Helper_NavDiv extends Zend_View_Helper_Abstract
{
   public function navDiv()
   {
   	
   	$auth = Zend_Auth::getInstance();
   	$auth->getStorage();
   	$cname = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();

   	if ($auth->hasIdentity())
   	{
			$return = '
			<ul id="nav">
				<li class="top1">
	      	<a href="/donors" class="' . (($cname == 'donors') ? "select" : "top_link") . '" ><span>Donors</span></a> 
          <ul class="sub">
          	<li class="arrow"></li>
            <li class="first"><a href="/donors">Search Donors</a></li>
            <li class="first"><a href="/donors/create">Create Donor</a></li>
        	</ul>
				</li>

				<li class="top1"><a  href="/specimens.php" class="' . (($cname == 'specimens' || $cname == 'index') ? "select" : "top_link") . '" ><span>Specimens</span></a>
	      	<ul class="sub">
	        	<li class="arrow"></li>
						<li class="first"><a href="/specimens.php">Search Specimens</a></li>';
			
			
			if ($_SESSION['user_type'] == 'internal')
			{
				$return .= '<li class="first"><a href="/specimens/unfinalized">Unfinalized Court</a></li>
				
				</ul>
	                </li>
				<li class="top1"><a  href="/users" class="' . (($cname == 'users') ? "select" : "top_link") . '" ><span>Users</span></a></li>
				</ul>		
				';			
			}
			else 
			{
				$return .= '
						</ul>
	      	</li>
				</ul>
				';	
				
			}
		
      return $return;
   	}   	   
	}
}
