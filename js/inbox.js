function loadinbox(page){
	 var base_url = $('#base_url').val();
	$.post(base_url+'/dashboardajax',{t:'loadinbox',page:page},function(data){
		$('#table-messages tbody').html(data.html);
		$('#pagination-inbox').html(data.pagination);
		
	});
}

function loadsent(page){
	 var base_url = $('#base_url').val();
	$.post(base_url+'/dashboardajax',{t:'loadsent',page:page},function(data){
		$('#table-sent-messages tbody').html(data.html);
		$('#pagination-sent').html(data.pagination);
		
	});
}

$(document).ready(function(){
	loadinbox(1);
	loadsent(1);
	
	$('#to_inbox').click(function(){
		$('#inboxdiv').css('display','block');
		$('#senditemdiv').css('display','none');
		
	});
	
	$('#to_sent').click(function(){
		$('#inboxdiv').css('display','none');
		$('#senditemdiv').css('display','block');
	});
	
	
	
});

$("#table-messages tbody").delegate("tr td:nth-child(4) .messageView ", "click", function() {
	   var id = jQuery(this).attr('id');
	   var div = jQuery(this).parents('tr');
	   var message_id = id.replace('message_','');
	   
	   var base_url = $('#base_url').val();
		
		$.post(base_url+'/dashboardajax',{t:'showmessage',id:message_id,from:'inbox'},function(data){
			$('.modal-content').html(data.html);
			$('#myModalMessage').modal('show');
		});
});

$("#table-messages thead").delegate("tr th .btn-group li .messageDelete ", "click", function() {
	   var ids = ""; 
	   var base_url = $('#base_url').val();
	   
	   $('#table-messages tbody tr').each(function() {
		    $(this).find('input:checkbox:checked').each(function() {
		     	ids += $(this).val()+",";
		    });
	   });
	   
	   if (ids != ""){
			$.post(base_url+'/dashboardajax',{t:'showconfirmdelete',ids:ids,from:'inbox'},function(data){
				$('.modal-content').html(data.html);
				$('#myModalMessage').modal('show');
			});
	   }else {
		   alert ('Please select message to delete');
	   }
	
});

$(".modal-content").delegate("p .delete-message-btn ", "click", function() {
	  var id = jQuery(this).attr('id');
	  var base_url = $('#base_url').val();
	  var from = $('#delete_from').val();
	  var ids = $('#ids').val();
	  
	  
	 
	  $.post(base_url+'/dashboardajax',{t:'deletemessage',ids:ids,from:from},function(data){
		  if (data.from == 'inbox'){
			  jQuery('#table-messages tbody tr').each(function() {
				    $(this).find('input:checkbox:checked').each(function() {
				    	$(this).parents('tr').fadeOut();
				    });
				});
			  
		  }else {
			  jQuery('#table-sent-messages tbody tr').each(function() {
				    $(this).find('input:checkbox:checked').each(function() {
				    	$(this).parents('tr').fadeOut();
				    });
				});
		  }
	});
	  
} )


$("#table-sent-messages tbody").delegate("tr td:nth-child(4) .messageSentView ", "click", function() {
	   var id = jQuery(this).attr('id');
	   var div = jQuery(this).parents('tr');
	   var message_id = id.replace('message_','');
	   
	   var base_url = $('#base_url').val();
		
		$.post(base_url+'/dashboardajax',{t:'showmessage',id:message_id,from:'sent'},function(data){
			$('.modal-content').html(data.html);
			$('#myModalMessage').modal('show');
		});
});

$("#table-sent-messages thead").delegate("tr th .btn-group li .messageDelete ", "click", function() {
	   var ids = ""; 
	   var base_url = $('#base_url').val();
	   
	   $('#table-sent-messages tbody tr').each(function() {
		    $(this).find('input:checkbox:checked').each(function() {
		     	ids += $(this).val()+",";
		    });
	   });
	   
	   if (ids != ""){
			$.post(base_url+'/dashboardajax',{t:'showconfirmdelete',ids:ids,from:'sent'},function(data){
				$('.modal-content').html(data.html);
				$('#myModalMessage').modal('show');
			});
	   }else {
		   alert ('Please select message to delete');
	   }
	
});

