<?php

class Application_Form_Password extends Zend_Form
{

    public function init()
    {
       $this->setName("password");
        $this->setMethod('post');
             
        $this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', false, array(0, 50)),
            ),
            'required'   => true,
            'label'      => 'Email Address:',
        ));
        
        $this->addElement('submit', 'submit', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Send Me My Password',
        ));
        
    }


}

