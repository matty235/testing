<?php

class Labtab_Form_Password extends Zend_Form
{

    public function init()
    {
       $this->setName("password");
       $this->setMethod('post');
             
        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', false, array(0, 50)),
            ),
            'required'   => true,
            'label'      => 'Email Address:',
        ));
        
    }


}

