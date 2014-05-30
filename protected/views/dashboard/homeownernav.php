	<div class="navbarMenus">
		<div class="container">
			<div class="row-fluid">
				<div class="myAccntLeft">
					<div class="myAccntLeftInner">
						<div class="contain">
							<ul class="myAccntLeftUl marg0">
								<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/home-owner" <?php
									if($pages == "homeOwner"){
										echo "class = 'active'";
									}
								?>><span class="relative dispInBlock">Dashboard</span></a></li>
								<!--<li><a href="<?//php echo Yii::app()->request->baseUrl; ?>/dashboard/refer-home-owner">Refer a Home Owner</a></li>-->
								
								<li class="last"><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/homeowner-account" <?php
									if($pages == "homeOwnerAccount"){
										echo "class = 'active'";
									}
								?>>My Account</a></li>
		
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post">Post A New Project</a></li>
		<li><a href="/dashboard/my-inbox"><span class="relative">My Inbox</span></span></a></li>
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-questions" <?php
									if($pages == "askContractor"){
										echo "class = 'active'";
									}
								?>><span class="relative dispInBlock" id="quscounthide">My Questions </span></a></li>
								<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find" <?php
									if($pages == "homeOwner"){
										echo "class = 'active'";
									}
								?>><span class="relative dispInBlock">Find Contractors</span></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--myaccount left side end -->