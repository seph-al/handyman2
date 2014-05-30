<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profile.css">
    <div class="header-bckgrnd ">
        <div class="wrap-sub-bckgrnd">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-1 col-xs-3">
                                <img class="img-circle img-polaroid" src="<?echo $profile_pic == false ? 'http://www.justmail.in/platinum/images/clapper.png':Yii::app()->request->baseUrl.'/uploads/profile/'.$profile_pic?>">
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
                                    <li>
                                        <i class="fa fa-check"></i> Mobile: <?echo $phone?>
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i>  Email: <?echo $email?>
                                    </li>
                                    <li>
                                        <i class="fa fa-suitcase"></i> Contact: <?echo $email?>
                                    </li>
									<?if($fax!=""):?>
										<i class="fa fa-suitcase"></i> Contact: <?echo $email?>
									<?endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="profile-overlay">
                            <div class="top-overlay">
                                <a href="#reviews" class="btn btn-warning btn-lg btn-block">REVIEWS</a>
                                <a href="" class="btn btn-info btn-lg btn-block">CONTACT US</a>
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
                    <div class="panel panel-default panel-style1">
                        <div id="reviews" class="panel-heading">
                            reviews
                            <div class="pull-right ratings">
                                5 out of 5 stars, based on 5 reviews
                            </div>
                            <span class="clearfix"></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row user-rvws">
                                        <div class="col-lg-12 col-xs-3">
                                            <img src="http://d3flf7kkefqaeh.cloudfront.net/_assets/128x128_no_pht.png" class="img-circle" alt="default reviewer logo">
                                        </div>
                                        <div class="col-lg-12 col-xs-9">
                                            <strong>Anonymous </strong>
                                            <div class="location">
                                                <span class="glyphicon glyphicon-map-marker"></span>&nbsp;Yorba Linda, CA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="panel panel-default panel-under-style2">
                                        <div class="panel-heading">
                                            September 7, 2014
                                        </div>
                                        <div class="panel-body">
                                            I just want to say that Timberland Development built a 2200 sqft house for me and my family in 2 mo I think that is record time. they always were professional,on time and clean the job at the end of each day. The work was impeccable.! I would recommend them to all friends and family which I normally would not do ....Thanks Dino and the gang
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row user-rvws">
                                        <div class="col-lg-12 col-xs-3">
                                            <img src="http://d3flf7kkefqaeh.cloudfront.net/_assets/128x128_no_pht.png" class="img-circle" alt="default reviewer logo">
                                        </div>
                                        <div class="col-lg-12 col-xs-9">
                                            <strong>Anonymous </strong>
                                            <div class="location">
                                                <span class="glyphicon glyphicon-map-marker"></span>&nbsp;Yorba Linda, CA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="panel panel-default panel-under-style2">
                                        <div class="panel-heading">
                                            September 7, 2014
                                        </div>
                                        <div class="panel-body">
                                            I just want to say that Timberland Development built a 2200 sqft house for me and my family in 2 mo I think that is record time. they always were professional,on time and clean the job at the end of each day. The work was impeccable.! I would recommend them to all friends and family which I normally would not do ....Thanks Dino and the gang
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row user-rvws">
                                        <div class="col-lg-12 col-xs-3">
                                            <img src="http://d3flf7kkefqaeh.cloudfront.net/_assets/128x128_no_pht.png" class="img-circle" alt="default reviewer logo">
                                        </div>
                                        <div class="col-lg-12 col-xs-9">
                                            <strong>Anonymous </strong>
                                            <div class="location">
                                                <span class="glyphicon glyphicon-map-marker"></span>&nbsp;Yorba Linda, CA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="panel panel-default panel-under-style2">
                                        <div class="panel-heading">
                                            September 7, 2014
                                        </div>
                                        <div class="panel-body">
                                            I just want to say that Timberland Development built a 2200 sqft house for me and my family in 2 mo I think that is record time. they always were professional,on time and clean the job at the end of each day. The work was impeccable.! I would recommend them to all friends and family which I normally would not do ....Thanks Dino and the gang
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="row user-rvws">
                                        <div class="col-lg-12 col-xs-3">
                                            <img src="http://d3flf7kkefqaeh.cloudfront.net/_assets/128x128_no_pht.png" class="img-circle" alt="default reviewer logo">
                                        </div>
                                        <div class="col-lg-12 col-xs-9">
                                            <strong>Anonymous </strong>
                                            <div class="location">
                                                <span class="glyphicon glyphicon-map-marker"></span>&nbsp;Yorba Linda, CA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="panel panel-default panel-under-style2">
                                        <div class="panel-heading">
                                            September 7, 2014
                                        </div>
                                        <div class="panel-body">
                                            I just want to say that Timberland Development built a 2200 sqft house for me and my family in 2 mo I think that is record time. they always were professional,on time and clean the job at the end of each day. The work was impeccable.! I would recommend them to all friends and family which I normally would not do ....Thanks Dino and the gang
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                    <p><a href="" class="btn btn-info btn-lg">Click to write a review</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
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