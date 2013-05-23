<?php

namespace Labtab\Entity;

class EnumValue
{
    protected $value;
    protected $name;
    
    public function __construct($name)
    {
    	$name = 'TYPE_' . $name;
    	$this->name = $name;
    	$this->validate($this->name);    	    		
    	return self::getValue();
    }
		
		public static function enum($name)
		{
    	$reflect = new \ReflectionClass($this);
    	$constants = $reflect->getConstants();
    	if(!array_key_exists($name, $constants)){
    		throw new \UnexpectedValueException('value not found: ' . (is_string($name)?$name:""));
    	}
    	return $constants[$name];
				
		}
		
//		public function getValue()
	//	{
		//	$constants = $reflect->getConstants();
			//$name = $name = 'TYPE_' . $name;
//			return (array_key_exists($name, $constants)) ?  $constants[$name] : '';
	//	}

    protected function validate($name)
    {     
    	$reflect = new \ReflectionClass($this);
    	$constants = $reflect->getConstants();
    	if(!array_key_exists($name, $constants)){
    		throw new \UnexpectedValueException('value not found: ' . (is_string($name)?$name:""));
    	}
    	$this->value = $constants[$name];
    }

    public function getValue()
    {
    	return $this->value;
    }    
    
    
    public function __toString()
    {
        return (string) $this->value;
    }
}