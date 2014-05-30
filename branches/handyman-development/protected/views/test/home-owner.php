<?php $this->renderPartial('homeownernav',array('pages'=>$page)); ?>
<div class="container">

	<!-- Contarctor My account changes -->
	<div id="posted_projects" style="display:block">
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
				<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="postedProj">
					<!-- My Jobs start -->
					<div class="myAccntRightInner headTabMyAccount clearfix thumbnail">
						<div class="containNew">
							<!-- My account my job list start -->
							
							
							<div class="contain" id="mypostedjobs" style="display:block;">	<span class="postJobHead">My Posted Projects</span>
							<?php foreach($projects as $k=>$v): ?>
								<div class="contactDetInner row-fluid" id="project_<?php echo $v->project_id?>">
									<div class="myNewPostLeft col-md-8 myNewPostLeftMin ">
										<div class="myPostInner">
											<div class="contain">	<a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Ini::slugstring($v->description)?>" class="myPostNewHead2 clr">
													<?php
														$pmodel = Projects::model()->findByPk($v->project_id);
														$project_type = $pmodel->type->Name;
														echo $project_type;
														//echo $v->project_id;
													?>	
												</a>
												<div class="myPostNewDate"><?php echo date('m/d/Y', strtotime( $v->date_added));?>
												</div>
											</div>
											<div class="contain">
												<?php echo $v->description?>
												<!--end-->
											</div>
										</div>
									</div>
									<!-- my job Right side -->
									<div class="myNewPostRight col-md-4">
										<ul class="myNewPostRightUl marg0" id="">
											<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Ini::slugstring($v->description)?>" id="myAccount23"><span class="viewNew"></span><span class="name">View Project</span></a>
											</li>
											<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Ini::slugstring($v->description)?>" id="myAccount24"><span class="addPhotoNew"></span><span class="name">Add Photos</span></a>
											</li>
											<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/edit?pj_id=<?php echo $v->project_id?>" id="myAccount25"><span class="editNew"></span><span class="name">Edit Project</span></a>
											</li>
											<li><a href="javascript:;" class="deleteproject" id="deleteproject_<?php echo $v->project_id?>" ><span class="endNew"></span><span class="name">Delete Project</span></a>
											</li>
											<!--<li class="last"><a href="javascript:void(0);" id="myAccount27"><span class="helpNew"></span><span class="name">Help</span></a></li>  -->
											<!--new message-->
											<!--end -->
										</ul>
									</div>
									<!--End--><div style="clear:both"></div>
								</div>
								<?php endforeach; ?>
								<div class="clr"></div>
								<div class="tradePagination"><?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?></div>
							</div>
							
							<!--My account myjob list end-->
							<div id="viewtradesmens"></div>
							<div class="contain" style="display:none;" id="customer_command">
								<input type="button" onclick="return commandHide();" value="Back" class="btn btn-inverse" />
								<div id="commandtxtarea" style="display:block;" class="postAreaIn marg0">
									<!--<form class="form-horizontal marg0" name="msg_command" method="post" action="" enctype="multipart/form-data" >  -->
									<div class="contain">
										<form class="form-horizontal marg0" name="post_message" method="post" onsubmit="return false;">
											<input type="hidden" name="action" value="postcmd" />
											<input type="hidden" id="command_postid" name="postid" value="" />
											<input type="hidden" id="command_userid" name="userid" value="" />
											<ul class="postProjUl marg0">
												<li class="control-group marg0">
													<div class="control-label empty">&nbsp;</div>
													<div class="controls offset4">
														<input class="form-control margTop10" type="text" name="command" id="commandsdata" />
														<input type="submit" name="shrtpost" value="Submit" onclick="return postCommandCustomer();" class="btn btn-primary margTop10" />	<span class="postErrors commandsdata"></span>
													</div>
												</li>
											</ul>
										</form>
									</div>
									<!--</form>		-->
								</div>
								<div id="viewallcommand" class="postAreaIn">
									<div class="contactDetInner">
										<div class="contain">
											<div class="purComments bgNone alignCenter">There is no Comments</div>
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

	<!-- write feed back popup -->
	<div id="modals">
		<div id="writeRevPop" class="modal hide fade" tabindex="-1" data-dismiss="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
			<div class="galleryPopWrap" id="contfeedback">
				<div class="contain">
					<span class="popupHeadMid">Write Review
						<button class="popClose" type="button" type="button" data-dismiss="modal" aria-hidden="true"></button>
					</span>
				</div>
				<div class="row-fluid">
					<div class="col-md-12">
						<div class="contain">
							<input type="hidden" id="fedpostid" value=""/>
							<input type="hidden" id="fedcontid" value=""/>
							<ul class="writeReviewUl col-md-10 offset1">
								<li>
									<span class="writeReviewUlName">Rating</span>
									<span class="writeReviewUlDot">:</span>
									<a id="zerorating" title="0 star out of 5"  href="#" class="zero-ratings"></a>
									<ul class='star-rating'>
										<li class="current-rating " id="current-rating" style="width:0%;"><!-- will show current rating --></li>
										<span id="ratelinks_over">
											<li><a href="javascript:void(0)" title="1 star out of 5" class="one-star">1</a></li>
											<li><a href="javascript:void(0)" title="2 stars out of 5" class="two-stars">2</a></li>
											<li><a href="javascript:void(0)" title="3 stars out of 5" class="three-stars">3</a></li>
											<li><a href="javascript:void(0)" title="4 stars out of 5" class="four-stars">4</a></li>
											<li><a href="javascript:void(0)" title="5 stars out of 5" class="five-stars">5</a></li>
										</span>
									</ul>
								</li>
								<li>
									<span class="writeReviewUlName">Description</span>
									<span class="writeReviewUlDot">:</span>
									<textarea class="writeReviewUlTextarea" id="fedbajdesc"></textarea>
									<span class="fedbajdesc"></span>
								</li>
								<li>
									<span class="writeReviewUlName">&nbsp;</span>
									<span class="writeReviewUlDot">&nbsp;</span>
									<div class="margInviteJob margBot10">
										<input class="btn btn-primary" type="button" name="feedback" id="feedback" value="Submit" onclick="return feedbackValidate();"/>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>


<div class="container" id="my_inbox" style="display:none">
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
				<div id="myInbox">
					<!-- my inbox -->
			          
					<!-- My inbox end -->
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/homeownerdash.js"></script>

