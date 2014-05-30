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
	<div class="contMatched">	<span class="contain contMatchedTxt1"><?php echo $records?> Contractors Matched</span>
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
					<div class="contain margin1Btm">
						<ul class="findRiteUlNew">
							<h1 class="findRiteUlNewHead">Featured Projects</h1>
							<?php if (count($projects)>0):?>
									  <?php foreach($projects as $k=>$v):?>
									      <li><a  href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/project/<?php echo $v->ProjectTypeId?>/n/<?php echo Ini::slugstring($v->Name)?>"><?php echo $v->Name?></a></li>
									  <?php endforeach;?>
									<?php endif?>
								</ul>
						<ul class="findMore row-fluid offset0" style="display:none;">
							<li>
								<a class="more" onclick="$('.findRiteUlNew').css('height','auto');$('.more').hide();$('.hideMore').show();"> More</a>
								<a class="hideMore" onclick="$('.findRiteUlNew').css('height','450px');$('.hideMore').hide();$('.more').show();" style="display:none;">Hide</a>
							</li>
						</ul>
					</div>
					<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <p>...</p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
				</div>
			</div>
		</div>
	</div>