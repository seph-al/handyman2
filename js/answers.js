function processVoteAnswer(id){
    var cdata = $('#vote-answer-form-'+id).serialize();
	var base_url = $('#base_url').val();
	$.ajax({
        url: base_url+'/questionsajax',
        type: 'POST',
        dataType:"JSON",
        data: cdata,
        success: function(response){
        	$('.qa-vote-first-button-'+response.id).removeClass('qa-vote-up-button');
        	$('.qa-vote-first-button-'+response.id).addClass('qa-vote-up-button-inactive');
        	$('#btn-vote-answer-'+id).attr('disabled',true);
        	$('#answer-vote-count-'+id).html('+'+response.votecount);
       },
        error: function(){
        	$("#form_result_vote").html('<div class="alert alert-danger">An error occurred while submitting vote <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
    });
	
}

function processBestAnswer(id){
    var cdata = $('#best-answer-form-'+id).serialize();
	var base_url = $('#base_url').val();
	$.ajax({
        url: base_url+'/questionsajax',
        type: 'POST',
        dataType:"JSON",
        data: cdata,
        success: function(response){
        	$('.qa-form-light-button-'+response.old).removeClass('qa-form-light-button-flag-best-answer');
        	$('.qa-form-light-button-'+response.old).addClass('qa-form-light-button-flag');
        	$('.qa-form-light-button-'+response.old).val('choose as best answer');
        	$('.qa-form-light-button-'+response.old).attr('disabled',false);
        	
        	$('.qa-form-light-button-'+response.id).removeClass('qa-form-light-button-flag');
        	$('.qa-form-light-button-'+response.id).addClass('qa-form-light-button-flag-best-answer');
        	$('.qa-form-light-button-'+response.id).val('best answer');
        	$('.qa-form-light-button-'+response.id).attr('disabled',true);
       },
        error: function(){
        	$("#form_result_vote").html('<div class="alert alert-danger">An error occurred while submitting vote <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
    });
	
}

function deleteanswer(id){
	var base_url = jQuery('#base_url').val();
	$.post(base_url+"/questionsajax",
  			 {
			       id:id,
			       t:'deleteanswer' 
  			 }
  			 ,function(data){
  				if (data.status){
  					$('#a-list-'+data.id).fadeOut();
  				}
  			 }
  	   );	
}

function showupdateanswer(id){
	$('#answer_form_'+id).show();
}

function processUpdateAnswer(id){
	var base_url = jQuery('#base_url').val();
	$.post(base_url+"/questionsajax",
  			 {
			       answer_id:id,
			       t:'updateanswer',
			       answer:$('#answer_'+id).val()
  			 }
  			 ,function(data){
  				 $('.entry-content-'+id).html(data.ans);
  				 hideupdate(id);
  				
  			 }
  	   );
}

function hideupdate(id){
	$('#answer_form_'+id).hide();
}
$(document).ready(function(){
	
	 
});

