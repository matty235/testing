<?php

class Zend_View_Helper_ListMessages extends Zend_View_Helper_Abstract
{
   public function listMessages()
   {

      $flashMsgHelper = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
      $messages = $flashMsgHelper->getMessages();

      $return = "";
      if ($messages)
      {
      	$return .= '         
        	<div id="messages" class="system-messages">
   					<ul>
       				';
         foreach ($messages as $msg) :
            $return .= "<li>$msg</li>";
         endforeach;
         $return .= '
            </ul>
		</div>
         ';
      }

      return $return;
   }

}
