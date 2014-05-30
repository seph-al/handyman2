function initializeRandomCities(keyword){
	var base_url = $('#base_url').val();
	$.post(base_url+"/homeajax",
 			 {
			       t:'getsearchcties',
			       keyword:keyword
 			 }
 			 ,function(data){
 				$('#search_cities').html(data.html);
 			 }
 	   );	
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function showinbox(){
	var base_url = $('#base_url').val();
	
	$.post(base_url+'/dashboardajax',{t:'showinbox'},function(data){
		$('#myInbox').html(data.html);
	});
}

$(document).ready(function(){
	$( "#homesearch_keyword" ).val("");
	$( "#homesearch_keyword" ).keyup(function() {
		var keyword = $(this).val();
		  initializeRandomCities(keyword);
		});	
});