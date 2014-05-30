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
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/global.js"></script>
    <input type="hidden" name="base_url" id="base_url" value = "<?php echo Yii::app()->request->baseUrl; ?>">
	
</head>

<body role="document">
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
					<img class="hlogo" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-handyman-1.png"></a>
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cities <b class="caret"></b></a>
						<ul class="dropdown-menu uwidth">
						<form class="form-inline fbg" role="form">
							  <div class="form-group">
								<label class="control-label">Search City</label>
								<input type="text" class="form-control" id="homesearch_keyword">
								<span class="glyphicon glyphicon-search form-control-feedback"></span>
							  </div>
							</form>
							<div id="search_cities">
							<?php $cities = Ini::getCities('RAND()',10);?>
						<?php if (count($cities)>0):?>
						   <?php foreach($cities as $k=>$v):?>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/city/<?php echo $v->RewriteUrl?>"><?php echo $v->Name?></a></li>
							<?php endforeach;?>
					    <?php endif;?>		
					    <?php ?>
					    	<li class="view-more"><a href="" class="btn btn-info" data-toggle="modal" data-target="#myModal">View More<span class="glyphicon glyphicon-chevron-right"></span></a></li>
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
											<?php $all_cities = Ini::getCities();?>
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
								<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/find">Find Projects</a></li>
								<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral Program</a></li>
							</ul>
						</li>
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
						     <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/home-owner">My Projects</a></li>
						     <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/logout">Logout</a></li>
						  <?php endif;?>
						  <?php if (Yii::app()->user->role=='contractor'):?>
						  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/my-account">My Account</a></li>
						     <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/logout">Logout</a></li>
						  <?php endif;?>
						  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral</a></li>
					<?php endif;?>
				</ul>
				<?php if (!Yii::app()->user->isGuest):?>
				<a href="#" class="frt clr">	<span class="bold color4">Hi, <?php echo Yii::app()->user->loginname?></span></a>
				<?php endif;?>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
    <?php echo $content; ?>
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
							<!--<li><a href="">Testimonial</a>
							</li>-->
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/contactus">Contact Us</a>
							</li>
						</ul>
						<ul class="col-md-3 footerUl1">
							<li class="margBot0">
								<h1>Follow Us</h1>
							</li>
							<li>
								<a href="www.facebook.com">	<span class="fbTwImage">
						<img src="http://icons.iconarchive.com/icons/yootheme/social-bookmark/32/social-facebook-box-blue-icon.png" alt="" title="Facebook" />
					</span>
									<span class="fbTwitterFooterCnt">Facebook</span>
								</a>
							</li>
							<li>
								<a href="www.twitter.com">	<span class="fbTwImage">
						<img src="http://icons.iconarchive.com/icons/yootheme/social-bookmark/32/social-twitter-box-blue-icon.png" alt="" title="Twitter" />
					</span>
									<span class="fbTwitterFooterCnt">Twitter</span>
								</a>
							</li>
							<li>
								<a href="www.google.com">	<span class="fbTwImage">
						<img src="http://icons.iconarchive.com/icons/yootheme/social-bookmark/32/social-google-box-blue-icon.png" alt="" title="google" />
					</span>
									<span class="fbTwitterFooterCnt">google</span>
								</a>
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

