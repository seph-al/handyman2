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



$(document).ready(function(){
	 	 
	 
});

