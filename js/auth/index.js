Handyman.Auth = {
	id: null,
	obj:null,
	baseUrl:null,
	redirectUrl:null,
	emailfilter:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
	init: function (id) {
		var El = this;
		El.id = id;
		El.obj = jQuery('#'+El.id);
		
		//homeowner----
		El.obj.find('#homeowner_sign_in').on('click',function(){
			var homeowner_email = $('#homeowner_email').val();
			var homeowner_password = $('#homeowner_password').val();
			if(homeowner_email == ""){
				El.error("Email is required");
				$("#homeowner_email").focus();
			}
			else if(homeowner_password == ""){
				El.error("Password is required");
				$("#homeowner_password").focus();
			}
			else if(!El.emailfilter.test(homeowner_email)){
				El.error("Email is invalid");
				$("#homeowner_email").focus();
			}else{
				El.submit(El.obj.find('#homeownerloginform').serialize());
			}
		});
		El.obj.find("#homeowner_password").on('keypress',function(event) {
			  if ( event.which == 13 ) {
				El.obj.find('#homeowner_sign_in').trigger('click');
			  }
		});
		//-----
		
		//contractor----
		El.obj.find('#contractor_sign_in').on('click',function(){
			var contractor_email = $('#contractor_email').val();
			if(contractor_email == ""){
				El.error("Email is required");
				$("#contractor_email").focus();
			}
			else if(contractor_password == ""){
				El.error("Password is required");
				$("#contractor_password").focus();
			}
			else if(!El.emailfilter.test(contractor_email)){
				El.error("Email is invalid");
				$("#contractor_email").focus();
			}else{
				El.submit(El.obj.find('#contractorloginform').serialize());
			}
		});
		El.obj.find("#contractor_password").on('keypress',function(event) {
			  if ( event.which == 13 ) {
				El.obj.find('#contractor_sign_in').trigger('click');
			  }
		});
		//-----
	},
	error: function(msg){
		var El = this;
		El.obj.find("#errors").html('<div class="alert alert-danger">'+msg+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
	},
	submit: function(cdata){
		var El = this;
		var base_url = El.baseUrl;
		jQuery.ajax({
			url: base_url+'/auth',
			type: 'POST',
			dataType:"json",
			data: cdata,
			success: function(response){
				if (response.status){
					window.location = El.redirectUrl+'?code='+encodeURIComponent(response.code);
				}else {
					El.error(response.message);
				}
		   },
			error: function(){
				El.error('An error occurred in login.');
			}
		});
	}
}
