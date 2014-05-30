$(document).ready(function(){



	$('#postQuestion').click(function(){
	
		$('#postQuestionSec').css('display','block');
	
	});
	
	$('#submit_question').click(function(){
	
		var askjobcategory = $('#askjobcategory').val();
		var fullquestion = $('#fullquestion').val();
		
		if(askjobcategory == "" || askjobcategory == "Please Select" ){
			$("#errors2").html('<div class="alert alert-danger">Please Select Category <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#askjobcategory").focus();
		}else if(fullquestion == ""){
			$("#errors2").html('<div class="alert alert-danger">Please enter your question <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$("#fullquestion").focus();
		}else{
			alert("succes");
		}
		
		
	
	});



});