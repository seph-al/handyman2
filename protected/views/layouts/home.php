<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Handyman.com is the best place to find a professional contractor. Let us help you with your home ideas including how-to books, projects ideas, gifts, home plans and more." />
<meta name="keywords" content="Handyman, Contractors, Home Services, Home Improvement, Improvement, Home, Remodeling, General Contractors, Electrical, Plumbing, Roofing, Siding, Handyman, handyman.com, Windows, Additions, Bathroom Remodeling, Interior Design, Kitchen Remodeling, Landscaping, Air Conditioning, Heating, Ventilation, Locksmith, Fences, Flooring, Appliance, Architects, Cabinets, Carpentry, Decks, Doors, Drywall, Glass Installation, Gutters, Home Inspectors, dsl.com, Handyman, Handyman Pro, Local, Service, Services, Home Building, House Cleaning, Insulation, Lawns, Masonry, Painting, Patios, Pest Control, Plastering, Skylights, Sprinklers, Sunrooms, Tiling, Tree Service, Wallpaper, Water Heaters, Waterproofing, Drain, Sewer Cleaning, Water Heaters, Heaters, Emergency, Emergency Service, Handyman, Handyman.com, ecorp.com, home improvement, improvement, home, remodeling, electrical, plumbing, roofing, siding, handyman, windows, additions, bathroom remodeling, interior design, kitchen remodeling, landscaping, air conditioning, heating, ventilation, locksmith, fences, flooring, appliance, appliances, appliance repair, cabinets, carpentry, decks, doors, drywall, glass installation, gutters, home inspectors, home building, house cleaning, insulation, lawns, masonry, painting, patios, plastering, drywall, skylights, sprinklers, sunrooms, wallpaper, water heaters, waterproofing, drain, sewer cleaning, water heaters, heaters, emergency, emergency service" />
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">





<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
<!-- Optional theme -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/side-article.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/global.js"></script>
<input type="hidden" name="base_url" id="base_url" value = "<?php echo Yii::app()->request->baseUrl; ?>">

