<?php $this->renderPartial('navigation',array('pages'=>'dashboard')); ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dash-contractor.css">
	<!-- Contarctor My account changes -->
	  <div class="container dash-constr" id="my_dashboard">
            
			
			
			<div class="row">
                <div class="col-lg-7">
                    <div class="row">
						<?
							$team_invites_count = count($team_invites);
							if($team_invites_count > 0):?>
								<div class="alert alert-info">You have <strong><?echo $team_invites_count?> team invite<?echo $team_invites_count > 1 ? 's':''?></strong>.
									<a href="/contractor/teamrequests" class="btn btn-warning">View all</a></div>
						<?endif;?>
                        <div class="col-lg-6">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php echo $message_count?>
                                    </div>
                                    <div class="desc">
                                        Message Inbox
                                    </div>
                                </div>
                                <a href="/dashboard/my-inbox" class="more">
                                View more <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </div>
                        </div>
                      <div class="col-lg-6">
                            <div class="dashboard-stat red-intense">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?echo $views_count?>
                                    </div>
                                    <div class="desc">
                                        Profile Views
                                    </div>
                                </div>
                                <a href="#" class="more">
                                Feature coming soon <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard-stat green-haze">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?echo $latest_project_count?>
                                    </div>
                                    <div class="desc">
                                        Latest Projects <?//echo " from  ".$from." ".$to?>
                                    </div>
                                </div>
                                <a href="/project/find" class="more">
                                View more <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard-stat purple-plum">
                                <div class="visual">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <div class="details">
                                    <div class="number"><?echo $points; ?>	Points</div>
                                    <div class="desc">
                                        Check out your <br>Profile
                                    </div>
                                </div>
                                <a href="/contractor/profile/user/<?echo $model->Username?>" class="more">
                                View more <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <a href="/contractor/profile/user/<?echo $model->Username?>" class="welc-a">
                    <div id="NotiFounderWrap">
                        <div class="wrap-rltv-noti">
                            <div class="ic_color_tab"></div>
                            <div class="ic_avatar_wrapper">
                                <img class="ic_avatar" alt="Handyman" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-handyman-1.png"/>
                            </div>
                            <div class="noti-content-wrap-ic">
                                <div class="ic_message_body_wrapper">
                                    <div class="ic_message_body">
                                        <div class="ic_content_wrapper">
                                            <h1>Welcome to Handyman</h1>
                                            <p>Hey there!,</p>
                                            <p>
                                                Your Contractor profile allows you to promote your Contractor business and service within your community and to homeowners that are in need of your services.
                                            </p>
                                            <p>
                                                We are still in beta and would love to get feedback from you with regards to features that you want to add to Handyman.com
                                            </p>
                                            <p>
                                               View your Contractor Profile 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
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
	
	
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/contractordash.js"></script>
