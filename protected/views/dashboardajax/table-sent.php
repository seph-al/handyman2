<?php if (count($sent)>0):?>
															       <?php foreach ($sent as $k=>$v):?>
															         <tr id="messagesentrow_<?php echo $v->message_id?>">
									                                
									                                    <td class="inbox-small-cells">
									                                        <div class="checker"><span><input type="checkbox" class="mail-checkbox" value="<?php echo $v->message_id?>"></span></div>
									                                    </td>
									                                     <td class="inbox-small-cells">
								                                        <i class="fa fa-star"></i>
								                                    </td>
									                                    <td class="view-message hidden-xs">
									                                       <?php 
															                 if ($v->to_user_type == "homeowner"){
															                 	 echo '<a href="'.Yii::app()->request->baseUrl .'/homeowner/profile/user/'.$v->hto->username.'" target="_blank">'.$v->hto->firstname." ".$v->hto->lastname ." - (homeowner)</a>";
															                 }else {
															                 	 echo '<a href="'.Yii::app()->request->baseUrl .'/contractor/profile/user/'.$v->cto->Username.'" target="_blank">'. $v->cto->Name."-".$v->cto->ContactName." - (contractor)</a>";
															                 }
															               ?>
									                                    </td>
									                                    <td class="view-message view-message">
									                                     <a href="javascript:void(0)" class="messageSentView" id="message_<?php echo $v->message_id?>"><?php echo $v->subject?></a>
									                                    </td>
									                                    <td class="view-message inbox-small-cells">
									                                    </td>
									                                    <td class="view-message text-right">
									                                        <?php echo date("F d", strtotime($v->date_sent));?>
									                                    </td>
									                                   </tr>
									                                 <?php endforeach;?>
<?php endif;?>