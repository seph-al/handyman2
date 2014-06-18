<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
   <?php else:?>
   <?php $this->renderPartial('../dashboard/homeownernav',array('pages'=>'')); ?>
<?php endif?>
<div class="container">
		<?if(Yii::app()->user->role == 'contractor'):?>
		
		<div class="row">
			<br />
			<div class="col-lg-10 col-lg-offset-1">
				<div class="pull-right">
					<button class="btn btn-primary" id="show-widgets">Get Widgets</button>
				</div>
			</div>
			
			<div id="widgetContainer" style="display:none">	
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="row">
							<div class="col-lg-4">
								<script type="text/javascript" src="http://beta.handymen.com/widgets/searchbyzip?username=sheina"></script>
							</div>
							<div class="col-lg-8">
							<p>1. Find Handyman by Zipcode</p>
							<textarea readonly="readonly" onclick="this.focus();this.select()" rows="2" class="text-left form-control">
								<script type="text/javascript" src="http://handyman.com/widgets/searchbyzip?username=sheina"></script>
							</textarea>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<?endif;?>
	   <div class="row-fluid margTop15 margBot20">
			<div class="myAccntRight col-md-12">
				<iframe src="<?php echo $url?>" width="100%" height="1300px" frameborder="0"></iframe>
			</div>
		</div>
</div>
<script type="text/javascript">
	$('#show-widgets').click(function(){
		$('#widgetContainer').css('display','block');
	});
</script>

