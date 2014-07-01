<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
   <?php else:?>
   <?php $this->renderPartial('../dashboard/homeownernav',array('pages'=>'')); ?>
<?php endif?>

<div class="container">
	<br />
	<div class="row">
		<div class="col-md-1">
			&nbsp;
		</div>
		<div class="col-md-10" style="width:100%">	
		<?if(Yii::app()->user->role == 'contractor'):?>
				<ul class="nav nav-tabs" id="myTab">
				  <li class="active"><a href="#referral" data-toggle="tab">Referral Program</a></li>
				  <li><a href="#widgets" data-toggle="tab">Widgets</a></li>
				</ul>

				<div class="tab-content">
				
					 <div class="tab-pane active" id="referral">
								   <div class="row-fluid margTop15 margBot20">
									<div class="myAccntRight col-md-12">
										<iframe src="<?php echo $url?>" width="100%" height="1300px" frameborder="0"></iframe>
									</div>
								</div>
					  </div>
					 
					 <div class="tab-pane" id="widgets">
							
								<div class="row">
									<br />
									<div class="col-lg-10 col-lg-offset-1">
										<div class="row">
											<h3>1. Find Handyman by Zipcode</h3>
											<div class="col-lg-4">
												<script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?username=<?echo $username?>"></script>
											</div>
											<div class="col-lg-8">


<b>by contractor username:	</b>										
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?username=<?echo $username?>"></script></textarea>										
<br />
<b>by contractor affiliate ID:</b>
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?aff_id=http://referrals.contrib.com/idevaffiliate.php?id=<?echo $aff_id?>&url=http://handyman.com"></script></script></textarea>
											</div>
										</div>
									</div>
									<br />
									<div class="col-lg-10 col-lg-offset-1">
										<div class="row">
											<h3>2. Find Handyman Horizontal Widget</h3>
												<script type="text/javascript" src="http://handyman.com/widgets/searchhorizontal?username=<?echo $username?>"></script>
											<br /><br />
<b>by contractor username:	</b>										
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="1" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/searchhorizontal?username=<?echo $username?>"></script></textarea>
<br />
<b>by contractor affiliate ID:</b>
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/affiliatehorizontalsearch?aff_id=http://referrals.contrib.com/idevaffiliate.php?id=<?echo $aff_id?>&url=http://handyman.com"></script></textarea>

<br />
<br />											
										</div>
									</div>
									
								</div>
							
					  </div>
				  
				</div>
		<?endif;?>
		</div>
		<div class="col-md-1">
			&nbsp;
		</div>
	</div><!-- row -->
</div>