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
			</div>	<!-- span class="col-md-4">
							<span class="relative contStrMarg starHei">
								<span class="starGrayCont"></span>
			<span class="starGoldCont" style="width:0%;"></span>
			</span>
			</span -->
			
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
			
			<a data-toggle="modal" data-target="<?echo count($homeowner_projects) > 0 ? '#messageAttachProject': '#messageContractorModal' ?>" class="InviteJob inviteContractor" id="<?php echo $model->ContractorId?>" rel="<?php echo $model->Username?>">
				Invite Contractor
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
				

				</div>
			</div>
		</div>
	</div>


	
<?if(count($homeowner_projects > 0)):?>
	<div class="modal fade" id="messageAttachProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Send Message</h4>
		  </div>
		  <div class="modal-body">
				<div id="invite_send_result">&nbsp;</div>
				<form role="form">
				  <div class="form-group">
					<label for="exampleInputEmail1">Subject</label>
					<input type="text" class="form-control"  id="invite_message_subject" name="invite_message_subject">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">Attach Project</label>
					<select class="form-control" name="invite_project_attached" id="invite_project_attached">
						<?foreach($homeowner_projects AS $key=>$value):?>
							<option value="<?echo $value->project_id?>"><?echo substr($value->description,0,25)?></option>
						<?endforeach;?>
					</select>
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Message</label>
					<textarea class="form-control" rows="5" placeholder="Write Message" id="invite_message_content" name="invite_message_content"></textarea>
				  </div>
				   
				   <input type="hidden" name="invite_contractor_id" id="invite_contractor_id" value="" />
				</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="SendInvitetoContact"><span class="glyphicon glyphicon-envelope"></span> Send</button>
		  </div>
		</div>
	  </div>
	</div>
	<?else:?>
	<div class="modal fade" id="messageContractorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Send Message</h4>
      </div>
      <div class="modal-body">
			<div id="send_result">&nbsp;</div>
			<form role="form">
			  <div class="form-group">
				<label for="exampleInputEmail1">Subject</label>
				<input type="text" class="form-control"  id="send_message_subject" name="send_message_subject">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Message</label>
				<textarea class="form-control" rows="5" placeholder="Write Message" id="send_message_content" name="send_message_content"></textarea>
			  </div>
			   <input type="hidden" name="contractor_id" id="contractor_id" value="" />
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="sendmessage"><span class="glyphicon glyphicon-envelope"></span> Send</button>
      </div>
    </div>
  </div>
</div>
	<?endif;?>

<?php if (Yii::app()->user->isGuest):?>
	<input type="hidden" name="is_guest" id="is_guest" value="1" />
	<?$this->renderPartial('logged_out_modal')?>
<?php endif;?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myprofile.js"></script>
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
		
		$('.inviteContractor').click(function(){
			var id = $(this).attr("id");
			var rel = $(this).attr('rel');
			$('input#invite_contractor_id, input#contractor_id').val(id);
			$('h4.modal-title').text("Send Message to "+rel);
			
		});
		
	});
</script>