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
																			<?php $this->renderPartial('article',array('feed'=>$feed)); ?>
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
																			  <?php  if (Yii::app()->user->isGuest):?>
																			  <div class="form-group">
																				<label for="">User Type:</label>
																				<select class="form-control" name="q_role" id="q_role">
																				     <option value="">Select</option>
																				      <option value="contractor">Contractor</option>
																				      <option value="homeowner">Homeowner</option>
																				</select>
																			  </div>
																			
																			  <div id="register_homeowner" style="display:none">
																			     <div class="form-group">
																				 <label for="">Email:</label>
																				  <input type="text" name="q_hemail" id="q_hemail" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">First Name:</label>
																				  <input type="text" name="q_firstname" id="q_firstname" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Last Name:</label>
																				  <input type="text" name="q_lastname" id="q_lastname" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Username:</label>
																				  <input type="text" name="q_husername" id="q_husername" class="form-control"  value="">
																			    </div>
																			  </div>
																			  
																			  <div id="register_contractor" style="display:none">
																			   <div class="form-group">
																				 <label for="">Email:</label>
																				  <input type="text" name="q_cemail" id="q_cemail" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Company Name:</label>
																				  <input type="text" name="q_company" id="q_company" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Contact Name:</label>
																				  <input type="text" name="q_contactname" id="q_contactname" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Username:</label>
																				  <input type="text" name="q_cusername" id="q_cusername" class="form-control"  value="">
																			    </div>
																			    <div class="form-group">
																				 <label for="">Password:</label>
																				  <input type="password" name="q_password" id="q_password" class="form-control"  value="">
																			    </div>
																			  </div>
																			  
																			     
																			  <?php endif;?>
																			  <input type="hidden" name="to-register" id="to-register" value="<?php if (Yii::app()->user->isGuest){ echo '1';} else {echo '0';}?>" id="t">
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
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/postquestions.js"></script>