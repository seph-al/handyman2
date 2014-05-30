<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/referral.css">	

<br />
<br />
 
 <div class="container overflow-ad">
<div class="row-fluid">
                    <!-- div style="position:relative;">
                        <div class="animated rotateIn r-d badge-postn">
                            <a href="<?=$domain_affiliate_link;?>" target="_blank" alt="Contrib">
                                <img src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/badge-contrib-3.png">
                            </a>
                        </div>
                    </div -->
                    <div class="content-ad" style="text-align: justify;">
                        <div style="margin-top: -40px;" class="text-center">
                            <? if($logo!=''){ ?>
                            <a href="http://<?=$domain?>"><img src="<?=$logo?>" alt="<?=$title?>" title="<?=$domain?>" style="max-width:500px" border="0" /></a>
                            <? }else{ ?>
                            <h1><?=ucwords($domain)?></h1>
                            <? } ?>
                            <h4>Learn more about Joining our Partner Network</h4>
                        </div>
                        <a name="top"></a>




                        <div class="padd-banner">
                            <iframe src="http://referrals.contrib.com/aff_index.php?affiliate=<?=$domain?>" width="800px" height="800px" scrolling="auto" frameborder="0" seamless></iframe>
                           
                            <div class="banner-main">
                                <dl class="dl-horizontal banner-info">
                                    <dt>Marketing Group</dt><dd>Contrib</dd>
                                    <dt>Banner Size</dt><dd>728 x 90</dd>
                                    <dt>Banner Description</dt><dd><?echo ucfirst($domain)?> Banner</dd>
                                    <dt>Target URL</dt><dd>http://<?echo $domain?></dd>
                                </dl>

                                <div class="floating text-center banner-img-cont">
                                    <div class="wrap-allbanner">
                                        <div class="wrap-bannerLeft">
                                            <p href="" class="aBnnrP ellipsis" style="<!--display:none;-->">
                                                <!--wellnesschallenge.com-->
                                                <img class="logo-banners1" src="<?echo $logo?>" alt="<?echo $domain?>">
                                            </p>
                                        </div>
                                        <div class="wrap-bannerRight ">
                                            <div class="content-rightText ">
                                                <span class="">Follow , Join and</span>
                                                <p class="ellipsis">Partner with Contrib.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center banner-source">Source Code - Copy/Paste Into Your Website</p>
                                <textarea class="text-left input-block-level" rows="3" onclick="this.focus();this.select()" readonly="readonly">
                                    <script type="text/javascript" src="http://www.contrib.com/widgets/leadbanner/<?echo $domain?>/<?echo $domainid?>"></script>
                                </textarea>
                            </div>
                            <div class="banner-main">
                                <dl class="dl-horizontal banner-info">
                                    <dt>Marketing Group</dt><dd>Contrib</dd>
                                    <dt>Banner Size</dt><dd>180 x 150</dd>
                                    <dt>Banner Description</dt><dd><?echo ucfirst($domain)?> Banner</dd>
                                    <dt>Target URL</dt><dd>http://<?echo $domain?></dd>
                                </dl>

                                <div class="floating text-center banner-img-cont">
                                    <div class="wrapBanner-2">
                                        <div class="wrap-topBanner ">
                                            <div class="wrap-contentTop">
                                                <span>Follow, Join</span>
                                                <span>and Partner with</span>
                                            </div>
                                        </div>
                                        <div class="wrap-downBanner">
                                            <div class="wrap-contentDown">
                                                <p href="" class="ellipsis">
                                                    <img src="<?echo $logo?>" alt="<?echo $domain?>">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center banner-source">Source Code - Copy/Paste Into Your Website</p>
                                <textarea class="text-left input-block-level" rows="3" onclick="this.focus();this.select()" readonly="readonly">
                                    <script type="text/javascript" src="http://www.contrib.com/widgets/roundleadbanner/<?echo $domain?>/<?echo $domainid?>"></script>
                                </textarea>
                            </div>
                        </div>
                    </div>
</div>
</div>