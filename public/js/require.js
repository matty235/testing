// JavaScript Document
function ClientInfo(){};
if( navigator.userAgent.search(/MSIE/i)!= -1 ){
	ClientInfo.prototype.browser = 'E';
}else if(navigator.userAgent.search(/Firefox/i)!= -1){
	ClientInfo.prototype.browser = 'F';
}else if(navigator.userAgent.search(/Netscape/i)!= -1){
	ClientInfo.prototype.browser = 'N';
}else{
	ClientInfo.prototype.browser = 'W3C';
}
client = new ClientInfo();


function wait( flag ,waitDiv){
 var flag = typeof(flag)=='undefined' ? false : flag ;	
 var waitDiv = typeof(waitDiv)=='undefined' ? 'content_wrap' : waitDiv ;	
 var preChar = waitDiv.charAt(0)
// alert(preChar)
 if(preChar != '.' && preChar != '#' ){
 	waitDiv = '.' + waitDiv;
 }
// alert(waitDiv);
 if($(".content_wrap").isMasked()){ $(".content_wrap").unmask(); }
 if($(waitDiv).isMasked()){ $(waitDiv).unmask(); }
 
 if(flag){
	$('#message').html('');
	$(waitDiv).mask("Wait...");
  }else{
	// $(waitDiv).unmask(); // Already done
  }
  
}


String.prototype.ltrim= function(){ // ======== ltrim ==============	     
	 data = this.valueOf() ; 
	 data = data.replace(/^\s/ , '' ); 
	 data = data.replace(/^\r/ , '' ); 
	 data = data.replace(/^\n/ , '' );
	 data = data.replace(/^\r/ , '' ); 
	if( data.search(/^\S/) == -1 &&  data.length > 0  ){
		 data = data.ltrim();	 
	 }
	 return data ; 			 
}

String.prototype.rtrim= function(){
// ======== rtrim ==============	     
	 data = this.valueOf() ; 
	 data = data.replace(/\s$/ , '' ); 
	 data = data.replace(/\r$/ , '' ); 
	 data = data.replace(/\n$/ , '' );
	 data = data.replace(/\r$/ , '' ); 
	 if( data.search(/\S$/) == -1 &&  data.length > 0  ){
		 data = data.rtrim();	 
	 }
	 return data ; 			 
}

String.prototype.trim= function(){
	data = this.valueOf() ; 
	data = data.ltrim();
	data = data.rtrim();
	return data ; 
}

Array.prototype.inArray = function(p_val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == p_val) {
			return true;
		}
	}
	return false;
}

