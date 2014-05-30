	<div class="projBanner">
		<div class="container">
			<form class="marg0" name="findjobsearch" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/project/find">
				<input type="hidden" name="findtradsearch" value="findtrad"/> 
				<div class="contraZipBgMid">
					<div class="row-fluid ">
						<h4 class="col-md-4 offset1">Find Projects in Your Area Now</h4>
						<div class="col-md-8">
							<form class="form-inline" role="form" >
							  <div class="form-group" style="float:left">
								<select class="form-control" name="project">
									<option value="">All Services</option>
									<?php if (count($projects)>0):?>
									  <?php foreach($projects as $k=>$v):?>
									      <option value="<?php echo $v->ProjectTypeId?>" ><?php echo $v->Name?></option>
									  <?php endforeach;?>
									<?php endif?>
								</select>
							  </div>
							  <div class="form-group" style="float:left">
								<label class="sr-only" for="zipcode">Enter Zipcode</label>
								<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode">
							  </div>
							  <div class="checkbox" style="float:left">
							  </div>
							  <button type="submit" class="btn btn-default">Search</button>
							</form>
						</div>
					</div>    
				</div>        
		   </form>					
		</div>
	</div>
	<div class="container">
	<div class="contain margTop20 margBot20">
			<div class="row-fluid">
				<div class="findJobLeft col-md-8 clearfix">
					<div class="contMatched">
						<span class="contain contMatchedTxt1">There are no Projects Match</span>
						<span class="contain contMatchedTxt2"> <?php echo $location?> </span>
					</div>
										<div class="contain" >
												
							<div class="fConHiWSec relative margBot20">
								<div class="fcon1">
								<img class="img-circle bg-primary" src="http://rdbuploads.s3.amazonaws.com/icons/contractor-man-icon.png">
								<h1>Create Contractor Account</h1>
								</div>
								<div class="clearfix"></div>
								<div class="fcon2">
								<img class="img-circle bg-primary"  src="http://rdbuploads.s3.amazonaws.com/icons/User-icon.png">
								<h1>Get Fresh Leads</h1>
								</div>
								<div class="clearfix"></div>
								<div class="fcon3">
								<img class="img-circle bg-primary" src="http://rdbuploads.s3.amazonaws.com/icons/star-icon.png">
								<h1>Get Ratings and Reviews</h1>
								</div>
								<div style="clear:both"><br></div>
							</div>				
						</div>			
									
						<div class="tradePagination">
							
						</div>		
				</div>
				
				<div class="findJobRight col-md-4" style="height:auto;">
			
										<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Project Categories</div>
  <div class="panel-body">
<h3>Take on a project Today</h3>
<?php if (Yii::app()->user->isGuest):?>
<p><a title="register as a contractor for free" href="/contractor/signup" class="btn btn-danger btn-lg btn-block">Register as a Contractor</a></p>
<?php endif;?>		
  </div>

  <!-- List group -->
  <ul class="list-group">
  <?php if (count($projects)>0):?>
							   <?php foreach($projects as $k=>$v):?>
							     <li class="list-group-item"><a  href="<?php echo Yii::app()->request->baseUrl; ?>/project/find/project/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a></li>
							   <?php endforeach;?>
							<?php endif;?>
   
   	
  </ul>

</div>
				</div>
			</div>
		</div>
	</div>