function initDetail(){ 

      $("#tabs").tabs();

      var uploader = new qq.FileUploader({                                        
          element: document.getElementById('file-uploader'),
          debug: true,
          sizeLimit: '20971520',
          maxConnections: '50',   // Maximum of 50 simultaneous uploads
          action: '/filetransfer/do_upload.php?number=' + number + '&from=' + from// path to server-side upload script                    
      });

      var finalize_uploader = new qq.FileUploader({                                        
          element: document.getElementById('finalize_uploader'),
          debug: true,
          sizeLimit: '20971520',
          maxConnections: '50',   // Maximum of 50 simultaneous uploads
          uploadButtonText: 'Finalize',
          action: '/filetransfer/do_upload.php?number=' + number + '&from=' + from,// path to server-side upload script                    
          onComplete: function(id, fileName, responseJSON){
              var form_data = {
                  portal_user: email,
                  finalize_changed_to: '1',
                  number: number,
                  ajax: '1'		
              };
              $.ajax({
                  url: '/specimens/finalize',
                  type: 'POST',
                  data: form_data,
                  success: function(msg) { 
                      if (msg == 'success') {
                          $.prompt("Finalization comlete", {
                              buttons: {'View the specimen': 0 },
                              focus: 1,
                              submit:function(e,v,m,f){ 
                                  if(v==0) {
                                      $.prompt.close();
                                      window.location.assign('/specimens/detail/number/' + number);
                                  }
                                  return false;
                              }
                          }); 
                          
                      } else {
                          $.prompt("Finalization failed", {
                              buttons: {'Continue': 0 },
                              focus: 1,
                              submit:function(e,v,m,f){ 
                                  if(v==0) {
                                      $.prompt.close();                                               
                                  }
                                  return false;
                              }
                          });
                      }
                  }
              });
          }
      });
     
      
  


  $('#screen_table select').change(function() {
      var selectID = event.target.id;
      var selectedVal = $('#' + selectID).val();
      var drug = selectID.toString().replace("_select", "");  
      var tdID = selectID.toString().replace("_select", "_td");                    
      var number = $('#number').val();
      var pID = tdID.replace("_td", "_p");  
      
      var form_data = {
          number: number,
          selectedVal: selectedVal,
          drug: drug,
          ajax: '1'		
      };
      $.ajax({
          url: "/specimens/update",
          type: 'POST',
          data: form_data,
          success: function(msg) {  
              $('#' + tdID).css('background-color', msg);
              if (selectedVal == "Negative" || selectedVal == "Confirmed Positive") {   
                  $('#' + pID).css('font-size:10px; float:left;color:lightgrey;');
              } else {
                  $('#' + pID).css('font-size:10px; float:left;color:#404040;');
              }
          }
      });                                                            
  });
  
  $('#poc_positives_table select').change(function() {
      var selectID = event.target.id;
      var selectedVal = $('#' + selectID).val();
      var drug = selectID.toString().replace("_select", "");  
      var tdID = selectID.toString().replace("_select", "_td");                    
      var number = $('#number').val();
      var pID = tdID.replace("_td", "_p");
      var form_data = {
          number: number,
          selectedVal: selectedVal,
          drug: drug,
          ajax: '1'		
      };
      $.ajax({
          url: "/specimens/updatePOC",
          type: 'POST',
          data: form_data,
          success: function(msg) {  
              $('#' + tdID).css('background-color', msg);
              if (selectedVal == "Negative" || selectedVal == "Confirmed Positive") {   
                  $('#' + pID).css('font-size:10px; float:left;color:lightgrey;');
              } else {
                  $('#' + pID).css('font-size:10px; float:left;color:#404040;');
              }
          }
      });                                                            
  });
  
  $("#validation_table select").change(function() {
      var selectID = event.target.id;
      var selectedVal = $('#' + selectID).val();
      var testedElement = selectID.toString().replace("_select", "");  
      var tdID = selectID.toString().replace("_select", "_td");                    
      var number = $('#number').val();
      var pID = tdID.replace("_td", "_p");
      var form_data = {
          number: number,
          selectedVal: selectedVal,
          valElement: testedElement,
          ajax: '1'		
      };
      $.ajax({
          url: "/specimens/updateValidation.php",
          type: 'POST',
          data: form_data,
          success: function(msg) {
              $('#' + tdID).css('background-color', msg);
              if (selectedVal == "In Range" || selectedVal == "Out Of Range") {   
                  $('#' + pID).css('font-size:10px; float:left;color:lightgrey;');
              } else {
                  $('#' + pID).css('font-size:10px; float:left;color:#404040;');
              }
    	      }
  	  }); 
  });
  


}; // end document.ready


