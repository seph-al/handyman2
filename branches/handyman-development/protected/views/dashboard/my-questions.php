<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('navigation',array('pages'=>'')); ?>
   <?php else:?>
   <?php $this->renderPartial('homeownernav',array('pages'=>$page)); ?>
<?php endif?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/questions.css">
	<div class="container">
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="myAccntRightInner thumbnail headTabMyAccount">
				<div class="containNew">	<span class="postJobHead">My Questions</span>
					<div class="contain"><a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/post" target="_blank"><span class="btn btn-success pull-right postQuestion" style="margin-bottom:10px">Post Your Question</span></a>
						<div class="clr"></div>
						<div class="contain" id="my_questions_content">
						  <div class="container dash-constr">
                            <div class="row">
					              <div class="col-md-7qa" id="questions-content">
					                	
					                	    
																			
					                	
							 	  </div>
							 	  <div class="clr"></div>
							 	  <ul class="pagination" id="pagination-question">
                                   	 														
                                  </ul>
							    </div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<div class="modal fade" id="myModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
		   <div class="modal-content" id="modal-ajax-content">
		  </div>
	   </div>
     </div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/questions.js"></script>
