<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd " <?php if($photo_cover != false):?>
	style="background: url('/uploads/gallery/<?php echo $photo_cover?>') no-repeat scroll center bottom / cover transparent;"
	<?php endif;?>>
        <div class="wrap-sub-bckgrnd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-1 col-xs-3">
                                <img class="img-circle img-polaroid" src="<?echo $logo == false ? 'http://rdbuploads.s3.amazonaws.com/icons/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$logo?>">
                            </div>
                            <div class="col-lg-11 col-xs-9">
                                <span class="name">
                                    <? echo $company?>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-inline ul-profile">
                                    <li>
                                        <i class="fa fa-bar-chart-o"></i> Address: <?echo $address1?>,<?echo $city?>, <?echo $state?> <?echo $zipcode?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <div class="profile-overlay">
                             <div class="top-overlay">
								<?if(!Yii::app()->user->isGuest):?>
									<?if(Yii::app()->user->role == 'homeowner'):?>
										<a data-toggle="modal" data-target="#messageAttachProject" class="btn btn-warning btn-lg btn-block">Invite to Contact</a>
									<?endif;?>
									<?if($is_my_profile == false):?>
										<a data-toggle="modal" data-target="#messageModal" class="btn btn-info btn-lg btn-block">CONTACT US</a>
									<?elseif($is_my_profile == true):?>
										<a href="/dashboard/my-profile" class="btn btn-success btn-lg btn-block">EDIT PROFILE</a>
									<?endif;?>
								<?else:?>
									<a href="<?php echo Yii::app()->request->baseUrl;?>/project/post#.U40sHHa5yVo" class="btn btn-info btn-lg btn-block">CONTACT US</a>
								<?endif;?>
                            </div>
                        </div>
                    </div>
			
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-profile-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
				  <?php $this->renderPartial('../contractorajax/uploadimage',array('my_gallery'=>$my_gallery,'is_my_profile'=>$is_my_profile,'is_public'=>true,'username' => $username)); ?>
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">About the Contractor</div>
                        <div class="panel-body">
                            <?echo $about?>
                        </div>
						 <div class="panel-heading">Services</div>
                        <div class="panel-body">
                            <?echo $services?>
                        </div>
                        <div class="panel-heading">Location</div>
                        <div class="panel-body">
                         <?php $this->renderPartial('contractor-map',array('point'=>$point,'map_location'=>$map_location)); ?>
                            
                        </div>
                       <!-- <ul class="list-group">
                            <li class="list-group-item li-heading">services</li>
                            <li class="list-group-item">
                                <ul class="list-inline ul-under-panel">
                                    <li>
                                        <a href="">
                                            New Construction
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">Room Additions</a>
                                    </li>
                                    <li>
                                        <a href="">Commercial</a>
                                    </li>
                                    <li>
                                        <a href="">general</a>
                                    </li>
                                    <li>
                                        <a href="">2nd story additions</a>
                                    </li>
                                    <li>
                                        <a href="">large renovations</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>-->
                    </div>
					
					
					<!------------------------------------------>
					
					<div class="panel panel-default panel-style1">
						<div id="reviews" class="panel-heading">
							Feedback
							<span class="clearfix"></span>
						</div>
							<div id='errors2'></div>
							<div class="panel-body">
							<div id="feedbackmessages">
							
								 <?php $this->renderPartial('../contractorajax/feedback',array('feedback'=>$feedback,'is_my_profile' => $is_my_profile)); ?>
							
							</div>
							<?php if(Yii::app()->user->isGuest == false && $is_my_profile == false && Yii::app()->user->role == 'homeowner'):?>
						   <div class="row">
								<div class="col-lg-9 col-lg-offset-3">
									<div class="form-group" id="feedbackform" style="display:none">
										<textarea class="form-control" rows="5" id="feedbackmessage"></textarea>
										<input type="hidden" id="homeowner_id" value="<?php echo Yii::app()->user->getId()?>"/>
										<input type="hidden" id="contractor_id" value="<?php echo $contractor_id?>"/>
										 <a href="javascript:;" class="btn btn-success btn-lg" id="btsubmit">Submit</a>
										 <a href="javascript:;" class="btn btn-warning btn-lg" id="btcancel">Cancel</a>
									</div>
									<p><a href="javascript:;" class="btn btn-info btn-lg" id="btfeed">Click to write a review</a></p>
								</div>
							</div>
							<?php endif;?>
							
						</div>
					</div>
					
					<!------------------------------------------->
                  
                </div>
                <div id="credentials" class="col-lg-4">
                   <?php $this->renderPartial('../contractor/information',array('contractor_license' => $contractor_license,'contractor_bond' => $contractor_bond,'social_accounts' => $social_accounts,'contractor_points'=>$contractor_points)); ?>
				   
				   	<?php if(count($contractor_team)>0):?>
					
					
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">Team</div>
                        <div class="panel-body">
						
						<?php foreach($contractor_team as $k=>$v):?>
						<?php
								$team_name = Contractors::model()->findByAttributes(array('ContractorId' => $v->invited_id));
								
								
								$contractorphotos = Contractorphotos::model()->findByAttributes(array('contractor_id' => $v->invited_id,'is_profile' => '1'));
								
								if (count($contractorphotos)>0){
									$profile_pic =  Yii::app()->request->baseUrl."/uploads/profile/".$contractorphotos->filename;
								}else{
									$profile_pic = 'http://www.justmail.in/platinum/images/clapper.png';
								}
								
							
						?>
                            <div class="row team-member">
                                <div class="col-lg-3 col-lg-12 team-img">
                                    <img src="<?php echo $profile_pic?>" class="img-circle" alt="team member image">
                                </div>
                                <div class="col-lg-9 col-lg-12 description">
                                    <div><b><?php echo $team_name->Name?></b></div>
                                </div>
                            </div>
						<?php endforeach; ?>
							
                        </div>
                    </div>
					<?php endif; ?>
					
					
					 <div class="panel panel-default panel-style1">
						<div class="panel-heading"><?echo ucfirst($company)?></div>
						<div class="panel-body text-center"><a href="/refer/<?echo $username?>" class="btn btn-success">Referral Program</a></div>
					 </div>
					
				   
					<div class="panel panel-default panel-style1">
					<div class="panel-heading">Connect with us</div>
					<div class="panel-body">
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fhandymancom&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=286087838227017" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowTransparency="true"></iframe></div>
					<br />
					<a class="twitter-timeline"  href="https://twitter.com/handymancom"  data-widget-id="471943687279099904">Tweets by @handymancom</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


					</div>
                </div>
            </div>
        </div>
    </div>
