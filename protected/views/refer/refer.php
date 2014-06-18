	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">	
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/refer-page.css">
      <div class="wrap-profile-info refer-page">			
			<!-- -->
			<div class="header-bckgrnd">
				<div class="wrap-sub-bckgrnd">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-1 col-xs-3">
										 <img class="img-circle img-polaroid" src="<?echo $logo == '' ? 'http://rdbuploads.s3.amazonaws.com/icons/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$logo?>">
									</div>
									<div class="col-lg-11 col-xs-9"> <span class="name">
												<?php echo $profile->Name?>                               </span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<ul class="list-inline ul-profile">
											<li> <i class="fa fa-bar-chart-o"></i> Address: <?php echo $profile->Address1?>,<?php echo $profile->City?>, <?php echo $profile->State?> <?php echo $profile->Zip?></li>
											<li> <i class="fa fa-check"></i> Mobile: <?php echo $profile->Phone?></li>
											<li> <i class="fa fa-calendar"></i> Email: <?php echo $profile->Email?></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="profile-overlay">
									<div class="top-overlay">
										<!--<a href="#reviews" class="btn btn-warning btn-lg btn-block">REVIEWS</a>
											<a href="" class="btn btn-info btn-lg btn-block">CONTACT US</a>-->	<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $profile->Username?>" class="btn btn-success btn-lg btn-block">VIEW PUBLIC PROFILE</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- -->
			<div class="container">
				<div class="row">				
					<div class="col-lg-6">
						
														<!-- Nav tabs -->
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#find-a-handyman" data-toggle="tab">Find A Handyman</a></li>
							  <li><a href="#get-our-badges" data-toggle="tab">Get Our Badges</a></li>
							  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post?refer=<?php echo $profile->Username?>">Post Your Project</a></li>
							 
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="find-a-handyman">
								
								<form class="form-inline form-tabs" id="search-form">
										<br>
									  <div class="form-group">
									<select class="form-control" name="projecttype" id="projecttype">
									  <option value="">Select Project Type</option>
										<?foreach($projecttype AS $k=>$v):?>
											<option value="<?echo $v->ProjectTypeId?>"><?echo $v->Name?></option>
										<?endforeach;?>
									  </select>
									</div>
									  <div class="form-group">
									<input type="text" class="form-control" placeholder="zipcode" id="zipcode" value="<?echo $zipcode?>">
									</div>
									  <div class="form-group">
										<button class="btn btn-default" id="search-form-btn" type="button">Search</button>
									</div>
								</form>
								
								<br>
								
								<div id="find-result"></div>
								
							  </div>
							  <div class="tab-pane" id="get-our-badges">
								<?$this->renderPartial('refer-badges',array('base_url'=> Yii::app()->request->baseUrl ,'username' => $profile->Username))?>
							  </div>
							  <div class="tab-pane" id="post-your-project">
									<div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; In production</div>	
							  </div>
							  
							</div><!-- tab-content -->
													
						
					</div><!-- col-lg-9 -->
					
					
						
					<div class="col-lg-3">
					
										<div class="signup-col">
											<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/signup?refer=<?php echo $profile->Username?>" class="inv-signup"><img src="http://www.iconsdb.com/icons/preview/white/worker-xl.png">Signup As A Contractor</a>
											<a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post?refer=<?php echo $profile->Username?>" class="inv-signup"><img src="http://www.iconsdb.com/icons/preview/white/collaborator-xl.png">Signup As A Homeowner</a>
										</div>
						
						<div class="panel panel-default panel-style1">
											<div class="panel-heading">About the Contractor</div>
											<div class="panel-body" id="profeditbtn1">
												<div id="about_content">
												<?php $string = (strlen($profile->AboutBusiness) > 250) ? substr($profile->AboutBusiness,0,250).'...&nbsp;<a href="">read more</a>' : $profile->AboutBusiness;?>
												<?php echo $string;?>
												</div>
											</div>
											 <div class="panel-heading">Services</div>
											<div class="panel-body" id="profeditbtn1">
												 <div id="about_content">
												 <?php $string = (strlen($profile->Services) > 250) ? substr($profile->Services,0,250).'...&nbsp;<a href="">read more</a>' : $profile->Services;?>
												<?php echo $string;?>
												 </div>
											</div>
						</div>
					</div><!-- col-lg-9 -->
					
					<div id="credentials" class="col-lg-3">
						<div class="panel panel-default panel-style1 back-1">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">	<span class="wrap-number-rank">
					<span class="number-rank text-center ">
						<?php echo $profile->updatePoints($profile->ContractorId)?>					</span>
										</span>
									</div>
									<div class="col-lg-8">	<span class="meta-handyman">HANDYMAN</span>
										<span class="meta-points">POINTS</span>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default panel-style1">
							<div class="panel-heading">Key Business Information</div>
							<ul class="list-group">
							  <?php if (count($socials)>0):?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-lg-12">
											<ul class="list-unstyled ul-info">
											   <?php foreach ($socials as $sk=>$sv):?>
												<li><?php echo $sv->social->social?>: <strong><a href="<?php echo $sv->value?>"><?php echo $sv->value?></a></strong>
												</li>
											   <?php endforeach;?>	
												
											</ul>
										</div>
									</div>
								</li>
								<?php endif?>
								 <?php if (count($bonds)>0):?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-lg-12">
											<ul class="list-unstyled ul-info">
												<li>Bonded Agent: <strong><?php echo $bonds->bond_agent?></strong>
												</li>
												<li>Bond Value: <strong><?php echo $bonds->bond_value?></strong>
												</li>
												<li>Info: <strong><?php echo $bonds->info?></strong>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<?php endif?>
								 <?php if (count($license)>0):?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-lg-12">
											<ul class="list-unstyled ul-info">
												<li>License Number: <strong><?php echo $license->license_no?></strong>
												</li>
												<li>Status: <strong><?php echo $license->status?></strong>
												</li>
												<li>Type: <strong><?php echo $license->type?></strong>
												</li>
												<li>Date Issues: <strong><?php echo $license->date_issued?></strong>
												</li>
												<li>Info: <strong><?php echo $license->info?></strong>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<?php endif?>
							</ul>
						</div>
						
						
						
						
					</div>
				</div>
			</div>
		</div>

<style>
.form-tabs .form-control {
    width: 238px;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search-form-btn').click(function(){
			var zipcode = $('#zipcode').val();
			var projecttype = $('#projecttype').val();
			
					$('#find-result').html('<p class="text-center alert-warning"><span class="glyphicon glyphicon-refresh"></span>loading results..</p>');
					$.post('/widgets/searchcontractor',{zipcode:zipcode,projecttype:projecttype},function(data_html){
						$('#find-result').html(data_html);
					});
			
			return false;
		});
	});
</script>