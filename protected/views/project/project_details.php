<div class="container">
	<!-- Contarctor My account changes -->
	<div class="viewJobTab relative margTop10">
	<h1>Project : <?echo $project_id?>/<?echo $project_type_name?></h1>
	
		<ul class="viewJobTabUl">
			<li><a class="active" id="view">View Project</a>
			</li>
			<?php if($homeowner_id == Yii::app()->user->getId()){?>
			<li><a id="add">Add Photos</a>
			</li>
			<li><a href="/project/edit?pj_id=<?echo $project_id?>">Edit Project</a>
			</li>
			<!--<li><a id="end">End Project</a>-->
			</li>
			<?php } ?>
			<?php if($homeowner_id != Yii::app()->user->getId()){?>
			<li><a id="invitetradmenlist">Send Message</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div class="viewJobInner1">
		<h1 class="viewWhatJob1"></h1>
		<div class="row-fluid margBot20">
		<div id="errors2"></div>
			<?$this->renderPartial('project_details_left',array('project_type_name' => $project_type_name));?>
			
			<div class="myAccntRight col-md-8">
				<div id="tabright">
					
					<div class="myAccntRightInner viewTab" id="view_content" style="display:block;">
					<input type="hidden" name="projectid" id="projectid" value="<?php echo $project_id?>" />
					<input type="hidden" name="project_owner2" id="project_owner2" class="project_owner2" value="<?php echo $homeowner_id?>">
					<input type="hidden" id="project_details" name="project_details" value="<?php echo $description?>">
						<div class="contain">
							<div class="row-fluid" style="background:#fafafa; padding:10px 5px;">
								<a href="javascript:void(0);" class="viewStaticMap col-md-5">	<span id="showGoogleMaps" style="width: 245px; height: 280px;display:block;" class="">
									<img id="projectpic" src="<?php echo $main_photo?>" alt=""  style="width: 245px; height: 280px;display:block;"/>
								</span>
								</a>
								<div class="viewStaticRight col-md-7 custJobs">	<span class="viewStaticLocate"><b>Post Code</b>
									<span class="col">:</span><span class="rht"><?php echo $state2."/".$city."/".$zipcode?></span>
									</span>	<span class="viewStaticTrade"><b>Business</b> 
									<span class="col">:</span><span class="rht"><?php echo $project_type_name?></span>
									</span>	<span class="viewStaticPost"><b>Posted</b>
									<span class="col">:</span><span class="rht"><?php echo date('m/d/Y', strtotime( $date_added));?></span>
									</span>	<span class="viewStaticDate"><b>Ideal start date</b>
									<span class="col">:</span><span class="rht"><?echo $start_date?></span>
									</span>	<span class="viewStaticDate appBg"><b>Appropriate Status</b>
									<span class="col">:</span><span class="rht"><?echo $status_for_project?></span>
									</span>	<span class="viewStaticDate timeBg"><b>Completion Time</b>
									<span class="col">:</span><span class="rht"><?echo $time_frame?></span>
									</span>	<span class="viewStaticDate wonBg"><b>Own Property</b>
									<span class="col">:</span><span class="rht"><?echo $owned_property == '1' ? 'Yes':'No'?></span>
									</span>
									<span class="viewStaticDate wonBg"><b>Project Owner</b>
									<span class="col">:</span><span class="rht"><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeowner/profile/user/<?php echo $username?>"><? echo $owner_name ?></a></span>
									</span>
								</div>
								<div style="clear:both"></div>
							</div>
							<div class="contactDetInner">
								<div class="contain">
									<h1 class="contactHead">Project Description</h1>
									<div class="containNew">
										<p class="findParaCont"><?echo $description?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($homeowner_id == Yii::app()->user->getId()){?>
					<div class="myAccntRightInner viewTab contain clearfix" id="add_content" style="display:none;">
						<div class="contain">
							<h1 class="viewWhatJob2">Project Photos</h1>
							<p class="findParaCont">Photographs of your Project can help Contractor provide a more accurate quote.</p>
							<div class="uploaded">
								<ul class="uploadWorkUl row uploadWorkUlNew marg0">
								<?php for($x=0; $x< count($projectphotos); $x++){ ?>
									<li class="">
										<form class="marg0" id="imageform1" name="imageform1" method="post" enctype="multipart/form-data" action="http://www.justmail.in/platinum/customerJobDetails/81/photo">
											<input type="hidden" id="position" name="position" value="<?php echo $x?>" />
											<?php if($projectphotos[$x]['filename'] == ""): ?>
											
											<a href="#">
												<img id="projectpic_<?php echo $x?>" src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="" style="width:119px; height:105px"/>
											</a>
											
											<?php else: ?>
											<input type="hidden" id="picid_<?php echo $x?>" value="<?php echo $projectphotos[$x]['photo_id']?>">
											<a href="javascript:;" class="pic_main" id="<?php echo $projectphotos[$x]['photo_id']?>">
												<img id="projectpic_<?php echo $x?>" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/projectphotos/<?php echo $projectphotos[$x]['filename']?>" alt="" style="width:119px; height:105px"/>
											</a>
											<span class="closeImg times"><a href="javascript:;" id="delete_<?php echo $projectphotos[$x]['photo_id']?>" name="<?php echo $x?>" class="deletepic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png" style="width:27px; height:20px"/></a></span>
											<?php endif;?>
											
											<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
												<div class="fileUpInner">
													<input type="file" name="files" id="photoimg_<?php echo $x?>" value="" class="hideFile" size="1" />
												</div>
												 <div id="progress_<?php echo $x?>" class="progress" style="display:block">
													<div class="progress-bar progress-bar-success"></div>
												</div>
											</div>
										</form>
									</li>
								<?php 
								} ?>
								
								<?php
								$lacking = 0;
								
								if(count($projectphotos) < 6 ){
										$lacking = 6 - count($projectphotos);
								
								}
								if($lacking != 0){
								
									for($y = 1; $y <= $lacking; $y++, $x++){ ?>
									
										<li class="">
										<form class="marg0" id="imageform1" name="imageform1" method="post" enctype="multipart/form-data" action="http://www.justmail.in/platinum/customerJobDetails/81/photo">
											<input type="hidden" id="position" name="position" value="<?php echo $x?>" />
											<input type="hidden" id="picid_<?php echo $x?>" value="0">
											
											<a href="#">
												<img id="projectpic_<?php echo $x?>" src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="" style="width:119px; height:105px"/>
											</a>
											<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
												<div class="fileUpInner">
													<input type="file" name="files" id="photoimg_<?php echo $x?>" value="" class="hideFile" size="1" />
												</div>
												 <div id="progress_<?php echo $x?>" class="progress" style="display:block">
													<div class="progress-bar progress-bar-success"></div>
												</div>
											</div>
										</form>
									</li>	
								<?}
								}
								?>
								
								
								</ul>
							</div>
						</div>
					</div>
					<?php }?>
					
					<?php if($homeowner_id == Yii::app()->user->getId()){?>
					<div class="myAccntRightInner viewTab clearfix" id="edit_content" style="display:none;">
						<div class="contain">
							<h1 class="viewWhatJob3">Edit Project</h1>
							<div class="editProfIntro">Job Description<span class="starcolor">*</span>
							</div>
							<form name="editjobdesc" method="post" action="http://www.justmail.in/platinum/customerJobDetails/81/edit" onsubmit="return jobDescEditValidation();">
								<input type="hidden" name="editjobsdesc" value="editdescjob" />
								<textarea id="jobdescdetails" name="jobdescdetails" class="editProfBox"><?echo $description?></textarea>
								<div class="editProfBoxBtm">Please do not include any contact details in this field.</div>
								<div class="tradRegMemBtn marTop10 marBot10 margin2">
									<input type="button" id="edit_description" class="btn btn-primary" value="Submit" />
								</div>
							</form> <span class="postErrors jobdescdetails"></span>
						</div>
					</div>
					<?php } ?>
					
					<?php if($homeowner_id == Yii::app()->user->getId()){?>
					<!--<div class="myAccntRightInner viewTab clearfix" id="end_content" style="display:none;">
						<div class="contain">
							<h1 class="viewWhatJob3">Delete Project</h1>
							<div class="contain">
								<div class="endJobContent">
									<form name="endjob" method="post" action="" onsubmit="return endJobValidtaion();">
										<input type="hidden" name="endjob" value="endjob" /> <span class="pleaseTellusTxt">Are you sure you want to delete this project?<span class="starcolor">*</span></span>
										<div class="tradRegMemBtn marTop10 marBot10 margin2">
											<input type="button" value="Delete Project" class="btn btn-primary" />
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>-->
					<?php }?>
					
					<?php if($homeowner_id != Yii::app()->user->getId()){?>
					<div class="myAccntRightInner viewTab clearfix contain" id="invitetradmenlist_content" style="display:none;">
						<div class="contain">
							<h1 class="viewWhatJob3">Send Message to project owner</h1>
							<div class="contain">
								<div class="staticInner">
								<div class="contactUsCont">
										<div class="row-fluid">
											<div>
													<ul class="postProjUl">
														<li class="control-group">
															<div class="control-label">
																<label for="business_name">
																Subject
																<span class="starcolor">*</span>
																</label>
															</div>
															<div class="controls">
																<input id="msg_subject" class="form-control" type="text" name="msg_subject" >
																<label class="postProjErr msg_subject"></label>
															</div>
														</li>
														<li class="control-group">
															<div class="control-label">
																<label for="business_name">Message<span class="starcolor">*</span></label>
															</div>
															<div class="controls">
																<textarea id="msg_content" class="form-control" name="msg_content"></textarea>
																<label class="postProjErr msg_content"></label>
															</div>
														</li>
														<li class="control-group">
															<div class="controls">
																<input type="button" class="InviteJob btn pull-right"  name="msg_owner" id="msg_owner" value="Send Message" />
															</div>
														</li>
													</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div><!-- myAccntRight -->
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/projectdetails.js"></script>
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
	var projectid = $('#projectid').val();
    $('#photoimg_0').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_0').val();
				$('#projectpic_0').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'1',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_0 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
	
	
	$('#photoimg_1').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_1').val();
				$('#projectpic_1').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'0',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_1 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
		
		
	$('#photoimg_2').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_2').val();
				$('#projectpic_2').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'0',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_2 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
		
	$('#photoimg_3').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_3').val();
				$('#projectpic_3').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'0',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_3 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
	$('#photoimg_4').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_4').val();
				$('#projectpic_4').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'0',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_4 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
		
	$('#photoimg_5').fileupload({
        url: base_url+'/fileuploadajaxhomeowner',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				var pic_id = $('#picid_5').val();
				$('#projectpic_5').attr('src',base_url+'/uploads/projectphotos/'+file.name);
				$.post(base_url+'/projectajax',{t:'saveprojectphotos',filename:file.name,projectid:projectid,ismain:'0',pic_id:pic_id},function(data){
				if(data.success){
					console.log("profile picture saved successfully.");
				}else{
					$("#errors2").html('<div class="alert alert-danger">You have reached the maximum number of uploads<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}
				});
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_5 .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
	
	
});
</script>