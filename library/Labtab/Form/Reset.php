<?php


class Labtab_Form_Reset extends Zend_Form
{

    public function init()
    {
       $this->setName("password");
       $this->setMethod('post');
             
        $this->addElement('password', 'password1', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', false, array(6, 20)),
            ),
            'required'   => true,
            'label'      => 'Password',
        ));

        $this->addElement('password', 'password2', array(
        		'filters'    => array('StringTrim'),
        		'validators' => array(
        				array('StringLength', false, array(6, 20)),
        		),
        		'required'   => true,
        		'label'      => 'Password',
        ));
               
        
    }


}

