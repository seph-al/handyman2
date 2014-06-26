<script type="text/javascript">
	$(document).ready(function(){
		var is_guest = $('input#is_guest').val();
		if(is_guest){
			$('#myModal .modal-title').html(title);
			$('#myModal .modal-body').html(content);
			$('#myModal').modal('show');
		}
	});
</script>	
	
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
				
				<didiv class="findJobRight col-md-4" style="height:auto;">
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
									      <li class="list-group-item"><a  href="<?php echo Yii::app()->request->baseUrl; ?>/project/find/project/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a></li>
									  <?php endforeach;?>
									<?php endif?>
  </ul>
<div style="clear:both"><br></div>
</div>
<div class="panel panel-default">
						  <div class="panel-heading"><h4>Recent questions and answers</h4></div>
						  <div class="panel-body"></div>
						  <?if(count($questions) > 0):?>
						  <ul class="list-group qna-side">
							<?php foreach($questions as $k=>$v):?>
								<li class="list-group-item">
									<p class="qna-side-title">
										<span class="glyphicon glyphicon glyphicon-question-sign"></span>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/details/id/<?php echo $v->question_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->title)?>" class="qna-side-ask"><?php echo $v->title?></a>
									</p>
									<p class="qna-side-who"> posted <?php echo date("m/d/Y h:i a", strtotime($v->date_posted));?> in <a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/category/cat/<?php echo $v->type->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->type->Name)?>"><?php echo $v->type->Name?></a> by 
									 <?php if ($v->owner_user_type == 'homeowner'):?>
										  <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/homeowner/profile/user/<?php echo $v->huser->username?>"><?php echo $v->huser->firstname ." ".$v->huser->lastname?></a>
										 <?php else:?>
										  <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $v->cuser->Username?>"><?php echo $v->cuser->Name?></a>
									  <?php endif?>
									</p>
								</li>
						   <?php endforeach;?>
						  </ul>
						  <?php endif?>
						  <div style="clear:both"><br></div>
						</div>
				       <?php $this->renderPartial('article',array('feed'=>$feed)); ?>

				</div>
			</div>
		</div>
	</div>
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
                            <div class="logRegMain">
                                <div class="modal-header">
                                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                                    <h2 id="myModalLabel" class="text-center logReg">
                                        <i class="fa fa-key"></i> Handymen
                                        <small>
                                           <strong>Home Products, Product Finder, Contractor Locator</strong>
                                        </small>
                                    </h2>
                                </div>
                                <div class="modal-body">
                                    <div class="wrap-content-lock text-center">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>
                                        <button class="btn btn-primary"><i class="fa fa-lock"></i> Login to Dashboard</button>
                                    </p>
                                    Don't have an account? <a> Create one for free!</a>
                                </div>
                            </div>
                        </div>
</div>
<!-- /.modal -->