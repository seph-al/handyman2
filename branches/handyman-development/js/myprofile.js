$(document).ready(function(){
	
	$('#delete_selected_gallery_btn').click(function(){
		if($('input[name="select_from_gallery"]:checked').length > 0){
			console.log("will delete..wait..");
			delete_selected_gallery();
		}else{
			$('#gallery_action_result').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No image selected.</div>');
		}
	});
	
	$('#profile').click(function(){
	
	
		//alert('profile');
		$('#myProfViewAll').css('display','block');
		$('#myProfSkill').css('display','none');
		$('#myProfworkArea').css('display','none');
		$('#myProfInsurance').css('display','none');
		$('#myProfReference').css('display','none');
	
	});

	$('#skills').click(function(){
		
		$('#myProfViewAll').css('display','none');
		$('#myProfSkill').css('display','block');
		$('#myProfworkArea').css('display','none');
		$('#myProfInsurance').css('display','none');
		$('#myProfReference').css('display','none');
	
	});
	
	$('#working').click(function(){
	
		$('#myProfViewAll').css('display','none');
		$('#myProfSkill').css('display','none');
		$('#myProfworkArea').css('display','block');
		$('#myProfInsurance').css('display','none');
		$('#myProfReference').css('display','none');
	
	});
	
	$('#insurance').click(function(){
		
		$('#myProfViewAll').css('display','none');
		$('#myProfSkill').css('display','none');
		$('#myProfworkArea').css('display','none');
		$('#myProfInsurance').css('display','block');
		$('#myProfReference').css('display','none');
	
	});
	
	$('#references').click(function(){
	
		$('#myProfViewAll').css('display','none');
		$('#myProfSkill').css('display','none');
		$('#myProfworkArea').css('display','none');
		$('#myProfInsurance').css('display','none');
		$('#myProfReference').css('display','block');
	});

	$("#profeditServicesbtn, #profeditAboutbtn").on('click',function(){
		console.log("show edit");
		var id = $(this).attr("id");
		$("#"+id+"_form").css("display","block");
	});
	

	$('#save_edit_about').click(function(){
		var base_url = $('#base_url').val();
		var about_text = $("#editProfBox_about").val();
			$.post(base_url+"/contractorajax",
				{
					t:'saveEditContractor',
					column:'AboutBusiness',
					value:about_text
				},function(data){
					if(data.success){
						console.log("Saved.");
					}else{
						console.log("about text not saved");
					}
				});
			
			
		$("#profeditAboutbtn_form").hide("slow");
		$('#about_contents').text(about_text);
	});
	
	$('#save_edit_services').click(function(){
		var base_url = $('#base_url').val();
		var services = $("#editProfBox_services").val();
			$.post(base_url+"/contractorajax",
				{
					t:'saveEditContractor',
					column:'Services',
					value:services
				},function(data){
					if(data.success){
						console.log("Saved.");
					}else{
						console.log("Services text not saved");
					}
				});
			
			
		$("#profeditServicesbtn_form").hide("slow");
		$('#services_contents').text(services);
	});
	
	$('#sendmessage').click(function(){
		var base_url = $('#base_url').val();
		var send_message_subject = $('#send_message_subject').val();
		var send_message_content = $('#send_message_content').val();
		var receiver_id =  $('#contractor_id').val();
		
			var btn = $(this);
			btn.button('loading');
			
			if(send_message_subject == ""){
				$('#send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Subject is required.</p>');
				$('#send_message_subject').focus();
				btn.button('reset');
			}else if(send_message_content == ""){
				$('#send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Oops! You forgot to write your message.</p>');
				$('#send_message_content').focus();
				btn.button('reset');
			}else{
				btn.button('loading');
				$.post(base_url+'/contractorajax',{t:'savemessage',subject:send_message_subject,message:send_message_content,receiver_id:receiver_id},function(data){
					if(data.success){
						$('#send_result').html('<p class="bg-success"><button type="button" class="close" aria-hidden="true">&times;</button>Message sent.</p>');
					}else{
						$('#send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>An error occurred: '+data.error_message+'</p>');
					}
					btn.button('reset');
				});
			}
				
			
	});
	
	$('.zoomImage').on('click',function(){
			var id = $(this).attr("id");
			var image_id = id.replace('zoom_','');
			var image_src = $('#img_'+image_id).attr("src");
			console.log(image_src);
			$('#modal_image_shown').attr('src',image_src);
			
	});
});

function delete_selected_gallery(){
	var base_url = $('#base_url').val();
	$("input:checkbox[name=select_from_gallery]:checked").each(function(){
		var to_delete_id = $(this).val();
		$('#li-gallery-'+to_delete_id).html('<span class="glyphicon glyphicon-trash"></span> Processing..');
		$.post(base_url+'/dashboardajax',{t:'deletecontractorphoto',photo_id:to_delete_id},function(data){
			if(data.success){
				$('#li-gallery-'+to_delete_id).hide("slow");
				console.log("DELETED: "+to_delete_id);
			}else{
				$('#li-gallery-'+to_delete_id).html('<span class="glyphicon glyphicon-remove"></span> Unable to delete: '+data.error_message);
			}
		});
		
	});
}

function CancelEdit(div_id){
	$('#'+div_id).hide("slow");
}