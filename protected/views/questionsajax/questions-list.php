<div class="qa-main">
	<h1><?echo $title?></h1>
	
		<div class="qa-q-list">
			
			<?if(count($questions) > 0):?>
				
				   <?php foreach($questions as $k=>$v):?>
				 <div class="qa-q-list" id="question-row-<?echo $v->question_id?>">
					<div id="q1523" class="qa-q-list-item">
						<div class="qa-q-item-stats">
							<div id="voting_<?echo $v->question_id?>" class="qa-voting qa-voting-net">
								  <form id="vote_form2-<?echo $v->question_id?>" action="javascript:processVote(<?echo $v->question_id?>)">
									  <div class="qa-vote-buttons qa-vote-buttons-net" id="vote_buttons-<?echo $v->question_id?>">
										   <input id="input_<?echo $v->question_id?>" class="qa-vote-first-button qa-vote-up-button" type="submit" onmouseout="this.className='qa-vote-first-button qa-vote-up-button';" onmouseover="this.className='qa-vote-first-button qa-vote-up-hover';" name="vote_1523_1_q1523" title="Click to vote up"></input> 
									  </div>
								  </form>
								  <div class="qa-vote-count qa-vote-count-net">
									   <span class="qa-netvote-count">
										   <span id="show_vote_count-<?echo $v->question_id?>" class="qa-netvote-count-data">+<?php echo $v->voteCount?></span>
										   <span class="qa-netvote-count-pad">votes</span>
									   </span>
								 </div>
								 <div class="qa-vote-clear"></div>
						   </div>
						   <span class="qa-a-count qa-a-count-selected"><span class="qa-a-count-data"><?php echo $v->answerCount?></span>
							   <span class="qa-a-count-pad">answers</span>
						  </span>
						 <span class="qa-view-count">
							   <span class="qa-view-count-data"><?php echo $v->viewCount?></span>
							   <span class="qa-view-count-pad">views</span>
						</span>
						</div>
					  
					   <div class="qa-q-item-main">
							<div class="qa-q-item-title">
								<a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/details/id/<?php echo $v->question_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->title)?>"><?php echo $v->title?></a>
						   </div>
					  
					   <span class="qa-q-item-avatar-meta">
							   <span class="qa-q-item-meta">
								 <a class="qa-q-item-what" href="<?php echo Yii::app()->request->baseUrl; ?>/questions/details/id/<?php echo $v->question_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->title)?>">answered</a>
									
									<span class="qa-q-item-when">
									   <span class="qa-q-item-when-data">  <?php echo date("m/d/Y", strtotime($v->date_posted));?></span>
									   <span class="qa-q-item-when-pad"><?php echo date("H:i a", strtotime($v->date_posted));?></span>
									</span>	
									
									<span class="qa-q-item-where"><span class="qa-q-item-where-pad">in</span>
									<span class="qa-q-item-where-data"><a class="qa-category-link" href="<?php echo Yii::app()->request->baseUrl; ?>/questions/category/cat/<?php echo $v->type->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->type->Name)?>"><?php echo $v->type->Name?></a></span>
									</span>
									
									<span class="qa-q-item-who"><span class="qa-q-item-who-pad">by</span>
									<span class="qa-q-item-who-data">
									  <?php if ($v->owner_user_type == 'homeowner'):?>
										  <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/homeowner/profile/user/<?php echo $v->huser->username?>"><?php echo $v->huser->firstname ." ".$v->huser->lastname?></a>
										 <?php else:?>
										  <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $v->cuser->Username?>"><?php echo $v->cuser->Name?></a>
									  <?php endif?>
									  
									</span>
																								
								  </span>
								</span>
							 </span>
							 <?if(!Yii::app()->user->isGuest):?>
								 <?if($v->owner_user_type == Yii::app()->user->role && $v->owner_id == Yii::app()->user->getId()):?>
									  <div class="bread">
										  <a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/edit/id/<?php echo $v->question_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->title)?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
										  <a href="javascript:void(0)" onclick="deletequestion('<?php echo $v->question_id?>','0')"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</a>
									  </div>
								  <?endif;?>
							  <?endif;?>
						 </div>																						
						<div class="qa-q-item-clear"></div>
					</div>
				</div>
				   <?php endforeach;?>
				  	 <?$this->widget('CLinkPager',array(
							'pages'=>$pages,
							'cssFile'=>Yii::app()->request->baseUrl.'/css/pagination.css',
							'currentPage'=>1,
							'header'=>''		
						))?>
				   
			<?else:?>
				<div class="alert alert-info alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>There are no questions yet.</strong> Be the first to <a href="/questions/post">ask</a>!
				</div>
			<?endif;?>
			
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.qa-vote-buttons-net').each(function(){
			var base_url = $('#base_url').val();
			var id = $(this).attr('id');
			var question_id = id.split("-").pop();
				$.post(base_url+'/questionsajax',{t:'checkifCanVote',question_id:question_id},function(data){
					if(data.r == "0"){
						//$('#vote_buttons-'+question_id).hide();
						$("input#input_"+question_id).prop('disabled', true);
						$("input#input_"+question_id).removeClass('qa-vote-up-button');
						$("input#input_"+question_id).addClass('qa-vote-up-button-inactive');
					}
				});
		});
	});
</script>