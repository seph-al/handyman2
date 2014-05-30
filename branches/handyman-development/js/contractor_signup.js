$(function(){
	$('button#submit_contractor').click(function(){
		var email = $('#email').val();
		var username = $('#username').val();
		var errors = new Array();
		var error_text = "";
		
			if(validateEmail(email)  == false ){
				errors.push('email');
				error_text = error_text+"<li>The Email you entered is invalid.</li>";
			}
			if(checkIfAllWhiteSpace(username)){
				errors.push('username');
				error_text = error_text+"<li>Username</li>";
			}
			
			if(errors.length == 0){
				var base_url = $('#base_url').val();
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
							
							$("#errors_container").html("<p>"+data.error_message+"</p>");
							$("#errors_container").addClass('errors_container');
						}else{
							proceedSaveContractor();
							//console.log("proceed to saving..");
						}
					});
					
				
			}else{
				for(var i = 0; i<errors.length; i++){
					$('#'+errors[i]).focus();
					$('.'+errors[i]).text("this field is required.");
				}
				$("#errors_container").html("<p>The following are required: <ul>"+error_text+"</ul></p>");
				$("#errors_container").addClass('errors_container');
			}
	});
});

function proceedSaveContractor(){
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
		var errors = new Array();
		var error_text = "";
			
			$(".postProjErr").text(""); //clear error messages
			
			if(checkIfAllWhiteSpace(company_name)){
				errors.push('company_name');
				error_text = error_text+"<li>Company Name</li>";
			}
			if(checkIfAllWhiteSpace(your_name)){
				errors.push('your_name');
				error_text = error_text+"<li>Your Name</li>";
			}
			if(checkIfAllWhiteSpace(company_phone)){
				errors.push('company_phone');
				error_text = error_text+"<li>Company Phone</li>";
			}
			if(checkIfAllWhiteSpace(company_address)){
				errors.push('company_address');
				error_text = error_text+"<li>Company Address</li>";
			}
			if(checkIfAllWhiteSpace(city)){
				errors.push('city');
				error_text = error_text+"<li>City</li>";
			}
			if(checkIfAllWhiteSpace(state)){
				errors.push('state');
				error_text = error_text+"<li>State</li>";
			}
			if(checkIfAllWhiteSpace(zip_code)){
				errors.push('zip_code');
				error_text = error_text+"<li>Zip Code</li>";
			}
			if(checkIfAllWhiteSpace(email)){
				errors.push('email');
				error_text = error_text+"<li>Email Address</li>";
			}
			if(checkIfAllWhiteSpace(projecttype)){
				errors.push('projecttype');
				error_text = error_text+"<li>Business Type</li>";
			}
			if(checkIfAllWhiteSpace(password)){
				errors.push('password');
				error_text = error_text+"<li>Password</li>";
			}
			if(checkIfAllWhiteSpace(password_confirm)){
				errors.push('password_confirm');
				error_text = error_text+"<li>Password Confirmation</li>";
			}
			if(password_confirm != password){
				errors.push('password_confirm');
				errors.push('password');
				error_text = error_text+"<li>Passwords did not match.</li>";
			}
			if(checkIfAllWhiteSpace(about_business)){
				errors.push('about_business');
				error_text = error_text+"<li>Tell us about your business</li>";
			}
			if(checkIfAllWhiteSpace(primary_services)){
				errors.push('primary_services');
				error_text = error_text+"<li>Primary Services</li>";
			}
			
			
			if(errors.length == 0){
				var base_url = $('#base_url').val();
				console.log("contractor processing..");
				$("#errors_container").html("<p>submitting..</p>");
				$("#errors_container").addClass('processing_container');
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
				primary_services:primary_services
				}
				,function(data){
					if(data.status){
						window.location.href = "/dashboard/contractor";
					}else{
						$("#errors_container").html("<p>An error occurred. Please try again.</p>");
						$("#errors_container").addClass('errors_container');
						console.log(data.error_message);
					}
				});
				
				//console.log("Project Type Id:" + projecttype);
			
			}else{
				
				for(var i = 0; i<errors.length; i++){
					$('#'+errors[i]).focus();
					$('.'+errors[i]).text("this field is required.");
				}
				$("#errors_container").html("<p>The following are required: <ul>"+error_text+"</ul></p>");
				$("#errors_container").addClass('errors_container');
			}
}

function checkIfAllWhiteSpace(input_text){
	/*var myregex = /^[a-zA-Z0-9]*[a-zA-Z][a-zA-Z0-9]*$/;
	if(myregex.test(input_text)){
		return false;
	}
	else*/ if(input_text == ""){
		return true; //empty
	}/*else{
		return true; //pure whitespace
	}*/
}