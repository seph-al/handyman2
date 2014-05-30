$(document).ready(function(){



	$('#contactUs').click(function(){
	
	
		var cus_name = $('#cus_name').val();
		var cus_email = $('#cus_email').val();
		var cus_phone = $('#cus_phone').val();
		var cus_msg = $('#cus_msg').val();
		var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var recaptcha_challenge = $('#recaptcha_challenge_field').val();
		var recaptcha_response = $('#recaptcha_response_field').val();
		var base_url = $('#base_url').val();
		
		//alert(recaptcha_response);
		
		if(cus_name == ""){
			$("#errors2").html('<div class="alert alert-danger">Please enter your name <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#cus_name").focus();
		
		}else if(cus_email == ""){
			$("#errors2").html('<div class="alert alert-danger">Please enter your email <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#cus_email").focus();
		}else if(cus_phone == ""){
			$("#errors2").html('<div class="alert alert-danger">Please enter your phone number <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#cus_phone").focus();
		}else if(cus_msg == ""){
			$("#errors2").html('<div class="alert alert-danger">Please enter your message <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#cus_msg").focus();
		}else if(!emailfilter.test(cus_email)){
			$("#errors2").html('<div class="alert alert-danger">Email is invalid <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#cus_email").focus();
		}else{
			$.post(base_url+"/homeajax",
				 {
					   t:'contactus',
					   recaptcha_challenge:recaptcha_challenge,
					   recaptcha_response:recaptcha_response
				 },function(data){
					if(data == '1'){
						$.post(base_url+"/homeajax",
							{
								t:'sendmessage',
								cus_name:cus_name,
								cus_email:cus_email,
								cus_phone:cus_phone,
								cus_msg:cus_msg
							},function(data){
								if(data == '1'){
									$("#errors2").html('<div class="alert alert-success">Email was successfully sent <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
								}else{
									$("#errors2").html('<div class="alert alert-danger">Something went really wrong <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
								}
							}
						);
						
					}else{
						$("#errors2").html('<div class="alert alert-danger">Captcha is incorrect</div>');
					}
				 }
				 
		   );
		}
	
	
	});
	
	$('.form_include').hide();

	$('input[type="radio"][name="optionsRadios"]').change(function() {
		$('#show_logo').hide();
		$('.form_include').hide();
		
		var id = $(this).attr('id');					
		$("#show_"+id).show();
	});










});