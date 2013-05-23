<?php
namespace Labtab\Entity;

class Enum_Positive
{
		public static $types = array(
			1	 	=> 'Positive',
			2 	=> 'Confirmed Positive',
			-1	=> 'Negative',
			0 	=> 'False Positive',
			'amp' => '(Amphetamines)', 'bar' => '(Barbituates)', 'bsalts' => "(Bath Salts)",
        'bzd_bzo' => '(Benzodiazephines)', 'coc' => '(Cocaine)', 'etg' => '(Ethly Glucuronide)',
        'k2' => '(Spice)', 'mdma_xtc' => '(MDMA)', 'met' => '(Methamphetamine)', 'mtd_mad' => '(Methadone)',
        'opi_mop_mor' => '(Opiates)', 'oxy' => '(Oxycodone)', 'pcp' => '(Phencyclindine)',
        'ppx' => '(Propoxyphene)', 'tca' => '(Tricyclic Antidepressants)', 'thc' => '(Marijuana)',
        'bup' => '(Buprenorphine)',
    
        
        "Negative" => "green", 
        "Positive" => "#FFBF00", 
        "Confirmed Positive" => "red", 
        "False Positive" => "lightgreen",
       	
       	"cssColor" => array(
	        "Negative" => ' color:lightgrey;',
	        "Positive" => "", 
	        "Confirmed Positive" => ' color:lightgrey;',		
	        "False Positive" => ""
	       )
       	
        
        
        
   	);

}