addslashes = function(strv) {
    return (strv+'').replace(/([\\"'])/g, "\\$1").replace(/\u0000/g, "\\0").replace(/\r/g, "\\r").replace(/\n/g, "\\n");
}

function doRound(x, places) {
	return Math.round(x * Math.pow(10, places)) / Math.pow(10, places);
}

function numberFormatShort(value,places){
	var places = typeof(places) == 'undefined' ? 2 : places ;
	var svalue = '';
	var sign = '';
	value = value == '' ? 0.00 : parseFloat(value); 
	if(value<0.00){ 
		sign = '-';
		value = value * -1;
	}

	var dvalue = '';
	var dlen = 0;
	if(parseFloat(value)>0){
		value = doRound(value,places);
	}

	for(i=0 ; i<places ; i++){
		dvalue = dvalue + '0';
	}
	
	
	svalue = '' + value + '';
	//alert(svalue)
	if( svalue.search(/\./) != -1 ){
		values = svalue.split('.')
		dlen = places - values[1].length;
		dvalue = ''+ values[1] + dvalue.substr(0,dlen) + '' ;
		svalue = ''+ values[0]  + '.' + dvalue ;
		//alert('svalue1'+svalue)
	}else{
		svalue = ''+svalue+'.'+dvalue;
		//alert('svalue2'+svalue)
	}

	svalue = sign+''+svalue 
	return svalue ;
}

function numberFormat(value,places){
	var svalue = '';
	var sign = '';
	value = value == '' ? 0.00 : parseFloat(value); 
	if(value<0.00){ 
		sign = '-';
		value = value * -1;
	}

	var dvalue = '';
	var dlen = 0;
	if(parseFloat(value)>0){
		value = doRound(value,places);
	}

	for(i=0 ; i<places ; i++){
		dvalue = dvalue + '0';
	}

	svalue = '' + value + '';
	if( svalue.search(/\./) != -1 ){
		values = svalue.split('.')
		dlen = places - values[1].length;
		dvalue = ''+ values[1] + dvalue.substr(0,dlen) + '' ;
		svalue = ''+ values[0]  + '.' + dvalue ;
	}else{
		svalue = ''+svalue+'.'+dvalue;
	}
	values = svalue.split('.') ;
	fvalues = Array('','','','','','','');
	svalue = ''+ values[0] ; 
	var j = 6;
	for( j=6 ; j>=0 ; j--){
	 	fvalues[j] = svalue.substr(0, (svalue.length-(j*3))) ;
	 	svalue = svalue.substr( fvalues[j].length,(svalue.length-fvalues[j].length))
	} 
	svalue  = '';
	for(i=(fvalues.length-1); i>=0; i--){
		svalue = svalue.trim()!='' ? svalue + ',' : svalue ;
		svalue = svalue+fvalues[i]
	}
	svalue = sign+''+svalue + '.' + values[1];
	return svalue ;
}

function ValidateElement( fid , callbackfn ,waitDiv){
	
	var flag = 0;	
	var optional = false;
	var doWait = true;
	
	$('#message').html('');
	
	waitDiv = (typeof(callbackfn)!= 'undefined'? waitDiv:'') ;
	if(typeof(waitDiv) == 'boolean' ){
		if( waitDiv == false)
			doWait = false;
		else
			waitDiv = '';
	} 
	
	callbackfn = (typeof(callbackfn)!= 'undefined'? callbackfn:'') ;
	$('div.require_field_error').hide();
	$('div.require_field_error').html("");
	ve = $('form#'+fid+' input#validate').val();//$('form#'+fid).children('input#validate').val(); //
	//alert(fid + ' :: ' + ve);
	if(typeof(ve)== 'undefined')
		return false;
	ve_arr = ve.split('||');	
	ele_arr = new Array();
	for(var c = 0 ; ve_arr[c];c++){
		eid = ve_arr[c].split(':');	
	//set default values 	
		optional = false;
	// end of setting defalult values 
		for(i=2 ; i < eid.length ; i++){ // ================================================= FOR OPTIONAL 
			if( eid[i] == 'optional' )	optional = true;
		}	
		
		if(eid[1] == 'blank'){	// ============================================================= BLANK 
			evf = $('form#'+fid+' #'+eid[0]).val();	
			if(evf.replace(/\s/g, '') == ''){
				$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' #'+eid[0]));
				flag = 1;
			}
		}else if(eid[1] == 'email'){ // ===================================================== EMAIL 
			evf = $('form#'+fid+' input#'+eid[0]).val();
			if(evf.search(/\S/)==-1){
				if(!optional){
					$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}else{
				filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/;
				if(!filter.test(evf)){	
					$('<div class="require_field_error">Invalid Email</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}
		}else if(eid[1] == 'alphanumeric'){ // ============================================== ALPHA-NUMERIC
			evf = $('form#'+fid+' input#'+eid[0]).val();
			if(evf.search(/\S/)==-1){
				if(!optional){
					$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}else{
				filter  = /^([a-zA-Z0-9])+$/;
				if(!filter.test(evf)){	
					$('<div class="require_field_error">Invalid Entry! Enter A-Z 0-9 only.</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}
		}else if(eid[1] == 'numeric'){ // ============================================== NUMERIC
			evf = $('form#'+fid+' input#'+eid[0]).val();
			if(evf.search(/\S/)==-1){
				if(!optional){
					$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}else{
				filter  = /^([0-9\.])+$/;
				if(!filter.test(evf)){	
					$('<div class="require_field_error">Invalid Entry! Enter 0-9 or 0-9.0-9 only.</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}
		}else if(eid[1] == 'alphanumeric2'){ //=============================================== ALPHA-NUMERIC2 + ( - , _ , . )
			evf = $('form#'+fid+' input#'+eid[0]).val();
			if(evf.search(/\S/)==-1){
				if(!optional){
					$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}

			}else{
				filter  = /^([a-zA-Z0-9_\.\-])+$/;
				if(!filter.test(evf)){	
					$('<div class="require_field_error">Invalid Entry! Enter A-Z 0-9 , - _ only.</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}
		}else if(eid[1] == 'phone'){ //=============================================== Phone Number= NUMERIC + (+)
			evf = $('form#'+fid+' input#'+eid[0]).val();
			if(evf.search(/\S/)==-1){
				if(!optional){
					$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}else{
				filter = /^((([\+]{1,1})+([123456789]{1,1}))|([123456789]{1}))+([0-9]{9,12})+$/ ;
				if(!filter.test(evf)){
					$('<div class="require_field_error">Invalid Entry!<div>(e.g. +919433008682, 9433508566)</div></div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
					flag = 1;
				}
			}
		}else if(eid[1] == 'selected'){ //======================================================== COMBO
			evf = $('form#'+fid+' select#'+eid[0]).val();	
			if(evf.replace(/\s/g, '') == ''){
				$('<div class="require_field_error">Required field must be selected</div>').insertAfter( $('form#'+fid+' select#'+eid[0]));			flag = 1;
			}
		}else if(eid[1] == 'password'){ //======================================================= PASSOWRD
			evf = $('form#'+fid+' input#'+eid[0]).val();
			pwd = $('form#'+fid+' input#confirm_pwd').val();
			if(evf.replace(/\s/g, '') == '' && !optional ){
				$('<div class="require_field_error">Required field must not be blank</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
				flag = 1;
			}
			if(typeof(pwd) != 'undefined' && evf != pwd){
				$('<div class="require_field_error">Password does not match to confirm!</div>').insertAfter( $('form#'+fid+' input#'+eid[0]));
				flag = 1;
			}
		}else if(eid[1] == 'checked'){
			evf = 0 ;
//checking for radio
			$('form#'+fid+' :radio').each(function (i) {
				//	alert(  $(this).attr("name") + ' : '  + $(this).attr("checked")  )	
				if ( $(this).attr("name") == eid[0]  ) {
					 if( $(this).attr("checked") ) evf++ ;
					} 
					chb= $(this);
				});
//for check box
		$('form#'+fid+' :checkbox').each(function (i) {
			   //alert(  $(this).attr("name") + ' : '  + $(this).attr("checked")  )
				if ( $(this).attr("name") == eid[0]  ) {
					 if( $(this).attr("checked") ) evf++ ;
					} 
					chb= $(this);
				});
			if(evf == 0 ){
				chb.parent().append('<div class="require_field_error">Must be checked</div>');
				flag = 1;
			} 
		}else if(eid[1] == 'formname'){
			evf = $('form#'+fid+' input#'+eid[0]).val();
		}
		ele_arr.push(eid[0]+' : \''+evf+'\'');
	}

    // ================================================== NOW SUBMIT DATA ============================

	if(flag == 1){
		// ----------- We have found error on the page 
		// appearCenter('add_popup_box');
		
		return false;	

	}else if(callbackfn == 'SelfSubmit'){
		// appearCenter('add_popup_box');
		// ------------------------- page will be automatically submited
		return true;	

	}

	edata = FormElementData(fid);
//	alert(edata)
	if(edata == false){
		// appearCenter('add_popup_box');
		return false;

	} 

	if(doWait){
		wait(true,waitDiv);
	}
	
	var method = $('form#'+fid).attr('method') ;
	
	
	if(method == 'POST' || method == 'GET' ){
		action = $('form#'+fid).attr('action');
		eval('$.ajax({ url: "'+action+'" ,type: "'+method+'" ,async:true,crossDomain:true ,cache: false,data:{'+edata+'},success: function( data ) {'+ callbackfn +';},});');
	}else if(method == 'get')
		eval('$.get($(\'form#\'+fid).attr(\'action\'),{ajax:true,'+ edata +'}, function(data){wait(false);'+ callbackfn +';});');
	
	else
		eval('$.post($(\'form#\'+fid).attr(\'action\'),{ajax:true,'+ edata +'}, function(data){wait(false);'+ callbackfn +';});');
	return false;	
}



function getArrayElement( frm , ele_name , flag   ){ 

	var result = '' ; 

	var resultArr = Array(''); 

    var addSeparator  = false ; 

	var i = 0 ;

	var j=0 ;

	var separator  = '|'; 

	flag = typeof(flag) != 'undefined' ? flag : true;

	if( document.getElementsByName( ele_name ) ){ 

	   var ele = document.getElementsByName(ele_name) ;  

	   for(i= 0 ; i< ele.length ; i++) {

		   if(ele[i].form == frm ){

					if(ele[i].type == 'radio' || ele[i].type == 'checkbox'  ) {	

						if(ele[i].checked) {

							if(!flag) {

								if(addSeparator) result = result + separator ; 

								result = result +  ele[i].value ; 

								addSeparator = true ; 	

							} else {

								resultArr[j] = ele[i].value ; 

								j++;

							}

						}

					} else if(ele[i].type == 'select' && (!ele[i].multiple)  )	{

						if(!flag) {

							if(addSeparator) result = result + separator ; 

							result = result +  ele[i][ele[i].selectedIndex].value ; 

							addSeparator = true ;  

						} else {

								resultArr[j] = ele[i][ele[i].selectedIndex].value ; 

								j++; 

						}

					} else	{	

						if(!flag) {

							if(addSeparator) result = result + separator ; 

							result = result +  ele[i].value ; 

							addSeparator = true ; 

						} else {

								resultArr[j] = ele[i].value ; 

								j++;

						}				

					}

			   }

		   } //end for  i 	   

	}

 return  (flag ) ? resultArr : result ; 

} // end of function 




function FormElementData(form_id){

	if(typeof(form_id) == 'undefined')

		return false;

	var nofe = document.getElementById(form_id).elements.length;

	var felm = document.getElementById(form_id);

	var str = '';

	var arr_element = false;

	var element_name = '';

	var readElements = '';

	for(c = 0; c < nofe; c++){

		element_name =  felm.elements[c].name;

		if( typeof(element_name) == 'undefined' ){

			continue ;

		}

		if( element_name.search(/(\[)+(([a-zA-Z0-9\-])|())+(\])+$/)!=-1 ){ //For Array Element

			element_val = Array('');

			if(readElements.indexOf( '\''+ element_name + '\'' ) == -1 && felm.elements[c].type !='button'  ){

				// && element_name!='validate'

				element_val=getArrayElement( felm , element_name ,  true   );

				for(i=0 ; i< element_val.length ; i++ ){

				   element_val[i]   = '\''+ addslashes(element_val[i]) + '\'';

				}

				str+= '\'' + element_name + '\'' +':Array('+element_val+'),';

				readElements = readElements + '\'' + element_name + '\',' ;

			}

		}else{ //For Non Array Element

			element_val = '';

			if(readElements.indexOf(  '\''+ element_name + '\'' ) == -1 && felm.elements[c].type !='button'   ){ 

			//&& felm.elements[c].type !='button' && element_name!='validate'

				element_val = getArrayElement( felm , element_name ,  false   ) ;

				element_val = addslashes(element_val);

				str+= element_name  +':\''+element_val+'\','; 

				readElements = readElements + '\'' + element_name + '\',' ;

				//alert(element_name+" "+element_val);

			}

		}

	}

	str = str.replace(/,$/ ,'');

	if(str != '')

		return str;

	else

		return false;

}



function avoid(){};

function keyRestrict(e, validchars) {
	
	 var key='', keychar='';
	 key = getKeyCode(e);
	 
	 // alert(key);
	 
	 if (key == null) return true;
	 
	 if (  key==0 ||  key==1 || key==3 || key==8 || key==9 || key==13 || key==22 || key==27  ) return true;
	 
	 
	 keychar = String.fromCharCode(key);
	 keychar = keychar.toLowerCase();
	 validchars = validchars.toLowerCase();
	//alert(validchars.indexOf(keychar));
	 if (validchars.indexOf(keychar) != -1)
	  return true;

	 return false;
}

function getKeyCode(e) {
	 if (window.event)
		return window.event.keyCode;
	 else if (e)
		return e.which;
	 else
		return null;
}

function submitOnEnter(e,submitFn){
		 key = getKeyCode(e);
		 if(key==13||key==10){
		   eval(submitFn);
		 }
}