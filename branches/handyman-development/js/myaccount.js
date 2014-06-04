function resetcontent(){
	$('#myprofcontractdetails').hide();
	$('#myprofcontractpassword').hide();
	$('#account-license').hide();
	$('#account-bonded').hide();
	$('#account-socials').hide();
	$('.tabcontractor1').removeClass('active');
	$('.tabcontractor2').removeClass('active');
	$('.tabcontractor3').removeClass('active');
	$('.tabcontractor4').removeClass('active');
	$('.tabcontractor5').removeClass('active');
}

$(document).ready(function(){
      
	$('#myaccountsub #tabcontact').click(function(){
		resetcontent();
		$('#myprofcontractdetails').show();
		$('.tabcontractor1').addClass('active');
	});
	
	$('#myaccountsub #tabpassword').click(function(){
		resetcontent();
		$('#myprofcontractpassword').show();
		$('.tabcontractor2').addClass('active');
	});
	
	$('#myaccountsub #tabplicense').click(function(){
		resetcontent();
		$('#account-license').show();
		$('.tabcontractor3').addClass('active');
	});
	
	$('#myaccountsub #tabbonded').click(function(){
		resetcontent();
		$('#account-bonded').show();
		$('.tabcontractor4').addClass('active');
	});
	
	$('#myaccountsub #tabsocials').click(function(){
		resetcontent();
		$('#account-socials').show();
		$('.tabcontractor5').addClass('active');
	});

		 $("#conzip").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		});
		
		 $("#conphone").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg2").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		});


		$('#save_edit').click(function(){
			var base_url = $('#base_url').val();
			var company_name = $('#concompany').val();
			var contact_name = $('#conname').val();
			var email = $('#conemail').val();
			var phone = $('#conphone').val();
			var fax = $('#confax').val();
			var website = $('#conwebsite').val();
			var project_type = $('#conprojecttype').val();
			var about = $('#conaboutbusiness').val();
			var services = $('#conprimaryservices').val();
			var address1 = $('#conaddress1').val();
			var address2 = $('#conaddress2').val();
			var state = $('#constate').val();
			var city = $('#concity').val();
			var zip = $('#conzip').val();
			var cdata = $('#caccountdetailsform').serialize();
			
			
			if(company_name == ""){
				$("#errors2").html('<div class="alert alert-danger">Company name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#concompany").focus();
			}else if(contact_name == ""){
				$("#errors2").html('<div class="alert alert-danger">Contact name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conname").focus();
			}else if(email == ""){
				$("#errors2").html('<div class="alert alert-danger">Email is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conemail").focus();
			}else if(phone == ""){
				$("#errors2").html('<div class="alert alert-danger">Phone number is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conphone").focus();
			}else if(project_type == ""){
				$("#errors2").html('<div class="alert alert-danger">Business type is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conprojecttype").focus();
			}else if(about == ""){
				$("#errors2").html('<div class="alert alert-danger">About business is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conaboutbusiness").focus();
			}else if(address1 == ""){
				$("#errors2").html('<div class="alert alert-danger">Address is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conaddress1").focus();
			}else if (state == ""){
				$("#errors2").html('<div class="alert alert-danger">State is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#constate").focus();
			}else if (city == ""){
				$("#errors2").html('<div class="alert alert-danger">City is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#concity").focus();
			}else if (zip == ""){
				$("#errors2").html('<div class="alert alert-danger">Zip code is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#conzip").focus();
			}else{
				$.ajax({
			        url: base_url+'/dashboardajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated your account.</div>');
			   			}else {
							$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while saving account.</div>');
			        }
			    });
				
			}
		});
		
		$('#update_socials').click(function(){
			var base_url =  $('#base_url').val();
			var cdata = $('#caccount-socials').serialize();
				$.ajax({
			        url: base_url+'/dashboardajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated links to your social accounts.</div>');
			   			}else {
							$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.error_message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while updating license information.</div>');
			        }
			    });
		});
		
		$('#update_license').click(function(){
			var base_url =  $('#base_url').val();
			var cdata = $('#caccount-license').serialize();
				$.ajax({
			        url: base_url+'/dashboardajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated license info.</div>');
			   			}else {
							$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.error_message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while updating license information.</div>');
			        }
			    });
			
		});
		
		$('#update_bond').click(function(){
			var base_url =  $('#base_url').val();
			var cdata = $('#caccount-bonded').serialize();
			$.ajax({
			        url: base_url+'/dashboardajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated bond info.</div>');
			   			}else {
							$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.error_message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting bond information</div>');
			        }
			    });
		});
		
		
		$('#change_pass').click(function(){
			
			var base_url =  $('#base_url').val();
			var oldpassword = $('#oldpassword').val();
			var cuspassword = $('#cuspassword').val();
			var cusconfpwd = $('#cusconfpwd').val();
			var cdata = $('#caccountpasswordform').serialize();
			
			if(oldpassword == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter old password</div>');
				$("#oldpassword").focus();
			}else if(cuspassword == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter new password</div>');
				$("#cuspassword").focus();
			}else if(cusconfpwd == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please confirm your new password</div>');
				$("#cusconfpwd").focus();
			}else if(cuspassword != cusconfpwd){
				$("#errors2").html('<div class="alert alert-danger">  <button type="button" class="close" data-dismiss="alert">&times;</button><button type="button" class="close" data-dismiss="alert">&times;</button>Passwords did not match</div>');
			}else if(cuspassword.length < 6){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Password must be more than 6 characters</div>');
				$("#cuspassword").focus();
			}
			else{
				$.ajax({
			        url: base_url+'/dashboardajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated your password.</div>');
			   			}else {
							$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting project</div>');
			        }
			    });
			}
		
		})

$("#cusconfpwd").keypress(function(event) {
		  if ( event.which == 13 ) {
				var base_url =  $('#base_url').val();
				var oldpassword = $('#oldpassword').val();
				var cuspassword = $('#cuspassword').val();
				var cusconfpwd = $('#cusconfpwd').val();
				var cdata = $('#caccountpasswordform').serialize();
				
				if(oldpassword == ""){
					$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter old password</div>');
					$("#oldpassword").focus();
				}else if(cuspassword == ""){
					$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter new password</div>');
					$("#cuspassword").focus();
				}else if(cusconfpwd == ""){
					$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please confirm your new password</div>');
					$("#cusconfpwd").focus();
				}else if(cuspassword != cusconfpwd){
					$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Passwords did not match</div>');
				}else if(cuspassword.length < 6){
					$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Password must be more than 6 characters</div>');
					$("#cuspassword").focus();
				}
				else{
					$.ajax({
				        url: base_url+'/dashboardajax',
				        type: 'POST',
				        dataType:"JSON",
				        data: cdata,
				        success: function(response){
				        	if (response.status){
				   					$("#errors2").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated your password.</div>');
				   			}else {
								$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.message+'</div>');
							}
			           },
				        error: function(){
				        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting project</div>');
				        }
				    });
				}
		  }
});		  
		  



});