<!--
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/795d15d5/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/795d15d5/jquery.metadata.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/795d15d5/jquery.rating.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/feedback.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myprofile.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/fileupload/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/fileupload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/fileupload/jquery.fileupload.js"></script>

<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
 
    var base_url = $('#base_url').val();
   
		
	$('#upload_multiple').fileupload({ 
		url: base_url+'/fileuploadajax/uploadmultiple',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
					$.post(base_url+'/dashboardajax/saveworkgallery',{filename:file.name},function(data){
						if(data.success){
							var html = '<div class="col-lg-4 marg-btm text-center" id="li-gallery-'+data.photo_id+'"><div class="checkbox ch-1"><label for="op1"><div><img class="img-responsive gallery-img" src="'+base_url+'/uploads/gallery/'+file.name+'"></div><input type="checkbox" name="select_from_gallery" id="select_from_gallery" value="'+data.photo_id+'"></label></div></div>'; 
							$('#gallery_action_result').append(html);
							console.log("gallery saved.");
						}
					});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_gallery .progress-bar').css(
                'width',
                progress + '%'
            );
        }
	}).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

function changeProfilePic(){
	$('#display_picture').css("display","none");
	$('#display_picture_edit').css("display","block");
}

function cancelEditDP(){
	$('#display_picture').css("display","block");
	$('#display_picture_edit').css("display","none");
}

  $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
        });
        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            });
        });


</script>
	
<?if($profile_exists):?>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Message to <?echo $company?></h4>
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
			  <input type="hidden" name="contractor_id" id="contractor_id" value="<?echo $contractor_id?>" />
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="sendmessage"><span class="glyphicon glyphicon-envelope"></span> Send</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_for_image">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?echo $company?> Work Pictures</h4>
      </div>
      <div class="modal-body" style="text-align:center">
			<img src="" id="modal_image_shown" alt="No data available"/>
      </div>
      <div class="modal-footer">
		&nbsp;      
	   </div>
    </div>
  </div>
</div>

	<?if(count($homeowner_projects > 0)):?>
	<div class="modal fade" id="messageAttachProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Send Message to <?echo $company?></h4>
		  </div>
		  <div class="modal-body">
				<div id="invite_send_result">&nbsp;</div>
				<form role="form">
				  <div class="form-group">
					<label for="exampleInputEmail1">Subject</label>
					<input type="text" class="form-control"  id="invite_message_subject" name="invite_message_subject">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">Attach Project</label>
					<select class="form-control" name="invite_project_attached" id="invite_project_attached">
						<?foreach($homeowner_projects AS $key=>$value):?>
							<option value="<?echo $value->project_id?>"><?echo substr($value->description,0,25)?></option>
						<?endforeach;?>
					</select>
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Message</label>
					<textarea class="form-control" rows="5" placeholder="Write Message" id="invite_message_content" name="invite_message_content"></textarea>
				  </div>
				  <input type="hidden" name="invite_contractor_id" id="invite_contractor_id" value="<?echo $contractor_id?>" />
				</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="SendInvitetoContact"><span class="glyphicon glyphicon-envelope"></span> Send</button>
		  </div>
		</div>
	  </div>
	</div>
	<?endif;?>

<?endif;?>	