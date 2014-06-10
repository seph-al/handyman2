<?php $this->renderPartial('/dashboard/navigation',array('pages'=>'profile')); ?>
<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="invite-page">
						
						<div class="invite-box">
							<div class="container">
								<div class="row">
									<br>
									
									<ol class="breadcrumb">
										<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/contractor">Dashboard</a></li>
										<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/invite">Invite</a></li>
										<li class="active">Send Referral</li>
									</ol>
									
									<br>
									<div class="col-md-8 text-center">	
										<ul class="nav nav-tabs">
										  <li class="active"><a href="#to_team" data-toggle="tab">Contractor</a></li>
										</ul>
											
											<div class="tab-content">
											  <div class="tab-pane active" id="to_team">
												<h1>Send Invite to your contractor friends</h1>
													<p class="bg-warning">Send this URL to your favorite social sites or send it by email: </p>
													<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" style="width:80%">http://handyman.com/refer/<?echo $username?></textarea>
											  </div>
											  
											 </div><!-- tab-content -->
									</div>
									
									<br><br>
										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
</div>