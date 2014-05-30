<?php if (count($cities)>0):?>
	<?php foreach($cities as $k=>$v):?>
	   <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/find/city/<?php echo $v->RewriteUrl?>"><?php echo $v->Name?></a></li>
	 <?php endforeach;?>
<?php endif;?>		
