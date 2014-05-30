$(document).ready(function(){



	
	$('.feeddelete2').click(function(){
		var str = $(this).attr('id');
		var id = str.replace('feeddelete_',"");
		var base_url = $('#base_url').val();
		
		$.post(base_url+'/contractorajax',
		{
			t:'deletefeedback',
			id:id
		},function(data){
				
			$('#feedback_'+id).hide('slow');
		
		});
	
	
	});
	
	$('.feededit2').click(function(){
	
		var str = $(this).attr('id');
		var id = str.replace('feededit_',"");
		var base_url = $('#base_url').val();
		
		
		$('#feedbackedit_'+id).css('display','block');
		$('#feedbackmessage_'+id).css('display','none');
		
		/*$.post(base_url+'/contractorajax',
		{
			t:'editfeedaback',
			id:id
		},function(data){
			
			$('#feedback_'+id).html(data.html);
			
		});*/
	
	
	});
	
	
	$('.btcanceledit2').click(function(){
	
		var str = $(this).attr('id');
		var id = str.replace('btcanceledit_',"");
		
		
		
		$('#feedbackedit_'+id).css('display','none');
		$('#feedbackmessage_'+id).css('display','block');
	
		
	
	});
	
	$('.btedit2').click(function(){
	
	
		var str = $(this).attr('id');
		var id = str.replace('btedit_',"");
		var base_url = $('#base_url').val();
		var feedbackmessage2 = $('#feedbackmessages2_'+id).val();
		var contractor_id = $('#contractor_id').val();
		
		
		
		if(feedbackmessage2 == ""){
			$("#errors2").html('<div class="alert alert-danger">Please Enter Feedback <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		}else{
			
			$.post(base_url+'/contractorajax',
			{
				t:'editfeedaback',
				id:id,
				feedbackmessage2:feedbackmessage2,
				contractor_id:contractor_id
			},function(data){
				
				$("#feedbackmessages").html(data.html);
				
			});
		
		}
		
		
	
	
	})
	
	

});