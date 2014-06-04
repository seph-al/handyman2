<?php $this->renderPartial('navigation',array('pages'=>$page)); ?>
<div class="container">
	
	<div class="row-fluid">
		<div class="myAccntRight col-md-12 margBot20">
			<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfViewAll" style="display:block">
					<!--Myaccount profile start -->
					<div class="myAccntRightInner thumbnail">
						<div class="containNew relative" id="my_profile" >	<span class="postJobHead ">My Profile </span>
								<div class="pull-right"><a href="/contractor/profile/user/<?echo $username?>" class="btn"><span class="glyphicon glyphicon-search"></span> View Public Profile</a></div>
							<div class="row-fluid margTop15 relative clr">
								<div class="overHiden">
									<div class="col-md-12 profileSection">
										<div class="profileSectionLft pull-left">
											
											<div id="display_picture_edit" class="tradeProfUpPhoto" style="display:none">
												<input id="fileupload" type="file" name="files[]">
												 <div id="progress" class="progress">
													<div class="progress-bar progress-bar-success"></div>
												</div>
												<a href="javascript:cancelEditDP();">Cancel</a>
											</div>
											
											<div class="tradeProfUpPhoto" id="display_picture">
												<div class="upPhoto" id="upPhoto">
													<img id="profile-pic" src="<?echo $profile_pic == false ? 'http://www.justmail.in/platinum/images/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$profile_pic?>" alt="" title="profile photo" />
												</div>
												<a href="javascript:changeProfilePic();">Change</a>
											</div>
										
										</div>
										<div class="relative profileSectionRht overHiden padLft15">
											<div class="tradeProfIn col-md-7">
														<div class="tradeProfName">Handyman	<span class="skillTradeTopTxt">Member since <?echo $date_created?></span>
														</div>
														<div class="tradeProfLocate row-fluid">
															<div class="col-md-6 "><span class="glyphicon glyphicon-home"></span> Address: <?echo $address1?>,<?echo $city?>, <?echo $state?> <?echo $zipcode?></div>
															<div class="col-md-6 "><span class="glyphicon glyphicon-earphone"></span> Mobile: <?echo $phone?></div>
															<div class="col-md-6 "><span class="glyphicon glyphicon-envelope"></span> Email: <?echo $email?></div>
															<div class="col-md-6 offset0"><span class="glyphicon glyphicon-user"></span> Contact: <?echo $email?></div>
															<?if($fax!=""):?>
																<div class="col-md-6 offset0"><span class="glyphicon glyphicon-print"></span> Fax: <?echo $email?></div>
															<?endif;?>
														</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tradeProfIn col-md-4 busPos">
									&nbsp;
								</div>
								<div class="contain">
									<h1 class="contactHead">About Us<span class="starcolor">*</span></h1>
									<div class="row-fluid">
										<!-- Image starts -->
										<div class="tradeProfTextImg col-md-12" id="profeditbtn1">
											<p id="about_contents"><?echo $about?></p>	<button type="button" class="btn btn-info pull-right" id="profeditAboutbtn">Edit</button>	
										</div>
										<div class="tradeProfTextImg col-md-12 offset0 profeditbtn1" style="display:none;" id="profeditAboutbtn_form">
											
											<textarea class="editProfBox" name="editProfBox_about" id="editProfBox_about">
													<?echo $about?>
											</textarea>	
												
											<div class="pull-right">
												<a href="javascript:CancelEdit('profeditAboutbtn_form')" class="btn editButton3">Cancel</a>
												<a href="javascript:void(0);" class="btn btn-primary editButton2" id="save_edit_about">Save</a>
											<span class="postErrors editProfBox_about"></span>
											</div>
										</div>
									</div>
									
									<h1 class="contactHead">Our Services<span class="starcolor">*</span></h1>
									<div class="row-fluid">
										<!-- Image starts -->
										<div class="tradeProfTextImg col-md-12" id="profeditbtn1">
											<p id="services_contents"><?echo $services?></p>	<button class="btn btn-info pull-right" id="profeditServicesbtn">Edit</button>	
										</div>
										<div class="tradeProfTextImg col-md-12 offset0 profeditbtn1" style="display:none;" id="profeditServicesbtn_form">	
											
											
											<textarea class="editProfBox" name="editProfBox_services" id="editProfBox_services"><?echo $services?></textarea>
												
											<div class="pull-right">
												<a href="javascript:CancelEdit('profeditServicesbtn_form')" class="btn editButton3">Cancel</a>
												<button class="btn btn-primary editButton2" id="save_edit_services">Save</button>
												<span class="postErrors editProfBox_services"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- work image upload start-->
								 <script type="text/javascript">
      
 </script> <!-- Include -->
