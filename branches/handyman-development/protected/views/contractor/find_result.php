	<div class="projBanner">
		<div class="container">
			<form class="marg0" name="findjobsearch" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find">
				<input type="hidden" name="findtradsearch" value="findtrad"/> 
				<div class="contraZipBgMid">
					<div class="row-fluid ">
						<h4 class="col-md-4 offset1">Find Contractors in Your Area Now</h4>
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
			<!-- find job leftmatch -->
			<div class="findJobLeft col-md-8 clearfix">
	<div class="contMatched">	<span class="contain contMatchedTxt1"><?php echo $records?> Contractor<?echo $records > 1 ? 's':''?> Matched</span>
		<span class="contain contMatchedTxt2"> <?php echo ucfirst($city_name)?></span>
	</div>
	
	<?php foreach($models as $model): ?>
    
	<div class="findJobInner1 relative">
		<div class="findJobHead row-fluid">
			<div class="pull-left">	<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $model->Username?>"><?php echo $model->Name;?></a>
			</div>	<span class="col-md-4">
							<span class="relative contStrMarg starHei">
								<span class="starGrayCont"></span>
			<span class="starGoldCont" style="width:0%;"></span>
			</span>
			</span>
			
		</div>
		<div class="tradePad">	
		   <span class="contain">
							<span class="feedbackRev"> Business</span>
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
	
	
		<?$this->widget('CLinkPager',array(
    'pages'=>$pages,
    'cssFile'=>Yii::app()->request->baseUrl.'/css/pagination.css',
	'currentPage'=>1,
	'header'=>''		
   

))?>
	
</div>
			<!-- end find job left math -->				
				<div class="findJobRight col-md-4" style="height:auto;">
    <?php if (Yii::app()->user->isGuest):?>
<p><a title="register as a contractor for free" href="/contractor/signup" class="btn btn-danger btn-lg btn-block">Register as a Contractor</a></p>
<p><H4 class='text-center'>or</H4></p>
<p><a title="Post your homeowner project for free" href="/project/post" class="btn btn-warning btn-lg btn-block">Post Your Project</a></p>
<?php endif;?>			
			
					<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Project Categories</div>
  <div class="panel-body">

  </div>

  <!-- List group -->
  <ul class="list-group">
   	<?php if (count($projects)>0):?>
									  <?php foreach($projects as $k=>$v):?>
									      <li class="list-group-item"><a  href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/project/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a></li>
									  <?php endforeach;?>
									<?php endif?>
  </ul>

</div>
				</div>
			</div>
		</div>
	</div>
	
<?php if (Yii::app()->user->isGuest):?>
	<input type="hidden" name="is_guest" id="is_guest" value="1" />
	<?$this->renderPartial('logged_out_modal')?>
<?php endif;?>
<script type="text/javascript">
	$(document).ready(function(){
		var is_guest = $('input#is_guest').val();
		if(is_guest == '1'){
			console.log("is guest.");
			$('#myModal_loggedout').modal({
								  backdrop: 'static',
								  keyboard: false
								});
			$('#myModal_loggedout').modal('show');
			
		}
	});
</script>