<div class="container">
<div class="postJobLeft col-md-8">
<div class="contain" id="content-login">
	<ul class="postProjUl marg0">
		<li id="homeownlogin" style="display:block;position:relative;">
			<span class="registerHead">Sign Up as Contractor</span>
				
					<div id="errors2"></div>
					<ul class="postProjUl margBot0 clr">
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Company Name<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="company_name" name="company_name" value="" class="form-control" />
												<label class="postProjErr company_name"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Your Name<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="your_name" name="your_name" value="" class="form-control" />
												<label class="postProjErr your_name"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Company Phone #<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="company_phone" name="company_phone" value="" class="form-control" />
											</div>
											<span id="errmsg2" style="color:red"></span>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Company Fax #</label>
											</div>
											<div class="controls">
												<input type="text" value="" id="company_fax" name="company_fax" value="" class="form-control" />
											</div>
											<span id="errmsg3" style="color:red"></span>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Company Address<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<textarea class="form-control" id="company_address" id="company_address"></textarea>
												<label class="postProjErr company_address"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">City<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
													<input type="text" value="" id="city" name="city" value="" class="form-control" />
												<label class="postProjErr city"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">State<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="state" name="state" value="" class="form-control" />
												<label class="postProjErr state"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Zip Code<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="zip_code" name="zip_code" value="" class="form-control" />
											</div>
											<span id="errmsg4" style="color:red"></span>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Email<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="email" name="email" value="" class="form-control" />
												<label class="postProjErr email"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Username<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="text" value="" id="username" name="username" value="" class="form-control" />
												<label class="postProjErr username"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Password<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="password" value="" id="password" name="password" value="" class="form-control" />
												<label class="postProjErr password"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Confirm Password<span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<input type="password" value="" id="password_confirm" name="password_confirm" value="" class="form-control" />
												<label class="postProjErr password_confirm"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Website</label>
											</div>
											<div class="controls">
												<input type="text" value="" id="website" name="website" value="" class="form-control" />
												<label class="postProjErr website"></label>
											</div>
						</li>
						
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Select Business Type<span class="starcolor">*</span></label>
											</div>
											
												
														<div class="controls">
															<select class="form-control" id="projecttype" name="projecttype">
																<option value="">Please Select</option>
																<?php foreach($projects as $k=>$v): ?>
																<option value="<?php echo $v->ProjectTypeId ?>" name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
																<?php endforeach; ?>
															</select>
															
															<label class="postProjErr projecttype_message"></label>
														</div>
												
						</li>
							
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Tell us about your business: <span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<textarea class="form-control" id="about_business" name="about_business"></textarea>
												<label class="postProjErr about_business"></label>
											</div>
						</li>
						<li class="control-group">
											<div class="control-label">
												<label for="business_name">Your business&rsquo; primary services:  <span class="starcolor">*</span></label>
											</div>
											<div class="controls">
												<textarea class="form-control" id="primary_services" name="primary_services"></textarea>
												<label class="postProjErr primary_services"></label>
											</div>
						</li>
						 <button type="button" id="submit_contractor" class="btn btn-default">Sign up</button>
					</ul>
		</li>
	</ul>
</div>
</div><!-- class="postJobLeft col-md-8 -->
<div class="postJobRight col-md-4">			
			<div class="postRightInner">
				<div class="postRightHead">Dear Clients,</div>
				<div class="postRightDesc">
					Welcome to ContractorNetwork&trade;<br /><br />
Contractor Network provides channel sales and management programs for home owners, contractors, builders, realtors, service providers, suppliers and entrepreneurs through its premium global platforms. By extending and integrating your product and service offerings, Contractor Network allows our members the hassle free ability to reach and service new customers.
<br /><br />
Contractor Network succeeds on leveraging the strengths of our industry leading partnerships and simple yet powerful online tools. To deliver our solution to customers, we have forged alliances with some of the top technology and service companies in the business.
The program is free and open to qualified and select construction and home improvement service providers. Members of Contractor Network should be dedicated to offering a community of competitive prices, great product and service packages and superior customer service. We strive to help our members provide a great value to your current and future customer base. Thanks again for your interest in joining. Check out our Free ContractorPage and Affiliate program for ways to improve your business and increase your revenues.
<br /><br />
Please fill up the form on the left and we will contact you shortly.
				</div>					
				<div class="postRightFoot margTop20">Kind Regards,</div>
				<div class="postRightFoot">HandyMan Team</div>
				<a href="http://www.justmail.in/platinum/postproject" id="rightbtnlink" class="already"  style="display:none;">Get Started Now</a>	
			</div>
		</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/contractor_signup2.js"></script>