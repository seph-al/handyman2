<?php if (count($messages)>0):?>
    <?php foreach ($messages as $k=>$v):?>
          <tr id="messagerow_<?php echo $v->message_id?>" >

				                                    <td class="inbox-small-cells">
				                                        <div class="checker"><span><input type="checkbox" class="mail-checkbox" value="<?php echo $v->message_id?>"></span></div>
				                                    </td>
				                                     <td class="inbox-small-cells">
			                                        <i class="fa fa-star"></i>
			                                    </td>
				                                    <td class="view-message hidden-xs">
				                                       <?php
													                 if ($v->from_user_type == "homeowner"){
													                 	 echo '<a href="'.Yii::app()->request->baseUrl .'/homeowner/profile/user/'.$v->hfrom->username.'" target="_blank">'.$v->hfrom->firstname." ".$v->hfrom->lastname ." - (homeowner)</a>";
													                 }else {
													                 	echo '<a href="'.Yii::app()->request->baseUrl .'/contractor/profile/user/'.$v->cfrom->Username.'" target="_blank">'.$v->cfrom->Name."-".$v->cfrom->ContactName." - (contractor)</a>";
													                 }
													               ?>
				                                    </td>
				                                    <td class="view-message view-message">
				                                       <a href="javascript:void(0)" class="messageView" id="message_<?php echo $v->message_id?>"><?php echo $v->subject?></a>
				                                    </td>
				                                    <td class="view-message text-right">
				                                        <?php echo date("F d", strtotime($v->date_sent));?>
				                                    </td>
				                                    <td class="view-message inbox-small-cells">
				                                    </td>
				                                   </tr>
				                                 <?php endforeach;?>
<?php endif;?>