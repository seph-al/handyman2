	  <div class="modal-header in-bg">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-envelope"></span>&nbsp;<?php echo $message->subject?></h4>
										  </div>
										  <div class="modal-body in-bg">
											<div class="msg-sub">
												<p class="msg-from"><span class="glyphicon glyphicon-user"></span>&nbsp;
												 <?php 
                                                 if ($from == 'inbox'){
													 if ($message->from_user_type == "homeowner"){
													   	  echo $message->hfrom->firstname." ".$message->hfrom->lastname;
													   	  }else {
													   	  	echo $message->cfrom->Name."-".$message->cfrom->ContactName ;
													   	  }
                                                 }else {
                                                  if ($message->to_user_type == "homeowner"){
													   	  echo $message->hto->firstname." ".$message->hto->lastname;
													   	  }else {
													   	  	echo $message->cto->Name."-".$message->cto->ContactName ;
													   	  }
                                                 }  	  
												 ?>
												</p>
												<p class="msg-date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo date("m/d/Y h:i a", strtotime($message->date_sent));?></p>
												<p style="clear:both"></p>
											</div>
											<div class="msg-con">
												<p><?php echo $message->message; ?></p>
											</div>
										  </div>
										  <div class="modal-footer">
										   <input type="hidden" name="from" id="from" value="<?php echo $from?>">
											<button type="button" id="message_<?php echo $message->message_id?>" class="btn btn-default message-delete-btn">Delete</button>
											<?php if ($from == 'inbox'):?>
											<button type="button"  id="message_<?php echo $message->message_id?>"  class="btn btn-success message-reply-btn" data-toggle="collapse" data-target="#reply-msg">Reply</button>
											<?php endif;?>
											
												
</div>

 