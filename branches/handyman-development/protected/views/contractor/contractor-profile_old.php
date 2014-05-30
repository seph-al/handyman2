<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd ">
        <div class="wrap-sub-bckgrnd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-1 col-xs-3">
                                <img class="img-circle img-polaroid" src="<?echo $logo == false ? 'http://www.justmail.in/platinum/images/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$logo?>">
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
                    <div class="col-lg-4">
                        <div class="profile-overlay">
                            <div class="top-overlay">
                                <a href="#reviews" class="btn btn-warning btn-lg btn-block">REVIEWS</a>
                                <a href="" class="btn btn-info btn-lg btn-block">CONTACT US</a>
								<?if($is_my_profile == true):?>
										<a href="/dashboard/my-profile" class="btn btn-success btn-lg btn-block">EDIT PROFILE</a>
								<?endif;?>
                            </div>
                        </div>
                    </div>
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
                    <div class="panel panel-default panel-style1 back-1">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
	