$(window).load(function() {
    $('#slider').nivoSlider({
        manualAdvance: true,
        pauseOnHover: true,
        effect: 'fade'
    });
});


function finalization() {                          
    var unfinalizeStates = {     
    
        initial: {                    
            html:"Enter your password to confirm unfinalization:<br /><input type='password' id='pw'\n\
            name='pw' value='' />",
            buttons:{"Confirm":true},
            focus: 1,
            submit:function(e,v,m,f){ 
                if(v != undefined) { 
                    var form_data = {
                        password: f.pw,
                        portal_user: email,
                        finalize_changed_to: 0,
                        number: number,
                        ajax: '1'		
                    };
                    $.ajax({
                        url: "/specimens/finalize",
                        type: 'POST',
                        data: form_data,
                        success: function(msg) {     
                            if (msg == 'success') {
                                $.prompt.goToState('unfinalizationComplete'); 
                            } else {
                                $.prompt.goToState('authentificationFailed'); 
                            }
                        }
                    });                               
                }
                else {
                    $.prompt.goToState('authentificationFailed'); 
                }
                return false; 
            }
        },
        unfinalizationComplete: {
            html:'Unfinalization Complete',
            buttons: {'Press To Refresh': 0 },
            focus: 1,
            submit:function(e,v,m,f){ 
                if(v==0) {
                    $.prompt.close();
                    window.location.href='/specimens/detail/number/'+number;
                }
                return false;
            }
        },
        authentificationFailed: {
            html:'Authentification Failed.',
            buttons: {'Ok': 0 },
            focus: 1,
            submit:function(e,v,m,f){ 
                if(v==0) {
                    $.prompt.close();                            
                }
                return false;
            }
        }
    };
    $.prompt(unfinalizeStates);  
}



function promptFirstview()
{
	var txt = "This is the first time that this specimen has been viewed by an employee of USAccuScreen.\n\
	To proceed with the viewing you must verify that the seal is unbroken \n\
	and appears to be untampered with.";

	var unviewedStates = {
    initial: {
        html:txt,
        buttons:{"Seal Is Intact":true, "Seal Is Damaged":false},
        focus: 1,
        submit:function(e,v,m,f){ 
            if(!v) { 
                $.prompt.goToState('seal_bad');                      
            }
            else {
                var form_data = {
                    email: email,
                    number: number,
                    seal_condition: seal_good,
                    ajax: '1'		
                };
                $.ajax({
                    url: "/specimens/updateFirstView/",
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {  
                        if (msg == 'success') {
                            $.prompt.goToState('seal_good');
                        } else {
                            alert('Update failed');
                        }
                    }
                });
            }
            return false; 
        }
    },
    seal_good: {
        html:full_name + ', you have confirmed seal is intact.',
        buttons: {'View the specimen': 0 },
        focus: 1,
        submit:function(e,v,m,f){ 
            if(v==0) {
                $.prompt.close();
                window.location.href='/specimens/detail/number/'+number;
            }
            return false;
        }
    },
    seal_bad: {
        html:full_name + ', an email has been generated and sent to the client.\n\
                            The specimen will not be viewable until it has been \n\
                            confirmed by a USAccuScreen employee that the organization has been called.',
        buttons: {'Ok': 0 },
        focus: 1,
        submit:function(e,v,m,f){ 
            if(v==0) {
                var form_data = {
                    email: email,
                    number: number,
                    seal_condition: seal_bad,
                    ajax: '1'		
                };
                $.ajax({
                    url: "/specimens/updateFirstView/",
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {  
                        if (msg == 'success') {
                            $.prompt.close();
                            // Email client
                            // Update html table
                        } else {
                            alert('Update failed');
                        }
                    }
                });
                
            }
            return false;
        }
    }
	};

  if (seal_condition == '' || seal_condition == 'NULL') {
      $.prompt(unviewedStates);
  } else if (seal_condition == seal_bad) {
      $.prompt("This specimen's seal has been reported damaged. In order to view the specimen \n\
              a USAccuScreen employee has to verify that they have called the organization to report\n\
              it's status.");                  
  } else if (seal_condition == seal_good) {
      window.location.href='/specimens/detail/number/'+number;
  }
}

