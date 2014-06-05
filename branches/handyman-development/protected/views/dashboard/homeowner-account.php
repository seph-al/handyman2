<?php $this->renderPartial('homeownernav',array('pages'=>$page)); ?>
<div class="container">
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
		<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all subul" id="cusmysetting">
			<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a id="condetails" class="active">Account Details</a>
			</li>
			<li class="ui-state-default ui-corner-top last"><a id="changepass">Change Password</a>
			</li>
		</ul>
	</div>
	<input type="hidden" id="userid" value="56" />
	<div class="row-fluid margTop10">
		<div class="myAccntRight col-md-12 margBot20">
			<!-- myaccount customer contact details start -->
			<div class="headTabMyAccount">
				<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
					<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide clearfix" id="custContactDet" style="display:block">
						<!-- myaccount customer contact details start -->
						<div id="errors2"></div>
						<form class="form-horizontal" role="form" style="width:50%; margin-top:20px;" id="haccountcontactform">
						<div class="myAccntRightInner thumbnail registerControls form-horizontal clearfix">
							<div class="containNew" id="cuscontactdetail">	<span class="postJobHead">Account Details</span>
								<div class="contain">
									<ul class="postProjUl">
										<li class="control-group">
											<div class="control-label"style="text-align:left;">
												<label for="business_name">First Name<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" style="width:60%;" id="cusfname" name="cusfname" value="<?php echo $hmodel->firstname?>" class="form-control" />	<span class="postErrors cusfname"></span>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label"style="text-align:left;">
												<label for="business_name">Last Name<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" style="width:60%;" id="cuslname" name="cuslname" value="<?php echo $hmodel->lastname?>" class="form-control" />	<span class="postErrors cuslname"></span>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label"style="text-align:left;">
												<label for="business_name">Phone<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" style="width:60%;" id="cusphone" name="cusphone" value="<?php echo $hmodel->phone_number?>" class="form-control" />	<span class="postErrors cusphone" id="errmsg2" style="color:red"></span>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label"style="text-align:left;">
												<label for="business_name">Email<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" style="width:60%;" id="cusemail" name="cusemail" value="<?php echo $hmodel->email?>" class="form-control" />	<span class="postErrors cusemail"></span>
											</div>
										</li>
										
										<li class="control-group">
											<div class="control-label"style="text-align:left;">
												<label for="business_name">Display Photo<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<img style="width:200px;height:200px" class="img-thumbnail" src="<?echo empty($hmodel->photo) ? 'http://rdbuploads.s3.amazonaws.com/icons/clapper.png':'/uploads/homeowner/'.$hmodel->photo?>" alt="Display photo" id="show_display_photo"/>
												<input class="btn btn-primary" type="file" name="files[]" id="display_photo" class="form-control" />	<span class="postErrors cusphoto"></span>
												<div id="progress_gallery" class="progress">
													<div class="progress-bar progress-bar-success"></div>
												</div>
											</div>
										</li>
											
											<li class="control-group marg0">
											<div class="control-label empty">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls" id="cuscontactsetdiv">
												<input type="hidden" name="t" id="t" value="updatehomeowneraccount">
												<input type="button" class="btn btn-primary" id="save_edit" value="Save" />
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
				        </form>
						<!-- contact details end-->
					</div>
					<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide registerControls form-horizontal" id="custChangePwd" style="display:none">
					<div id="errors3"></div>
						<!-- change password start -->
						<form class="form-horizontal" role="form" style="width:50%; margin-top:20px;" id="haccountpasswordform">
							<div class="myAccntRightInner thumbnail clearfix">
								<div class="containNew">	<span class="postJobHead">Change Password</span>
									<div class="contain">
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">Old Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="oldpassword" name="oldpassword" value="<?php echo $hmodel->password?>" class="form-control" autocomplete="off" />	<span class="postErrors oldpassword"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">New Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="cuspassword" name="cuspassword" value="" class="form-control" autocomplete="off" />	<span class="postErrors cuspassword"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">Confirm New Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="cusconfpwd" name="cusconfpwd" value="" class="form-control" autocomplete="off" />	<span class="postErrors cusconfpwd"></span>
												</div>
											</li>
											<li class="control-group marg0">
												<div class="control-label empty">
													<label for="business_name">&nbsp;</label>
												</div>
												<div class="controls">
												    <input type="hidden" name="t" id="t" value="updatepassword">
													<input type="button" class="btn btn-primary" value="Submit" id="change_pass" />
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</form>
						<!-- change password end-->
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

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/homeowneraccount.js"></script>
