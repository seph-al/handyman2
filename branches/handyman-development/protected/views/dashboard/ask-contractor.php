<?php $this->renderPartial('homeownernav',array('pages'=>$page)); ?>
<div class="container">
	<div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="myAccntRightInner thumbnail headTabMyAccount">
				<div class="containNew">	<span class="postJobHead">Ask a Contractor</span>
					<div class="skillTradeTopTxt">Have a question for our Contractor? Please choose a category for your question, so we can alert relevant Contractor. Additional information is optional, but adding detail to your question helps get a better response.</div>
					<div class="contain">	<span class="btn btn-success pull-right" id="postQuestion" style="display:block;">Post Your Question</span>
						<div class="clr"></div>
						<div class="contain" id="postQuestionSec" style="display:none;">
							<form name="askquestionform" class="registerControls form-horizontal" method="post" action="" enctype="multipart/form-data">
								<input type="hidden" name="askqus" value="question">
								<h1 class="contactHead">Post Your Question</h1>
								<div id="errors2"></div>
								<ul class="postProjUl">
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Project Type<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<div class="relative">
												<select class="form-control" style="width:60%;" id="askjobcategory" name="askjobcategory">
													<option>Please Select</option>
													<?php foreach($projects as $k=>$v): ?>
													<option value="<?php echo $v->ProjectTypeId ?>" name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
													<?php endforeach; ?>
												</select>
											</div> <span class="postErrors askjobcategory"></span>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Full Question (further details)<span class="starcolor">*</span>
											</label>
										</div>
										<div class="controls">
											<textarea class="form-control" style="width:60%;" id="fullquestion" name="fullquestion"></textarea> <span class="postErrors fullquestion"></span>
										</div>
									</li>
									<li class="control-group">
										<div class="control-label" style="text-align:left;">
											<label for="business_name">Attachement</label>
										</div>
										<div class="controls">
											<input class="" type="file" name="qusattach" value="">
										</div>
									</li>
									<li class="control-group">
										<div class="empty control-label">
											<label for="business_name">&nbsp;</label>
										</div>
										<div class="controls">
											<input class="btn btn-primary" type="button" id="submit_question" value="Submit" />
										</div>
									</li>
								</ul>
							</form>
						</div>
						<div id="about2" class="nano" style="margin-left:50px; margin-bottom:5px;">
							<div class="contentNanoScroll">
								<div class="containNew" id="qusanslist">There is no Questions Here.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/askcontractor.js"></script>

