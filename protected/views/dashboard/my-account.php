<?php $this->renderPartial('navigation',array('pages'=>$page)); ?>
<!-- Contarctor My account changes -->
	<div class="container">
		<ul class="subul offset0" id="myaccountsub">
			<li><a href="javascript:void(0)" class="active tabcontractor1" id="tabcontact">Contact Details</a></li>
			<li><a href="javascript:void(0)" class="tabcontractor2" id="tabpassword">Change Password</a></li>
			<li><a href="javascript:void(0)" class="tabcontractor3" id="tabplicense">License</a></li>
			<li><a href="javascript:void(0)" class="tabcontractor4" id="tabbonded">Bond</a></li>
			<li><a href="javascript:void(0)" class="tabcontractor5" id="tabsocials">Socials</a></li>
		</ul>
		<div id="errors2"></div>
		<div class="row-fluid margTop10 margBot15">
			<div class="myAccntRight col-md-12">
				<div class="registerControls form-horizontal">
					<!-- myaccount contact details start -->
					<div class="myAccntRightInner thumbnail">
					<form class="form-horizontal" role="form"  id="caccountdetailsform">
						<div class="contain" id="myprofcontractdetails">
							<div class="containNew"> <span class="postJobHead">Contact Details</span>
								<div class="contain margTop10">
									<div class="contain">
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Logo</label>
												</div>
												<div class="controls">													
													<div class="relative fileRelated marg0">
															<img src="<?echo $logo == false ? 'http://www.justmail.in/platinum/images/clapper.png':'/uploads/profile/'.$logo?>" id="img_logo" style="width:300px;max-height:120px;" />
															<br /><br />
															<input id="upload_logo" type="file" name="files[]" class="btn btn-primary">
														<br /> 
														<div id="progress" class="progress">
															<div class="progress-bar progress-bar-success"></div>
														</div>
													</div>	
													
													<span class="postErrors trad_logo"></span>
													
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Company Name<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="concompany" name="concompany" value="<?php echo $cmodel->Name?>" class="form-control" />	<span class="postErrors concompany"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Contact Name<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conname" name="conname" value="<?php echo $cmodel->ContactName?>" class="form-control" />	<span class="postErrors conname"></span>
												</div>
											</li>
											
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Email<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conemail" name="conemail" value="<?php echo $cmodel->Email?>" class="form-control" />	<span class="postErrors conemail"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Company Phone<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conphone" name="conphone" value="<?php echo $cmodel->Phone?>" maxlength="10" class="form-control" />	<span class="postErrors conphone" id="errmsg2"style="color:red"></span>
												</div>
											</li>
											
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Company Fax Number<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="confax" name="confax" value="<?php echo $cmodel->Fax?>" maxlength="10" class="form-control" />	<span class="postErrors confax" id="errmsg2"style="color:red"></span>
												</div>
											</li>
											
										
											<li  class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Website</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conwebsite" name="conwebsite" value="<?php echo $cmodel->Website?>" class="form-control" />	<span class="postErrors conwebsite"></span>
												</div>
											</li>
											<li class="control-group">
											<div class="control-label" style="text-align:left;">
												<label for="business_name">Select Business Type<span class="starcolor">*</span></label>
											</div>
											
												
														<div class="controls">
															<select class="form-control" id="conprojecttype" name="conprojecttype" style="width:60%">
																<option value="">Please Select</option>
																<?php foreach($projects as $k=>$v): ?>
																<option value="<?php echo $v->ProjectTypeId ?>" name="<?php echo $v->Name ?>" <?php if ($cmodel->ProjectTypeId == $v->ProjectTypeId) echo "selected"?>><?php echo $v->Name ?></option>
																<?php endforeach; ?>
															</select>
															
															<label class="postProjErr projecttype_message"></label>
														</div>
												
						</li>
														
													<li class="control-group">
																		<div class="control-label" style="text-align:left;">
																			<label for="business_name">About business: <span class="starcolor">*</span></label>
																		</div>
																		<div class="controls">
																			<textarea class="form-control" id="conaboutbusiness" name="conaboutbusiness" style="width:60%"><?php echo $cmodel->AboutBusiness ?></textarea>
																			<label class="postProjErr about_business"></label>
																		</div>
													</li>
													<li class="control-group">
																		<div class="control-label" style="text-align:left;">
																			<label for="business_name">Primary services:  <span class="starcolor">*</span></label>
																		</div>
																		<div class="controls">
																			<textarea class="form-control" id="conprimaryservices" name="conprimaryservices" style="width:60%"><?php echo $cmodel->Services?></textarea>
																			<label class="postProjErr primary_services"></label>
																		</div>
													</li>
										</ul>
									</div>
									<div class="contain">
										<h1 class="postJobHead">Address</h1>
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Address Line 1<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conaddress1" name="conaddress1" value="<?php echo $cmodel->Address1?>" class="form-control" />	<span class="postErrors conaddress1"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Address Line 2</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="conaddress2"  name="conaddress2" value="<?php echo $cmodel->Address2?>" class="form-control" />
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">State</label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="constate" name="constate" value="<?php echo $cmodel->State?>" class="form-control" />
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">City<span class="starcolor">*</span></label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="concity" name="concity" value="<?php echo $cmodel->City?>" class="form-control" />
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="">Zipcode<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<div id="zipcodelistdiv">
														<input type="text" value="<?php echo $cmodel->Zip?>" id="conzip" name="conzip" class="form-control" style="width:60%;"/>
													</div> <span class="postErrors zipcode" id="errmsg" style="color:red"></span>
												</div>
											</li>
										</ul>
									</div>
									
								</div>
							</div>
							<div class="tradRegMemBtn marBot10 margin2" style="margin-left:50px; margin-bottom:20px;">
							     <input type="hidden" name="t" id="t" value="updatecontractoraccount">
								<input type="button" id="save_edit" class="btn btn-primary" value="Save" />
							</div>
						</div>
						</form>
						<div class="contain" style="display: none" id="account-license">
							<?$this->renderPartial('my-account-license',array('clicense'=>$clicense))?>
						</div>
						<div class="contain" style="display: none" id="account-bonded">
							<?$this->renderPartial('my-account-bonded',array('cbond'=>$cbond))?>
						</div>
						<div class="contain" style="display: none" id="account-socials">
							<?$this->renderPartial('my-account-socials',array('socials'=>$socials,'user_socials' => $user_socials))?>
						</div>
						<div class="contain" id="myprofcontractpassword" style="display: none">
							<?$this->renderPartial('my-account-password',array('cmodel'=>$cmodel))?>
						</div>
					</div>
					<!-- myaccount contact details end -->
				</div>
			</div>
		</div>
	</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myaccount.js"></script>

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
		
	 $('#upload_logo').fileupload({
		url: base_url+'/fileuploadajax/savelogo',
		 dataType: 'json',
		 done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
				$('img#img_logo').attr("src",base_url+"/uploads/profile/"+file.name);
				$.post(base_url+'/contractorajax',{t:'saveProfilePic',filename:file.name},function(data){
					if(data.success){
						console.log("profile picture saved successfully.");
					}else{
						console.log("An error occurred.");
					}
				});
            });
        },progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
	}).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
});

</script>