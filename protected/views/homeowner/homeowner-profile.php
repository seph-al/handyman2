<div class="container">
	<div class="row-fluid">
		<div class="myAccntRight col-md-12 margBot20">
			<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfViewAll" style="display:block">
					<!--Myaccount profile start -->
					<div class="myAccntRightInner thumbnail">
						<div class="containNew relative" id="my_profile">
							
							<span class="postJobHead "><?echo ucfirst($model->firstname)?> <?echo ucfirst($model->lastname)?> Profile</span>
									<div class="row-fluid margTop15 relative clr">
										<div class="overHiden">
											<div class="col-md-12 profileSection">
												<div class="profileSectionLft pull-left">
													<div class="tradeProfUpPhoto">
														<div class="upPhoto" id="upPhoto">
															<img src="<?echo $model->photo == "" ? 'http://www.justmail.in/platinum/images/clapper.png':'/uploads/homeowner/'.$model->photo?>" alt="" title="profile photo" />
														</div>	<span class="clickphoto">
														</span>
													</div>
													<?if($current_user_id == $model->homeowner_id):?>
														<a class="btn btn-warning center-block" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/homeowner-account"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit Account</a>
													<?elseif(!Yii::app()->user->isGuest):?>
														<button data-toggle="modal" data-target="#messageModal" class="btn btn-primary center-block"><span class="glyphicon glyphicon-envelope"></span> Send Message</button>
													<?endif;?>
												</div>
												<div class="relative profileSectionRht overHiden padLft15">
													<div class="tradeProfIn col-md-7">
														<div class="tradeProfName">&nbsp;<span class="skillTradeTopTxt">Member since <?php echo date("F j, Y", strtotime($model->date_registered));?></span>
														</div>
														<div class="tradeProfLocate row-fluid">
															<div class="col-md-6 "><span class="glyphicon glyphicon-earphone"></span> Phone number: <?echo $model->phone_number?></div>
															<div class="col-md-6 "><span class="glyphicon glyphicon-envelope"></span> Email: <?echo $model->email?></div>
														</div>
													</div>
												</div>
											</div>
											
										</div>
										<div class="tradeProfIn col-md-4 busPos">
											<div class="tradeProfInMiddle">	<span class="tradeProfUlHead relative">
													<span class="flt tradeProfUlHeadTxt">Projects</span>
												<div class="rightViewAllDefault ">	<span class="rightViewAllInner"></span>
													<ul class="tradeProfUlNew">
														<?if(count($projects) > 0):?>
															<?foreach($projects AS $k=>$v):?>
																<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->description)?>"><?echo $v->description?></a></li>
															<?endforeach;?>
														<?endif;?>
													</ul>
												</div>
												</span>
											</div>
										</div>
									
									</div>
									
						</div><!-- my-profile -->
					</div>
					<!-- Myaccount myprofile end -->
				</div>
				
			</div>
			<!--------------------------------Reference part started -------------------------------------->
		</div>
	</div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Message to <?echo ucfirst($model->firstname)?> <?echo ucfirst($model->lastname)?></h4>
      </div>
      <div class="modal-body">
			<div id="send_result">&nbsp;</div>
			<form role="form">
			  <div class="form-group">
				<label for="exampleInputEmail1">Subject</label>
				<input type="text" class="form-control"  id="send_message_subject" name="send_message_subject">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Message</label>
				<textarea class="form-control" rows="5" placeholder="Write Message" id="send_message_content" name="send_message_content"></textarea>
			  </div>
			  <input type="hidden" name="homeowner_id" id="homeowner_id" value="<?echo $model->homeowner_id?>" />
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="sendmessage"><span class="glyphicon glyphicon-envelope"></span> Send</button>
      </div>
    </div>
  </div>
</div>
<!-- script type="text/javascript">
	$(document).ready(function(){
	console.log("Page ready..");
	
	$('#sendmessage').click(function(){
		
		var base_url = $('#base_url').val();
		
		console.log("Send message triggered.");
		$('#send_result').html("");
		
		var send_message_subject = $('#send_message_subject').val();
		var send_message_content = $('#send_message_content').val();
		var homeowner_id = $('#homeowner_id').val();
		var to_usertype = 'homeowner';
		
		if(send_message_subject == ""){
			var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject is required.</div>';
			$('#send_result').html(error_html);
			send_message_subject.focus();
		}else if(send_message_content == ""){
			var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject is required.</div>';
			$('#send_result').html(error_html);
			send_message_content.focus();
		}else{
			$.post('/homeowner/savemessage',
				{
					subject:send_message_subject,
					message: send_message_content,
					to_usertype: to_usertype,
					t: 'savemessage'
				},
				function(data){
					if(data.success){
						var success_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject is required.</div>';
						$('#send_result').html(success_html);
					}else{
						var error_html = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to send due to: '+data.error_message+'</div>';
						$('#send_result').html(error_html);
					}
				});
		}
		
	});
});
</script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/homeowner-profile.js"></script>
