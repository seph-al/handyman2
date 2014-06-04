<h2>
	<span id="a_list_title" id="answer_count_div">
	<?php echo count($answers) ?> Answer<?php if (count($answers)>1) echo 's'?>
	</span>
</h2>
																		
<?php if (count($answers) > 0):?>
<?php foreach ($answers as $k=>$v):?>

<div id="a-list-<?echo $v->answer_id?>" class="qa-a-list-item">																			
  
 <form action="javascript:processVoteAnswer('<?echo $v->answer_id?>');" method="post" id="vote-answer-form-<?echo $v->answer_id?>">																			
    <div id="voting_4430" class="qa-voting qa-voting-net">																			
      <div class="qa-vote-buttons qa-vote-buttons-net">	
        <?php if ($login):?>
          <input class="qa-vote-first-button-<?echo $v->answer_id?> qa-vote-up-button<?php if ($v->canvote($v->answer_id,$userid,$role)===false) echo '-inactive'?>" id="btn-vote-answer-<?echo $v->answer_id?>" type="submit" <?php if ($v->canvote($v->answer_id,$userid,$role)===false) echo 'disabled'?>>
          <?php else:?>
        <input class="qa-vote-first-button-<?echo $v->answer_id?> qa-vote-up-button-inactive" id="btn-vote-answer-<?echo $v->answer_id?>" type="submit" disabled="disabled">  
        <?php endif?>																			
        <input class="qa-vote-second-button qa-vote-down-button" type="submit">
      </div>																			
      <div class="qa-vote-count qa-vote-count-net">
        <span class="qa-netvote-count">
          <span class="qa-netvote-count-data" id="answer-vote-count-<?echo $v->answer_id?>">																			  
          +<?php echo $v->voteCount?> 																			
            <span class="votes-up">																			
              <span class="value-title" title="1">																			
              </span>																			
            </span>																			
            <span class="votes-down">																			
              <span class="value-title" title="0">																			
              </span>																			
            </span>																			
          </span>																			
          <span class="qa-netvote-count-pad">																			   
          vote 																			
          </span>																			
        </span>																			
      </div>																			
      <div class="qa-vote-clear">
      </div>																			
    </div>				
    <input type="hidden" name="answer_id" id="answer_id" value="<?php echo $v->answer_id?>">			
    <input type="hidden" name="t" id="t" value="voteanswer">															
  </form>																			
  <div class="qa-a-item-main">			
 														
   <form action="javascript:processBestAnswer('<?echo $v->answer_id?>');" method="post" id="best-answer-form-<?echo $v->answer_id?>">																		
      <div class="qa-a-selection">
      </div>																			
      <div class="qa-a-item-content">																			
        <a name="4430"></a>																			
        <div class="entry-content-<?php echo $v->answer_id?>">																			  
        <?php echo $v->answer?> 																			
        </div>	
        <div id="answer_form_<?php echo $v->answer_id?>" style="display:none">
                 
				   <div class="form-group">
				     <label for="">Answer:</label>
					<textarea class="form-control" rows="3" id="answer_<?php echo $v->answer_id?>" name="answer_<?php echo $v->answer_id?>"><?php echo $v->answer?></textarea>
				   </div>
					
					<input type="hidden" name="t" value="updateanswer" id="t">
					<input type="hidden" name="answer_id" id="answer_id" value="<?php echo $v->answer_id?>">
					<button type="button" class="btn btn-danger" onclick="processUpdateAnswer('<?php echo $v->answer_id?>')">Update Answer</button>
					<button class="btn btn-default" type="button" id="btn-cancel-answer" onclick="hideupdate('<?php echo $v->answer_id?>')">Cancel</button>
			  
	 </div>																		
      </div>																			
      <span class="qa-a-item-avatar-meta">																			
        <span class="qa-a-item-meta">																			
          <a class="qa-a-item-what" href="">																			  
          answered 																			
          </a>																			
          <span class="qa-a-item-when">																			
            <span class="qa-a-item-when-data">																			
              <span class="published">																			
                <span class="value-title" title="2014-05-12T12:23:54+0000">
                </span>																			  
                <?php echo date("m/d/Y h:i a", strtotime($v->date_posted));?>																			
              </span>																			
            </span>																			
          </span>																			
          <span class="qa-a-item-who">																			
            <span class="qa-a-item-who-pad">																			  
            by  																			
            </span>																			
            <span class="qa-a-item-who-data">																			
              <span class="vcard author">																			
                  <?php if ($v->owner_user_type == 'homeowner'):?>
					      <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/homeowner/profile/user/<?php echo $v->huser->username?>"><?php echo $v->huser->firstname ." ".$v->huser->lastname?></a>
					     <?php else:?>
					      <a class="qa-user-link" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?php echo $v->cuser->Username?>"><?php echo $v->cuser->Name?></a>
					  <?php endif?>
					  																		
              </span>																			
            </span>		
            <!-- 																	
            <span class="qa-a-item-who-points">																			
              <span class="qa-a-item-who-points-pad">																			  ( 																			
              </span>																			
              <span class="qa-a-item-who-points-data">																			  160 																			
              </span>																			
              <span class="qa-a-item-who-points-pad">																			   points) 																			
              </span>																			
            </span>		
            	 -->																
          </span>																			
        </span>																			
      </span>																			
      <div class="qa-a-item-buttons">					
       <?php if ($userid == $v->question->owner_id && $role == $v->question->owner_user_type):?>								
	        <input type="hidden" name="answer_id" id="answer_id" value="<?php echo $v->answer_id?>">
	        <input type="hidden" name="t" id="t" value="bestanswer">	
	        <?php ($v->is_best == 1) ? $best= 'qa-form-light-button-flag-best-answer': $best= 'qa-form-light-button-flag'?>							
	        <input class="qa-form-light-button-<?php echo $v->answer_id?> <?php echo $best?>" type="submit" value="<?php if ($v->is_best==0):?>choose as<?php endif?> best answer">
	        
	        <?php else:?>
	        <?php if ($v->is_best == 1):?>
	            <input class="qa-form-light-button-<?php echo $v->answer_id?> qa-form-light-button-flag-best-answer" type="submit" value="best answer" disabled>
	        <?php endif?>
        <?php endif?>
      </div>																			
      <div id="c4430_list" class="qa-a-item-c-list" style="display:none;">
      </div>																			  
      <!-- END qa-c-list -->																			
    </form>								
    	<div class="qa-act-btn pull-right">
    	     
    	     <?php if ($userid == $v->owner_id && $role == $v->owner_user_type):?>
		      <a class="qa-button-edit" onclick="showupdateanswer('<?php echo $v->answer_id?>');"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
		     <?php endif;?> 
               <?php if ($userid == $v->question->owner_id && $role == $v->question->owner_user_type):?>
			     <a class="qa-button-delete" onclick="deleteanswer('<?php echo $v->answer_id?>');"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</a>
			  <?php endif?>
         </div>
																														
    <div id="c4430" class="qa-c-form" style="display:none;">
    </div>																			  
    <!-- END qa-c-form -->																			
  </div>																			  
  <!-- END qa-a-item-main -->																			
  <div class="qa-a-item-clear">
    <br>
  </div>																			
</div>	
<?php endforeach;?>
<?php endif?>							
				
	
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/answers.js"></script>			