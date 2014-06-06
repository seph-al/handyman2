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
															
																<div class="col-md-7qa" id="load_questions_container">
																	<?$this->renderPartial('/questionsajax/questions-list',array('questions' => $questions,'title' => $title,'count' => $count, 'pages' => $pages, 'page_limit' => $page_limit));?>
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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/questions.js"></script>