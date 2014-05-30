<div class="container">
	<form name="membership" method="post" action="">
		<input type="hidden" name="action" value="registerMembership" />
		<input type="hidden" name="pacakageid" id="pacakageid" value="" />
		<input type="hidden" name="plan" id="plan" value="" />
	</form>
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="myAccntRightInner thumbnail">
				<div class="containNew">
					<div class="projBanner bdrNone relative" style="margin-top:0;">
						<ul class="postProjUl registerControls form-horizontal offset1">
							<li class="control-group marg0">
								<div class="control-label" style="float:left; margin-right:40px;">
									<label for="" class="bold">Select Your Membership</label>
								</div>
								<div class="radio" style="float:left; margin-right:20px;">
								  <label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									Pay Per Lead
								  </label>
								</div>
								<div class="radio" style="float:left; margin-right:20px;">
								  <label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option1" checked>
									Package Lead
								  </label>
								</div>
								<div style="clear:both;"></div>
							</li>
						</ul>	
					</div>
					<div id="payper_info">
						<div class="membershipHeadBox">
							<div class="payper_info">
								<form class="contain margTop5" name="myacctmember" method="post" action="">
									<input type="hidden" name="selpack" id="selpack" value="" />
									<input type="hidden" name="action" id="action" value="acctpay" />
									<div id="doublescroll">
										<table class="memberShipTable memberShipHighLight margTop0" cellpadding="0" cellspacing="0" border="0">
											<thead>
												<tr>
													<th>S.No</th>
													<th>Category Name</th>
													<th>PayPer Lead Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Architects</td>
													<td>$ 5.00</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Basements</td>
													<td>$ 3.00</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Bathrooms</td>
													<td>$ 2.00</td>
												</tr>
												<tr>
													<td>4</td>
													<td>Concrete & Masonry</td>
													<td>$ 30.00</td>
												</tr>
												<tr>
													<td>5</td>
													<td>Decks</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>6</td>
													<td>Dormers & Extensions</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>7</td>
													<td>Driveways</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>8</td>
													<td>Electricians</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>9</td>
													<td>Fencing</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>10</td>
													<td>Flooring Specialists</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>11</td>
													<td>Framing</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>12</td>
													<td>General Contractors</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>13</td>
													<td>Gutters</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>14</td>
													<td>Heating & Cooling</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>15</td>
													<td>Insulation</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>16</td>
													<td>Kitchens</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>17</td>
													<td>Landscaping</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>18</td>
													<td>Painters</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>19</td>
													<td>Plumbing</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>20</td>
													<td>Roofing</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>21</td>
													<td>Siding</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>22</td>
													<td>Sunrooms</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>23</td>
													<td>Windows, Doors & Skylights</td>
													<td>$ 25.00</td>
												</tr>
												<tr>
													<td>24</td>
													<td>Carpet and Upholstery Cleaning</td>
													<td>$ 1.00</td>
												</tr>
											</tbody>
										</table>
										<br>
										<input class="btn btn-primary pull-right margTop15 tostep2" type="button" onclick="window.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step2')" value="CONTINUE" />
									</div>
								</form>
							</div>
						</div>
					</div>
					
					<!-- Package Lead -->					
					<div id="package_membership_info">
						<div class="membershipHeadBox container-fluid">	<span class="contain alignCenter">
							<span class="contain alignCenter membershipPageHead">Membership  /  Prices</span>
							<span class="contain alignCenter membershipPageSub">Select Your Package and Start Receiving Leads Today!</span>
							<div id="package_info" class="margTop10 margBot10">This is a payper lead Membership.If you are selected Membership as a PayperLead then you can buy a leads by Pay the leads.You can access more leads.This is a payper lead Membership.If you are selected Membership as a PayperLead then you can buy a leads by Pay the leads.You can access more leads.This is a payper lead Membership.</div>
							</span>
							<div class="memTxtBox">
								<div class="membershipLeft2">
									<div class="packageHd">Silver	<span class="membershipPrice">
										<span class="fltNone">
											<span class="dollarSym">&nbsp;$</span>&nbsp;0.01</span>
										</span>
										<div class="memberBtnOuter pull-right">
											<input type="button" class="memberBtn memberBtn2 tostep2" onclick="window.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step2')" value="SELECT PLAN" />
										</div>
									</div>
									<div class="packageDesc">this is silver package u have receive 5 leads per month</div>
								</div>
							</div>
							<div class="memTxtBox">
								<div class="membershipLeft2">
									<div class="packageHd">Gold	<span class="membershipPrice">
										<span class="fltNone">
											<span class="dollarSym">&nbsp;$</span>&nbsp;0.02</span>
										</span>
										<div class="memberBtnOuter pull-right">
											<input type="button" class="memberBtn memberBtn2 tostep2" onclick="window.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step2')" value="SELECT PLAN" />
										</div>
									</div>
									<div class="packageDesc">this is Gold package. u have receive monthly 10 leads. and u have to pay 20 per month</div>
								</div>
							</div>
							<div class="memTxtBox">
								<div class="membershipLeft2">
									<div class="packageHd">Platinum	<span class="membershipPrice">
										<span class="fltNone">
											<span class="dollarSym">&nbsp;$</span>&nbsp;0.03</span>
										</span>
										<div class="memberBtnOuter pull-right">
											<input type="button" class="memberBtn memberBtn2 tostep2" onclick="window.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step2')" value="SELECT PLAN" />
										</div>
									</div>
									<div class="packageDesc">this is platinum package. u have to receive 20 leads per month. and pay 25 per month</div>
								</div>
							</div>
							<div class="memTxtBox">
								<div class="membershipLeft2">
									<div class="packageHd">Bronze	<span class="membershipPrice">
										<span class="fltNone">
											<span class="dollarSym">&nbsp;$</span>&nbsp;9.00</span>
										</span>
										<div class="memberBtnOuter pull-right">
											<input type="button" class="memberBtn memberBtn2 tostep2" onclick="window.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/consignup/consignup-step2')" value="SELECT PLAN" />
										</div>
									</div>
									<div class="packageDesc">Buy 10 leads</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#package_membership_info').hide();

		$('input[type="radio"][id="optionsRadios1"]').change(function() {
			$('#package_membership_info').show();
			$('#payper_info').hide();
		});
		
		$('input[type="radio"][id="optionsRadios2"]').change(function() {
			$('#payper_info').show();
			$('#package_membership_info').hide();
		});
		
	});
</script>