function loadanswers(page){
	 var base_url = $('#base_url').val();
	 var id = $('#question_id').val();
	   $.post(base_url+'/questionsajax',{t:'loadanswers',page:page,id:id},function(data){
		$('#answers_list').html(data.html);
		if (data.count>0){
		   $('#pagination-anwers').html(data.pagination);
		}
	});
}

function processAnswer(){
	var answer = $('#answer').val();
	
	var cdata = jQuery('#answer-post-form').serialize();
	var base_url = $('#base_url').val();
	
	if (answer == ""){
		$("#form_result").html('<div class="alert alert-danger">Please provide your answer.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		$("#answer").focus();
	}else {
		$.ajax({
	        url: base_url+'/questionsajax',
	        type: 'POST',
	        dataType:"JSON",
	        data: cdata,
	        success: function(response){
	        	$('#answer_form').hide();
	        	$('#answer').val('');
	        	loadanswers(1);
           },
	        error: function(){
	        	$("#form_result").html('<div class="alert alert-danger">An error occurred while submitting question <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
	        }
	    });
	}
}

function processVoteQuestion(){
    var cdata = $('#vote-question-form').serialize();
	var base_url = $('#base_url').val();
	$.ajax({
        url: base_url+'/questionsajax',
        type: 'POST',
        dataType:"JSON",
        data: cdata,
        success: function(response){
        	$('.qa-vote-first-button-'+response.id).removeClass('qa-vote-up-button');
        	$('.qa-vote-first-button-'+response.id).addClass('qa-vote-up-button-inactive');
        	$('.qa-vote-first-button-'+response.id).attr('disabled',true);
        	$('#question-vote-count').html('+'+response.votecount);
       },
        error: function(){
        	$("#form_result_vote").html('<div class="alert alert-danger">An error occurred while submitting vote <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
    });
	
}



$(document).ready(function(){
	 loadanswers(1);
	 $('#btn-cancel-answer').click(function(){
			$('#answer_form').hide();
	 });
	
	 $('#q_doanswer').click(function(){
			$('#answer_form').show();
	 });
	
	 $("#answer").keypress(function(event) {
		 if ( event.which == 13 ) {
			 processAnswer(); 
		 }
	 });	 
	 
});

