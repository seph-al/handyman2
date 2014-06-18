<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/referral.css">	
<div class="container">
	<div class="row-fluid margTop15 margBot20">
		<div class="padd-banner">
			<?php
				//var_dump($partners);
			?>	
				<div class="banner-main center-block">
					<div class="row">
						<center><img style="width:500px;" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-handyman-1.png" /><br />
							<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/home/contactus">
											Join Our Partner Network
							</a></center>
				</div><!-- row -->
				</div><!-- banner-main center-block -->			
				<div class="banner-main center-block">
					<div class="row">
											<div class="col-lg-4">
												<div class="floating text-center banner-img-cont">
													<a href="http://contrib.com" target="_blank">
														<img style="border:0px;width:300px" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-contrib-green13.png" alt="" />
													</a>
												</div>
											</div>
											<div class="col-lg-7">
												<h2><a href="http://contrib.com">Contrib.com</a></h2>
												<p>Our network of Contributors power our domains. Browse through our Marketplace of People, Partnerships,Proposals and Brands and find your next great opportunity. Join Free Today.</p>
											</div>
						</div><!-- row -->
				</div><!-- banner-main center-block -->
				<div class="banner-main center-block">
					<div class="row">
											<div class="col-lg-4">
												<div class="floating text-center banner-img-cont">
													<a href="http://globalventures.com" target="_blank">
														<img style="border:0px;width:300px" src="http://d2qcctj8epnr7y.cloudfront.net/images/lucille/logo-gv-re283x35.png" alt="" />
													</a>
												</div>
											</div>
											<div class="col-lg-7">
												<h2><a hhref="http://globalventures.com">GlobalVentures.com</a></h2>
												<p>Global Ventures owns a premium network of 20,000 websites and powerful tools to help you build successful companies quickly. Some of the things we offer you include a great domain name with targeted traffic, unique business model, equity ownership, and flexible, performance based compensation. You just need to bring your knowledge, passion and work smart.
													With over 17 years of internet experience, we built a network of over 20,000 websites and created dozens of successful businesses. We would love to work on the next cutting-edge projects with great companies and talented people.</p>
											</div>
						</div><!-- row -->
				</div><!-- banner-main center-block -->
				<div class="banner-main center-block">
					<div class="row">
											<div class="col-lg-4">
												<div class="floating text-center banner-img-cont">
													<a href="http://ifund.com" target="_blank">
														<img style="border:0px;width:300px" src="http://www.contrib.com/uploads/logo/ifund.png" alt="" />
													</a>
												</div>
											</div>
											<div class="col-lg-7">
												<h2><a hhref="http://ifund.com">IFund.com</a></h2>
												<p>iFund is a software as a service crowdfunding platform. iFund is not a registered broker-dealer and does not offer investment advice or advise on the raising of capital through securities offerings. iFund does not recommend or otherwise suggest that any investor make an investment in a particular company, or that any company offer securities to a particular investor. iFund takes no part in the negotiation or execution of transactions for the purchase or sale of securities, and at no time has possession of funds or securities. No securities transactions are executed or negotiated on or through the iFund platform. iFund receives no compensation in connection with the purchase or sale of securities.</p>
											</div>
						</div><!-- row -->
				</div><!-- banner-main center-block -->
				<div class="banner-main center-block">
					<div class="row">
											<div class="col-lg-4">
												<div class="floating text-center banner-img-cont">
													<a href="http://ichallenge.com" target="_blank">
														<img style="border:0px;width:300px" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-ichallenge1.png" alt="" />
													</a>
												</div>
											</div>
											<div class="col-lg-7">
												<h2><a hhref="http://ifund.com">IChallenge.com</a></h2>
												<p>The best internet challenges. Solve and win online prizes.</p>
											</div>
						</div><!-- row -->
				</div><!-- banner-main center-block -->
				
				<?foreach($partners AS $partner):?>
					<div class="banner-main center-block">
						<div class="row">
											<div class="col-lg-4">
												<div class="floating text-center banner-img-cont">
													<a href="<?echo $partner['url']?>" target="_blank">
														<img style="border:0px;width:300px;max-height:200px" src="<?echo $partner['image'] == '' ? 'http://d2qcctj8epnr7y.cloudfront.net/sheina/handyman/Partnership.png' :$partner['image'] ?>" alt="" />
													</a>
												</div>
											</div>
											<div class="col-lg-7">
												<h2><a href="<?echo $partner['url']?>"><?echo $partner['company_name']?></a></h2>
												<?echo stripslashes($partner['summary'])?>
												<?echo stripslashes($partner['description'])?>
												</dl>
											</div>
						</div><!-- row -->
					</div><!-- banner-main center-block -->
				<?endforeach;?>
			
		</div><!-- padd-banner -->
	</div><!-- row-fluid margTop15 margBot20 -->
</div><!-- container -->