// USERS INDEX 
function initUsers(){
	

  $("#tabs").tabs();
  
  // validation of the create user form
  $("#frm_order").validate({                    
      submitHandler:function(form) {                          
          var form_data = {
              labtab_username: $('#labtab_user').val(),
              user_fname: $('#first_name').val(),
              user_lname: $('#last_name').val(),
              email: $('#email').val(),			
              ajax: '1'		
          };          
          $.ajax({
              url: "/users/create",
              type: 'POST',
              data: form_data,
              success: function(msg) {
                  if(msg=='success'){   
                  	$.ajax({
										  url: "",
										  context: document.body,
										  success: function(s,x){
										    $(this).html(s);
										    $('#message1').html('<p style="color:green;">' + $('#email').val() + ' Write Successful</p>');                                      
										  }
										});
                  } else {
                      $('#message1').html('<p style="color:red;">Write Failed: Email Exists</p>');
                  }
              }
          });                        
      },
      rules: {
          first_name: "required",		// simple rule, converted to {required:true}
          last_name: "required",
          email: {				// compound rule
              required: true,
              email: true
          }
      }
      
  });                

	// -- user deletion
	$('#userTable .button').click(deleteUser);
	
}

	
function deleteUser(e) {                
    var targ = $(e.target);
    var trID = targ.attr('id').replace("_button", "");    
    var email = trID.replace("12345", "@");     // Email address for user
    var conf = confirm("Confirm deletion of " + email);
    if (!conf) {
        return;
    }
    var button_data = {
        email: email,			
        ajax: '1'		
    };          
    $.ajax({
        url: "/users/delete",
        type: 'POST',
        data: button_data,
        success: function(msg) {            
            if(msg=='success'){ 
					    targ.parents('tr').remove();                                
            } else {
                alert("failed to remove user");
            }
        }
    });              
}


// UNFINALIZED COURT 
function initUnfinalizedCourt(){
  var form_data = {
      fromdate: '01/01/2010',
      todate: '01/01/2020',
      label_text: 'court',
      finalized: '0',
      ajax: '1'		
  };
  $.ajax({
      url: "/specimens/getSpecimens",
      type: 'POST',
      data: form_data,
      success: function(msg) {
          //alert(msg);
          $("#specimenTable tr:gt(1)").remove();
          if (msg.toString() == "") {
              $("#specimenTable").append("<tr><td>Empty Search</td></tr>");
          } else {
              $("#specimenTable").append(msg);
          }
      }
  });
}

function verifyContact() {
  var form_data = {
    email: email,
    number: number,
    seal_condition: seal_org_contacted,
    ajax: '1'		
  };
  $.ajax({
    url: "/specimens/updateFirstView",
    type: 'POST',
    data: form_data,
    success: function(msg) {
      if (msg.toString() == "success") {
	      $.prompt("It has been recorded that you called the organization belonging to the specimen.");  
        window.location.href='/specimens/detail/number/'+number;
      } else {
          alert(msg);
      }
    }
  });
}



//// Email validation function
function echeck(str) {
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    return false
		 }

 		 return true					
}

function swapSearch(){
	var opt = $('div#advance_search').css('display');
	//alert(opt)
	if(opt=='none'){
		$('div#smart_search').hide('slow', function() {
    			$('div#advance_search').slideDown('slow');
  		});
		$('input#search_mode').val('advance')
	}else{
		$('div#advance_search').slideUp('slow', function() {
    			$('div#smart_search').show('slow');
  		});
		$('input#search_mode').val('smart')		
	}
	
}

function set_order_by(fld){
//	alert(fld)
	if(typeof(fld) == 'undefined' ){
		return false;
	}
	
	var order_by = $('input#order_by').val();
	order_by = order_by.trim();
	
	if(order_by!=''){
		var orderByArr = order_by.split(' ');
	}
	var order = 'ASC';
	
	if( ( typeof(orderByArr)!= 'undefined' ) && (orderByArr.length >=1 ) && ( orderByArr[0].trim() == fld.trim())  ){
		order = orderByArr[1] == 'ASC' ? 'DESC' : 'ASC' ;
	}
//	alert(fld + ' '+order)
	order_by = fld.trim() + ' '+order;
//	alert(order_by)
	$('input#order_by').val(order_by)
	return true;
}

