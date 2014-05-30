<?php $this->renderPartial('navigation',$param); ?>
<div class="container">
	<ul class="subul offset0" id="myjobssub">
		<li>
			<a href="http://www.justmail.in/platinum/contractor_myproject" class="active">	<span class="relative">
					New Projects 
									</span>
			</a>
		</li>
		<li>	<a href="http://www.justmail.in/platinum/purchased_projects"><span class="relative">Purchased Projects </span></a> 
		</li>
		<li>	<a href="http://www.justmail.in/platinum/won_projects"><span class="relative">Won Projects </span></a>
		</li>
	</ul>
	<div class="row-fluid margTop15 margBot20 ">
		<div class="myAccntRight col-md-12">
			<!-- myaccount customer contact details start -->
			<div class="myAccntRightInner thumbnail headTabMyAccount">
				<div id="newleads" class="containNew">	<span class="postJobHead">New Projects</span>
					<span class="membershiperror"></span>
					<div id="doublescroll">
						<table class="memberShipTable newLeadDashTable" cellpadding="0" cellspacing="0" border="0">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Lead ID</th>
									<th>Business</th>
									<th>Post Code</th>
									<th>Last Activity</th>
									<th>Membership</th>
									<th>Lead Price</th>
									<th>View</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="8">There are no Projects in this list.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- view the new leads project details -->
				<div id="singleprodetails" style="display:none;"></div>
			</div>
			<!-- new lead end -->
		</div>
	</div>
</div>