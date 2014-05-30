	<div id="message_result" style="margin:10px"></div>
												<!-- reply -->
												<form name="replymessage" method="post" action="" id="replymessageform" class="form-horizontal">
												  <div class="modal-body in-bg">
													<div class="msg-sub">
														<p class="msg-from"><span class="glyphicon glyphicon-user"></span>&nbsp;
														 <?php 
												  if ($message->from_user_type == "homeowner"){
												   	  echo $message->hfrom->firstname." ".$message->hfrom->lastname;
												   	  }else {
												   	  	echo $message->cfrom->Name."-".$message->cfrom->ContactName ;
												   	  }
												 ?>
														</p>
														<p style="clear:both"></p>
													</div>
													<div class="msg-con">
													<p>
													
														<input type="text" class="form-control" name="m_subject" id="m_subject" value="RE: <?php echo $message->subject?>">
														</p>
														<p>
														<textarea class="form-control m_message" rows="4"  name="m_message" id="m_message" ><?php echo $message->message?></textarea>
														</p>
													</div>
												  </div>
												  <div class="modal-footer">
												    <input type="hidden" name="t" id="t" value="sendreply">
												    <input type="hidden" name="reply_to_id" id="reply_to_id" value="<?php echo $message->from_id?>">
												    <input type="hidden" name="reply_to_user_type" id="reply_to_user_type" value="<?php echo $message->from_user_type?>">
													<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:showinbox();">Close</button>
													<button type="button" class="btn btn-primary btn-send-reply" >Send</button>
												  </div>
												 <!-- end reply -->
												 </form>
											
										