function set_show_per_page(fn){
	var val = $('#show_per_page_combo  option:selected').val(); 
	$('input#show_per_page').val(val);
	if(typeof(fn)!='undefined') eval(fn);
}

var exampleCsvLink = Array('example.csv','example.csv','example2.csv');

function checkAllBox(me,chk_all_class,callback)				
{
	var chk_all_class = typeof(chk_all_class)!='undefined' ? chk_all_class : 'chk_service_area';
	var checked_status = me.checked;
	var callback =  typeof(callback)!='undefined' ? callback : '';
	$("input."+chk_all_class).each(function()
	{
		this.checked = checked_status;
	});
	
	if(callback!=''){
		eval(callback);
	}
}

function cb_user(data){
  if(data=='success'){
      window.location.href='/specimens.php';
  } else {
      $('#message').html('Invalid username or password');
  }
}


// INDEX INDEX
function initializeIndex(){
	
                        $('#firstInput').bind('keypress', function(e) {
                            var keyCode = e.keyCode || e.which;
                            if (keyCode == 13) {    // 13 enter
                                getSpecimens();
                            }
                        });
                        $('#lastInput').bind('keypress', function(e) {
                            var keyCode = e.keyCode || e.which;
                            if (keyCode == 13) {    // 13 enter
                                getSpecimens();
                            }
                        });
                        $('#socialInput').bind('keypress', function(e) {
                            var keyCode = e.keyCode || e.which;
                            if (keyCode == 13) {    // 13 enter
                                getSpecimens();
                            }
                        });
                        $('#numberInput').bind('keypress', function(e) {
                            var keyCode = e.keyCode || e.which;
                            if (keyCode == 13) {    // 13 enter
                                getSpecimens();
                            }
                        });
                        $("#fromdate").datepicker({
                            showOn: "button",
                            buttonImage: "http://d3f6wr9orrhfyg.cloudfront.net/images/calendar-icon.gif",
                            buttonImageOnly: true
                        });
                        $("#todate").datepicker({
                            showOn: "button",
                            buttonImage: "http://d3f6wr9orrhfyg.cloudfront.net/images/calendar-icon.gif",
                            buttonImageOnly: true
                        });
                    

								};

                    function clearFilters() {
                        $("#specimenTable tr:gt(1)").remove();
                        $("input#fromdate").val($("input#fromdate").prop("defaultValue"));
                        $("input#todate").val($("input#todate").prop("defaultValue"));
                        $('input#firstInput').val("");
                        $('input#lastInput').val("");
                        $('input#socialInput').val("");
                        $('input#numberInput').val("");
                    }
                    
                    function getSpecimens() {
                        var first_name = $('input#firstInput').val();
                        var last_name = $('input#lastInput').val();
                        var ssn = $('input#socialInput').val();
                        var number = $('input#numberInput').val();
                        var fromdate = $("input#fromdate").val();
                        var todate = $("input#todate").val();                            
                        var finalized = $('select#finalized_select option:selected').val();
                        var form_data = {
                            number: number,
                            first_name: first_name,
                            last_name: last_name,
                            ssn: ssn,
                            fromdate: fromdate,
                            todate: todate,
                            finalized: finalized,
                            ajax: '1'		
                        };
                        $.ajax({
                            url: "specimens/getSpecimens",
                            type: 'POST',
                            data: form_data,
                            success: function(msg) {
                                //alert(msg);
                                $("#specimenTable tr:gt(1)").remove();
                                if (msg.toString() == "") {
                                    $("#specimenTable").append("<tr><td>Empty Search</td></tr>");
                                } else {
                                    $("#specimenTable").append(msg);
                                }
                            }
                        });
                    }          
                    
