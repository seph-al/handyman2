	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">  
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
	.custom-combobox-input{
		height: 67px;
		width: 400px;
		margin: 0;
		padding: 18px 10px;
		background: none repeat scroll 0 0 #ffffff;
		position: relative;
		display: inline-block;
		font-size: 21px;
	}
	.ui-button{
		width: 22px;
		height: 67px;
		vertical-align: top;
	}
  </style>
  <script>
  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          //.attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
  $(function() {
    $( "#combobox" ).combobox();
	$(".custom-combobox-input").on("click", function () {
	   $(this).select();
	});
  });
  </script>

 
	<style type="text/css">
		
		
	.col-md-8a {
		width: 100%;
	}
	.find-form {
		text-align: center;
	}
	.font1 {
		margin-top: 120px;
	}
	.btn-s1 {
		padding: 14px 40px;
		font-size: 26px;
	}
	.form-s1 {
		background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
		box-shadow: 0 0 8px #FFFFFF;
		padding: 20px 10px;
		display: inline-block;
	}
	.input-s1 {
		border-radius: 6px;
		font-size: 21px;
		height: 65px;
		line-height: 1.33;
		padding: 18px 10px 15px 10px;
	}
	select.input-s1 { 
		height: 65px;
		line-height: 46px;
	}
	</style>
	<div class="searchBg relative">
	<div class="container">
		<div class="row-fluid">
			<img class="bannerImg" src="http://rdbuploads.s3.amazonaws.com/backgrounds/bg-handyman1.png" alt="home banner image" />
			<div class="container">
				<div class="row-fluid">
					<div class="col-md-2"></div>
					<div class="col-md-8a">
						<div class="find-form">
							<h1 class="font1">Find your hometown handyman today!</h1>
							<div style="clear:both"></div>
							
					<?php foreach($projects as $k=>$v):?>
						<form class="form-inline form-s1" role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/project/post/pid/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>" method="post">
					<?endforeach;?>	
							<div class="form-group">
								<label class="sr-only">Project Type</label>
								<select id="combobox" class="form-control input-lg input-s1" name="project">
								<?foreach($projects AS $k=>$v):?>
									<option value="<?echo $v->ProjectTypeId?>"><?echo $v->Name?></option>
								<?endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label class="sr-only" for="postCode">Post Code</label>
								<input class="form-control input-lg input-s1" name="zipcode" id="zipcode" type="text" placeholder="Post Code">
							</div>
						
							<button type="submit" class="btn-s1 btn btn-warning btn-lg"><i class="fa fa-lock"></i> GO</button>
						</form>
						
					</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	
	<div class="indexHiwVideo">
		<div class="container">
			<div class="row-fluid">
				<div class="col-md-12">
					<a class="col-md-3  indexTab1" href="<?php echo Yii::app()->request->baseUrl; ?>/project/post">
						POST A PROJECT
						<span class="contain alignCenter">Home owner post your project free&nbsp;&nbsp;<i class="fa fa-angle-right"></i></span>
						<div style="clear:both"></div>
					</a>
					<a class="col-md-3 offset0 indexTab2" href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find">
						FIND CONTRACTOR
						<span class="contain alignCenter">Contractors in Your Area Now&nbsp;&nbsp;<i class="fa fa-angle-right"></i></span>
					</a>
					<a class="col-md-3 offset0 indexTab3" href="<?php echo Yii::app()->request->baseUrl; ?>/project/find">
						FIND PROJECT
						<span class="contain alignCenter">Get Contractor Projects&nbsp;&nbsp;<i class="fa fa-angle-right"></i></span>
					</a>
					<a class="col-md-3 offset0 indexTab4" href="<?php echo Yii::app()->request->baseUrl; ?>/home/how-it-works">
						HOW IT WORKS
						<span class="contain alignCenter">Free Matchup! &nbsp;&nbsp;<i class="fa fa-angle-right"></i></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="countArea">
		<div class="container">
			<div class="row-fluid">
				<div class="col-md-12 alignCenter">	<span class="col-md-3">
					<img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/128/Users-icon.png"  alt="userIcons.png" />
					<h4>2,005</h4>
					<h6>of Users</h6>
				</span>
				<span class="col-md-3">
					<img src="http://icons.iconarchive.com/icons/aha-soft/free-3d-printer/128/Project-icon.png"  alt="contractor-org.png" />
					<h4>10,005</h4>
					<h6>Posted Projects</h6>
				</span>
				<span class="col-md-3 countArea">
					<img src="http://icons.iconarchive.com/icons/iconka/buddy/128/contractor-man-icon.png"  alt="contractor-org.png" />
					<h4>5,000 </h4>
					<h6>of Contractors</h6>
				</span>
				<span class="col-md-3 countArea">
					<img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/128/search-icon.png"  alt="contractor-org.png" />
					<h4>13,050</h4>
					<h6>Contractors Review</h6>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="findMoreContract">
	<div class="container">
		<div class="row-fluid">
			<div class="findMoreUlBox col-md-12 offset0 text-center">

				<h2>Get Matched to a Screened Professional Handyman </h2>
				<p>
					Handyman.com helps you find an experienced, professional Handyman contractor in your local area, FREE, NO OBLIGATIONS. Handyman.com is the industry leading portal for the home improvement, home repair and remodeling industry. Our free tools and services help both homeowners and contractors facilitate the process to accomplish your home repair and remodeling needs. Serving the Home and Contractor market. Why use our pros?
				</p>
				<p>For the commercial real estate market or projects over $5,000, Handyman.com offers a free consultation service to analyze your needs and find suppliers, general contractors and local professional service providers. Are you lacking a professional website or want to communicate more efficiently with your customer or contractor? Get a Free Webpage and Free Consultation and manage it online. Need professional and experienced contractors, subcontractors or handymen due to an increase in your work load? You have come to the right place at Handyman.com, your local referral and local handyman service provider.</p>

			</div>
		</div>
		<div class="row-fluid">
			<div class="findMoreUlBox col-md-12 offset0">
				<h5>Choose your Projects</h5>
				<ul class="findMoreContractUl col-md-12" style="overflow:hidden;">

					<?php if (count($projects)>0):?>
						<?php $i=1;?>
						<?php foreach($projects as $k=>$v):?>
							<?php if (($i % 4) ==0  || ($i==1)):?>
								<?php $class="col-md-3  offset0 clr"?>
							<?php else:?>
								<?php $class="col-md-3"?>
							<?php endif?>
							<li class="<?php echo $class?>">
								<a href="<?php echo Yii::app()->request->baseUrl; ?>/project/post/pid/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a>
							</li>
							<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>


				</ul>
			</div>
		</div>
	</div>
