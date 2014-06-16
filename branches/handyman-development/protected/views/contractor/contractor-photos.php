<link rel="stylesheet" href="http://beta.handymen.com/css/more-photos.css">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="invite-page">
						<div class="invite-box">
							<div class="container">
								<div class="row">
									<br>
									<ol class="breadcrumb">
										<li><a href="/dashboard/contractor">Dashboard</a>
										</li>
										<li><a href="/dashboard/my-profile">My Profile</a>
										</li>
										<li class="active">More Photos</li>
									</ol>
									<br>
									<div class="col-md-12">
										<div class="row">
											<div class="morepics">
											  <?if($my_gallery && count($my_gallery) > 0):?>
												<?foreach($my_gallery as $k=>$v):?>
												  <div class="col-md-3">
													<a id="<?php echo $v->photo_id?>" class="thumbnail" name="<?php echo Yii::app()->request->baseUrl;?>/uploads/gallery/<?echo $v->filename?>">
													  <img src="<?php echo Yii::app()->request->baseUrl;?>/uploads/gallery/<?echo $v->filename?>" />
													</a><a href="#imageModal" class = "view_image_modal<?php echo $v->photo_id?>" role="button" data-toggle="modal" ></a>
												  </div>
											  <?endforeach;?>
											<?else:?>
												<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You have not uploaded work photos</div>
											<?endif;?>
											  <div style="clear:both;"></div>
											 </div>																					 
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_for_image">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?echo $company?> Work Picture</h4>
      </div>
	  <div id="errors2"></div>
      <div class="modal-body" id="modalbody" style="text-align:center">
	  
		
      </div>
      <div class="modal-footer">
		
		  <input type="hidden" id="image_id" class="image_id" value=""/>
		  <? if($is_my_profile == true ): ?>
		<button type="button" id="cover" class="btn btn-warning">Set as cover photo</button>
		<? endif; ?>
	   </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
	$('.thumbnail').click(function(){
	
	
		var id = $(this).attr('id');
		var img = $(this).attr('name');
		
		
		$('#image_id').val(id);
		$('#modalbody').html('<img src="'+img+'" id="modal_image_shown" alt="No data available" style="height:480px; width:384px"/>');
	
		$('.view_image_modal'+id).trigger('click');
	
	
	});
	
	$('#cover').click(function(){
			var base_url = $('#base_url').val();
			var id = $('#image_id').val();
			$.post(base_url+"/contractorajax",
			{
				t:'assignbg',
				id:id
			},function(data){
				if(data.success){
					console.log("save");
					$('#errors2').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cover photo updated</div>');
				}else{
					console.log("something went wrong");
				}
			});

		
	
	});


});





</script>


		
		