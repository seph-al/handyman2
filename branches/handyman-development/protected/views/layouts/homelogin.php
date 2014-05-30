 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">	
</head>

<body role="document">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button> <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">HandyMan</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cities <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<?php if (count($this->cities)>0):?>
						   <?php foreach($this->cities as $k=>$v):?>
							<li><a href="#"><?php echo $v->Name?></a></li>
							<?php endforeach;?>
					    <?php endif;?>		
						</ul>
					</li>
					<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/how-it-works">How It Works</a></li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/postproject">Post A Project</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/find-contractor">Find Contractor</a></li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/find-projects">Find Projects</a></li>
						</ul>
					</li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
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
							<li><a href="">Contractor Registration</a>
							</li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/find-contractor">Find Contractor</a>
							</li>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/find-projects">Find Projects</a>
							</li>
							<li><a href="">FAQ</a>
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
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/referral">Referral</a>
							</li>
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
							<h2 class="footerLftSideHead">The Best Way to Find a Reliable Builder</h2>
							<span class="footerLftSideDesc alignLft">
				Every day, thousands of people depend on  Justmail trusted review system to take the worry out of finding professional local builders & Contractor.
			</span>
							<a class="footerjobpost relative" href="<?php echo Yii::app()->request->baseUrl; ?>/home/postproject">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<input type="hidden" name="base_url" id="base_url" value = "<?php echo Yii::app()->request->baseUrl; ?>">
</body>

</html>