// DONORS - INDEX
function initDonors()
{
	alert('hi');
                getDonors();
                $('#firstInput').bind('keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode == 13) {    // 13 enter
                        getDonors();
                    }
                });
                $('#lastInput').bind('keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode == 13) {    // 13 enter
                        getDonors();
                    }
                });
                $('select#labtab_select').change(function() {
                    getDonors();
                });
                $('select#creation_select').change(function() {
                    getDonors();
                });
                $("#fromdate").datepicker({
                    showOn: "button",
                    buttonImage: "http://d3f6wr9orrhfyg.cloudfront.net/images/calendar-icon.gif",
                    buttonImageOnly: true
                });
                $("#fromdate").change(function() {
                    getDonors();
                });
                $("#todate").change(function() {
                    getDonors();
                });
                $("#todate").datepicker({
                    showOn: "button",
                    buttonImage: "http://d3f6wr9orrhfyg.cloudfront.net/images/calendar-icon.gif",
                    buttonImageOnly: true
                });
            
                                   
	
}                                 	

// DONOR - CREATE
function initDonorsCreate()
{
                jQuery.validator.setDefaults({
                    errorPlacement: function(error, element) {
                        if (element.hasClass("login_input_bg_m")) {
                            error.insertBefore(element);
                        }
                    }
                });
                $.validator.addMethod("phoneUS", function(phone_number, element) {
                    phone_number = phone_number.replace(/\s+/g, ""); 
                    return this.optional(element) || phone_number.length > 9 &&
                        phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
                }, "Please specify a valid US phone number");                
                
                $.validator.addMethod("mydate", function (value, element) {
                    return this.optional(element) || /^(\d{2})(\/)(\d{2})(\/)(\d{4})/.test(value);
                },                                   
                "Please enter a date in the format MM/DD/YYYY");
                                
                $("#frm_order").validate({      
                    submitHandler:function(form) {	
                        var dob = $('#dob').val().toString();
                        var dobArr = dob.split("/");
                        dob = dobArr[2] + "-" + dobArr[0] + "-" + dobArr[1];
                        var form_data = {
                            org_name: $('select#labtab_select option:selected').val(),
                            ssn: $('#ssn').val(),
                            first_name: $('#first_name').val(),
                            last_name: $('#last_name').val(),
                            address: $('#address').val(),	
                            city: $('#city').val(),
                            state: $('#state').val(),
                            zip: $('#zip').val(),
                            phone: $('#phone').val(),
                            dob: dob,
                            ajax: '1'		
                        };          
                        $.ajax({
                            url: "/donors/create",
                            type: 'POST',
                            data: form_data,
                            success: function(msg) {
                                alert(msg);
                                if(msg=='success'){  
                                    $('#ssn').val(""),
                                    $('#first_name').val(""),
                                    $('#last_name').val(""),
                                    $('#address').val(""),	
                                    $('#city').val(""),
                                    $('#state').val(""),
                                    $('#zip').val(""),
                                    $('#phone').val(""),
                                    $('#dob').val(""),
                                    $('#message1').html('<p style="color:green;">' + $('#ssn').val() + ' Write Successful</p>');                                      
                                } else {
                                    $('#message1').html('<p style="color:red;">Write Failed</p>');
                                }
                            }
                        });                        
                    },
                    rules: {
                        first_name: "required",
                        last_name: "required",        
                        phone: {
                            required: true,
                            phoneUS: true
                        }, 
                        zip: {
                            required: true,
                            digits: true,
                            minlength: 5
                        },
                        dob: {
                            mydate : true
                        }
                    }                    
                });                   
} 	


           function getDonors() {               
                var first_name = $('input#firstInput').val();
                var last_name = $('input#lastInput').val();
                var labtab_username = $('select#labtab_select option:selected').val();
                var insertion_method = $('select#creation_select option:selected').val();
                var fromdate = $("input#fromdate").val();
                var todate = $("input#todate").val();  
                $('#tableTitle').html('Donor Listing For ' + $('select#labtab_select option:selected').html());
                var form_data = {
                    first_name: first_name,
                    last_name: last_name,
                    labtab_username: labtab_username,
                    insertion_method: insertion_method,
                    fromdate: fromdate,
                    todate: todate,
                    ajax: '1'		
                };
                $.ajax({
                    url: "/donors/fetchDonorTable",
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                        $("#userTable tr:gt(1)").remove();
                        if (msg.toString() == "") {
                            $("#userTable").append("<tr><td>Empty Search</td></tr>");
                        } else {
                            $("#userTable").append(msg);
                        }
                    }
                });
            }     