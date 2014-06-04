<ol class="breadcrumb">
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/home-owner">My Projects</a></li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?echo $default_project?>/n/<?echo Yii::app()->Ini->slugstring($description)?>">Project Details</a></li>
			<li class="active">Edit</li>
</ol>
	
	<div class="container">
	<div id="errors"></div>
		<div class="row-fluid margTop20 margBot20" id="formcontent">
		<div class="postJobLeft col-md-8">
			<div class="row-fluid" id="postaprojectdiv">
				<form name="postajob" method="post" action="" id="projectform" class="form-horizontal">
					<input type="hidden" name="action" id="post_new_pjt" value=""/>
                    <input type="hidden" id="sesuserid" name="sesuserid" value=""/>
					<input type="hidden" id="typeofpost" name="typeofpost" value=""/>
					<input type="hidden" id="invitejob" name="invitejob" value=""/>
					<input type="hidden" id="project_id" name="project_id" value="<?php 
					if($project_id == ""){
					
						echo "0";
					}else{
						echo $project_id;
					}?>"/>	
					<input type="hidden" id="indicator" name="indicator" value="<?php
						 if(Yii::app()->user->getId()!=""){
							echo "3";
						 }else{
							echo "2";
						 }
					?>"/>
					<input type="hidden" id="t" name="t" value="editproject"/>
					<div class="postJobBox col-md-12 offset0">
						<span class="registerHead">Select Project Type</span>
						
						<ul class="postProjUl">
							<li class="control-group marg0">
								<div class="control-label">
									<label for="business_name">Select Project Type<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" id="projecttype" name="projecttype">
										<?php
											if($project_type_name == ""){
												echo "<option>Please Select</option>";
											
											}else{
												echo "<option value=".$project_type_id.">".$project_type_name."</option>";
											}
										?>
										<?php foreach($projects as $k=>$v): ?>
										<option value="<?php echo $v->ProjectTypeId ?>" name="<?php echo $v->Name ?>" <?php if ($default_project ==  $v->ProjectTypeId ) echo "selected"?>><?php echo $v->Name ?></option>
										<?php endforeach; ?>
									</select>
									
									<label class="postProjErr projecttype_message"></label>
								</div>
							</li>
						</ul>
                        <div id="form-field-div-client" class="contain"></div>
						
						 
					</div>
					<div class="postJobBox col-md-12 offset0">
						<span class="registerHead">Describe What Needs To Be Done.</span>
						<ul class="postProjUl">
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Project Description  <span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<textarea class="form-control" rows="3" id="projectdesc" name="projectdesc"><?php echo $description ?></textarea>
									<label class="postProjErr projectdesc_message"></label>
								</div>
							</li>
							
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Ideal Start Date<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="projectstart" id="projectstart" size="1">
										<option><?php
											if($start_date == ""){
												echo "Select";
											
											}else{
												echo $start_date;
											}
										?></option>
										<option value="Now">Now</option>	
										<option value="1-Week">1-Week</option>
										<option value="2-Weeks">2-Weeks</option>
										<option value="3-Weeks">3-Weeks</option>
										<option value="1-2 Months">1-2 Months</option>	
										<option value="3-6 Months">3-6 Months</option>	
									</select>
									<label class="postProjErr projectstart_message"></label>
								</div>
							</li>
							
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Project Status<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="projectstatus" id="projectstatus" size="1">
										<option><?php
											if($status_for_project == ""){
												echo "Select";
											}else{
												echo $status_for_project;
											}
										?></option>
										<option value="Ready to Hire">Ready to Hire</option>	
										<option value="Planning and Budgeting">Planning and Budgeting</option>
									</select>
									<label class="postProjErr projectstatus_message"></label>
								</div>
							</li>
							
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Completion Time Frame<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="projecttimeframe" id="projecttimeframe" size="1">
										<option><?php
											if($time_frame == ""){
												echo "Select";
											}else{
												echo $time_frame;
											}
										?></option>
										<option value="Timing is Flexible">Timing is Flexible</option>	
										<option value="Less than 2 months">Less than 2 months</option>
										<option value="More than 2 months">More than 2 months</option>	
									</select>
									<label class="postProjErr projecttimeframe_messafe"></label>
								</div>
							</li>
							<li class="control-group ">
								<div class="control-label">
									<label for="business_name">Do You Own the Property<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<label class="checkbox pull-right" for="won_pro1">
										<input class="radio" type="radio" id="projectown" value="1" name="won_pro" checked/>
										Yes
									</label>
									<label class="checkbox pull-right padTop5" for="won_pro2">
										<input class="radio" type="radio" id="projectown" value="0" name="won_pro" />
										No
									</label>
									<label class="postProjErr projectown_message"></label>
									<div style="clear:both;"><br></div>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Address<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<textarea class="form-control" id="projectaddress" name="projectaddress"><?php
										echo $address;
									?></textarea>
									<label class="postProjErr projectaddress_message"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">State<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select  class="form-control" id="projectstate" name="projectstate" >
										<?php
											if($state2 == ""){
												echo "<option>Please Select</option>";
											}else{
												
												echo "<option value=".$state_id.">".$state2."</option>";
											}
										?>
										<?php foreach($state as $k=>$v): ?>
										<option value="<?php echo $v->StateId ?>"  name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
										<?php endforeach; ?>
									</select>
									<label class="postProjErr projectstate_message"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">City<span class="starcolor">*</span></label>
								</div>
									<div class="controls">
										<input type="text" value="<?php echo $city?>" id="city" name="city" class="form-control" />
									 <label class="postProjErr homeown_fname"></label>
									</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Zipcode<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<input type="text" value="<?php echo $zipcode ?>" id="zip_code" name="zip_code" class="form-control"/>
									
								</div>
								<span id="errmsg" style="color:red"></span>
								
							</li>
							
								<li class="control-group">
								<div class="control-label">
									<label for="business_name">Project Budget<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="projectbudget" id="projectbudget" size="1">
										<option><?php
											if($budget == ""){
												echo "Select";
											}else{
												echo $budget;
											}
										?></option>
										<option value="up to $500">up to $500</option>	
										<option value="$500 to $1000">$500 to $1000</option>
										<option value="$1000 to $2500">$1000 to $2500</option>
										<option value="$2500 to $5000">$2500 to $5000</option>
										<option value="$5000 to $10000">$5000 to $10000</option>
										<option value="$10000 to $25000">$10000 to $25000</option>
										<option value="$25000 to $50000">$25000 to $50000</option>
										<option value="$50000 to $100000">$50000 to $100000</option>
										<option value="$100000 to $200000">$100000 to $200000</option>
										<option value="$200000 +">$200000 +</option>	
									</select>
									<label class="postProjErr projecttimeframe_messafe"></label>
								</div>
							</li>
						</ul>
					
					</div>
					
					
					<div class="postJobBox col-md-12 offset0">	
									<div id="errors2"></div>	
						<?php if(Yii::app()->user->getId()==""):?>			
							<div class="col-md-12 offset0"  id="postProjectlogindetails">
							  <div class="contain" id="content-register">
									<span class="registerHead">Register with HandyMan</span>
																			<div class="pull-right">
											<a href="javascript:;" class="already" id="alreadyacc">Already Have An Account?</a>
										</div>
																		<ul class="postProjUl margBot0">
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">First Name<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="homeown_fname" name="homeown_fname" class="form-control" />
											 <label class="postProjErr homeown_fname"></label>
											</div>
										</li>
                                        <li class="control-group">
											<div class="control-label">
												<label for="business_name">Last Name<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="homeown_lname" name="homeown_lname" class="form-control" />
											 <label class="postProjErr homeown_lname"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Phone Number (10 digit number with area code)<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="homeown_phone" name="homeown_phone" class="form-control" />
												 <label class="postProjErr homeown_phone"></label>
											</div>
											<span id="errmsg2" style="color:red"></span>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Public Username<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="howeown_pname" name="howeown_pname" class="form-control" />
												<label class="postProjErr howeown_pname"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Email<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="homeown_email" name="homeown_email" name="" class="form-control" />
												<label class="postProjErr homeown_email"></label>	
											</div>
										</li>
										<!-- 
										<li class="control-group">
											<div class="empty control-label">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls">
												<span class="refreshCode captchaCode">
													<span id="captchacode">78899</span>
												</span>
												<span class="refreshNew refreshCaptcha" onclick="return refrashCaptchacode();"></span>
												
												 <label class="postProjErr captcha clr"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Captcha Code<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" name="captcha" id="captcha-form" value="" class="form-control" />
												 <span class="postProjErr captcha-form contain"></span>
											</div>
										</li>
										 
										<li class="control-group">
											<div class="empty control-label">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls">
												 <label class="checkbox pull-left" for="home_newsletter">
													<input type="checkbox" value="Yes" id="home_newsletter" name="home_newsletter" class="conCheck marg5"/>
													I'd like to add monthly news letter
												 </label>
											</div>
										</li>
										-->
										<li class="control-group">
											<div class="empty control-label">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls">
												 <label class="checkbox pull-left" for="termscon">
													<input type="checkbox" value="" id="termscon" name="termscon" class="conCheck marg5" />
													I Accept And Agree To The <a href="http://www.justmail.in/platinum/static/terms-conditions/" class="terms" target="blank">Terms & Condition.<span class="starcolor">*</span></a>
												 </label>
												  <label class="postProjErr termscon clr"></label>
											</div>
										</li>
										
										
									</ul>	
								</div>						
							</div>
						
						<div class="contain" id="content-login" style="display:none">
							<ul class="postProjUl marg0">
								<li id="homeownlogin" style="display:block;position:relative;">
									<span class="registerHead">Log In To Your Existing Account</span>
									<div class="pull-right">
										<a href="javascript:;" class="already" id="createnewacc">Want to Create a New Account?</a>	
									</div>
									<ul class="postProjUl margBot0 clr">
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Email<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="home_loginEmail" name="home_loginEmail" value="" class="form-control" />
												<label class="postProjErr home_loginEmail"></label>
											</div>
										</li>
										
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Password<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="password" value="" id="home_loginPassword" name="home_loginPassword" value="" class="form-control" autocomplete="off" />
												 <label class="postProjErr home_loginPassword"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="empty control-label">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls">
												<a href="" class="already">Reset your password</a>
											</div>
										</li>
									</ul>
								</li>
							</div>
							<?php endif;?>
								<li class="control-group">
									<div class="empty control-label">
										<label for="business_name">&nbsp;</label>
									</div>
									<div class="controls">
										<input type="button" class="btn btn-primary" id="post_project"  value="Post a Project" />
									</div>
								</li>
							</ul>
						
					</div>       
					             
				</form> 
			</div>		
		</div>
		<div class="postJobRight col-md-4">			
			<div class="postRightInner">
				<div class="postRightHead">Dear Clients,</div>
				<div class="postRightDesc">
					First you will need to fill out this form, describing what needs to be done. Once your Project is approved and posted on the site, relevant Business people will be alerted. You'll receive email alerts when your Project starts getting interest and you'll then compare Contractor by reviewing profiles, work history, qualifications and customer reviews.
				</div>					
				<div class="postRightFoot margTop20">Kind Regards,</div>
				<div class="postRightFoot">HandyMan Team</div>
				<a href="http://www.justmail.in/platinum/postproject" id="rightbtnlink" class="already"  style="display:none;">Get Started Now</a>	
			</div>
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/projectedit.js"></script>