$(".modal-content").delegate(".modal-footer .message-delete-btn ", "click", function() {
	   var id = jQuery(this).attr('id');
	   var div = jQuery(this).parents('tr');
	   var message_id = id.replace('message_','');
	   var from = $('#from').val();
	   
	   var base_url = $('#base_url').val();
		
		$.post(base_url+'/dashboardajax',{t:'showconfirmdelete',id:message_id,from:from},function(data){
			$('.modal-content').html(data.html);
			$('#myModalMessage').modal('show');
		});
	  
} );

$(".modal-content").delegate(".modal-footer .message-reply-btn ", "click", function() {
	   var id = jQuery(this).attr('id');
	   var div = jQuery(this).parents('tr');
	   var message_id = id.replace('message_','');
	   var from = $('#from').val();
	   
	   var base_url = $('#base_url').val();
		
		$.post(base_url+'/dashboardajax',{t:'showreplymessage',id:message_id,from:from},function(data){
			$('#modal-ajax-content').html(data.html);
			//$('#myModalMessage').modal('show');
		});
	  
});

$(".modal-content").delegate(".modal-footer .btn-send-reply ", "click", function() {
	   var id = jQuery(this).attr('id');
	   var div = jQuery(this).parents('tr');
	   var to_id = $('#reply_to_id').val();
	   var to_user_type = $('#reply_to_user_type').val();
	   var subject = $('#m_subject').val();
	   var message = $('#m_message').val();
	   var base_url = $('#base_url').val();
	   var cdata = jQuery('#replymessageform').serialize();
	   
	   if(subject == ""){
			$("#message_result").html('<div class="alert alert-danger">Subject is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$('#m_subject').focus();
		}else if (message == ""){
			$("#message_result").html('<div class="alert alert-danger">Message is required <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			$('#m_message').focus();
		}else {
			$.ajax({
		        url: base_url+'/dashboardajax',
		        type: 'POST',
		        dataType:"JSON",
		        data: cdata,
		        success: function(response){
		        	
						$("#message_result").html('<div class="alert alert-success">Message sent<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					
	           },
		        error: function(){
		        	$("#message_result").html('<div class="alert alert-danger">An error occurred while sending message<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
		        }
		    });
		  	
		}
		
		
});

$("#table-messages thead").delegate("tr th .checker span .checkall-inbox ", "click", function() {
	$('#table-messages tbody input[type=checkbox]').prop('checked',true);
	$(this).removeClass("checkall-inbox");
	$(this).addClass("uncheckall-inbox");
});

$("#table-messages thead").delegate("tr th .checker span .uncheckall-inbox ", "click", function() {
	$('#table-messages input[type=checkbox]').prop('checked',false);
	$(this).removeClass("uncheckall-inbox");
	$(this).addClass("checkall-inbox");
});


$("#table-sent-messages thead").delegate("tr th .checker span .checkall-sent ", "click", function() {
	$('#table-sent-messages input[type=checkbox]').prop('checked',true);
	$(this).removeClass("checkall-sent");
	$(this).addClass("uncheckall-sent");
});

$("#table-sent-messages thead").delegate("tr th .checker span .uncheckall-sent ", "click", function() {
	$('#table-sent-messages input[type=checkbox]').prop('checked',false);
	$(this).removeClass("uncheckall-sent");
	$(this).addClass("checkall-sent");
});


$("#table-messages thead").delegate("tr  .pagination-control .next_link ", "click", function() {
	 var page = $(this).attr("id");
	 var page = page.replace(/next-/g, '');
	 loadinbox(page);
});

$("#table-sent-messages thead").delegate("tr .pagination-control .next_link ", "click", function() {
	 var page = $(this).attr("id");
	 var page = page.replace(/next-/g, '');
	 loadsent(page);
});

$("#table-messages thead").delegate("tr  .pagination-control .prev_link ", "click", function() {
	var page = $(this).attr("id");
	var page = page.replace(/prev-/g, '');
	loadinbox(page);
});

$("#table-sent-messages thead").delegate("tr .pagination-control .prev_link ", "click", function() {
	var page = $(this).attr("id");
	var page = page.replace(/prev-/g, '');
	 loadsent(page);
});
