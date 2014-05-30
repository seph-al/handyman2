<?php $this->renderPartial('homeownernav'); ?>

<div class="container">
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="myAccntRightInner thumbnail headTabMyAccount">
				<div class="contain">
					<form name="leadsFlow" action="" class="form-horizontal registerControls" method="post" onsubmit="return validateReferHomeowner();">
						<div class="containNew">	<span class="postJobHead">Refer HomeOwner</span>
							<div class="contain">	<span class="contain">Do you know someone who might benefit from JustMail as you have? Simply provied their contact information below and we 'll reach out to see how JustMail can help them.</span> 
							<div id="errors2"></div>
								<ul class="postProjUl">
									<li class="control-group">
										<div class="control-label"  style="text-align:left;">
											<label for="business_name">First Name<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input class="form-control" style="width:60%;" type="text" id="fname" name="fname" value="" />	<span class="postErrors fname"></span>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Last Name<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input class="form-control" style="width:60%;" type="text" id="lname" name="lname" value="" />	<span class="postErrors lname"></span>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Phone<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input class="form-control" style="width:60%;" type="text" id="phone" name="phone" value="" />	<span class="postErrors phone" id="errmsg2"></span>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Email Id<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input class="form-control" style="width:60%;" type="text" id="email" name="email" value="" />	<span class="postErrors email"></span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="tradRegMemBtn marBot10 margin2" style="margin-left:50px; margin-bottom:20px;">
							<input class="btn btn-primary" type="button" id="ask_question" name="referral" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/referhomeowner.js"></script>