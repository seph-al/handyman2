<?if (!Yii::app()->user->isGuest):?>
<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
   <?php else:?>
   <?php $this->renderPartial('../dashboard/homeownernav',array('pages'=>'')); ?>
<?php endif?>
<?php endif;?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/questions.css">
<div class="container">
			<div class="row-fluid margTop15 margBot20">
				<div class="myAccntRight col-md-12">
					<div class="myAccntRightInner thumbnail headTabMyAccount">
						<div class="containNew">
		                  <?php $this->renderPartial('question-header'); ?>
		 				<div class="contain">
								<div class="clr"></div>
								<div class="contain" id="my_questions_content">
									<div class="container dash-constr">
										<div class="row">
											<div class="col-lg-12">
												<div class="inbox">
													<div class="inbox-content">
														<div class="row">
															<div class="qa-nav-main">
																<?php $this->renderPartial('navigation'); ?>
																<div class="qa-nav-main-clear"><br></div>
															</div>
														  <div class="col-md-4qa">
																<div class="qa-sidepanel">
																			<?php $this->renderPartial('sidebar',array('sidecats'=>$sidecats)); ?>
																		</div>
																  </div>
																  <div class="col-md-7qa">
																		<!-- -->
																		<div class="qa-main">
																            <h1>Ask A Question</h1>
																            <div id="form_result" style="margin:10px;"></div>
																            
																			<form role="form" action="javascript:processPost();" method="post" id="question-post-form">
																			<div class="form-group">
																				<label for="">The question in one sentence:</label>
																				<input type="text" name="q_title" id="q_title" class="form-control"  value="<?php echo $q_title?>">
																			  </div>
																			  <div class="form-group">
																				<label for="">Category:</label>
																				<select class="form-control" name="q_category" id="q_category">
																				  <option value="">Select</option>
																				  <?php if (count($projects)>0):?>
																				      <?php foreach($projects as $k=>$v):?>
																				          <option value="<?php echo $v->ProjectTypeId?>"><?php echo $v->Name?></option>
																				      <?php endforeach;?>
																				  <?php endif?>
																				</select>
																			  </div>
																			  <div class="form-group">
																				<label for="">More information for the question:</label>
																				<textarea class="form-control" rows="3" id="q_content" name="q_content"></textarea>
																			  </div>
																			  
																			  <input type="hidden" name="t" value="addquestion" id="t">
																			  <button type="submit" class="btn btn-danger">Ask The Question</button>
																			</form>
																			<br>
																</div>
																<!-- -->
														  </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/questions.js"></script>