<?php

class Zend_View_Helper_SpecimenInfo extends Zend_View_Helper_Abstract
{
   public function specimenInfo($values)
   {
			$return = '';
       if ($values["label_text"] == "clinic") {
        $return .= '
            <div class="login_input">
                <div class="login_left"><strong>Type</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["label_text"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Number</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["number"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>            
            <div class="login_input">
                <div class="login_left"><strong>From</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["from"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Received</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["received"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Visit Reason</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["visit_reason"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Medicines</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["medicines"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Other Medicines</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["other_medicines"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Insurance Info</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["ins_info"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Temp OK?</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["temp_ok"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Physician</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["physician"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>            
            <div class="login_input">
                <div class="login_left"><strong>Diagnoses</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["diagnoses"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>POC Method</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["poc_method"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Collector Name</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="collector_name" id="collector_name" type="text" class="login_input_bg_m"  value="' . $values["collector_name"] . '"/></div>
                    <div class="clear"></div>
                </div>                                     
            </div>
            <div class="clear"></div>
            <br/>
        ';
    } else if ($values["label_text"] == "court") {
        $return .= '
            <div class="login_input">
                <div class="login_left"><strong>Type</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["label_text"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Number</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["number"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>From</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["from"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Employee ID</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["empid"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Docket Number</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value=""/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Received</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["received"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Medicines</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["medicines"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Other Medicines</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["other_medicines"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="login_input">
                <div class="login_left"><strong>Temp OK?</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="from" id="from" type="text" class="login_input_bg_m"  value="' . $values["temp_ok"] . '"/></div>
                    <div class="clear"></div>
                </div>                     
                <div class="login_left"><strong>Visit Reason</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="received" id="received" type="text" class="login_input_bg_m"  value="' . $values["visit_reason"] . '"/></div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
        <div class="login_input">
            <div class="login_left"><strong>POC Method</strong></div>
            <div class="login_right">
                <div class="input_box_left"><input name="number" id="number" type="text" class="login_input_bg_m" value="' . $values["poc_method"] . '"/></div>
                <div class="inputbox_desc_div"><p class="visa_txt"></p></div>
                <div class="clear"></div>
            </div>
            <div class="login_left"><strong>Collector Name</strong></div>
                <div class="login_right">
                    <div class="input_box_left"><input name="collector_name" id="collector_name" type="text" class="login_input_bg_m"  value="' . $values["collector_name"] . '"/></div>
                    <div class="clear"></div>
                </div>   
            <div class="clear"></div>
        </div>';
    } else {
        $return .= 'label_text not set, debug me';
    }
   	
      return $return;
   }

}
