$(document).ready(function(){
	
	$('#delete_selected_gallery_btn').click(function(){
		if($('input[name="select_from_gallery"]:checked').length > 0){
			console.log("will delete..wait..");
			delete_selected_gallery();
		}else{
			$('#errors2').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No image selected.</div>');
		}
	});
	
	$('.set_cover').click(function(){
		
		var str = $(this).attr('id');
		var id = str.replace('image_id_',"");
		var image = $('#image_'+id).attr('src');
		var base_url = $('#base_url').val();
		var image_url = base_url + image;
		
		$('#errors2').html('<div class="alert alert-success alert-dismissable">Set image as cover photo? <button type="button" class="btn btn-primary" id="set_cov_'+id+'">Yes</button><button type="button" class="btn btn-danger" id="cancel_cov_'+id+'" data-dismiss="alert" >No</button></div>');
		
		$('#set_cov_'+id).click(function(){
		
		$('#errors2').html('<div class="alert alert-success">Please wait...</div>');
			
			$.post(base_url+"/contractorajax",
			{
				t:'assignbg',
				id:id
			},function(data){
				if(data.success){
					console.log("save");
					$('.header-bckgrnd').css('background','url("'+image_url+'") no-repeat scroll center bottom / cover rgba(0, 0, 0, 0)');
					$('#errors2').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cover photo updated</div>');
				}else{
					console.log("something went wrong");
				}
			});
		
		});
		
		
		//$('.header-bckgrnd').css('background','url("'+image_url+'") no-repeat scroll center bottom / cover rgba(0, 0, 0, 0)');
		
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
						$('#about_content').html(data.message);
						
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
						$('#services_content').html(data.message);
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
		
			//var btn = $(this);
			//btn.button('loading');
			
			if(send_message_subject == ""){
				$('#send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Subject is required.</p>');
				$('#send_message_subject').focus();
				//btn.button('reset');
			}else if(send_message_content == ""){
				$('#send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Oops! You forgot to write your message.</p>');
				$('#send_message_content').focus();
				//btn.button('reset');
			}else{
				//btn.button('loading');
				$.post(base_url+'/contractorajax',{t:'savemessage',subject:send_message_subject,message:send_message_content,receiver_id:receiver_id},function(data){
					if(data.success){
						$('#send_result').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Message sent.</div>');
					}else{
						$('#send_result').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>An error occurred: '+data.error_message+'</div>');
					}
					//btn.button('reset');
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
	
	$('#SendInvitetoContact').click(function(){
		var base_url = $('#base_url').val();
		var invite_message_subject = $('#invite_message_subject').val();
		var invite_message_content = $('#invite_message_content').val();
		var invite_project_attached = $('#invite_project_attached').val();
		var receiver_id =  $('#invite_contractor_id').val();
			
			//var btn = $(this);
			//btn.button('loading');
		
		
			if(send_message_subject == ""){
				$('#invite_send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Subject is required.</p>');
				$('#send_message_subject').focus();
				//btn.button('reset');
			}else if(send_message_content == ""){
				$('#invite_send_result').html('<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button>Oops! You forgot to write your message.</p>');
				$('#send_message_content').focus();
				//btn.button('reset');
			}else{
				//btn.button('loading');
				
				$.post(base_url+'/contractorajax',{t:'savemessagewithAttachedProject'
					,subject:invite_message_subject
					,message:invite_message_content
					,project_id:invite_project_attached
					,receiver_id:receiver_id
				},function(data){
					if(data.success){
						$('#invite_send_result').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Message sent.</div>');
					}else{
						$('#invite_send_result').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>An error occurred: '+data.error_message+'</div>');
					}
					//btn.button('reset');
				});
			}
		
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