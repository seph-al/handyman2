<?php
	$total_results = count($contractors);
	if($home_advisor_results){
		$total_results = count($home_advisor_results) + $total_results;
	}
?>

<div class="contMatched">	
	<span class="contain contMatchedTxt1"><?echo $total_results?> Contractor<?echo $total_results > 1 ? 's':''?> Matched</span>
	<p><?echo $title?></p>
</div>

<?if($home_advisor_results !== false && count($home_advisor_results) > 0):?>
									<div class="alert alert-info"><h4><?echo count($home_advisor_results)?> Home Advisor Match<?echo count($home_advisor_results) > 1 ? 'es':''?></h4></div>
									
									<?foreach($home_advisor_results AS $ha):?>
										<div class="findJobInner1 relative">
											<div class="findJobHead row-fluid">
												<div class="pull-left">
													<a target="_blank" href="http://www.homeadvisor.com<?echo $ha['smUrl']?>"><?echo $ha['companyName']?></a>
												</div>
											</div>
											<div class="tradePad">	
											   <span class="contain">
																<span class="feedbackRev">Rating: <?echo $ha['compositeRating']?></span>
												</span>
												<p class="tradePara2"><?echo $ha['companyOverview']?></p>
												<div class="clr"></div>
											</div>
											<div class="contain alignCenter margTop10">	
												<a class="InviteJob viewProfNew" target="_blank" href="http://www.homeadvisor.com<?echo $ha['smUrl']?>">
																View Profile
															</a>
											</div>	<span class="separatorCircle"></span>
										</div>
										
										
									<?endforeach;?>
								<?endif;?>

<div class="alert alert-info"><h4><?echo count($contractors)?> Handyman Match<?echo count($contractors) > 1 ? 'es':''?></h4></div>
							<?php foreach($contractors as $model): ?>
							
							<div class="findJobInner1 relative">
								<div class="findJobHead row-fluid">
									<div class="pull-left">	<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $model->Username?>"><?php echo $model->Name;?></a>
									</div>	<span class="col-md-4">
											&nbsp;		
									</span>
									
								</div>
								<div class="tradePad">	
								   <span class="contain">
													<span class="feedbackRev"><?php echo $model->Address1?></span>
									</span>
									<p class="tradePara2"><?php echo $model->AboutBusiness?></p>
									<div class="clr"></div>
								</div>
								<div class="contain alignCenter margTop10">	
									<a class="InviteJob viewProfNew" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $model->Username?>">
													View Profile
												</a>
								</div>	<span class="separatorCircle"></span>
							</div>
							<?php endforeach; ?>