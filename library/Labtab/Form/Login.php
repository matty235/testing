<?php

//namespace Labtab\Form;

class Labtab_Form_Login extends Zend_Form
{

    public function init()
    {
	    $this->setName("login");
        $this->setMethod('post');
             
        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', false, array(0, 100)),
            ),
			'attribs'	=>	array('autofocus' => 'autofocus'),
        		            'required'   => true,
            'label'      => 'Email',
        ));

        $this->addElement('password', 'pw', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', false, array(0, 50)),
            ),
            'required'   => true,
            'label'      => 'Password',
        ));
        
//        $rem = new Zend_Form_Element_Checkbox('remember');
//        $rem->setLabel('Remember Me');
//        $this->addElement($rem);
        
        $this->addElement('submit', 'login', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Login',
        ));
        
    }

}