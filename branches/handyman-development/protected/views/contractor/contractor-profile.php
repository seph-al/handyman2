<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd ">
        <div class="wrap-sub-bckgrnd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-1 col-xs-3">
                                <img class="img-circle img-polaroid" src="<?echo $logo == false ? 'http://rdbuploads.s3.amazonaws.com/icons/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$logo?>">
                            </div>
                            <div class="col-lg-11 col-xs-9">
                                <span class="name">
                                    <? echo $company?>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-inline ul-profile">
                                    <li>
                                        <i class="fa fa-bar-chart-o"></i> Address: <?echo $address1?>,<?echo $city?>, <?echo $state?> <?echo $zipcode?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<?php if(!Yii::app()->user->isGuest):?>
                    <div class="col-lg-4">
                        <div class="profile-overlay">
                            <div class="top-overlay">
                                <!--<a href="#reviews" class="btn btn-warning btn-lg btn-block">REVIEWS</a>-->
                                 <?if(!Yii::app()->user->isGuest && $is_my_profile == false):?>
									<a data-toggle="modal" data-target="#messageModal" class="btn btn-info btn-lg btn-block">CONTACT US</a>
								<?endif;?>
								<?if($is_my_profile == true):?>
										<a href="/dashboard/my-profile" class="btn btn-success btn-lg btn-block">EDIT PROFILE</a>
								<?endif;?>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-profile-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">About the Contractor</div>
                        <div class="panel-body">
                            <?echo $about?>
                        </div>
						 <div class="panel-heading">Services</div>
                        <div class="panel-body">
                            <?echo $services?>
                        </div>
                       <!-- <ul class="list-group">
                            <li class="list-group-item li-heading">services</li>
                            <li class="list-group-item">
                                <ul class="list-inline ul-under-panel">
                                    <li>
                                        <a href="">
                                            New Construction
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">Room Additions</a>
                                    </li>
                                    <li>
                                        <a href="">Commercial</a>
                                    </li>
                                    <li>
                                        <a href="">general</a>
                                    </li>
                                    <li>
                                        <a href="">2nd story additions</a>
                                    </li>
                                    <li>
                                        <a href="">large renovations</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>-->
                    </div>
					
                   <?php $this->renderPartial('../contractorajax/feedback',array('feedback'=>$feedback,'is_my_profile'=>$is_my_profile,'contractor_id'=>$contractor_id)); ?>
                </div>
                <div id="credentials" class="col-lg-4">
                   <!-- <div class="panel panel-default panel-style1 back-1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="wrap-number-rank">
                                        <span class="number-rank text-center ">
                                            2997
                                        </span>
                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-inline hnd-ranking-star text-center">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span class="meta-handyman">HANDYMAN</span>
                                    <span class="meta-points">POINTS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">Key Business Information</div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3 col-lg-12">
                                        <div id="licensed-badge" class="bz-badge standard-badge"></div>
                                    </div>
                                    <div class="col-lg-9 col-lg-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                BuildZoom Score
                                            </li>
                                            <li>
                                                <a href="">Learn how the BuildZoom Score is calculated</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel panel-default panel-style1">
                        <div class="panel-heading">Team</div>
                        <div class="panel-body">
                            <div class="row team-member">
                                <div class="col-lg-3 col-lg-12 team-img">
                                    <img src="http://d3uyjocb29uv4r.cloudfront.net/api/file/8OOUt4GRk6Do2baO7Jgm/convert?w=60&amp;h=60&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true&amp;align=faces" class="img-circle" alt="team member image">
                                </div>
                                <div class="col-lg-9 col-lg-12 description">
                                    <div><b>Dino</b></div>
                                    <div>Owner</div>
                                </div>
                            </div>
                            <div class="row team-member">
                                <div class="col-lg-3 col-lg-12 team-img">
                                    <img src="http://d3uyjocb29uv4r.cloudfront.net/api/file/SirBNlUuRGmWUBJrQND4/convert?w=60&h=60&fit=crop&quality=50&cache=true&compress=true&align=faces" class="img-circle" alt="team member image">
                                </div>
                                <div class="col-lg-9 col-lg-12 description">
                                    <div><b>Luke</b></div>
                                    <div>Co-Owner</div>
                                </div>
                            </div>
                        </div>
                    </div>-->
					<div class="panel panel-default panel-style1">
					<div class="panel-heading">Connect with us</div>
					<div class="panel-body">
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fhandymancom&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=286087838227017" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowTransparency="true"></iframe></div>
					<br />
					<a class="twitter-timeline"  href="https://twitter.com/handymancom"  data-widget-id="471943687279099904">Tweets by @handymancom</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


					</div>
                </div>
            </div>
        </div>
    </div>
	
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myprofile.js"></script>	
	
<?if($profile_exists):?>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Message to <?echo $company?></h4>
      </div>
      <div class="modal-body">
			<div id="send_result">&nbsp;</div>
			<form role="form">
			  <div class="form-group">
				<label for="exampleInputEmail1">Subject</label>
				<input type="text" class="form-control"  id="send_message_subject" name="send_message_subject">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Message</label>
				<textarea class="form-control" rows="5" placeholder="Write Message" id="send_message_content" name="send_message_content"></textarea>
			  </div>
			  <input type="hidden" name="contractor_id" id="contractor_id" value="<?echo $contractor_id?>" />
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-loading-text="Verifying..." id="sendmessage"><span class="glyphicon glyphicon-envelope"></span> Send</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_for_image">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?echo $company?> Work Pictures</h4>
      </div>
      <div class="modal-body" style="text-align:center">
			<img src="" id="modal_image_shown" alt="No data available"/>
      </div>
      <div class="modal-footer">
		&nbsp;      
	   </div>
    </div>
  </div>
</div>

<?endif;?>	