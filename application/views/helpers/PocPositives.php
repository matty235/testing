<?php
use Labtab\Entity\Enum\Positive;

class Zend_View_Helper_PocPositives extends Zend_View_Helper_Abstract
{
   public function pocPositives($s, $selector)
   {
			$return = '
			                                       <div  class="main_content">

                                            <table cellspacing="0" class="poc_positives_table tableA tableBlowOutPreventer" cellpadding="0">    
                                                <tr>
                                                    <th colspan="11" class="grid_heading"><div style="float:left;">POC Positives</div></th>
                                                </tr>
			';
			
   		$i = 0;
   		$results = $s->getPocPositiveList()->toArray();
			foreach ($results as $key => $value) 
			{

				// $key is POC drug tested. $value is one of the selectors
				if ($key == "number" || $key == "specimen") {
				    continue;
				}

				if ($i++ == 0) {
				    $return .= "<tr>";
				}


					$typeVal = \Labtab\Entity\Enum_Positive::$types[$value];

				$td_id = $key . "_td";
				$p_id = $key . "_p";
				$lightgrey = \Labtab\Entity\Enum_Positive::$types['cssColor'][$typeVal];

				$return .= "
				    <td id='$td_id' style='background-color: " . 
				    \Labtab\Entity\Enum_Positive::$types[$typeVal] .
				     ";width:25%; font-weight:900;$lightgrey'><p id='$p_id' style='font-size:10px; float:left;'>" . 
				    str_replace("_", ", ", strtoupper($key)) . ' ' .
				    \Labtab\Entity\Enum_Positive::$types[$key] . "</p>";
				if ($_SESSION['email'] == "jlupi@usaccuscreen.com" && $selector &&  $s->getLabelText() == "court" &&  $s->getfinalized() == "0") {     // Only internal users can update the status 
				    $selector_id = $key . "_select";
				    $selected = $this->checkSelected($value, 'Positive');
				    $return .= "
				        <select id='$selector_id' style='width:80px; float:right;'>                     
				            <option " . $this->checkSelected($value, 'Negative') . " value='Negative' style='background-color:" . \Labtab\Entity\Enum_Positive::$types["Negative"] . ";'>Negative</option>
				            <option " . $this->checkSelected($value, 'Positive') . " value='Positive' style='background-color:" . \Labtab\Entity\Enum_Positive::$types['Positive'] . ";'>Positive, Pending Confirmation</option>
				            <option " . $this->checkSelected($value, 'Confirmed Positive') . " value='Confirmed Positive' style='background-color:" . \Labtab\Entity\Enum_Positive::$types['Confirmed Positive'] . ";'>Confirmed Positive</option>
				            <option " . $this->checkSelected($value, 'False Positive') . " value='False Positive' style='background-color:" . \Labtab\Entity\Enum_Positive::$types['False Positive'] . ";'>False Positive</option>
				        </select>";
				}
				$return .= "</td>";

				if ($i == 4) {
				    $return .= "</tr>";
				    $i = 0;
				}
			}
			$return .= "<td/><td/><td/>   </table>
                                            <div class='clear'></div>
                                            <table id='' cellspacing='0' class='poc_positives_key tableA tableBlowOutPreventer' cellpadding='0'>    
                                                <tr>
                                                    <th colspan='11' class='grid_heading'><div style='float:left;'>Values Key</div></th>
                                                </tr>
                                                <tr>
                                                    <td style='width: 25%; background-color:green;color:lightgrey;'>Negative</td>
                                                    <td style='width: 25%; background-color:#FFBF00;'>Positive</td>
                                                    <td style='width: 25%; background-color:red;color:lightgrey;'>Confirmed Positive</td>
                                                    <td style='width: 25%; background-color:lightgreen;'>False Positive</td>
                                                </tr>
                                            </table>
                                            <div class='clear'></div>
                                        </div>"; // For last two empty cells

			return $return;
	}

	public function checkSelected($key, $value) {
	    if ($key == $value) {
	        return 'selected="selected"';
	    } else {
	        return "";
	    }
	}

}


