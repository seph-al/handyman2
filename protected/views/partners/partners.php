<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/directory.css">
<script type="text/javascript">
	$(document).ready(function(){
		$('p#showAllLink').hide();
		$('#partners-search-btn').click(function(){
			var search_key = $('#search_key').val();
			if(search_key == ""){
				$('#search_key').focus();
				console.log("User is a scumbag.");
			}else{
				var base_url = $('#base_url').val();
				$('#search_results').html('<div class="alert alert-warning"><i class="fa fa-cog fa-refresh fa-2x"></i> Loading ..</div>');
				$.post(base_url+'/partners/getsearchedpartner',{search_key:search_key},function(data_html){
					$('#search_results').html(data_html);
					$('p#showAllLink').show();
				});
			}
		});
		
		$( "#search_key" ).keypress(function( event ) {
		  if ( event.which == 13 ) {
			 event.preventDefault();
			 $('#partners-search-btn').click();
		  }
		});
	});
</script>
<div class="container">
	<div class="row-fluid margTop15 margBot20">
				<div class="col-md-12">
					<div class="directory">
							<ul class="nav nav-tabs" id="myTab">
							  <li class="active"><a href="#A" data-toggle="tab">Official Partners</a></li>
							  <li><a href="#B" data-toggle="tab">Become A Partner!</a></li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="A">
								<div class="tab-pane active" id="A">
								<div class="row">
									<div class="col-md-4">
										<p>&nbsp;</p>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<input type="text" name="search_key" id="search_key" class="form-control" placeholder="Search Partners" />
											
										</div>
										<p id="showAllLink" class="pull-right"><a href="">Show all Partners</a></p>
										<button style="display:none;" id="partners-search-btn" class="btn btn-default" >Search Partners</button>
									</div>
								</div>
								
									<div id="search_results">
									<ul class="media-list">
										<?foreach($partners AS $partner):?>
											<li class="media">
												<div class="pull-right">
													<a href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=<?echo $partner['url']?>" target="_blank">
													 <?if($partner['link_type'] == 'code'):?>
														<?echo base64_decode($partner['code'])?>
													<?elseif($partner['link_type'] == 'link'):?>
														<img class="media-object" src="<?echo $partner['image']?>">
													<?endif;?>
													 
													</a>
												</div>
												<div class="media-body">
													<h3 class="media-heading"><a href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=<?echo $partner['url']?>" target="_blank"><?echo $partner['company_name']?></a></h3>
													<p class="description">
														<?echo stripslashes($partner['summary'])?>
														<?echo stripslashes($partner['description'])?>
													</p>
													<a href="<?echo $partner['url']?>" class="bdge">Go to <span class="badge"><?echo $partner['company_name']?></span></a>
												</div>
											</li>
										<?endforeach;?>
										
										
									</ul>
									</div><!-- search_results -->
								</div>
							</div>
							<div class="tab-pane" id="B">
								<center>
									<iframe width="350px" height="500px" frameborder="0" src="http://domaindirectory.com/servicepage/partners_form.php?domain=handyman.com"></iframe>
								</center>
								<br />
								
								<h3>Official Partners</h3>
								<ul class="media-list">
									<li class="media">
										<a class="pull-right" href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://contrib.com">
											<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-contrib-green13.png">
										</a>
												<div class="media-body">
													<h3 class="media-heading"><a  href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://contrib.com">Contrib.com</a></h3>
													<p class="description">Our network of Contributors power our domains. Browse through our Marketplace of People, Partnerships,Proposals and Brands and find your next great opportunity. Join Free Today.</p>
													<a href="http://www.contrib.com/" class="bdge">Go to <span class="badge">Contrib.com</span></a>
												</div>
									</li>
									<li class="media">
										<a class="pull-right" href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://globalventures.com">
											<img class="media-object" style="width:300px;" src="http://d2qcctj8epnr7y.cloudfront.net/images/lucille/logo-gv-re283x35.png">
										</a>
												<div class="media-body">
													<h3 class="media-heading"><a href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://globalventures.com">GlobalVentures.com</a></h3>
													<p class="description">Global Ventures owns a premium network of 20,000 websites and powerful tools to help you build successful companies quickly. Some of the things we offer you include a great domain name with targeted traffic, unique business model, equity ownership, and flexible, performance based compensation. You just need to bring your knowledge, passion and work smart.
													With over 17 years of internet experience, we built a network of over 20,000 websites and created dozens of successful businesses. We would love to work on the next cutting-edge projects with great companies and talented people.</p>
													<a href="http://www.globalventures.com/" class="bdge">Go to <span class="badge">GlobalVentures.com</span></a>
												</div>
									</li>
									<li class="media">
										<a class="pull-right" href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://ifund.com">
											<img class="media-object" style="width:300px;" src="http://www.contrib.com/uploads/logo/ifund.png">
										</a>
												<div class="media-body">
													<h3 class="media-heading"><a href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://ifund.com">IFund.com</a></h3>
													<p class="description">iFund is a software as a service crowdfunding platform. iFund is not a registered broker-dealer and does not offer investment advice or advise on the raising of capital through securities offerings. iFund does not recommend or otherwise suggest that any investor make an investment in a particular company, or that any company offer securities to a particular investor. iFund takes no part in the negotiation or execution of transactions for the purchase or sale of securities, and at no time has possession of funds or securities. No securities transactions are executed or negotiated on or through the iFund platform. iFund receives no compensation in connection with the purchase or sale of securities.
													<a href="http://www.ifund.com/" class="bdge">Go to <span class="badge">IFund.com</span></a>
												</div>
									</li>
									<li class="media">
										<a class="pull-right" href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://ichallenge.com">
											<img class="media-object" style="width:300px;" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-ichallenge1.png">
										</a>
												<div class="media-body">
													<h3 class="media-heading"><a href="http://referrals.contrib.com/idevaffiliate.php?id=10231&url=http://ichallenge.com">IChallenge.com</a></h3>
													<p class="description">The best internet challenges. Solve and win online prizes.</p>
													<a href="http://www.ichallenge.com/" class="bdge">Go to <span class="badge">IChallenge.com</span></a>
												</div>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- directory -->
				</div><!-- col-md-12 -->
	</div><!-- row-fluid margTop15 margBot20 -->
</div><!-- container -->