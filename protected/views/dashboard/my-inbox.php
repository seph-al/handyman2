<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('navigation',array('pages'=>$page)); ?>
   <?php else:?>
   <?php $this->renderPartial('homeownernav',array('pages'=>$page)); ?>
<?php endif?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dash-contractor.css">
	<div class="container" id="my_inbox">
	   <div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<div class="ui-tabs ui-widget ui-widget-content ui-corner-all contain" id="tabs">
				<div id="myInbox">
					<!-- my inbox -->
			          
					<!-- My inbox end -->
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/contractordash.js"></script>
