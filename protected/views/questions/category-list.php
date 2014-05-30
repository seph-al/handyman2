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
																           	<h1>Browse Categories</h1>
																			<ul class="qa-browse-cat-list qa-browse-cat-list-1">
																			   <?php foreach ($sidecats as $k=>$v):?>
																				<li class="qa-browse-cat-item qa-browse-cat-additions"><?php echo $v->Name?>										
																				<span class="qa-browse-cat-note">- <a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/category/cat/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->questionCount?> questions</a></span>
																				</li>
																				<?php endforeach;;?>
																			</ul>
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
