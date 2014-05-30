<div class="container">
	<div class="row-fluid margTop20 margBot20">
		<div class="findJobLeft col-md-8">
			<div class="skillsTradeLeft containNew thumbnail">
				<form class="form-horizontal registerControls" name="contactdetails" action="<?echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step5" method="post">
					<input type="hidden" name="action" value="registerContactDetail" />
					<input type="hidden" name="type" id="type" value="" />
					<input type="hidden" name="conid" id="conid" value="62" />
					<input type="hidden" name="sessid" id="sessid" value="" />	<span class="postJobHead">Step 4: Contact Details</span>
					<div class="contain">
						<h1 class="contactHead margTop10">Contact Details</h1>
						<ul class="postProjUl">
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">First Name<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_fname" id="con_fname" value="" class="form-control" />
									<label class="postProjErr con_fname"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Last Name<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_lname" id="con_lname" value="" class="form-control" />
									<label class="postProjErr con_lname"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Contact No<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_mobileph" id="con_mobileph" value="" class="form-control" />
									<label class="postProjErr con_mobileph"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Phone Day</label>
								</div>
								<div class="controls">
									<input type="text" name="con_phoneday" id="con_phoneday" value="" class="form-control" />
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Email<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_email" id="con_email" value="" class="form-control" />
									<label class="postProjErr con_email"></label>
								</div>
							</li>
						</ul>
					</div>
					<div class="contain">
						<h1 class="contactHead">My Trading Details</h1>
						<ul class="postProjUl">
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Business Status<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<select class="form-control " id="con_bussStatus" name="con_bussStatus" onchange="return businesSubDivShowHide(this.value);">
										<option>Please Select</option>
										<option value="1">Sole Business</option>
										<option value="2">Limited Company</option>
										<option value="3">Ordinary Partnership</option>
										<option value="4">Limited Partnership</option>
									</select>
									<label class="postProjErr con_bussStatus"></label>
								</div>
							</li>
							<li class="control-group" style="display:none;" id="bus_tradenamediv">
								<div class="control-label">
									<label for="business_name">Business Name<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="trade_name" id="trade_name" value="" class="form-control" />
									<label class="postProjErr trade_name"></label>
								</div>
							</li>
							<li class="control-group" style="display:none;" id="bus_cmpyregNo">
								<div class="control-label">
									<label for="business_name">Companies House Registration Number<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="cmpyregno" id="cmpyregno" value="" class="form-control" />
									<label class="postProjErr cmpyregno"></label>
								</div>
							</li>
							<li class="control-group ">
								<div class="control-label">
									<label for="business_name">Is Your Business Better Business Bureau Registered?<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<label class="checkbox pull-left" for="vatYes">
										<input type="radio" name="vat" id="vatYes" value="yes" onclick="return display_vatnotxt(this.id);" />Yes </label>
									<label class="checkbox pull-left padTop5" for="vatNo">
										<input type="radio" name="vat" id="vatNo" value="no" onclick="return display_vatnotxt(this.id);" />No </label>
									<label class="postProjErr vat clr"></label>
								</div>
							</li>
							<li class="control-group" style="display:none;" id="vat_numberdiv">
								<div class="control-label">
									<label for="business_name">Bureau Number<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="vattxtval" id="vattxtval" value="" class="form-control" />
									<label class="postProjErr vattxtval clr"></label>
								</div>
							</li>
							<li class="control-group ">
								<div class="control-label">
									<label for="business_name">Do you have a business website??<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<label class="checkbox pull-left" for="webYes">
										<input type="radio" name="web" id="webYes" value="yes" onclick="display_websitetxt(this.id)" />Yes</label>
									<label class="checkbox pull-left padTop5" for="webNo">
										<input type="radio" name="web" id="webNo" value="no" onclick="display_websitetxt(this.id)" />No</label>
									<label class="postProjErr web clr"></label>
								</div><br>
							</li>
							<li class="control-group " style="display:none;" id="website_txtdiv">
								<div class="control-label">
									<label for="business_name">Your business website address<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_website" id="con_website" value="" class="form-control" />
									<label class="postProjErr con_website clr"></label>
								</div>
							</li>
						</ul>
					</div>
					<div class="contain">
						<h1 class="contactHead">Business or Contractor Address</h1>
						<ul class="postProjUl">
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Address Line 1<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="text" name="con_addr_line1" id="con_addr_line1" value="" class="form-control" />
									<label class="postProjErr con_addr_line1"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Address Line 2</label>
								</div>
								<div class="controls">
									<input type="text" name="con_addr_line2" id="con_addr_line2" value="" class="form-control" />
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">State<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<select class="form-control " id="state" name="state" onchange="return getcitylist(this.value);">
										<option>Please Select</option>
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AS">American Samoa</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="AA">Armed Forces Americas</option>
										<option value="AE">Armed Forces Middle East</option>
										<option value="AP">Armed Forces Pacific</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District of Columbia</option>
										<option value="FM">Federated States of Micronesia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="GU">Guam</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MH">Marshall Islands</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="MP">Northern Mariana Islands</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PW">Palau</option>
										<option value="PA">Pennsylvania</option>
										<option value="PR">Puerto Rico</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VI">Virgin Islands</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
									</select>
									<label class="postProjErr state"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">City<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<div id="citylistdiv">
										<select class="form-control " name="city" id="city" title="Select City" onchange="return getzipcodeList('',this.value);">
											<option>Please Select</option>
										</select>
									</div>
									<label class="postProjErr city"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Zipcode<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<div id="zipcodelistdiv">
										<select class="form-control " name="zipcode" id="zipcode" title="Select Zipcode">
											<option value="">Select</option>
										</select>
									</div>
									<label class="postProjErr zipcode"></label>
								</div>
							</li>
						</ul>
					</div>
					<div class="contain" style="display:block;">
						<h1 class="contactHead">Login Account</h1>
						<ul class="postProjUl">
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Username<span class="starcolor">*</span>
									</label>	<span class="example">Please Choose an Appropriate Username.This is Visible to Project Posters.</span>	
								</div>
								<div class="controls">
									<input type="text" name="con_uname" id="con_uname" value="" class="form-control" />
									<label class="postProjErr con_uname"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Password(Min 8 Character)<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="password" name="con_pwd" id="con_pwd" value="" class="form-control" autocomplete="off" />
									<label class="postProjErr con_pwd"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Confirm Password<span class="starcolor">*</span>
									</label>
								</div>
								<div class="controls">
									<input type="password" name="con_cpwd" id="con_cpwd" value="" class="form-control" autocomplete="off" />
									<label class="postProjErr con_cpwd"></label>
								</div>
							</li>
							<li class="control-group">
								<div class="control-label">
									<label for="business_name">Where did you hear about us?</label>
								</div>
								<div class="controls">
									<select class="form-control " id="con_about_know" name="con_about_know">
										<option>Please Select</option>
										<option value="1">Word of mouth</option>
										<option value="2">Google</option>
										<option value="3">Other Websites</option>
									</select>
								</div>
							</li>
							<li class="control-group">
								<div class="empty control-label">
									<label for="business_name">&nbsp;</label>
								</div>
								<div class="controls">
									<label class="checkbox pull-left" for="con_newsletter">
										<input type="checkbox" id="con_newsletter" name="con_newsletter" value="yes" />I'd Like To Monthly Newsletter</label>
								</div>
							</li>
							<li class="control-group">
								<div class="empty control-label">
									<label for="business_name">&nbsp;</label>
								</div>
								<div class="controls">It Is Important To Read And Understand Our &nbsp;	<a class="flt" target="_blank" href="http://www.justmail.in/platinum/static/terms-conditions/" class="terms">
									Terms & Conditions.
									</a>	
								</div>
							</li>
							<li class="control-group marg0">
								<div class="controls">
									<label class="checkbox pull-left" for="con_termscond">
										<input type="checkbox" id="con_termscond" name="con_termscond" value="yes" />I Accept And Agree To The Terms & Conditions.	<span class="starcolor">*</span>
									</label>
									<label class="postProjErr con_termscond clr"></label>
								</div>
							</li>
						</ul>
					</div>
					<div class="contain alignCenter">
						<input type="submit" class="btn btn-primary margTop10" value="Continue" />
					</div>
				</form>
			</div>
		</div>
		<div class="findJobRight col-md-4">
			<div class="skillsTradeRight">	<span class="skillBuildHead">
			<span class="skillBuildTool">Business Application Process</span>
				</span>
				<ul class="skillTradeRightUl marg0">
					<li>
						<a href="http://www.justmail.in/platinum/contractor-register/62/edit">
							<div class="no">1</div>
							<div class="tick">	<span class="tradeProcessHead">Membership Quote</span>
								<span class="tradeProcessDetail" id="sub3" style="display:none;">Your quarterly package and lead guarantee.</span>
							</div>
						</a>
					</li>
					<li>
						<a href="http://www.justmail.in/platinum/contractor-register/62/edit/skill">
							<div class="no">2</div>
							<div class="tick">	<span class="tradeProcessHead">Skills & Business</span>
								<span class="tradeProcessDetail" style="display:none;">Select and prioritise the type of leads you want.</span>
							</div>
						</a>
					</li>
					<li>
						<a href="http://www.justmail.in/platinum/contractor-register/62/edit/WorkArea/">
							<div class="no">3</div>
							<div class="tick">	<span class="tradeProcessHead">Working Area</span>
								<span class="tradeProcessDetail " id="sub2" style="display:none;">Choose where and how far you would like to travel for work.</span>
							</div>
						</a>
					</li>
					<li>
						<a class="active">
							<div class="no">4</div>
							<div class="detail">	<span class="tradeProcessHead">Contact Details</span>
								<span class="tradeProcessDetail " style="display:block;">Tell us who you are and how we can contact you.</span>
							</div>
						</a>
					</li>
					<li>
						<a>
							<div class="no">5</div>
							<div class="detail" style="cursor:pointer;" onclick="return showToggleSubMsg(5)">	<span class="tradeProcessHead">Business Profile</span>
								<span class="tradeProcessDetail" id="sub5" style="display:none;">This is your public facing profile, which helps homeowners decide who to hire.</span>
							</div>
						</a>
					</li>
					<li>
						<a>
							<div class="no">6</div>
							<div class="detail" style="cursor:pointer;" onclick="return showToggleSubMsg(6)">	<span class="tradeProcessHead">Liability Insurance</span>
								<span class="tradeProcessDetail" id="sub6" style="display:none;">Verify your public liability insurance or get covered.</span>
							</div>
						</a>
					</li>
					<li class="">
						<a>
							<div class="no">7</div>
							<div class="detail" style="cursor:pointer;" onclick="return showToggleSubMsg(7)"><span class="tradeProcessHead">Reference</span>
								<span class="tradeProcessDetail" id="sub7" style="display:none;">Please provide reference details. Referee comments are displayed as feedback on your profile.</span>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>