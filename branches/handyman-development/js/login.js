$(document).ready(function(){

	$('#homeowner_sign_in').click(function(){
	
		var homeowner_email = $('#homeowner_email').val();
		var homeowner_password = $('#homeowner_password').val();
		var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if(homeowner_email == ""){
			$("#errors").html('<div class="alert alert-danger">Email is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#homeowner_email").focus();
		}
		else if(homeowner_password == ""){
			$("#errors").html('<div class="alert alert-danger">Password is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#homeowner_password").focus();
		}
		else if(!emailfilter.test(homeowner_email)){
			$("#errors").html('<div class="alert alert-danger">Email is invalid <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#homeowner_email").focus();
		}else{
			var base_url = $('#base_url').val();
			var cdata = jQuery('#homeownerloginform').serialize();
			jQuery.ajax({
		        url: base_url+'/loginajax',
		        type: 'POST',
		        dataType:"json",
		        data: cdata,
		        success: function(response){
		        	if (response.status){
		   					window.location.href = base_url+'/dashboard/home-owner';
		   			}else {
						$("#errors").html('<div class="alert alert-danger">'+response.message+' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					}
	           },
		        error: function(){
		        	$("#errors").html('<div class="alert alert-danger">An error occurred in login. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		        }
		    });
		}
		
	
	});
	
	
	$("#homeowner_password").keypress(function(event) {
		  if ( event.which == 13 ) {
			  var homeowner_email = $('#homeowner_email').val();
				var homeowner_password = $('#homeowner_password').val();
				var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(homeowner_email == ""){
					$("#errors").html('<div class="alert alert-danger">Email is required</div>');
					$("#homeowner_email").focus();
				}
				else if(homeowner_password == ""){
					$("#errors").html('<div class="alert alert-danger">Password is required</div>');
					$("#homeowner_password").focus();
				}
				else if(!emailfilter.test(homeowner_email)){
					$("#errors").html('<div class="alert alert-danger">Email is invalid</div>');
					$("#homeowner_email").focus();
				}else{
					var base_url = $('#base_url').val();
					var cdata = jQuery('#homeownerloginform').serialize();
					jQuery.ajax({
				        url: base_url+'/loginajax',
				        type: 'POST',
				        dataType:"json",
				        data: cdata,
				        success: function(response){
				        	if (response.status){
				   					window.location.href = base_url+'/dashboard/home-owner';
				   			}else {
								$("#errors").html('<div class="alert alert-danger">'+response.message+'</div>');
							}
			           },
				        error: function(){
				        	$("#errors").html('<div class="alert alert-danger">An error occurred in login.</div>');
				        }
				    });
				}		
		  }
	});	 
	
	$('#contractor_sign_in').click(function(){
	
		var contractor_email = $('#contractor_email').val();
		var contractor_password = $('#contractor_password').val();
		var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if(contractor_email == ""){
			$("#errors").html('<div class="alert alert-danger">Email is required</div>');
			$("#contractor_email").focus();
		}
		else if(contractor_password == ""){
			$("#errors").html('<div class="alert alert-danger">Password is required</div>');
			$("#contractor_password").focus();
		}
		else if(!emailfilter.test(contractor_email)){
			$("#errors").html('<div class="alert alert-danger">Email is invalid</div>');
			$("#contractor_email").focus();
		}else{
			var cdata = jQuery('#contractorloginform').serialize();
			var base_url = $('#base_url').val();
			jQuery.ajax({
		        url: base_url+'/loginajax',
		        type: 'POST',
		        dataType:"json",
		        data: cdata,
		        success: function(response){
		        	if (response.status){
		   					window.location.href = base_url+'/dashboard/contractor';
		   			}else {
						$("#errors").html('<div class="alert alert-danger">'+response.message+'</div>');
					}
	           },
		        error: function(){
		        	$("#errors").html('<div class="alert alert-danger">An error occurred in login.</div>');
		        }
		    });
		}
		
	
	
	});
	
	$("#contractor_password").keypress(function(event) {
		 if ( event.which == 13 ) {
			var contractor_email = $('#contractor_email').val();
			var contractor_password = $('#contractor_password').val();
			var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			
			if(contractor_email == ""){
				$("#errors").html('<div class="alert alert-danger">Email is required</div>');
				$("#contractor_email").focus();
			}
			else if(contractor_password == ""){
				$("#errors").html('<div class="alert alert-danger">Password is required</div>');
				$("#contractor_password").focus();
			}
			else if(!emailfilter.test(contractor_email)){
				$("#errors").html('<div class="alert alert-danger">Email is invalid</div>');
				$("#contractor_email").focus();
			}else{
				var cdata = jQuery('#contractorloginform').serialize();
				var base_url = $('#base_url').val();
				jQuery.ajax({
			        url: base_url+'/loginajax',
			        type: 'POST',
			        dataType:"json",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   					window.location.href = base_url+'/dashboard/contractor';
			   			}else {
							$("#errors").html('<div class="alert alert-danger">'+response.message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors").html('<div class="alert alert-danger">An error occurred in login.</div>');
			        }
			    });
			}
			
		 }
	});
	


});