</div>
<div class="contain">
	<div class="container ">
		<div class="row-fluid">
			<div class="col-md-5">
				<img src="http://rdbuploads.s3.amazonaws.com/photodune-472368-architect-and-contractor-xs.jpg" title="Get a free contractorpage profile" alt="Get a free contractorpage profile today">
			</div>
			<div class="col-md-7">
				<h3>Are you a contractor, architect, property manager, service provider or sell tools or appliances?</h3>
				<h4>Receive online ratings and reviews from satisfied customers to boost your company reputation</h4>
				<p> Get your free contractor or homeowner webpage and manage your services with improved efficiency and in real time, anywhere in the world. A few examples include remodel, renovation, maintenance, management and “Before and After” images. Handyman.com offers you free, no obligation project tools and property management software. </p>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/signup"><button type="button" class="btn btn-lg btn-danger">Join Now</button></a>
				<hr />
				<h3>Are you a Home Owner or Real Estate Investor? </h3>
				<p>Get your free Homeowner Webpage and build an interactive virtual version of your custom home on line or manage your property listings. You will be able to add service requests such as restoration, home repairs, rate developers, or consult with a real estate agent as well as “Before and After” images or show off special features on your property. Handyman.com will provide you with a full list of installers, hardwood floor professionals, electricians, painters, plumbers, just to name a few as well as home repair tips, home designs and new hometech products and services.</p>


				<p><a href="/project/post">Click here and find your local Handyman today! </a> Handyman.com has many great free tools coming out weekly so please check back often or contact us anytime with your feedback, questions or comments. Handyman.com also encourages home owners, contractors and other service providers to visit our award winning Realty Forum and interact with other community members.</p>
			</div>
		</div>
	</div>
</div>