$(document).ready(function(){
	console.log("Page ready..");
	
	$('#sendmessage').click(function(){
		
		var base_url = $('#base_url').val();
		
		console.log("Send message triggered.");
		$('#send_result').html("");
		
		var send_message_subject = $('#send_message_subject').val();
		var send_message_content = $('#send_message_content').val();
		var homeowner_id = $('#homeowner_id').val();
		var to_usertype = 'homeowner';
		
		if(send_message_subject == ""){
			var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject is required.</div>';
			$('#send_result').html(error_html);
			send_message_subject.focus();
		}else if(send_message_content == ""){
			var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject is required.</div>';
			$('#send_result').html(error_html);
			send_message_content.focus();
		}else{
			$.post(base_url+'/homeownerajax',
				{
					subject:send_message_subject,
					message: send_message_content,
					to_usertype: to_usertype,
					receiver_id:homeowner_id,
					t: 'savemessage'
				},
				function(data){
					if(data.success){
						var success_html = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Message sent.</div>';
						$('#send_result').html(success_html);
					}else{
						var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to send due to: '+data.error_message+'</div>';
						$('#send_result').html(error_html);
					}
				});
		}
		
	});
});