<?php if(count($feedback)>0):?>
		<?php $loop=0;?>
		<?php foreach($feedback as $k=>$v):?>
		
		<div class="row" id="feedback_<?php echo $v->feedback_id?>">
			<div class="col-lg-3">
				<div class="row user-rvws">
					<div class="col-lg-12 col-xs-3">
					<?php 
					$fmodel = Feedback::model()->findByPk($v->feedback_id);
						if($fmodel->homeowner->photo == ""):
					?>
						<img src="http://d3flf7kkefqaeh.cloudfront.net/_assets/128x128_no_pht.png" class="img-circle" alt="default reviewer logo">
					<?php else: ?>
						<img src="<?php echo Yii::app()->request->baseUrl.'/uploads/homeowner/'.$fmodel->homeowner->photo?>" class="img-circle" alt="default reviewer logo">
					<?php endif; ?>
					</div>
					<div class="col-lg-12 col-xs-9">
						<strong><?php
						
								
								$home_first = $fmodel->homeowner->firstname; 
								echo $home_first;
								?></strong>
						<!--<div class="location">
							<span class="glyphicon glyphicon-map-marker"></span>&nbsp;Yorba Linda, CA
						</div>-->
					</div>
				</div>
			</div>
			<div class="col-lg-9" id="feedbackmessage_<?php echo $v->feedback_id?>">
				<div class="panel panel-default panel-under-style2">
					<div class="panel-heading">
						<?php echo $v->date_posted?>
					</div>
					<div class="panel-body">
						<?php echo $v->message?>
						
						
						<!-------------------------->
						<div class="row">
						   
						   <div class="col-lg-7">
							   <ul class="list-inline ul-ed">
								<?php if(Yii::app()->user->getId() == $v->homeowner_id):?>
								<li><a href="javascript:;" id="feededit_<?php echo $v->feedback_id?>" class="feededit" ><i class="fa fa-edit"></i> Edit</a></li>
								<?php endif;?>
								<?php if(Yii::app()->user->getId() == $v->homeowner_id || $is_my_profile == true):?>
								<li><a href="javascript:;" id="feeddelete_<?php echo $v->feedback_id?>" class="feeddelete"><i class="fa fa-trash-o"></i> Delete</a></li>
								<?php endif;?>
								</ul>
							</div>
					       
					       <div class="col-lg-5">
						      <?php $this->renderPartial('../contractorajax/feedback_rating',array('id'=>$v->feedback_id,'loop'=>$loop),false,true); ?>
						   </div>
						  
						</div>
					
							
							
						
						<!--------------------->
					</div>
				</div>
			</div>
			<div class="col-lg-9" id="feedbackedit_<?php echo $v->feedback_id?>" style="display:none">
				<div class="panel panel-default panel-under-style2">
					<div class="panel-heading">
						<?php echo $v->date_posted?>
					</div>
					<div class="panel-body">
						
						
						<textarea class="form-control" rows="5" id="feedbackmessages2_<?php echo $v->feedback_id?>"><?php echo $v->message?></textarea>
						<!-------------------------->
						
						<div>
							
							<ul class="pull-right list-inline">
							
							<li><a href="javascript:;" class="btn btn-success btn-lg btedit" id="btedit_<?php echo $v->feedback_id?>">Save</a></li>
							<li><a href="javascript:;" class="btn btn-warning btn-lg btcanceledit" id="btcanceledit_<?php echo $v->feedback_id?>">Cancel</a></li>

							</ul>
						</div>
						
						<!--------------------->
					</div>
				</div>
			</div>
		</div>
		<?php
			$loop++;
		?>
		
		
		<?php endforeach; ?>
	<?php else:?>
	
		<strong>No feedbacks available </strong>
	
	<?php endif;?>
