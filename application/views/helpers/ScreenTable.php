<?php
use Labtab\Entity\Enum\Result;

class Zend_View_Helper_ScreenTable extends Zend_View_Helper_Abstract
{
   public function screenTable($screen, $finalized, $label_text)
   {

  		$i = 0;

  		$return = ' 	
                                 <div id ="fragment-6">
                                        <table id="screen_table" cellspacing="0" class="tableA tableBlowOutPreventer" cellpadding="0">    
                                            <tr>
                                                <th colspan="11" class="grid_heading"><div style="float:left;">Specimen Screen</div></th>
                                            </tr>';  		



			foreach (\Labtab\Entity\Enum_Result::$types as $n => $v)      
				$valueArray[$v] = \Labtab\Entity\Enum_Result::$colors[$n];
				
  

			foreach ($screen->toArray() as $key => $num) 
			{
        if ($key == "number") {
            continue;
        }
        $value = \Labtab\Entity\Enum_Result::$types[$num];
        $color = \Labtab\Entity\Enum_Result::$colors[$num];
                
        if ($i == 0) {
            $return .= "<tr>";
        }        
        $td_id = $key . "_td";
        $p_id = $key . "_p";
        
        $return .=  "
            <td id='$td_id' style='background-color: " . $color . ";width:25%; font-weight:900;'>
            <p id='$p_id' style='font-size:10px; float:left;'>" . str_replace("_", " ", strtoupper($key)) . "</p>";
        if ($_SESSION['user_type'] == "internal" && $finalized == "0" && $label_text == "clinic") {     // Only internal users can update the status 
        	$selector_id = $key . "_select";
          $return .= "
                <select id='$selector_id' style='width:80px; float:right;'>                     
                    <option " . $this->checkSelected($value, 'Not Tested') . " value='Not Tested' style='background-color:" . $valueArray["Not Tested"] . ";'>Not Tested</option>
                    <option " . $this->checkSelected($value, 'Negative') . " value='Negative' style='background-color:" . $valueArray['Negative'] . ";'>Negative</option>
                    <option " . $this->checkSelected($value, 'Positive') . " value='Positive' style='background-color:" . $valueArray['Positive'] . ";'>Positive</option>
                </select>";
        }
            

        $return .=  "</td>";
        $i++;
        if ($i == 4) {
            $return .=  "</tr>";
            $i = 0;
        }
    }
    $return .=  '<td/>


                    </table>
                                        <table id="screen_table_key" cellspacing="0" class="tableA tableBlowOutPreventer" cellpadding="0">    
                                            <tr>
                                                <th colspan="11" class="grid_heading"><div style="float:left;">Values Key</div></th>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%; background-color:green;color:lightgrey;">Negative</td>
                                                <td style="width: 25%; background-color:red;color:lightgrey;">Positive</td>
                                                <td style="width: 25%; background-color:white;">Not Tested</td>
                                            </tr>
                                        </table>
                                        <div class="clear"></div>
                                    </div>
';

			return $return;
	}

	public function checkSelected($key, $value) {
	    if (strtolower($key) == strtolower($value)) {
	        return 'selected="selected"';
	    } else {
	        return "";
	    }
	}

}


