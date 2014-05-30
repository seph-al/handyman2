<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd ">
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
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">About the Contractor</div>
                        <div class="panel-body" id="profeditbtn1">
                            <?echo $about?>
							<button type="button" class="btn btn-info pull-right" id="profeditAboutbtn">Edit</button>	
                        </div>
						<div class="panel-body" id="profeditAboutbtn_form" style="display:none">
                           <textarea class="editProfBox" name="editProfBox_about" id="editProfBox_about"><?echo $about?></textarea>	
						  <div class="pull-right">
							<a href="javascript:CancelEdit('profeditAboutbtn_form')" class="btn btn-warning btn-lg btn-block">Cancel</a>
							<a href="javascript:void(0);" class="btn btn-primary editButton2" id="save_edit_about">Save</a>
							<span class="postErrors editProfBox_about"></span>
						</div>
                        </div>
						 <div class="panel-heading">Services</div>
                        <div class="panel-body" id="profeditbtn1">
                            <?echo $services?>
							<button class="btn btn-info pull-right" id="profeditServicesbtn">Edit</button>	
                        </div>
						 <div class="panel-body" id="profeditServicesbtn_form" style="display:none">
                           <textarea class="editProfBox" name="editProfBox_services" id="editProfBox_services"><?echo $services?></textarea>
						   <div class="pull-right">
								<a href="javascript:CancelEdit('profeditServicesbtn_form')" class="btn btn-warning btn-lg btn-block">Cancel</a>
								<button class="btn btn-primary editButton2" id="save_edit_services">Save</button>
								<span class="postErrors editProfBox_services"></span>
							</div>
                        </div>
                    </div>
              <?php $this->renderPartial('../contractorajax/feedback',array('feedback'=>$feedback,'is_my_profile'=>$is_my_profile)); ?>
                </div>
                <div id="credentials" class="col-lg-4">
                    <div class="panel panel-default panel-style1 back-1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="wrap-number-rank">
                                        <span class="number-rank text-center ">
                                            2997
                                        </span>
                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-inline hnd-ranking-star text-center">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span class="meta-handyman">HANDYMAN</span>
                                    <span class="meta-points">POINTS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">Key Business Information</div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">Team</div>
                        <div class="panel-body">
                            <div class="row team-member">
                                <div class="col-lg-3 col-lg-12 team-img">
                                    <img src="http://d3uyjocb29uv4r.cloudfront.net/api/file/8OOUt4GRk6Do2baO7Jgm/convert?w=60&amp;h=60&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true&amp;align=faces" class="img-circle" alt="team member image">
                                </div>
                                <div class="col-lg-9 col-lg-12 description">
                                    <div><b>Dino</b></div>
                                    <div>Owner</div>
                                </div>
                            </div>
                            <div class="row team-member">
                                <div class="col-lg-3 col-lg-12 team-img">
                                    <img src="http://d3uyjocb29uv4r.cloudfront.net/api/file/SirBNlUuRGmWUBJrQND4/convert?w=60&h=60&fit=crop&quality=50&cache=true&compress=true&align=faces" class="img-circle" alt="team member image">
                                </div>
                                <div class="col-lg-9 col-lg-12 description">
                                    <div><b>Luke</b></div>
                                    <div>Co-Owner</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    $('#fileupload').fileupload({
        url: base_url+'/fileuploadajax',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				$('#profile-pic').attr('src',base_url+'/uploads/profile/'+file.name);
				$.post(base_url+'/contractorajax',{t:'saveProfilePic',filename:file.name},function(data){
					if(data.success){
						console.log("profile picture saved successfully.");
						$('#display_picture').css("display","block");
						$('#display_picture_edit').css("display","none");
					}else{
						console.log("An error occurred.");
					}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
	$('#upload_multiple').fileupload({ 
		url: base_url+'/fileuploadajax/uploadmultiple',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
					$.post(base_url+'/dashboardajax/saveworkgallery',{filename:file.name},function(data){
						if(data.success){
							var html = '<li id="li-gallery-'+data.photo_id+'"><img src="'+base_url+'/uploads/gallery/'+file.name+'" alt="" class="img-thumbnail"/><input type="checkbox" name="select_from_gallery" id="select_from_gallery" value="'+data.photo_id+'" /></li>';
							$('#workgallery ul').append(html);
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


</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myprofile.js"></script>