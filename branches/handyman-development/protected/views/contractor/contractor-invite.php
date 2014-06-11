<?php
	//invite handyman in team
?>
<?php $this->renderPartial('/dashboard/navigation',array('pages'=>'profile')); ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/contractor-invite.css" />
<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="invite-page">
						<h1>Invitation</h1>
						<div class="invite-box">
							<div class="container">
								<div class="row">
										<p href="" class="inv-title">Invite To Your Team And Into Handyman.com Network</p>
										<p>
										  <a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/refer">
											  <button type="button" class="btn btn-danger btn-lg btn-block">
											  <img src="http://www.iconsdb.com/icons/preview/white/worker-xl.png">
											  <span class="btitle">Contractor Into Your Team</span>
											  </button>
										  </a>
										</p>										
										<p>
										  <a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/inviteteam">
										  <button type="button" class="btn btn-danger btn-lg btn-block">
										  <img src="http://www.iconsdb.com/icons/preview/white/database-xl.png">
										  <span class="btitle">HandyMan Database</span>
										  </button>
										  </a>
										</p>
										<p>
										  <a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/refer">
										  <button type="button" class="btn btn-danger btn-lg btn-block">
										  <img src="http://www.iconsdb.com/icons/preview/white/collaborator-xl.png">
										  <span class="btitle">Homeowner</span>
										  </button>
										  </a>
										</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>

<!-- div class="container" style="margin:50px 80px 200px; 0px;">
	<div class="row">
		<div class="col-md-4">
		<ul class="nav nav-pills nav-stacked">
		  <li class="active"><a href="#to_team" data-toggle="tab">Contractor Into <br>Your Team</a></li>
		  <li><a href="#db" data-toggle="tab">Handyman Database</a></li>
		  <li><a href="#ho" data-toggle="tab">Homeowner</a></li>
		</ul>
		</div>
		
		<div class="col-md-8">
			
			<div class="tab-content">
			  <div class="tab-pane fade in active" id="to_team">
				<h1>Send Invite to your contractor friends</h1>
					<p class="bg-warning">Send this URL to your favorite social sites or send it by email: </p>
					<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" style="width:80%">
						http://handyman.com/<?echo $details->Username?>
					</textarea>
			  </div>
			  <div class="tab-pane fade" id="db"><h1>Select from Handyman members</h1></div>
			  <div class="tab-pane fade" id="ho"><h1>Invite homeowners you know</h1></div>
			 </div>
		 </div>
	</div>
</div> -->