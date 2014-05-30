$(document).ready(function(){

		 $("#zip_code").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		});
		
		$("#homeown_phone").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg2").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		});


		$('#logins2').hide();
		
		$('#alreadyacc').click(function(){
			$('#content-register').hide();
			$('#content-login').show();
			$('#indicator').val("1");
		});
		
		$('#createnewacc').click(function(){
		
			$('#content-register').show();
			$('#content-login').hide();
			$('#indicator').val("2");
			
		
		});
		
		$('#projectstate').change(function(){
			var state_id = $(this).val(); 
			var base_url = $("#base_url").val();
			
			
			$.post(base_url+"/projectajax",
				 {
					   t:'getselectcities',
					   state_id:state_id
				 }
				 ,function(data){
					$('#city').html(data.html);
				 }
		   );	
			
		
		})
		
		$('#post_project').click(function(){
		
			var base_url = $('#base_url').val();
			var projecttype = $('#projecttype').val();
			var projectdesc = $('#projectdesc').val();
			var projectstart = $('#projectstart').val();
			var projectstatus = $('#projectstatus').val();
			var projecttimeframe = $('#projecttimeframe').val();
			var owned = $('input[name="won_pro"]:checked').val();
			var address =  $('#projectaddress').val();
			var state = $('#projectstate').val();
			var city = $('#city').val();
			var zip_code = $('#zip_code').val();
			var indicator = $('#indicator').val();
			var indicator_result_register = 0;
			var indicator_result_login = 0;
			var fname = $('#homeown_fname').val();
			var lname = $('#homeown_lname').val();
			var homeown_phone = $('#homeown_phone').val();
			var howeown_pname = $('#howeown_pname').val();
			var homeown_email = $('#homeown_email').val();
			var home_loginEmail = $('#home_loginEmail').val();
			var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var home_loginPassword = $('#home_loginPassword').val();
			var projectbudget = $('#projectbudget').val();
			var project_id = $('#project_id').val();
			var checks = 0;
			if(jQuery('input[type="checkbox"][name="termscon"]').is(':checked')){
				checks = 1;
			}
			var cdata = jQuery('#projectform').serialize();
		
			
			if(indicator == "2"){
			
				if(fname == ""){
					$("#errors2").html('<div class="alert alert-danger">First name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_fname").focus();
				}
				else if(lname == ""){
					$("#errors2").html('<div class="alert alert-danger">Last name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_lname").focus();
				}
				else if(homeown_phone == ""){
					$("#errors2").html('<div class="alert alert-danger">Phone number is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_phone").focus();
				}
				else if(howeown_pname == ""){
					$("#errors2").html('<div class="alert alert-danger">Public username is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#howeown_pname").focus();
				}
				else if(homeown_email == ""){
					$("#errors2").html('<div class="alert alert-danger">Email is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_email").focus();
				}
				else if(checks != 1){
					$("#errors2").html('<div class="alert alert-danger">Please agree to the terms and condition <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#termscon").focus();
				}
				else if(!emailfilter.test(homeown_email)){
					$("#errors2").html('<div class="alert alert-danger">Invalid email address <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_email").focus();
				}
				else if(howeown_pname.length < 5 || howeown_pname.length > 10){
					$("#errors2").html('<div class="alert alert-danger">Public name must be 5 to 10 characters. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#howeown_pname").focus();
				}else if (homeown_phone.length !=10){
					$("#errors2").html('<div class="alert alert-danger">Phone number should have 10 digits. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#howeown_phone").focus();
				}
				else{
					indicator_result_register = 1;
				}
			}
			
			if(indicator == "1"){
				
				if(home_loginEmail == ""){
					$("#errors2").html('<div class="alert alert-danger">Please enter your email <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#home_loginEmail").focus();
				}
				else if(home_loginPassword == ""){
					$("#errors2").html('<div class="alert alert-danger">Please enter your password <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#home_loginPassword").focus();
				}
				else if(!emailfilter.test(home_loginEmail)){
					$("#errors2").html('<div class="alert alert-danger">Invalid email address <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$("#homeown_email").focus();
				}
				else{
					indicator_result_login = 1;
				}
				
			
			
			}
			
			if(projecttype == "" || projecttype == "Please Select" ){
			
				$("#errors").html('<div class="alert alert-danger">Project Type is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projecttype").focus();
			}else if(projectdesc == ""){
				$("#errors").html('<div class="alert alert-danger">Project Description is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projectdesc").focus();
			}else if (projectstatus== ""){
				$("#errors").html('<div class="alert alert-danger">Project Status is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projectstatus").focus();
			}else if(projectstart == "" || projectstart == "Select One" ){
				$("#errors").html('<div class="alert alert-danger">Ideal Start Date is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projectstart").focus();
			}else if(projecttimeframe == "" || projecttimeframe == "Select One"){
				$("#errors").html('<div class="alert alert-danger">Time frame completion is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projecttimeframe").focus();
			}else if(address == ""){
				$("#errors").html('<div class="alert alert-danger">Address is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#address").focus();
			}else if(state == "" || state == "Please Select"){
				$("#errors").html('<div class="alert alert-danger">State is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#state2").focus();
			}else if(city == "" || city == "Select"){
				$("#errors").html('<div class="alert alert-danger">City is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#city").focus();
			}else if(zip_code == ""){
				$("#errors").html('<div class="alert alert-danger">Zipcode is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#zip_code").focus();
			}else if(projectbudget == ""){
				$("#errors").html('<div class="alert alert-danger">Project budget is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#projectbudget").focus();
			}else if(indicator_result_login == 1 || indicator_result_register == 1 || indicator == "3"){
				
				$.ajax({
			        url: base_url+'/projectajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   				if (response.indicator==1){
			   					window.location.href = base_url+'/dashboard/home-owner';
			   				}else if(response.indicator==2){
								alert("Please check your email to view your credentials");
								window.location.href = base_url+'/contractor/find/match/'+response.projectid;
							}else {
			   					$("#errors").html(response.message);
			   					$('#formcontent').hide();
			   				}
						}else {
							$("#errors").html('<div class="alert alert-danger">'+response.message+' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
						}
		           },
			        error: function(){
			        	$("#errors").html('<div class="alert alert-danger">An error occurred while submitting project <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			        }
			    });
			}
			
		
		
		})
		
});