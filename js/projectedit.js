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
			}else {
				
				$.ajax({
			        url: base_url+'/projectajax',
			        type: 'POST',
			        dataType:"JSON",
			        data: cdata,
			        success: function(response){
			        	if (response.status){
			   				if (response.indicator==1){
			   					window.location.href = base_url+'/dashboard/home-owner';
			   				}else {
			   					$("#errors").html('<div class="alert alert-success">You have successfully edited your project<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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