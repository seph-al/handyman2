<?if($my_gallery && count($my_gallery) > 0 || $is_public == false):?>
  <script type="text/javascript">
      
 </script> <!-- Include -->
<?php if($is_my_profile == true && $is_public == false): ?>
<div id="progress_gallery" class="progress">
	<div class="progress-bar progress-bar-success"></div>
</div>
<?php endif; ?>
<div class="panel panel-default panel-style2">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-6">
				Work Samples
			</div>
			<?php if($is_my_profile == true && $is_public == false):?>
		
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										Upload Photos <input type="file" name="files[]" id="upload_multiple" multiple>
									</span>
								</span>
								<input type="text" readonly="" class="form-control">
							</div>
						</div>
						<div class="col-lg-3">
							<a href="javascript:;" id="delete_selected_gallery_btn" class="btn btn-danger">
								<i class="fa fa-trash-o"></i>
							</a>
						</div>
					</div>
				</div>
			
			
			<?php endif; ?>
			
			
	
			
			
		</div>
	</div>
	<div class="panel-body">
		<div class="row" id="gallery_action_result">
		<div id="errors2"></div>
			<!--<div id="gallery_action_result">&nbsp;</div>-->
			
			<?if($my_gallery && count($my_gallery) > 0):?>
			<?foreach($my_gallery as $k=>$v):?>
				<div class="col-lg-4 marg-btm text-center" id="li-gallery-<?echo $v->photo_id?>">
					<div class="checkbox ch-1">
						<label for="op1">
						
						<? if($is_my_profile == true && $is_public == false): ?>
							<div>
								<a href="javascript:;" class="set_cover" id="image_id_<?echo $v->photo_id?>"><img class="img-responsive gallery-img" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/gallery/<?echo $v->filename?>" id="image_<?echo $v->photo_id?>"></a>
							</div>
							<input type="checkbox" name="select_from_gallery" id="select_from_gallery" value="<?echo $v->photo_id?>">
						<? else: ?>
							<div>
								<img class="img-responsive gallery-img" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/gallery/<?echo $v->filename?>">
							</div>
						<? endif; ?>
						</label>
					</div>
				</div>
			<?endforeach;?>
		<?else:?>
			<p class="bg-warning" id="warning_messages2">You have not uploaded work photos</p>
		<?endif;?>
			
			
		</div>
		<div class="pull-right v-all" style="color:#FFFFFF"><h3><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/photos/user/<?php echo $username?>">view all</a></h3></div>
	</div>
</div>
<?endif;?>
