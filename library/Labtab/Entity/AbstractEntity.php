<?php

namespace Labtab\Entity;

class AbstractEntity
{
    private $_data;
		private $_em;
		
		public function __construct($row = null)
		{
		  if( !is_null($row) && is_array($row) ) {
		  	foreach($row as $var => $val)
		  	{
					      		
		  		$method = "set" . ucfirst(preg_replace_callback('/_([a-zA-Z])/',
		  		 	create_function(
		  		 		'$input', 
		  		 		'return ucfirst($input[1]);'
		  		 	),
		  		 	$var
		  		 ));
		  		if (method_exists($this, $method))
		  		{
		  			$this->$method($val);
		  		}
		    }
			}
		}

		/**
		 * 
		 *  @return Doctrine\ORM\EntityManager
		 */
		public function getEm()
		{
			if ($this->_em === null)
				$this->_em = \Zend_Registry::get('doctrineEm');
			return $this->_em;
		}

    protected static function camelToUnder($str)
    {
        $new = '';
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++ ) {
            if (ctype_upper($str{$i})) {
                $new .= '_'.strtolower($str{$i});
            } else {
                $new .= $str{$i};
            }
        }

        return $new;
    }

    protected static function underToCamel($str, $ucfirst = false) {
        $new = implode('', array_map('ucfirst', explode('_', $str)));

        if (!$ucfirst) {
            $new = lcfirst($new);
        }

        return $new;
    }
    
    public function toArray($classNames = false)
    {
    	$arrayClass = \Labtab\Helper\Serializor::toArray($this);
    	if ($classNames) 
    		return $arrayClass;
    	
    	foreach ($arrayClass as $key => $value)
    		$array[$this->camelToUnder($key)] = $value;
    	return $array;
    }
}
