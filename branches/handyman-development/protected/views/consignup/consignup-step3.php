<div class="container">
	<div class="row-fluid margTop20 margBot20">
		<div class="findJobLeft col-md-8">
			<div class="skillsTradeLeft containNew thumbnail">
				<form class="form-horizontal registerControls marg0" name="workareaform" action="<?echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step4" method="post">
					<input type="hidden" id="action" name="action" value="registerWorkArea" />	<span class="postJobHead">Step 3: Working Area</span>
					<div class="skillTradeTopTxt">Your access to leads will always depend on how close they are to your postcode. Setting a working area ensures that all Contractor get access to the most relevant leads.</div>
					<ul class="postProjUl margBot0">
						<li class="control-group marg0">
							<div class="control-label">
								<label for="business_name">Service Zipcode<span class="starcolor">*</span>
								</label>
							</div>
							<div class="controls">
								<input type="text" name="service_zipcode" id="service_zipcode" value="1230" class="form-control widthAuto" />
								<label class="postProjErr service_zipcode"></label>
							</div>
						</li>
						<li class="control-group">
							<div class="control-label">
								<label for="business_name">Service Miles<span class="starcolor">*</span>
								</label>
							</div>
							<div class="controls">
								<input type="text" name="service_miles" id="service_miles" value="0" class="form-control widthAuto" />
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
							<div id="map" style="width:95%;display:inline-block;height:500px;border: 1px solid #CCCCCC;"></div>
						</li>
					</ul>
					<div class="contain alignRht">
						<input type="submit" class="btn btn-primary margTop15" value="Continue" />
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
						<a href="">
							<div class="no">1</div>
							<div class="tick">	<span class="tradeProcessHead">Membership Quote</span>
								<span class="tradeProcessDetail" id="sub3" style="display:none;">Your quarterly package and lead guarantee.</span>
							</div>
						</a>
					</li>
					<li>
						<a href="">
							<div class="no">2</div>
							<div class="tick">	<span class="tradeProcessHead">Skills & Business</span>
								<span class="tradeProcessDetail" style="display:none;">Select and prioritise the type of leads you want.</span>
							</div>
						</a>
					</li>
					<li>
						<a class="active">
							<div class="no">3</div>
							<div class="tick">	<span class="tradeProcessHead">Working Area</span>
								<span class="tradeProcessDetail " style="display:block;">Choose where and how far you would like to travel for work.</span>
							</div>
						</a>
					</li>
					<li>
						<a>
							<div class="no">4</div>
							<div class="detail" style="cursor:pointer;" onclick="return showToggleSubMsg(4)">	<span class="tradeProcessHead">Contact Details</span>
								<span class="tradeProcessDetail " id="sub4" style="display:none;">Tell us who you are and how we can contact you.</span>
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