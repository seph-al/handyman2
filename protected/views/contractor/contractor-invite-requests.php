<?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/result-page.css">
<div class="container">
   <ol class="breadcrumb">
		<?if(Yii::app()->user->isGuest):?>
			  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
		<?else:?>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/invite">Invite</a></li>
		<?endif;?>
		<li class="active">Accept Team Requests</li>
	</ol>
			<div class="row">
				<div class="col-md-12">
					<div class="search-page">
						<div class="result-box">
							<div class="container">
								<div class="row">
									
									<?if(count($result)):?>
										
										<?foreach($result AS $k=>$v):?>
											
												<div class="col-md-6">
												<div class="panel panel-danger">
												  <div class="panel-body">
													<div class="media">
														  <a class="pull-left" href="#">
														   <?php 
														     $pic= Contractorphotos::model()->findByAttributes(array('contractor_id'=>$v->contractor->ContractorId,'is_profile'=>1));
														     if (count($pic)>0){
														     	$picture = $pic->filename;
														     }else {
														     	$picture = '';
														     }
														   ?>
															 <img class="media-object mosize" src="<?echo $picture !=''  ?  Yii::app()->request->baseUrl.'/uploads/profile/'.$picture:'http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png' ?>" alt="" >
														  </a>
														  <div class="media-body">
															<h4 class="media-heading"><a href=""><?echo $v->contractor->Name?></a></h4>
															<span class="desc1">Services:</span>
															<span class="desc2"><?echo substr($v->contractor->Services,0,35)?>..<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?echo $v->contractor->Username?>">Read More</a></span>
														  </div>
														  <span class="pull-right">
															<a href="javascript:void(0)" id="addtoteam_<?echo $v->contractor->ContractorId?>" class="addtoteam">
																<img class="btn-plus">
															</a>
														  </span>
													</div>
												  </div>
												  <div class="panel-footer">
												  &nbsp;
												  <span class="pull-right">
													&nbsp;
												  </span>
												  </div>
												</div>
												</div>
											
										<?endforeach;?>
										
										
									
									<?endif;?>
									<div style="clear: both;"></div>
								 <?$this->widget('CLinkPager',array(
											'pages'=>$pages,
											'cssFile'=>Yii::app()->request->baseUrl.'/css/pagination.css',
											'currentPage'=>1,
											'header'=>''		
										))?>
									
										
									</div>
								</div>
							</div><!-- result box -->
							
						</div>
					</div>
				</div><!-- row -->
			</div><!-- container -->	

<script type="text/javascript">
	$(document).ready(function(){
		$('.addtoteam').click(function(){
			var id = $(this).attr("id");
			var contractor_id = (id.split("_")).pop();
			console.log("Adding .."+contractor_id);
			var base_url = $('#base_url').val();
			$.post(base_url+'/contractorajax',{t:'accepttoteam',contractor_id:contractor_id},function(data){
				if(data.success){
					$('#addtoteam_'+contractor_id).removeClass('addtoteam');
					$('#addtoteam_'+contractor_id).html('<img src="http://d2qcctj8epnr7y.cloudfront.net/sheina/handyman/check-green-round.png" alt="already added" />');
				}else{
					console.log("Error occurred: "+data.error_message);
				}
			});
		});
	});
	
	
</script>			