function processPost(){
	var q_title = $('#q_title').val();
	var q_category = $('#q_category').val();
	var q_content = $('#q_content').val();
	var cdata = jQuery('#question-post-form').serialize();
	var register = $('#to-register').val();
	var base_url = $('#base_url').val();
	var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var error = true;
	
	if (q_title == ""){
		$("#form_result").html('<div class="alert alert-danger">Question title is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_title").focus();
	}else if (q_category == ""){
		$("#form_result").html('<div class="alert alert-danger">Question category is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_category").focus();
	}else if (q_content == ""){
		$("#form_result").html('<div class="alert alert-danger">Question content is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_content").focus();
	}else if (register == '1'){
		var role = $('#q_role').val();
	    if (role == 'contractor'){
		   
	    	var email = $('#q_cemail').val();
	    	var company = $('#q_company').val();
	    	var contactname = $('#q_contactname').val();
	    	var username = $('#q_cusername').val();
	    	var password = $('#q_password').val();
	    	
	    	if (email == ''){
				$("#form_result").html('<div class="alert alert-danger">Email is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_cemail").focus();
	    	}else if (company == ''){
	    		$("#form_result").html('<div class="alert alert-danger">Company name is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_company").focus();
	    	}else if (contactname == ''){
	    		$("#form_result").html('<div class="alert alert-danger">Contact name is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_contactname").focus();
	    	}else if (username == ''){
	    		$("#form_result").html('<div class="alert alert-danger">Username is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_cusernamee").focus();
	    	}else if (password == ""){
	    		$("#form_result").html('<div class="alert alert-danger">Password is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_password").focus();
	    	}else if(!emailfilter.test(email)){
	    		$("#form_result").html('<div class="alert alert-danger">Invalid Email<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_cemail").focus();
	    	}else if(username.length < 5 || username.length > 10){	
	    		$("#form_result").html('<div class="alert alert-danger">Username should have 5 to 10 characters<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_cusername").focus();
	    	}else if(password.length < 5 || password.length > 10){	
	    		$("#form_result").html('<div class="alert alert-danger">Password should have 5 to 10 characters<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_password").focus();
	    	}else {
	    		
	    		error = false;
	    	}
			
			
		}else if (role == 'homeowner'){
			var email = $('#q_hemail').val();
			var firstname = $('#q_firstname').val();
			var lastname = $('#q_lastname').val();
			var username = $('#q_husername').val();
			
			if (email == ''){
				$("#form_result").html('<div class="alert alert-danger">Email is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_hemail").focus();
	    	}else if (firstname == ''){
				$("#form_result").html('<div class="alert alert-danger">First name is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_firstname").focus();
	    	}else if (lastname == ''){
				$("#form_result").html('<div class="alert alert-danger">Last name is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_lastname").focus();
	    	}else if (username == ""){
	    		$("#form_result").html('<div class="alert alert-danger">Username is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_husername").focus();
	    	}else if(!emailfilter.test(email)){
	    		$("#form_result").html('<div class="alert alert-danger">Invalid Email<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$("#q_hemail").focus();
	    	}else {
	    		error = false;
	    	}
			
		}
	
	}else {
		error = false;
	}
	
	if (!error){
		$.ajax({
	        url: base_url+'/questionsajax',
	        type: 'POST',
	        dataType:"JSON",
	        data: cdata,
	        success: function(response){
	        	if (response.status){
	   					window.location.href = base_url+'/'+response.url;
	   			}else {
					$("#form_result").html('<div class="alert alert-danger">'+response.message+' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
           },
	        error: function(){
	        	$("#form_result").html('<div class="alert alert-danger">An error occurred while submitting question <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
	        }
	    });
	}
}


$(document).ready(function(){
	$('#q_role').change(function(){
		$('#register_homeowner').hide();
		$('#register_contractor').hide();
	   
		var r = $(this).val();
	   
		$('#register_'+r).show();
	});
	
});

