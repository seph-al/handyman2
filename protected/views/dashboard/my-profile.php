<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd" 
	<?php if($photo_cover != false):?>
	style="background: url('/uploads/gallery/<?php echo $photo_cover?>') no-repeat scroll center bottom / cover transparent;"
	<?php endif;?>>
        <div class="wrap-sub-bckgrnd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-1 col-xs-3">
                                <img class="img-circle img-polaroid" src="<?echo $profile_pic == false ? 'http://www.justmail.in/platinum/images/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$profile_pic?>">
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
                                    <li>
                                        <i class="fa fa-check"></i> Mobile: <?echo $phone?>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i>  Email: <?echo $email?>
                                    </li>
                                    <li>
                                        <i class="fa fa-suitcase"></i> Contact: <?echo $email?>
                                    </li>
									
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="profile-overlay">
                            <div class="top-overlay">
                                <!--<a href="#reviews" class="btn btn-warning btn-lg btn-block">REVIEWS</a>
                                <a href="" class="btn btn-info btn-lg btn-block">CONTACT US</a>-->
								<a href="/contractor/profile/user/<?echo $username?>" class="btn btn-success btn-lg btn-block">VIEW PUBLIC PROFILE</a>
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
				
					 <?php $this->renderPartial('../contractorajax/uploadimage',array('my_gallery'=>$my_gallery,'is_my_profile'=>$is_my_profile,'is_public'=>false,'username' => $username)); ?>
				
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">About the Contractor</div>
                        <div class="panel-body" id="profeditbtn1">
                            <div id="about_content"><?echo $about?></div>
							<button type="button" class="btn btn-info pull-right" id="profeditAboutbtn">Edit</button>	
                        </div>
						<div class="panel-body" id="profeditAboutbtn_form" style="display:none">
                           <textarea class="editProfBox" name="editProfBox_about" id="editProfBox_about"><?echo $about?></textarea>	
						  <div class="pull-right">
							<a href="javascript:CancelEdit('profeditAboutbtn_form')" class="btn btn-primary editButton3">Cancel</a>
							<a href="javascript:void(0);" class="btn btn-primary editButton2" id="save_edit_about">Save</a>
							<span class="postErrors editProfBox_about"></span>
						</div>
                        </div>
						 <div class="panel-heading">Services</div>
                        <div class="panel-body" id="profeditbtn1">
                             <div id="services_content"><?echo $services?></div>
							<button class="btn btn-info pull-right" id="profeditServicesbtn">Edit</button>	
                        </div>
						 <div class="panel-body" id="profeditServicesbtn_form" style="display:none">
                           <textarea class="editProfBox" name="editProfBox_services" id="editProfBox_services"><?echo $services?></textarea>
						   <div class="pull-right">
								<a href="javascript:CancelEdit('profeditServicesbtn_form')" class="btn btn-primary editButton3">Cancel</a>
								<button class="btn btn-primary editButton2" id="save_edit_services">Save</button>
								<span class="postErrors editProfBox_services"></span>
							</div>
                        </div>
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
						<?php if(count($contractor_team) == 5):?>
						<div class="pull-right"><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/team">view more..</a></div>
						<?php endif;?>
                        </div>
                    </div>
					<?php endif; ?>
                      <a class="btn btn-warning" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/invite">INVITE PEOPLE INTO HANDYMAN.COM NETWORK</a>
                          
                </div>
            </div>
        </div>
    </div>
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
							$('#warning_messages2').css('display','none');
							var html = '<div class="col-lg-4 marg-btm text-center" id="li-gallery-'+data.photo_id+'"><div class="checkbox ch-1"><label for="op1"><div><a href="javascript:;" class="set_cover" id="image_id_'+data.photo_id+'"><img class="img-responsive gallery-img" src="'+base_url+'/uploads/gallery/'+file.name+'" id="image_'+data.photo_id+'"></a></div><input type="checkbox" name="select_from_gallery" id="select_from_gallery" value="'+data.photo_id+'"></label></div></div>'; 
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