<?php
namespace Labtab\Entity;

class Enum_Seal
{
		public static $types = array(
			1 => 'Not Applicable',
			2 => 'seal_bad',
			3 => 'seal_good',
			4 => 'org_contacted'
		);
		
		const SEAL_CONDITION_ORG_CONTACTED = 4;
		const SEAL_CONDITION_GOOD = 3;
		const SEAL_CONDITION_BAD = 2;
		const SEAL_CONDITION_NA = 1;
		

}