$(document).ready(function(){
		
		
		 $("#cusphone").keypress(function (e) {
			 
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				
				$("#errmsg2").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		});
		
		$('#condetails').click(function(){
			
			$('#custContactDet').css('display','block');
			$('#custChangePwd').css('display','none');
			$("#condetails").addClass("active");
			$('#changepass').removeClass("active");
		});

		$('#changepass').click(function(){
			$('#custChangePwd').css('display','block');
			$('#custContactDet').css('display','none');
			$("#changepass").addClass("active");
			$('#condetails').removeClass("active");
		});
		
		
		$('#save_edit').click(function(){
			var base_url =  $('#base_url').val();
			var confirstname = $('#cusfname').val();
			var conlastname = $('#cuslname').val();
			var conmobileno = $('#cusphone').val();
			var cusemail = $('#cusemail').val();
			var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var cdata = $('#haccountcontactform').serialize();
			if(confirstname == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>First name is required</div>');
				$("#cusfname").focus();
			}else if(conlastname == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Last name is required</div>');
				$("#cuslname").focus();
			}else if(conmobileno == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Phone number is required</div>');
				$("#cusphone").focus();
			}else if(cusemail == ""){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Email is required</div>');
				$("#cusemail").focus();
			}else if(!emailfilter.test(cusemail)){
				$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Email is Invalid</div>');
				$("#cusemail").focus();
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
			        	$("#errors2").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting project</div>');
			        }
			    });
			}
			
		
		
		});
		
		$('#change_pass').click(function(){
		
			var base_url =  $('#base_url').val();
			var oldpassword = $('#oldpassword').val();
			var cuspassword = $('#cuspassword').val();
			var cusconfpwd = $('#cusconfpwd').val();
			var cdata = $('#haccountpasswordform').serialize();
			
			if(oldpassword == ""){
				$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter old password</div>');
				$("#oldpassword").focus();
			}else if(cuspassword == ""){
				$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter new password</div>');
				$("#cuspassword").focus();
			}else if(cusconfpwd == ""){
				$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please confirm your new password</div>');
				$("#cusconfpwd").focus();
			}else if(cuspassword != cusconfpwd){
				$("#errors3").html('<div class="alert alert-danger">  <button type="button" class="close" data-dismiss="alert">&times;</button><button type="button" class="close" data-dismiss="alert">&times;</button>Passwords did not match</div>');
			}else if(cuspassword.length < 6){
				$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Password must be more than 6 characters</div>');
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
			   					$("#errors3").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated your password.</div>');
			   			}else {
							$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.message+'</div>');
						}
		           },
			        error: function(){
			        	$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting project</div>');
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
				var cdata = $('#haccountpasswordform').serialize();
				
				if(oldpassword == ""){
					$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter old password</div>');
					$("#oldpassword").focus();
				}else if(cuspassword == ""){
					$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter new password</div>');
					$("#cuspassword").focus();
				}else if(cusconfpwd == ""){
					$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please confirm your new password</div>');
					$("#cusconfpwd").focus();
				}else if(cuspassword != cusconfpwd){
					$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Passwords did not match</div>');
				}else if(cuspassword.length < 6){
					$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>Password must be more than 6 characters</div>');
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
				   					$("#errors3").html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully updated your password.</div>');
				   			}else {
								$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+response.message+'</div>');
							}
			           },
				        error: function(){
				        	$("#errors3").html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>An error occurred while submitting project</div>');
				        }
				    });
				}
		  }
});		  
		var base_url =  $('#base_url').val();	
	$('#display_photo').fileupload({

		url:base_url+'/fileuploadajax/savehomeownerphoto',
		dataType: 'json',
		done:function (e, data) {
            $.each(data.result.files, function (index, file) {
					$.post(base_url+'/dashboardajax/savehomeownerphoto',{filename:file.name},function(data){
						if(data.success){
							var html = '/uploads/homeowner/'+file.name;
							$('img#show_display_photo').attr('src',html);
							console.log("gallery saved.");
						}else{
							console.log("E R R O R: "+data.error_message);
						}
					});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_gallery .progress-bar').css(
                'width',
                progress + '%'
            );
        }
	}).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
	/*$('#upload_multiple').fileupload({ 
		url: base_url+'/fileuploadajax/uploadmultiple',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
					$.post(base_url+'/dashboardajax/saveworkgallery',{filename:file.name},function(data){
						if(data.success){
							var html = '<li id="li-gallery-'+data.photo_id+'"><img src="'+base_url+'/uploads/gallery/'+file.name+'" alt="" class="img-thumbnail"/><input type="checkbox" name="select_from_gallery" id="select_from_gallery" value="'+data.photo_id+'" /></li>';
							$('#workgallery ul').append(html);
							console.log("gallery saved.");
						}
					});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_gallery .progress-bar').css(
                'width',
                progress + '%'
            );
        }
	}).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');*/

});