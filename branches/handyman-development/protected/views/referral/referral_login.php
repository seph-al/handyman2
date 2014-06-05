<?php if (Yii::app()->user->role=='contractor'):?>
   <?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
   <?php else:?>
   <?php $this->renderPartial('../dashboard/homeownernav',array('pages'=>'')); ?>
<?php endif?>
<div class="container">
	   <div class="row-fluid margTop15 margBot20">
		<div class="myAccntRight col-md-12">
			<iframe src="<?php echo $url?>" width="100%" height="1300px" frameborder="0"></iframe>
		</div>
	</div>
</div>