<div id="progress_gallery" class="progress">
	<div class="progress-bar progress-bar-success"></div>
</div>
<div class="panel panel-default panel-style2">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-7">
				Work Samples
			</div>
			
			<div class="col-lg-5">
				<div class="input-group">
					<span class="input-group-btn">
						<span class="btn btn-primary btn-file">
							Select Photos <input type="file" name="files[]" id="upload_multiple" multiple>
						</span>
					</span>
					<!--<button class="btn pull-right" id="delete_selected_gallery_btn"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete Selected</button>-->
					<input type="text" readonly="" class="form-control">
				</div>
				<div class="col-lg-3">
					<a href="javascript:;" id="delete_selected_gallery_btn" class="btn btn-danger">
						<i class="fa fa-trash-o"></i>
					</a>
				</div>
			</div>
			
		</div>
	</div>
	<div class="panel-body">
		<div class="row" id="gallery_action_result">
			<!--<div id="gallery_action_result">&nbsp;</div>-->
			
			<?if($my_gallery && count($my_gallery) > 0):?>
			<?foreach($my_gallery as $k=>$v):?>
			
				
				<div class="col-lg-4 marg-btm text-center" id="li-gallery-<?echo $v->photo_id?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/uploads/gallery/<?echo $v->filename?>" alt="" class="img-responsive gallery-img"></div>
				<input type="checkbox" name="op1" id="select_from_gallery" value="<?echo $v->photo_id?>">
			<?endforeach;?>
		<?else:?>
			<p class="bg-warning">You have not uploaded work photos</p>
		<?endif;?>
			
			
		</div>
	</div>
