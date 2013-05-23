<?php
namespace Labtab\Entity;

class Enum_Validation
{
		public static $types = array(
			'5' => 'Inconclusive',
			'3' => 'In Range' ,
			'2' => 'Out Of Range' ,			
			'0' => 'Not Tested' ,
			'-1' => 'Negative' ,
			'1' => 'Positive'
		);
		
		public static $colors = array(
			'3' => "green", 
			'2' => "red", 
			'0' => "white", 
			'1' => "green", 
			'-1' => "red"
		);

}