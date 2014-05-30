$(document).ready(function(){

	$('#view').click(function(){
		$('#view_content').css('display','block');
		$('#add_content').css('display','none');
		$('#edit_content').css('display','none');
		$('#end_content').css('display','none');
		$('#invitetradmenlist_content').css('display','none');
		$('#view').addClass('active');
		$('#edit').removeClass('active');
		$('#end').removeClass('active');
		$('#add').removeClass('active');
		$('#invitetradmenlist').removeClass('active');
	});
	
	$('#edit').click(function(){
		$('#view_content').css('display','none');
		$('#add_content').css('display','none');
		$('#edit_content').css('display','block');
		$('#end_content').css('display','none');
		$('#invitetradmenlist_content').css('display','none');
		$('#view').removeClass('active');
		$('#edit').addClass('active');
		$('#end').removeClass('active');
		$('#add').removeClass('active');
		$('#invitetradmenlist').removeClass('active');
	
	
	});
	
	$('#end').click(function(){
		$('#view_content').css('display','none');
		$('#add_content').css('display','none');
		$('#edit_content').css('display','none');
		$('#end_content').css('display','block');
		$('#invitetradmenlist_content').css('display','none');
		$('#view').removeClass('active');
		$('#edit').removeClass('active');
		$('#end').addClass('active');
		$('#add').removeClass('active');
		$('#invitetradmenlist').removeClass('active');
	
	
	});

	$('#add').click(function(){
		$('#view_content').css('display','none');
		$('#add_content').css('display','block');
		$('#edit_content').css('display','none');
		$('#end_content').css('display','none');
		$('#invitetradmenlist_content').css('display','none');
		$('#view').removeClass('active');
		$('#edit').removeClass('active');
		$('#end').removeClass('active');
		$('#add').addClass('active');
		$('#invitetradmenlist').removeClass('active');
		
	
	});

	$('#invitetradmenlist').click(function(){
		$('#view_content').css('display','none');
		$('#add_content').css('display','none');
		$('#edit_content').css('display','none');
		$('#end_content').css('display','none');
		$('#invitetradmenlist_content').css('display','block');
		$('#view').removeClass('active');
		$('#edit').removeClass('active');
		$('#end').removeClass('active');
		$('#add').removeClass('active');
		$('#invitetradmenlist').addClass('active');
	
	});
	
	$('.pic_main').click(function(){
	
	
		var photo_id = $(this).attr('id');
		var base_url = $('#base_url').val();
		var projectid = $('#projectid').val();
		$.post(base_url+'/projectajax',{t:'assignmain',photo_id:photo_id,projectid:projectid},function(data){
		if(data.success){
			$("#errors2").html('<div class="alert alert-success">Main photo selected<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		}else{
			$("#errors2").html('<div class="alert alert-danger">Something went wrong..please be sad and think about what you did<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		}
		});
	
	
	
	});
	
	
	$('#edit_description').click(function(){
	
		var jobdescdetails = $('#jobdescdetails').val();
		var base_url = $('#base_url').val();
		var projectid = $('#projectid').val();
		$.post(base_url+'/projectajax',{t:'editdescription',jobdescdetails:jobdescdetails,projectid:projectid},function(data){
		if(data.success){
			$("#errors2").html('<div class="alert alert-success">Project description updated<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		}else{
			$("#errors2").html('<div class="alert alert-danger">Something went wrong..please be sad and think about what you did<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		}
		});
	
	
	});
	
	
	$('#msg_owner').click(function(){
	
		var base_url = $('#base_url').val();
		var project_details = $('#project_details').val();
		var project_owner2 = $('#project_owner2').val();
		var msg_subject = $('#msg_subject').val();
		var msg_content = $('#msg_content').val();
		
		$.post(base_url+'/projectajax',{t:'sendmsgtohomeowner',project_details:project_details,project_owner2:project_owner2,msg_subject:msg_subject,msg_content:msg_content},function(data){
			if(data.success){
				$.post(base_url+'/projectajax',{t:'emailnotification',msg_subject:msg_subject,msg_content:msg_content,project_owner2:project_owner2,project_details:project_details},function(data){
					if(data.success){
						$("#errors2").html('<div class="alert alert-success">Message Sent<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					}
				})
			}else{
				$("#errors2").html('<div class="alert alert-danger">Something went wrong..please be sad and think about what you did<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			}
		
		
		});
	
	
	
	
	
	});
	
	$(".deletepic").click(function(){
	
		var base_url = $('#base_url').val();
		var str = $(this).attr('id');
		var pic_id = str.replace("delete_","");
		var projectpic = $(this).attr('name');
		
		$.post(base_url+'/projectajax',{t:'deletepicture',pic_id:pic_id},function(){
			
				$('#projectpic_'+projectpic).attr('src','http://www.justmail.in/platinum/images/work_noimage.jpg');
				$('#delete_'+pic_id).css('display','none');
		});
		
	
	});
	
	
	
});