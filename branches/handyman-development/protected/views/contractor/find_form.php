	<div class="projBanner">
		<div class="container">
			<form class="marg0" name="findjobsearch" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find">
				<input type="hidden" name="findtradsearch" value="findtrad"/> 
				<div class="contraZipBgMid">
					<div class="row-fluid ">
						<h4 class="col-md-4 offset1">Find Contractors in Your Area Now</h4>
						<div class="col-md-8">
							<form class="form-inline" role="form" >
							  <div class="form-group" style="float:left">
								<select class="form-control" name="project">
									<option value="">All Services</option>
									<?php if (count($projects)>0):?>
									  <?php foreach($projects as $k=>$v):?>
									      <option value="<?php echo $v->ProjectTypeId?>" ><?php echo $v->Name?></option>
									  <?php endforeach;?>
									<?php endif?>
								</select>
							  </div>
							  <div class="form-group" style="float:left">
								<label class="sr-only" for="zipcode">Enter Zipcode</label>
								<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode">
							  </div>
							  <div class="checkbox" style="float:left">
							  </div>
							  <button type="submit" class="btn btn-default">Search</button>
							</form>
						</div>
					</div>    
				</div>        
		   </form>					
		</div>
	</div>
	<div class="container">
	<div class="contain margTop20 margBot20">
			<div class="row-fluid">
				<div class="findJobLeft col-md-8 clearfix">
					<div class="contMatched">
						<span class="contain contMatchedTxt1">There is no Contractors Matched</span>
						<span class="contain contMatchedTxt2"> <?php echo $location?> </span>
					</div>
										<div class="contain" >
												
							<div class="fConHiWSec relative margBot20">
								<div class="fcon1">
								<img src="http://icons.iconarchive.com/icons/graphicloads/android-settings/96/notebook-icon.png">
								<h1>Post Your Projects</h1>
								</div>
								<br>
								<div class="fcon2">
								<img src="http://icons.iconarchive.com/icons/graphicloads/android-settings/96/star-icon.png">
								<h1>Get Free Quotes</h1>
								</div>
								<br>
								<div class="fcon3">
								<img src="http://icons.iconarchive.com/icons/graphicloads/android-settings/96/contact-icon.png">
								<h1>Choose a Contractor</h1>
								</div>
								<div style="clear:both"><br></div>
							</div>				
						</div>			
									
						<div class="tradePagination">
							
						</div>		
				</div>
				
				<div class="findJobRight col-md-4" style="height:auto;">
					<div class="contain margin1Btm">
						<ul class="findRiteUlNew">
							<h1 class="findRiteUlNewHead">Featured Projects</h1>
							<?php if (count($projects)>0):?>
							   <?php foreach($projects as $k=>$v):?>
							     <li><a  href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/project/<?php echo $v->ProjectTypeId?>/n/<?php echo Yii::app()->Ini->slugstring($v->Name)?>"><?php echo $v->Name?></a></li>
							   <?php endforeach;?>
							<?php endif;?>
                        </ul>
						<ul class="findMore row-fluid offset0" style="display:none;">
							<li>
								<a class="more" onclick="$('.findRiteUlNew').css('height','auto');$('.more').hide();$('.hideMore').show();"> More</a>
								<a class="hideMore" onclick="$('.findRiteUlNew').css('height','450px');$('.hideMore').hide();$('.more').show();" style="display:none;">Hide</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php if (Yii::app()->user->isGuest):?>
	<input type="hidden" name="is_guest" id="is_guest" value="1" />
	<?$this->renderPartial('logged_out_modal')?>
<?php endif;?>
<script type="text/javascript">
	$(document).ready(function(){
		var is_guest = $('input#is_guest').val();
		if(is_guest == '1'){
			console.log("is guest.");
					$('#myModal_loggedout').modal({
								  backdrop: 'static',
								  keyboard: false
								});
		}
			$('#myModal_loggedout').modal('show');
		
	});
</script>