function processPost(){
	var q_title = $('#q_title').val();
	var q_category = $('#q_category').val();
	var q_content = $('#q_content').val();
	var cdata = jQuery('#question-post-form').serialize();
	var base_url = $('#base_url').val();
	
	if (q_title == ""){
		$("#form_result").html('<div class="alert alert-danger">Question title is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_title").focus();
	}else if (q_category == ""){
		$("#form_result").html('<div class="alert alert-danger">Question category is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_category").focus();
	}else if (q_content == ""){
		$("#form_result").html('<div class="alert alert-danger">Question content is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_content").focus();
	}else {
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

function processEdit(){
	var q_title = $('#q_title').val();
	var q_category = $('#q_category').val();
	var q_content = $('#q_content').val();
	var cdata = jQuery('#question-post-form').serialize();
	var base_url = $('#base_url').val();
	
	if (q_title == ""){
		$("#form_result").html('<div class="alert alert-danger">Question title is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_title").focus();
	}else if (q_category == ""){
		$("#form_result").html('<div class="alert alert-danger">Question category is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_category").focus();
	}else if (q_content == ""){
		$("#form_result").html('<div class="alert alert-danger">Question content is required<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#q_content").focus();
	}else {
		$.ajax({
	        url: base_url+'/questionsajax',
	        type: 'POST',
	        dataType:"JSON",
	        data: cdata,
	        success: function(response){
	        	if (response.status){
	   					window.location.href = base_url+'/dashboard/my-questions';
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

function loadquestions(page){
	 var base_url = $('#base_url').val();
	$.post(base_url+'/dashboardajax',{t:'loadquestions',page:page},function(data){
		$('#questions-content').html(data.html);
		if (data.count>0){
		   $('#pagination-question').html(data.pagination);
		}
		
	});
}

function deletequestion(id,proceed){
	var base_url = $('#base_url').val();
	if (proceed == '0'){
		$.post(base_url+'/dashboardajax',{t:'showconfirmquestion',id:id},function(data){
			$('.modal-content').html(data.html);
			$('#myModalMessage').modal('show');
		});
	}else {
		$.post(base_url+'/dashboardajax',{t:'deletequestion',id:id},function(data){
			$('#question-row-'+id).fadeOut();
		});
	}
}

/*function getUnanswered(){
	var base_url = $('#base_url').val();
	
	$.post(base_url+'/questionsajax',{t:'getunsanswered'},function(html){
		$('#recent-questions').hide('slow');
		$('#load_questions_container').show();
		$('#load_questions_container').html(html);
	});
}

function getallactivity(){
	var base_url = $('#base_url').val();
	
	$.post(base_url+'/questionsajax',{t:'getallactivity'},function(html){
		$('#recent-questions').hide('slow');
		$('#load_questions_container').show();
		$('#load_questions_container').html(html);
	});
}

function showDefaultQuestions(){
	$('#recent-questions').show();
	$('#load_questions_container').hide();	
}*/

function processVote(question_id){
	var base_url = $('#base_url').val();
	$.post(base_url+'/questionsajax',{t:'votequestion',question_id:question_id},function(data){
		$("input#input_"+question_id).prop('disabled', true);
		$("input#input_"+question_id).removeClass('qa-vote-up-button');
		$("input#input_"+question_id).addClass('qa-vote-up-button-inactive');
		$('span#show_vote_count-'+question_id).text('+ '+data.votecount);
	});
}


$(document).ready(function(){
	loadquestions(1);
	//$('#load_questions_container').hide();
	
	$('.qa-vote-buttons-net').each(function(){
		var base_url = $('#base_url').val();
		var id = $(this).attr('id');
		var question_id = id.split("-").pop();
			$.post(base_url+'/questionsajax',{t:'checkifCanVote',question_id:question_id},function(data){
				if(data.r == "0"){
					//$('#vote_buttons-'+question_id).hide();
					$("input#input_"+question_id).prop('disabled', true);
					$("input#input_"+question_id).removeClass('qa-vote-up-button');
					$("input#input_"+question_id).addClass('qa-vote-up-button-inactive');
				}
			});
	});
});

