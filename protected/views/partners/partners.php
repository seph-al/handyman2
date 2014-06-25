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
							<div class="row" style="padding:20px 20px 35px;background: url(http://rdbuploads.s3.amazonaws.com/backgrounds/photodune-2564773-business-group-m.jpg) no-repeat bottom;border-radius:8px;">
								<div class="span12" >
								<div class="col-md-6">
								
							</div>
							<div class="col-md-6">
							<div class="row well" style="opacity:8">
							<h2>Be Our Preferred Partner and Earn Referral Income</h2>
							<p>You could now earn while referring traffic to Handyman.com and be added in our exclusive Partners Directory.</p>
						
							</div>
							
							</div>	
								
								</div>
							
							</div>
							<hr />
							<div class="row">
							<div class="col-md-6">
								<center>
									<iframe width="99%" height="500px" frameborder="0" src="http://domaindirectory.com/servicepage/partners_form.php?domain=handyman.com"></iframe>
								</center>
							</div>
							<div class="col-md-6">
					<h3>Fill up this partnership form and get your affiliate id immediately</h3>
								<div class="col-md-11  bg-warning">
							<i class="fa fa-sign-in fa-4x pull-left icon-muted"></i>
<h5><b>Step 1. </b> Fill up the partnership form on the left. Choose "Distributed  Partnership" as type of partnership.</h5>
							</div>
							<br />
							<div class="col-md-11  bg-warning">
							<i class="fa fa-money fa-4x pull-left icon-muted"></i>
<h5><b>Step 2. </b> Login to our Referral Program using the access info from your Referral Welcome Email. Click here to <a href="/referral">Login.</a></h5>
							</div>
							<br />
							<div class="col-md-11  bg-warning">
							<i class="fa fa-copy fa-4x pull-left icon-muted"></i>
<h5><b>Step 3. </b> Get your signin link or affiliate id to create your widgets here.</h5>
							</div>
							
							</div>	
							</div>	
								<br />
								<hr />
								<h2>Widgets and Banners</h2>
								<div class="row">
								
									<div class="col-lg-12" style="text-align:right;">
										<form onsubmit="return false;">
										<input type="text" id="widgetaffid" value="" placeholder="Enter Affiliate ID here . . ." style="width:170px;padding:3px">
										<button id="btn_widgetaffid">Get Code</button>
										</form>
									</div>
									<script>
										$(function(){
											$('#btn_widgetaffid').click(function(){
												var affid = $('#widgetaffid').val();
												if(affid!=''){
													$('#widgetone').html('&lt;script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?aff_id=http://referrals.contrib.com/idevaffiliate.php?id='+affid+'&url=http://handyman.com"&gt;&lt;/script&gt;');
													$('#referralaffiddivone').show();
													
													$('#widgettwo').html('&lt;script type="text/javascript" src="http://handyman.com/widgets/searchhorizontal?aff_id=http://referrals.contrib.com/idevaffiliate.php?id='+affid+'&url=http://handyman.com"&gt;&lt;/script&gt;');
													$('#referralaffiddivtwo').show();
												}
											});
										});
									</script>
									<br>
									<div class="col-lg-12">
										<div class="row">
											<h3>1. Find Handyman by Zipcode</h3>
											<div class="col-lg-4">
												<script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?username=sheinavi"></script>
											</div>
											<div class="col-lg-8">
<b>by contractor username:	</b>											
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?username=sheinavi"></script></textarea>
<div id="referralaffiddivone" style="display:none">
<br />
<b>by contractor affiliate ID:</b>
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" class="text-left form-control" id="widgetone"></textarea>
</div>										
											
											</div>
										</div>
									</div>
									<br>
									<div class="col-lg-12">
										<div class="row">
											<h3>2. Find Handyman Horizontal Widget</h3>
												<script type="text/javascript" src="http://handyman.com/widgets/searchhorizontal?username=sheinavi"></script>
											<br>
											<br>
<b>by contractor username:	</b>										
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="1" class="text-left form-control"><script type="text/javascript" src="http://handyman.com/widgets/searchhorizontal?username=sheinavi"></script></textarea>
<div id="referralaffiddivtwo" style="display:none">
<br />
<b>by contractor affiliate ID:</b>
<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" class="text-left form-control" id="widgettwo"></textarea>
</div>	
<br /><br />											
										</div>
									</div>
									
														</div>
								
								
								
							</div>
						</div>
					</div><!-- directory -->
				</div><!-- col-md-12 -->
	</div><!-- row-fluid margTop15 margBot20 -->
</div><!-- container -->