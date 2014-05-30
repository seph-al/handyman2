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
																     <div class="qa-main">
																			<h1><?php echo $question->title?></h1>
																			<!-- -->
																			<div id="q4413" class="qa-q-view hentry question">
																			<div id="form_result_vote" style="margin:10px;"></div>
																				<form action="javascript:processVoteQuestion();" method="post" id="vote-question-form">
																					<div id="voting_4413" class="qa-voting qa-voting-net">
																						<div class="qa-vote-buttons qa-vote-buttons-net">
																							<input id="btn-vote-question" class="qa-vote-first-button-<?php echo $question->question_id?> qa-vote-up-button<?php if (!$can_vote) echo '-inactive'?>" type="submit" <?php if (!$can_vote) echo 'disabled'?>></input>
																							<input class="qa-vote-second-button qa-vote-down-button" type="submit"></input>
																						</div>
																						<div class="qa-vote-count qa-vote-count-net">
																						<span class="qa-netvote-count">
																								<span class="qa-netvote-count-data" id="question-vote-count">+<?php echo $question->voteCount?>
																						<span class="votes-up"><span class="value-title" title="1"></span>
																						</span><span class="votes-down"><span class="value-title" title="0"></span></span>
																						</span><span class="qa-netvote-count-pad">vote
																						</span>
																						</span>
																						</div>
																						<input type="hidden" name="question_id" id="question_id" value="<?php echo $question->question_id?>">
																						<input type="hidden" name="t" id="t" value="votequestion">
																						<div class="qa-vote-clear"></div>
																					</div>
																				</form>
																				<div class="qa-q-view-main">
																						<span class="qa-q-view-avatar-meta">
																						<span class="qa-q-view-meta">
																						<span class="qa-q-view-what">asked</span>
																						<span class="qa-q-view-when">
																						<span class="qa-q-view-when-data">
																						<span class="published">
																						<span class="value-title" title="2014-05-11T23:24:40+0000"></span> <?php echo date("m/d/Y", strtotime($question->date_posted));?></span>
																						</span>
																						</span>
																						<span class="qa-q-view-where">
																						<span class="qa-q-view-where-pad">in</span>
																						<span class="qa-q-view-where-data">
																						<a class="qa-category-link" href="<?php echo Yii::app()->request->baseUrl; ?>/questions/category/cat/<?php echo $question->type->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($question->type->Name)?>"><?php echo $question->type->Name?></a>
																						</span>
																						</span>
																						<span class="qa-q-view-who"><span class="qa-q-view-who-pad">by</span>
																						<span class="qa-q-view-who-data">
																						<span class="vcard author">
																						  <?php if ($question->owner_user_type == 'homeowner'):?>
																						      <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/homeowner/profile/user/<?php echo $question->huser->username?>"><?php echo $question->huser->firstname ." ".$question->huser->lastname?></a>
																						     <?php else:?>
																						      <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $question->cuser->Username?>"><?php echo $question->cuser->Name?></a>
																						  <?php endif?>
																						</span>
																						</span>
																						<!-- 
																						<span class="qa-q-view-who-points">
																						<span class="qa-q-view-who-points-pad">(</span>
																						<span class="qa-q-view-who-points-data">130</span>
																						<span class="qa-q-view-who-points-pad">
																						   points)
																						</span>
																						</span>
																						 -->
																						</span>
																						</span>
																						</span>
																						<?php if (!Yii::app()->user->isGuest):?>
																						<div class="qa-q-view-buttons">
																							<input id="q_doanswer" class="qa-form-light-button qa-form-light-button-answer" type="submit" value="answer"></input>
																							<input type="hidden" value="" name="qa_click"></input>
																						</div>
																						<?php endif?>
																						
																						<div id="c4413_list" class="qa-q-view-c-list" style="display:none;">
																						</div>
																						<!-- END qa-c-list -->
																					
																					<div class="qa-c-form"></div>
																					<!-- END qa-c-form -->
																				</div>
																				<!-- END qa-q-view-main -->
																				<div class="qa-q-view-clear"></div>
																			</div>																			
																			<!-- END qa-q-view -->
																			
																			<div id="answer_form" style="display:none">
																			<h2>
																				<span id="a_list_title">
																				  Your answer
																				</span>
																			</h2>
																			  <div id="form_result" style="margin:10px;"></div>
																			  <form role="form" action="javascript:processAnswer();" method="post" id="answer-post-form">
																			
																			   <div class="form-group">
																				<label for="">Answer:</label>
																				<textarea class="form-control" rows="3" id="answer" name="answer"></textarea>
																			  </div>
																			  
																			  <input type="hidden" name="t" value="addanswer" id="t">
																			   <input type="hidden" name="question_id" id="question_id" value="<?php echo $question->question_id?>">
																			  <button type="submit" class="btn btn-danger">Add Answer</button>
																			  <button class="btn btn-default" type="button" id="btn-cancel-answer">Cancel</button>
																			</form>
																			
																			</div>
																			
																			<div class="qa-a-list" id="answers_list">
																			 
																			</div>
																			<div class="clr"></div>
							 	                                              <ul class="pagination" id="pagination-answers">
                                   	 														
                                                                              </ul>
                                                                              <input type="hidden" name="question_id" id="question_id" value="<?php echo $question->question_id?>">
																		<!-- END qa-a-list -->
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
		</div>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/question-details.js"></script>