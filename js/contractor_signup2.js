$(document).ready(function(){


	 $("#company_phone").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg2").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
	});
	
	$("#company_fax").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg3").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
	});
	
	$("#zip_code").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg4").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
	});
	
	$('#submit_contractor').click(function(){
	
		var base_url = $('#base_url').val();
		var company_name = $('#company_name').val();
		var your_name = $('#your_name').val();
		var company_phone = $('#company_phone').val();
		var company_fax = $('#company_fax').val();
		var company_address = $('#company_address').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var zip_code = $('#zip_code').val();
		var email = $('#email').val();
		var username = $('#username').val();
		var password = $('#password').val();
		var password_confirm = $('#password_confirm').val();
		var website = $('#website').val();
		var projecttype = $('#projecttype').val();
		var about_business = $('#about_business').val();
		var primary_services = $('#primary_services').val();
		var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var refer_id = $('#refer_id').val();
		
			
		if(company_name == ""){
			$("#errors2").html('<div class="alert alert-danger">Company name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#company_name").focus();
		}else if(your_name == ""){
			$("#errors2").html('<div class="alert alert-danger">Your name is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#your_name").focus();
		}else if(company_phone == ""){
			$("#errors2").html('<div class="alert alert-danger">Company phone is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#company_phone").focus();
		}else if(company_fax == ""){
			$("#errors2").html('<div class="alert alert-danger">Company fax is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#company_fax").focus();
		}else if(company_address == ""){
			$("#errors2").html('<div class="alert alert-danger">Address is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#company_address").focus();
		}else if(city == ""){
			$("#errors2").html('<div class="alert alert-danger">City is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#city").focus();
		}else if(state == ""){
			$("#errors2").html('<div class="alert alert-danger">State is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#state").focus();
		}else if(zip_code == ""){
			$("#errors2").html('<div class="alert alert-danger">Zipcode is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#zip_code").focus();
		}else if(email == ""){
			$("#errors2").html('<div class="alert alert-danger">Email is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#email").focus();
		}else if(username == ""){
			$("#errors2").html('<div class="alert alert-danger">Username is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#username").focus();
		}else if(password == ""){
			$("#errors2").html('<div class="alert alert-danger">Password is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#password").focus();
		}else if(password_confirm != password){
			$("#errors2").html('<div class="alert alert-danger">Passwords did not match <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#password").focus();
		}else if(projecttype == ""){
			$("#errors2").html('<div class="alert alert-danger">Projecttype is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#projecttype").focus();
		}else if(about_business == ""){
			$("#errors2").html('<div class="alert alert-danger">Tell us something about your business <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#about_business").focus();
		}else if(primary_services == ""){
			$("#errors2").html('<div class="alert alert-danger">Tell us something about the primiry services your business <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#primary_services").focus();
		}else if(!emailfilter.test(email)){
			$("#errors2").html('<div class="alert alert-danger">Invalid email <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#email").focus();
		}else if(username.length < 5 || username.length > 10){
			$("#errors2").html('<div class="alert alert-danger">Username should be 5 to 10 characters <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#username").focus();
		}else if(password.length < 5 || password.length > 10){
			$("#errors2").html('<div class="alert alert-danger">Password should be 5 to 10 characters <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#username").focus();
		}else if (company_phone.length !=10){
			$("#errors2").html('<div class="alert alert-danger">Phone number should have 10 digits. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#company_phone").focus();
		}else{
			
			$.post(base_url+'/contractorajax'
			,{
				email:email,
				username:username,
				t:'checkUsernameEmail'
			}
			,function(data){
				if(data.exist){
					$('#username').focus();
					$('#email').focus();
					
					/*$("#errors_container").html("<p>"+data.error_message+"</p>");
					$("#errors_container").addClass('errors_container');*/
					
					$("#errors2").html('<div class="alert alert-danger">'+data.error_message+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					
				}else{
					//proceedSaveContractor();
					//console.log("proceed to saving..");
					
					
					$.post(base_url+"/contractorajax"
					,{
					t:'savecontractor',
					company_name:company_name,
					your_name:your_name,
					username:username,
					company_phone:company_phone,
					company_fax:company_fax,
					company_address:company_address,
					city:city,
					state:state,
					zip_code:zip_code,
					projecttype:projecttype,
					email:email,
					password:password,
					website:website,
					about_business:about_business,
					primary_services:primary_services,
					refer_id:refer_id
					}
					,function(data){
						if(data.status){
							window.location.href = "/dashboard/contractor";
						}else{
							$("#errors2").html('<div class="alert alert-danger">Something just totally went wrong.. WHAT DID YOU DO?<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
						}
					});
					
					
					
					
				}
			});
		}
	
	
	
	});







});