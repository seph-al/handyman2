$(document).ready(function(){
    showinbox();

	$('#postprojects').click(function(){
	
	
		$('#my_inbox').css('display','none');
		$('#posted_projects').css('display','block');
		$("#postprojects").addClass("active");
		$('#myinboxes').removeClass("active");
	
	});
	
	$('#myinboxes').click(function(){
		
		$('#my_inbox').css('display','block');
		$('#posted_projects').css('display','none');
		$("#myinboxes").addClass("active");
		$('#postprojects').removeClass("active");
	
	
	});
	
	$('#to_inbox').click(function(){
	
		$('#inboxdiv').css('display','block');
		$('#senditemdiv').css('display','none');
		
	});
	
	$('#to_sent').click(function(){
	
		$('#inboxdiv').css('display','none');
		$('#senditemdiv').css('display','block');
		
	});
	
	
	$('.deleteproject').click(function(){
	
		var str = $(this).attr('id');
		var id = str.replace('deleteproject_',"");
		var base_url = $('#base_url').val();
		
		$.post(base_url+'/projectajax',{t:'deleteproject',id:id},function(data){
			if(data.success){
				$('#project_'+id).hide('slow');
			}else{
				alert('Something went wrong..please be sad and think about what you did');
			}
		});
	
	
	});

	
 $('.btn').tooltip();






});