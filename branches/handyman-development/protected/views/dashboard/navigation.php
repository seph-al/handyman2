<div class="container"></div>
	<div class="navbarMenus">
		<div class="container">
			<div class="row-fluid">
				<div class="myAccntLeft">
					<div class="myAccntLeftInner">
						<div class="contain">
							<ul class="myAccntLeftUl marg0">
								<li>	<a class="<?echo $pages == 'dashboard' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/contractor" >Dashboard</a>
								</li>
								
								<li>
									<a class="<?echo $pages == 'inbox' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-inbox" >My Inbox</a>
								</li>
								
								<li><a class="<?echo $pages == 'profile' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-profile">My Profile</a>
								</li>
								<li>	<a class="<?echo $pages == 'account' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-account">My Account</a>
								</li>
								<!--<li><a class="<?echo $pages == 'reviews' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-reviews">My Reviews</a>
								</li>-->
								<li><a class="<?echo $pages == 'questions' ? 'active':''?>" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-questions">My Questions</a>
								</li>
								<!--<li><a href="http://www.justmail.in/platinum/contractor_reviews">My Reviews</a>
								</li>
								<li class="last">
									<a href="http://www.justmail.in/platinum/contractor-myquestions">	<span class="relative dispInBlock">Question & Answer
																				<span class="cmdNotifierinboxImgView unreadmsg">2</span>
										</span>
									</a>
								</li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>