<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-29828968-27']);
_gaq.push(['_setDomainName', 'handyman.com']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29828968-27', 'handyman.com');
  ga('send', 'pageview');

</script>

</head>
<body role="document">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:0px;top:50px;">
<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
<a class="addthis_button_tweet" tw:count="vertical"></a>
<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
<a class="addthis_counter"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4fe9167f4e8be743"></script>
<!-- AddThis Button END -->

<!-- Fixed navbar -->
<div class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/">
<img class="hlogo" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-handyman-1.png" alt="Handyman.com" title="Handyman"></a>
</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav pull-right">
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/">Home</a></li>
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cities <b class="caret"></b></a>
<ul class="dropdown-menu uwidth">
<form class="form-inline fbg" role="form">
<div class="form-group">
<input type="text" value="search city" placeholder="Search City" class="form-control" id="homesearch_keyword">
<span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
</form>
<div id="search_cities">
<?php $cities = Yii::app()->Ini->getCities('RAND()',10);?>
<?php if (count($cities)>0):?>
<?php foreach($cities as $k=>$v):?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/city/<?php echo $v->RewriteUrl?>"><?php echo $v->Name?></a></li>
<?php endforeach;?>
<?php endif;?>
<?php ?>
<li class="view-more"><a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">View More<span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Top Cities</h4>
</div>
<div class="modal-body">
<div id="MajorCities">
<div class="column">
<ul>
<?php $all_cities = Yii::app()->Ini->getCities();?>
<?php $total = ceil((count($all_cities))/3);?>
<?php $ai = 1;?>
<?php foreach($all_cities as $k=>$v):?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/city/<?php echo $v->RewriteUrl?>"><?php echo $v->Name?></a></li>
<?php if (($ai % $total)==0):?>
</ul>
</div>
<div class="column">
<ul>
<?php endif?>
<?php $ai++?>
<?php endforeach;;?>
</ul>
</div>

<div style="clear:both"></div>
</div>
</div>
<!--<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div> -->
</div>
</div>
</div>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/how-it-works">How It Works</a></li>
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
<ul class="dropdown-menu">
<?php if (Yii::app()->user->isGuest || Yii::app()->user->role=='homeowner'):?>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post">Post A Project</a></li>
<?php endif;?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find">Find A Contractor</a></li>
<?if(!Yii::app()->user->isGuest):?>
		<?if(Yii::app()->user->role=='contractor'):?>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/find">Find Projects</a></li>
		<?endif;?>	
<?endif;?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral Program</a></li>
</ul>

</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/questions">Discussions</a></li>
<li><a href="http://www.media.handyman.com" target="_blank">Media</a></li>

<?php if (Yii::app()->user->isGuest):?>

<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">SignUp <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/signup">Contractor SignUp</a></li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post">HomeOwner SignUp</a></li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral</a></li>
</ul>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/login">Login</a></li>
<?php else:?>
	<?php if (Yii::app()->user->role=='homeowner'):?>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral</a></li>
	<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo Yii::app()->user->loginname?> <b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/home-owner">My Dashboard</a></li>
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/homeowner-account">My Account</a></li>
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-inbox">My Inbox</a></li>
		<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/logout">Logout</a></li>
		</ul>
	</li>
	<?php endif;?>
	<?php if (Yii::app()->user->role=='contractor'):?>
		<li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" >Referral <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <?php $model = Contractors::model()->findByPk(Yii::app()->user->id)?>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/refer/<?php echo $model->Username?>">Badges</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Widgets</a></li>
			</ul>
		</li>
		<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo Yii::app()->user->loginname?> <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/contractor">Dashboard</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-inbox">Inbox</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-profile">My Profile</a></li>

				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-account">My Account</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/logout">Logout</a></li>
			</ul>
		</li>
	<?php endif;?>
<?php endif;?>
</ul>
</div>
<!--/.nav-collapse -->
</div>
</div>
<?php echo $content; ?>

<div class="footerup" >
<div class="container">
<div class="row text-center" style="padding:15px 0px 15px;font-size:smaller;">
<a  href="/contractor/find/city/albany-ny/">Albany</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/albuquerque-nm/">Albuquerque</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/dallas-tx/">ALL orange county</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/atlanta-ga/">Atlanta</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/austin-tx/">Austin</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/baltimore-md/">Baltimore</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/birmingham-al/">Birmingham</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/boston-ma/">Boston</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/buffalo-ny/">Buffalo</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/charlotte-nc/">Charlotte</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/chicago-il/">Chicago</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/cincinnati-oh/">Cincinnati</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/cleveland-oh/">Cleveland</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/columbia-sc/">Columbia</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/columbus-oh/">Columbus</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/denver-co/">Denver</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/detroit-mi/">Detroit</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/grand-rapids-mi/">Grand Rapids</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/greensboro-nc/">Greensboro</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/greenville-sc/">Greenville</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/harrisburg-pa/">Harrisburg</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/hartford-ct/">Hartford</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/honolulu-hi/">Honolulu</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/houston-tx/">Houston</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/indianapolis-in/">Indianapolis</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/jacksonville-fl/">Jacksonville</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/kansas-city-mo/">Kansas City</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/knoxville-tn/">Knoxville</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/las-vegas-nv/">Las Vegas</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/little-rock-ar/">Little Rock</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/los-angeles-ca/">Los Angeles</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/louisville-ky/">Louisville</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/memphis-tn/">Memphis</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/miami-fl/">Miami</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/milwaukee-wi/">Milwaukee</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/mobile-al/">Mobile</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/nashville-tn/">Nashville</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/new-orleans-la/">New Orleans</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/norfolk-va/">Norfolk</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/oklahoma-city-ok/">Oklahoma City</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/philadelphia-pa/">Philadelphia</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/phoenix-az/">Phoenix</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/pittsburgh-pa/">Pittsburgh</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/portland-or/">Portland</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/providence-ri/">Providence</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/raleigh-nc/">Raleigh</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/richmond-va/">Richmond</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/sacramento-ca/">Sacramento</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/saint-louis-mo/">Saint Louis</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/salt-lake-city-ut/">Salt Lake City</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/san-antonio-tx/">San Antonio</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/san-diego-ca/">San Diego</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/san-francisco-ca/">San Francisco</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/seattle-wa/">Seattle</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/tampa-fl/">Tampa</a>&nbsp;|&nbsp;
<a  href="/contractor/find/city/west-palm-beach-fl/">West Palm Beach</a>&nbsp;|&nbsp;





<br />
  </div>
</div>
</div>
<footer>
<div class="footer">
<div class="container">
<div class="row-fluid">
<div class="col-md-12 padtopBot15">
<ul class="col-md-3 footerUl2">
<li>
<h1>How It Works</h1>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/signup">Contractor Registration</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find">Find Contractor</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/find">Find Projects</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/faq">FAQ</a>
</li>
</ul>
<ul class="col-md-3 footerUl2">
<li>
<h1>How Can We Help You?</h1>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/about">About us</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/privacy">Privacy Policy</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/terms">Terms &amp; Conditions</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/partners">Partners</a>
</li>
<!--<li><a href="">Testimonial</a>
</li>-->
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/contactus">Contact Us</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/sitemap">Sitemap</a>
</li>

<li><a href="http://onlinerentersinsurance.org/" target="_blank">Renters Insurance</a>
</li>

</ul>
<ul class="col-md-3 footerUl1">
<li class="margBot0">
<h1>Follow Us</h1>
</li>
<li>
<!-- AddThis Follow BEGIN -->
<div class="addthis_toolbox addthis_32x32_style addthis_vertical_style">
<a class="addthis_button_facebook_follow" addthis:userid="pages/Handymancom/170950322960451"></a>
<a class="addthis_button_twitter_follow" addthis:userid="handymancom"></a>
<a class="addthis_button_google_follow" addthis:userid="u/0/104922706084588776464/"></a>
<a class="addthis_button_youtube_follow" addthis:userid="handymancom"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-537d902b2f0c08f4"></script>
<!-- AddThis Follow END -->
</li>
</ul>
<div class="col-md-3 footerLftSide alignCenter">
<h2 class="footerLftSideHead">Why Handyman?</h2>
<span class="footerLftSideDesc alignLft">
Handyman.com will find various experienced, and professional contractors in your area, who will efficiently fulfill your home repair or remodel needs. Click here and find a local Handyman today.			</span>
<a class="footerjobpost relative" href="<?php echo Yii::app()->request->baseUrl; ?>/project/post">
Post Project

<span class="footerBtnArrow"></span>
<span class="footerPostMsg">Please login as a Home Owner</span>

</a>
</div>
</div>
</div>
<div class="copyrightContain">
<div class="copyright">Powered by <a href="" target="blank">Copyright@2014 - HandyMan</a>
</div>
</div>
</div>
</div>
</footer>
	
	

</body>
</html>