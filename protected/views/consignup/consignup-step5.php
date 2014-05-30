<div class="container">
	<div class="row-fluid margTop20 margBot20">
		<div class="findJobLeft col-md-8">
			<div class="skillsTradeLeft containNew thumbnail">
				<form class="marg0" name="profiledes" method="post" action="" enctype="multipart/form-data">
					<!--<input type="hidden" name="action" value="registerTradeProfile">		-->
					<input type="hidden" id="conid" value="62" />	<span class="postJobHead">Step 5: Business Profile</span>
				</form>
				<div class="col-md-12 profileSection margTop15 offset0">
					<div class="col-md-4 profileSectionLft">
						<div class="tradeProfUpPhoto">
							<div class="upPhoto" id="upPhoto">
								<table width="100%" align="center" height="100%">
									<tr align="center" valign="middle">
										<td align="center" valign="middle">
											<img src="http://www.justmail.in/platinum/images/clapper.png" alt="" title="profile photo" />	<span class="uploadText">Upload your profile photo</span>
										</td>
									</tr>
								</table>
							</div>	
						</div>
					</div>
					<div class="relative profileSectionRht overHiden">
						<div class="tradeProfIn">
							<div class="tradeProfName">test	<span class="skillTradeTopTxt">Member since 05 May 2014</span>
							</div>
							<div class="tradeProfLocate row-fluid">
								<div class="bold">Location :</div>
								<div class="margLft25 margTop5">VA,&nbsp; Alberta,&nbsp; 23821</div>
							</div>
						</div>
					</div>
				</div>
				<div class="contain relative margTop15">
					<div class="col-md-7">
						<div class="skillTradeTopTxt marg0">In this step, you'll create your Business profile. This is the page that potential clients will see. Below is a sample layout of a Business profile. Please edit each section to complete your profile.</div>
					</div>
					<div class="tradeProfIn col-md-5 pull-right">
						<div class="tradeProfInMiddle">	<span class="tradeProfUlHead relative">
									<span class="flt tradeProfUlHeadTxt">Top Business</span>
							<div class="rightViewAllDefault ">	<span class="rightViewAllInner"></span>
								<ul class="tradeProfUlNew">
									<li>Architects</li>
								</ul>
							</div>
							</span>
						</div>
					</div>
				</div>
				<div class="containNew">
					<div class="contain">
						<h1 class="contactHead">Profile</h1>
						<!-- Image starts -->
						<div class="row-fluid">
							<form class="col-md-12 marg0" name="profiledescval" method="post" action="">
								<input type="hidden" name="action" value="registerTradeProfile" />
								<div class="tradeProfTextImg" id="profeditbtn1">	<span class="col-md-12">
										<img src="http://www.justmail.in/platinum/images/example-about.gif" alt=""  title=""  />
									</span>
									<a href="javascript:void(0);" class="btn editButton1" id="profeditbtn" onclick="return validateProfileEdit(this.id);">Edit</a>
								</div>
								<div class="tradeProfTextImg profeditbtn1" style="display:none;">	<span class="editProfileNote">Please don't add contact details such as phone numbers, email addresses or websites. We may terminate your account if we find contact details on your profile.
									</span>
									<span class="editProfIntro">Introduction(300 characters max)<span class="starcolor">*</span></span>
									<textarea class="editProfBox" name="profileEditTxtArea" id="profileEditTxtArea" onkeypress="textCounter(this,300);"></textarea>	<span class="editProfBoxBtm">
										Make a good first impression with an engaging profile introduction. This is your first opportunity to convert a lead into a Project.
									</span><span class="postErrors profileEditTxtArea"></span>
									<a href="javascript:void(0);" class="btn editButton2" onclick="return validateProfileEdit('profile');">Save</a>
									<a href="http://www.justmail.in/platinum/contractor-register/62/TradeProfile/" class="btn editButton3">Cancel</a>
								</div>
							</form>
						</div>
					</div>
					<div class="contain">
						<h1 class="contactHead">Work Photos Upload</h1>
						<div class="uploaded" id="uploadedworkimage">
							<ul class="uploadWorkUl row uploadWorkUlNew marg0 alignCenter">
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="offset0 clr">-->
												<form id="imageform1" name="imageform1" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="1">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg1" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(1);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform2" name="imageform2" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="2">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg2" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(2);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform3" name="imageform3" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="3">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg3" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(3);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform4" name="imageform4" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="4">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg4" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(4);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="offset0 clr">-->
												<form id="imageform5" name="imageform5" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="5">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg5" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(5);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform6" name="imageform6" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="6">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg6" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(6);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform7" name="imageform7" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="7">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg7" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(7);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform8" name="imageform8" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="8">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg8" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(8);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="offset0 clr">-->
												<form id="imageform9" name="imageform9" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="9">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg9" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(9);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
								<li class="">
									<table width="100%" align="center" height="100%">
										<tr align="center" valign="middle">
											<td align="center" valign="middle">
												<!--<li class="">-->
												<form id="imageform10" name="imageform10" method="post" enctype="multipart/form-data" action="">
													<input type="hidden" id="position" name="position" value="10">
													<a href="#">
														<img src="http://www.justmail.in/platinum/images/work_noimage.jpg" alt="">
													</a>
													<div class="relativeFile fileRelated">	<a class="fileupBtn" href="javascript:void(0);">Upload</a>
														<div class="fileUpInner">
															<input type="file" name="photoimg" id="photoimg10" value="" class="hideFile" size="1" onchange="return validateWorkPhoto(10);" />
														</div>
													</div>
												</form>
											</td>
										</tr>
									</table>
								</li>
							</ul>
						</div>
					</div>
					<div class="contain">
						<form name="profileworkval" method="post" action="">
							<input type="hidden" name="action" value="registerTradeProfile">
							<div class="contain">
								<h1 class="contactHead">Work History</h1>
								<div class="containNew">
									<div class="contain" id="workeditbtn1">
										<img src="http://www.justmail.in/platinum/images/example-history.gif" alt="" title="" class="flt" />
										<div class="clr"></div>	<a href="javascript:void(0);" class="btn editButton1" id="workeditbtn" onclick="return validateProfileEdit(this.id);">Edit</a>
									</div>
									<div class="contain workeditbtn1" style="display:none;">	<span class="editProfileNote">Please don't add contact details such as phone numbers, email addresses or websites. We may terminate your account if we find contact details on your profile.
										</span>
										<span class="editProfIntro">My Work History (3000 characters max) <span class="starcolor">*</span></span>
										<textarea class="editProfBox" id="workHistoryTxtArea" name="workHistoryTxtArea" onkeypress="textCounter(this,3000);" maxlength="3000"></textarea>	<span class="editProfBoxBtm">
											Include details of any relevant qualifications and Business memberships but don't be afraid to promote yourself as 'time served'.
										</span><span class="postErrors workHistoryTxtArea"></span>
										<a href="javascript:void(0);" class="btn editButton2 clr" onclick="return validateProfileEdit('workhisty');">Save</a>
										<a href="http://www.justmail.in/platinum/contractor-register/62/TradeProfile/" class="btn editButton3">Cancel</a>
									</div>
								</div>
							</div>
						</form>
						<!--<div class="topLeft1"></div>
							<div class="topRight1"></div>
							<div class="downLeft1"></div>
							<div class="downRight1"></div>--></div>
					<div class="contain">
						<form name="profilequlval" method="post" action="">
							<input type="hidden" name="action" value="registerTradeProfile">
							<div class="contain">
								<h1 class="contactHead">Qualifications & Accreditations</h1>
								<div class="containNew">
									<div class="contain" id="qualifyeditbtn1">
										<img src="http://www.justmail.in/platinum/images/example-qualifications.gif" alt="" title="" class="flt" />
										<div class="clr"></div>	<a href="javascript:void(0);" class="btn editButton1" id="qualifyeditbtn" onclick="return validateProfileEdit(this.id);">Edit</a>
									</div>
									<div class="contain qualifyeditbtn1" style="display:none;">	<span class="editProfileNote">Please don't add contact details such as phone numbers, email addresses or websites. We may terminate your account if we find contact details on your profile.
										</span>
										<span class="editProfIntro">My Qualifications (3000 characters max)<span class="starcolor">*</span></span>
										<textarea class="editProfBox" id="qualifyTextArea" name="qualifyTextArea" onkeypress="textCounter(this,3000);" maxlength="3000"></textarea>	<span class="editProfBoxBtm">
											If you have any relevant qualifcation or accreditions, list them here (optional). Please include any relevant registration numbers.
										</span>
										<span class="postErrors qualifyTextArea"></span>
										<a href="javascript:void(0);" class="btn editButton2 clr" onclick="return validateProfileEdit('qualify');">Save</a>
										<a href="http://www.justmail.in/platinum/contractor-register/62/TradeProfile/" class="btn editButton3">Cancel</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="contain">
						<h1 class="contactHead">Submit your profile for approval</h1>
						<div class="containNew">
							<div class="skillTradeTopTxt">Review your profile and submit for approval when ready. (Changes and additions can also be made after approval).</div>
							<div class="contain alignCenter">
								<input type="button" class="btn btn-primary" onclick="return validateProfileEdit('total')" value="Submit" />	<span class="postErrors total"></span>
							</div>
						</div>
					</div>
				</div>
				<!--	</form>   -->
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
						<a href="http://www.justmail.in/platinum/contractor-register/62/edit/ContactDetail/">
							<div class="no">4</div>
							<div class="tick">	<span class="tradeProcessHead">Contact Details</span>
								<span class="tradeProcessDetail " id="sub4" style="display:none;">Tell us who you are and how we can contact you.</span>
							</div>
						</a>
					</li>
					<li>
						<a class="active">
							<div class="no">5</div>
							<div class="detail">	<span class="tradeProcessHead">Business Profile</span>
								<span class="tradeProcessDetail" style="display:block;">This is your public facing profile, which helps homeowners decide who to hire.</span>
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
<!--<div id="maskaNew"></div>-->
<div id="modals">
	<div id="imgGallaryPop" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
		<div class="galleryPopWrap" id="gallerypop">
			<div class="contain">	<span class="popupHeadMid">Gallery
					<button class="popClose" type="button" type="button" data-dismiss="modal" aria-hidden="true"></button>
				</span>
			</div>
			<div class="row-fluid">
				<div class="col-md-12">
					<div class="contain">
						<ul class="popuploadPhotoUl slider4"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>