</div>
								<!-- work image upload end-->
							
							</div>
						</div>
					</div>
					<!-- Myaccount myprofile end -->
				</div>
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfSkill" style="display:none">
					<!-- myaccount skills and trade start -->
					<div class="myAccntRightInner thumbnail">
						<div class="containNew">	<span class="postJobHead">Skills & Business</span>
							<div class="skillTradeTopTxt">Please select your core Business, Ranked by skill level.</div>
							<div class="contain">
								<div class="skilBusiness container-fluid" id="myskillstrade">
									<h1 class="skilBusinessHead">Select Your Skills & Business</h1>
									<span class="postProjErr contain alignCenter"></span>		<span class="skilBusinessCont col-md-12">						   
										    	
											<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="1">					 
												<input  type="checkbox" name="skills_trade[]" value="1" />
												Architects
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="2">					 
												<input  type="checkbox" name="skills_trade[]" value="2" />
												Basements
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="3">					 
												<input  type="checkbox" name="skills_trade[]" value="3" />
												Bathrooms
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="138">					 
												<input  type="checkbox" name="skills_trade[]" value="138" />
												Carpet and Upholstery Cleaning
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="4">					 
												<input  type="checkbox" name="skills_trade[]" value="4" />
												Concrete & Masonry
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="5">					 
												<input  type="checkbox" name="skills_trade[]" value="5" />
												Decks
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="6">					 
												<input  type="checkbox" name="skills_trade[]" value="6" />
												Dormers & Extensions
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="7">					 
												<input  type="checkbox" name="skills_trade[]" value="7" />
												Driveways
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="8">					 
												<input  type="checkbox" name="skills_trade[]" value="8" />
												Electricians
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="9">					 
												<input  type="checkbox" name="skills_trade[]" value="9" />
												Fencing
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="10">					 
												<input  type="checkbox" name="skills_trade[]" value="10" />
												Flooring Specialists
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="11">					 
												<input  type="checkbox" name="skills_trade[]" value="11" />
												Framing
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="12">					 
												<input  type="checkbox" name="skills_trade[]" value="12" />
												General Contractors
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="13">					 
												<input  type="checkbox" name="skills_trade[]" value="13" />
												Gutters
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="14">					 
												<input  type="checkbox" name="skills_trade[]" value="14" />
												Heating & Cooling
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="15">					 
												<input  type="checkbox" name="skills_trade[]" value="15" />
												Insulation
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="16">					 
												<input  type="checkbox" name="skills_trade[]" value="16" />
												Kitchens
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="17">					 
												<input  type="checkbox" name="skills_trade[]" value="17" />
												Landscaping
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="18">					 
												<input  type="checkbox" name="skills_trade[]" value="18" />
												Painters
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="19">					 
												<input  type="checkbox" name="skills_trade[]" value="19" checked="checked"/>
												Plumbing
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="20">					 
												<input  type="checkbox" name="skills_trade[]" value="20" />
												Roofing
												</label>
											</span>
									<span class="skilBusinessList col-md-4 offset0 clr">
												<label class="checkbox skilBusinessTxt" for="21">					 
												<input  type="checkbox" name="skills_trade[]" value="21" />
												Siding
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="22">					 
												<input  type="checkbox" name="skills_trade[]" value="22" />
												Sunrooms
												</label>
											</span>
									<span class="skilBusinessList col-md-4 ">
												<label class="checkbox skilBusinessTxt" for="23">					 
												<input  type="checkbox" name="skills_trade[]" value="23" />
												Windows, Doors & Skylights
												</label>
											</span>
									</span>
								</div>
							</div>
							<div class="contain alignRht">
								<input type="submit" class="btn btn-primary margTop15" value="Continue" onclick="return validateProfileMyskillsTrade();" />
							</div>
						</div>
					</div>
					<!-- skills trade end-->
				</div>
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfworkArea" style="display:none">
					<!--myaccount working area start -->
					<div class="myAccntRightInner thumbnail">
						<div class="containNew">
							<form class="form-horizontal registerControls">	<span class="postJobHead">Working Area</span>
								<div class="contain">
									<div class="skillTradeTopTxt">Your access to leads will always depend on how close they are to your postcode. Setting a working area ensures that all Contractor get access to the most relevant leads.</div>
								</div>
								<ul class="postProjUl" id="myworkarea">
									<li class="control-group marg0">
										<div class="control-label">
											<label for="business_name">Service Zipcode<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input type="text" name="service_zipcode" id="service_zipcode" value="214" class="form-control" />
											<label class="postProjErr service_zipcode"></label>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label">
											<label for="business_name">Service Miles<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<input type="text" name="service_miles" id="service_miles" value="10" class="form-control" />
											<label class="postProjErr service_miles"></label>
										</div>
									</li>
									<li>
										<div class="empty control-label">
											<label for="business_name">&nbsp;</label>
										</div>
										<div class="controls">	<a href="javascript:void(0);" onclick="viewMap();" id="view_map">Click To View Map</a>
										</div>
									</li>
									<li class="alignCenter marg0">
										<div id="map" style="width:75%;display:inline-block;height:500px;border: 1px solid #A02481;"></div>
									</li>
								</ul>
								<div class="contain alignRht">
									<input type="button" class="btn btn-primary margTop15" value="Continue" onclick="return validateProfileMyWorkArea();" />
								</div>
							</form>
						</div>
					</div>
					<!-- working area end -->
				</div>
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfInsurance" style="display:none">
					<!-- view Insurance details on myaccount-->
					<div class="myAccntRightInner thumbnail" id="existredeails">
						<div class="containNew">
							<form class="form-horizontal registerControls marg0">
								<div class="contain" id="insurancereg">
									<div class="contain">	<span class="postJobHead">Liability Insurance</span>
										<div class="contain">
											<div class="skillTradeTopTxt">We ask for customer references to help us to decide if you're suitable for Services Quotes. Reference comments are also added to your profile as feedback, which will help you get started on Services Quotes.</div>
											
										</div>
										<div class="contain alignRht">
											<input type="button" class="btn btn-primary margTop15" id="addnewinsurance" value="Add New" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--myaccount Insurance details add  start-->
					<div class="myAccntRightInner thumbnail" id="addinsdetails" style="display:none;">
						<div class="containNew" id="insurancereg">
							<div class="contain">
								<form class="form-horizontal registerControls marg0" name="conInsedit" action="" method="post" enctype="multipart/form-data" onsubmit="return insuranceValidation();">
									<input type="hidden" name="action" value="myaccountInsEdit" />	<span class="postJobHead">Liability Insurance</span>
									<div class="contain">
										<div class="skillTradeTopTxt">You need to have public liability insurance in order to joinJustmail.If you don't have insurance, you should contact a reputable provider who can arrange suitable cover for your business. When you have insurance, return to your MyBuilder application and submit details of your policy.</div>
									</div>
									<h1 class="contactHead">Insurance Policy Details</h1>
									<ul class="postProjUl">
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Insured Name<span class="starcolor">*</span>
												</label>	<span class="example">Full business name as shown on your insurance policy. If sole Business or self-employed then enter your full name.</span>	
											</div>
											<div class="controls">
												<input type="text" class="form-control" id="insuredname" name="insuredname" value="" />
												<label class="postProjErr insuredname"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Business Name (if applicable)</label>
											</div>
											<div class="controls">
												<input type="text" class="form-control" id="tradingname" name="tradingname" value="" />
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Insurer<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" class="form-control" id="insurer" name="insurer" value="" />
												<label class="postProjErr insurer"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Policy Number<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" class="form-control" id="policyno" name="policyno" value="" />
												<label class="postProjErr policyno"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Starts At<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" class="datedelivery_date_ord dateBox" name="ins_date_from" id="ins_date_from" />
												<label class="postProjErr ins_date_from clr"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Expires At<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<input type="text" class="dateoffuture dateBox" name="ins_date_to" id="ins_date_to" />
												<label class="postProjErr ins_date_to clr"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Insurance Coverage Policy<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<select class="selectpicker" id="insurance_cover_policy" name="insurance_cover_policy">
													<option>Please Select</option>
													<option value="100,000 - 250,000">$100,000 - $250,000</option>
													<option value="250,000 - 500,000">$250,000 - $500,000</option>
													<option value="500,000 - 1,000,000">$500,000 - $1,000,000</option>
													<option value="1,000,000 - 2,000,000">$1,000,000 - $2,000,000</option>
												</select>
												<label class="postProjErr insurance_cover_policy"></label>
											</div>
										</li>
										<li class="control-group">
											<div class="control-label">
												<label for="business_name">Work Comp?<span class="starcolor">*</span>
												</label>
											</div>
											<div class="controls">
												<label class="checkbox pull-left" for="webYes">
													<input type="radio" name="work_comp" id="work_comp_yes" value="yes" onclick="display_websitetxt(this.id)" />Yes</label>
												<label class="checkbox pull-left padTop5" for="webNo">
													<input type="radio" name="work_comp" id="work_comp_no" value="no" onclick="display_websitetxt(this.id)" />No</label>
												<label class="postProjErr work_comp clr"></label>
											</div>
										</li>
									</ul>
									<div class="containNew">
										<h1 class="contactHead">Upload Files</h1>
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Upload your insurance schedule (accepted formats PDF or image)&nbsp;:&nbsp;</label>
												</div>
												<div class="controls">
													<input type="file" id="insdocument" name="insdocument" value="" size="1" class="flt margin5" />
													<label class="postProjErr insdocument"></label>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label empty">
													<label>&nbsp;</label>
												</div>
												<div class="controls">
													<input type="submit" class="btn btn-primary margTop5" value="Continue" />
												</div>
											</li>
										</ul>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- insurance details add end -->
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="myProfReference" style="display:none">
					<!-- Reference add and view start -->
					<div class="myAccntRightInner thumbnail">
						<div class="containNew">
							<div class="contain" id="referenceheadpart">	<span class="postJobHead">References</span>
								<div class="skillTradeTopTxt">We ask for customer references to help us to decide if you're suitable forReference comments are also added to your profile as feedback, which will help you get started on Business. Simply provide us with information about two of your previous customers. We'll contact them to obtain their comments and to verify that your referees are genuine. Justmail.Reference comments are also added to your profile as feedback, which will help you get started on Business. Simply provide us with information about two of your previous customers. We'll contact them to obtain their comments and to verify that your referees are genuine.</div>
								<div class="skillTradeTopTxt">	<b>Important:</b>
									Make sure that your referees are willing to participate. Otherwise we can't process your application.</div>
							</div>
							<div class="pull-right">
								<input type="button" class="but_delete btn btn-danger deleteBg" value="Delete" style="display:none;" onclick="return deleteReference_new();" />
								<input type="button" class="but_getReview btn btn-warning reviewBg" value="Get Reviews" style="display:none;" onclick="return getReviews();" />	<a class="btn btn-primary" href="javascript:void(0);" onclick="return displayReferenceTab();">Add New</a>
							</div>
							<div id="doublescroll">
								<table width="100%" border="0" cellpadding="10" class="memberShipTable newLeadDashTable">
									<thead>
										<tr valign="top">
											<th>
												<input type="checkbox" id="selectall" onclick="selectDeselectAll();" />
											</th>
											<th>S.No</th>
											<th>Customer Name</th>
											<th>Lead Category</th>
											<th>Email ID</th>
											<th>Phone No</th>
										</tr>
									</thead>
									<tr>
										<td colspan="10">There are no References in this list.</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="contain" id="referencereg" style="display:none;">
							<form class="form-horizontal registerControls marg0" name="contractorRef" method="post" action="">
								<input type="hidden" name="userid" id="userid" value="58" />
								<div class="containNew">	<span class="postJobHead">References</span>
									<div class="contain">
										<div class="skillTradeTopTxt">We ask for customer references to help us to decide if you're suitable forReference comments are also added to your profile as feedback, which will help you get started on Business. Simply provide us with information about two of your previous customers. We'll contact them to obtain their comments and to verify that your referees are genuine. Justmail.Reference comments are also added to your profile as feedback, which will help you get started on Business. Simply provide us with information about two of your previous customers. We'll contact them to obtain their comments and to verify that your referees are genuine.</div>
										<div class="skillTradeTopTxt">	<b>Important:</b>
											Make sure that your referees are willing to participate. Otherwise we can't process your application.</div>
									</div>
									<div class="contain">
										<h1 class="contactHead">Previous Client Details</h1>
										<div class="skillTradeTopTxt">Please ensure that your referee is expecting an email or call from Justmail.and that all of their details are correct. None of the details you provide here will be publicly displayed.</div>
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Customer Name<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" class="form-control" id="ref_cusname" name="ref_cusname" value="" />
													<label class="postProjErr ref_cusname"></label>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Customer Email<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" class="form-control" id="ref_cusemail" name="ref_cusemail" value="" />
													<label class="postProjErr ref_cusemail"></label>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Customer Phone<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" class="form-control" id="ref_cusphone" name="ref_cusphone" maxlength="10" value="" />
													<label class="postProjErr ref_cusphone"></label>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Customer Phone Alternative</label>
												</div>
												<div class="controls">
													<input type="text" class="form-control" id="ref_cusalterphone" name="ref_cusalterphone" maxlength="10" value="" />
												</div>
											</li>
										</ul>
									</div>
									<div class="contain">
										<h1 class="contactHead">Project Details</h1>
										<div class="skillTradeTopTxt">Please provide some information about the work carried out for this client.</div>
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Select a Business that best describes the work<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<select class="selectpicker" id="ref_besttrad" name="ref_besttrad">
														<option>Please Select</option>
														<option value="1">Architects</option>
														<option value="2">Basements</option>
														<option value="3">Bathrooms</option>
														<option value="138">Carpet and Upholstery Cleaning</option>
														<option value="4">Concrete & Masonry</option>
														<option value="5">Decks</option>
														<option value="6">Dormers & Extensions</option>
														<option value="7">Driveways</option>
														<option value="8">Electricians</option>
														<option value="9">Fencing</option>
														<option value="10">Flooring Specialists</option>
														<option value="11">Framing</option>
														<option value="12">General Contractors</option>
														<option value="13">Gutters</option>
														<option value="14">Heating & Cooling</option>
														<option value="15">Insulation</option>
														<option value="16">Kitchens</option>
														<option value="17">Landscaping</option>
														<option value="18">Painters</option>
														<option value="19">Plumbing</option>
														<option value="20">Roofing</option>
														<option value="21">Siding</option>
														<option value="22">Sunrooms</option>
														<option value="23">Windows, Doors & Skylights</option>
													</select>
													<label class="postProjErr ref_besttrad"></label>
												</div>
											</li>
											<li>	<span class="skillTradeTopTxt">We only accept references for Business that you have selected and ranked.</span>
											</li>
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">Please describe the work you carried out<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<textarea class="txt3" id="ref_workdesc" name="ref_workdesc"></textarea>
													<label class="postProjErr ref_workdesc"></label>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label">
													<label for="business_name">When was the work carried out?<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="text" class="form-control" id="ref_worktimecarry" name="ref_worktimecarry" value="" />
													<label class="postProjErr ref_worktimecarry"></label>
												</div>
											</li>
											<li>	<span class="skillTradeTopTxt">The project should have taken place in the last 12 months.</span>
											</li>
										</ul>
									</div>
									<div class="contain">
										<h1 class="contactHead warnColor">Warning</h1>
										<div class="skillTradeTopTxt">We verify references in a number of ways to ensure they are genuine and have been submitted by the actual customer. Your account may be closed if your references fail our checks.</div>
									</div>
									<ul class="postProjUl">
										<li class="control-group">
											<div class="empty control-label">
												<label for="business_name">&nbsp;</label>
											</div>
											<div class="controls">
												<input type="submit" class="btn btn-primary margTop15" id="addnewrefference" onclick="return referencesValidation();" value="Submit" />
											</div>
										</li>
									</ul>
								</div>
							</form>
						</div>
						<!-- Refference end-->
					</div>
				</div>
			</div>
			<!--------------------------------Reference part started -------------------------------------->
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