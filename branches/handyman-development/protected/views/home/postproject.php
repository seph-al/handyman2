	<div class="container">
	<div id="errors"></div>
		<div class="row-fluid margTop20 margBot20">
		<div class="postJobLeft col-md-8">
			<div class="row-fluid" id="postaprojectdiv">
			
				<form name="postajob" method="post" action="" class="form-horizontal" onsubmit="return postaprojectValidation();">
					<input type="hidden" name="action" id="post_new_pjt" value=""/>
                    <input type="hidden" id="sesuserid" name="sesuserid" value=""/>
					<input type="hidden" id="typeofpost" name="typeofpost" value=""/>
					<input type="hidden" id="invitejob" name="invitejob" value=""/>	
					<input type="hidden" id="indicator" name="indicator" value="2"/>
					<input type="hidden" id="base_url" name="base_url" value="<?php echo Yii::app()->request->baseUrl; ?>" />
<h1>Post your <b><?php echo $v->Name ?></b> Project  and Get FREE Quotes with No Obligation	</h1>			
				<div class="postJobBox col-md-12 offset0">
						<span class="registerHead">Select Project Type</span>
						
						<ul class="postProjUl">
							<li class="control-group marg0">
								<div class="control-label">
									<label for="business_name">Select Project Type<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" id="projecttype">
										<option>Please Select</option>
										<?php foreach($projects as $k=>$v): ?>
										<option value="<?php echo $v->ProjectTypeId ?>" name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
										<?php endforeach; ?>
									</select>
									
									<label class="postProjErr jobcategory"></label>
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
									<textarea class="form-control" rows="3" id="projectdesc"></textarea>
									<label class="postProjErr jobdesc"></label>
								</div>
							</li>
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Project Reason  <span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<textarea class="form-control" rows="3" id="projectreason"></textarea>
									<label class="postProjErr jobdesc"></label>
								</div>
							</li>
							
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Ideal Start Date<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="idealstartdate" id="idealstartdate" size="1">
										<option>Select One</option>
										<option value="Now">Now</option>	
										<option value="1-Week">1-Week</option>
										<option value="2-Weeks">2-Weeks</option>
										<option value="3-Weeks">3-Weeks</option>
										<option value="1-2 Months">1-2 Months</option>	
										<option value="3-6 Months">3-6 Months</option>	
									</select>
									<label class="postProjErr idealstartdate"></label>
								</div>
							</li>
							<!--<li class="control-group">
								<div class="control-label">
									<label for="business_name">Select the Appropriate Status for this Project<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="sel_aprostatus" id="sel_aprostatus" size="1">
										<option>Select One</option>
										<option value="Ready to Hire">Ready to Hire</option>	
										<option value="Planning and Budgeting">Planning and Budgeting</option>	
									</select>
									<label class="postProjErr sel_aprostatus"></label>
								</div>
							</li>-->
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Time to contact<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select class="form-control" name="sel_completion" id="sel_completion" size="1">
										<option>Select One</option>
										<option value="Whenever">Whenever</option>	
										<option value="Morning">Morning</option>
										<option value="Evening">Evening</option>	
										<option value="Not sure">Not sure</option>	
									</select>
									<label class="postProjErr sel_completion"></label>
								</div>
							</li>
							<li class="control-group ">
								<div class="control-label">
									<label for="business_name">Do You Own the Property<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<label class="checkbox pull-right" for="won_pro1">
										<input class="radio" type="radio" id="won_pro1" value="0" name="won_pro" checked/>
										Yes
									</label>
									<label class="checkbox pull-right padTop5" for="won_pro2">
										<input class="radio" type="radio" id="won_pro2" value="-1" name="won_pro" />
										No
									</label>
									<label class="postProjErr won_pro clr"></label>
									<div style="clear:both;"><br></div>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Address<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<textarea class="form-control" id="address" name="address"></textarea>
									<label class="postProjErr address"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">State<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<select  class="form-control" id="state2" name="state2" >
										<option>Please Select</option>
										<?php foreach($state as $k=>$v): ?>
										<option value="<?php echo $v->StateId ?>"  name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
										<?php endforeach; ?>
									</select>
									<label class="postProjErr state"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">City<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<div id="citylistdiv">
										<select  class="form-control" name="city" id="city" title="Select City" >
											<option >Select</option>	 
																		
										</select>	
									</div>
									<label class="postProjErr city"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Zipcode<span class="starcolor">*</span></label>
								</div>
								<div class="controls">
									<input type="text" value="" id="zip_code" name="zip_code" class="form-control" />
									
								</div>
								<span id="errmsg" style="color:red"></span>
								
							</li>
						</ul>
					
					</div>
					
					
					<div class="postJobBox col-md-12 offset0">	
									<div id="errors2"></div>	
							<div class="col-md-12 offset0"  id="postProjectlogindetails">
							  <div class="contain" id="register">
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
												<label for="business_name">Phone Number<span class="starcolor">*</span></label>
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
						
						<div class="contain" id="logins2">
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
			<hr />
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/postproject.js"></script>