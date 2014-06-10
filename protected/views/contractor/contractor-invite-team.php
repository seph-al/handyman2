<?php $this->renderPartial('../dashboard/navigation',array('pages'=>'')); ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/result-page.css">
<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-page">
						<h1>Search</h1>
						<div class="search-form">
							<form class="form-inline frm-box" role="form">
								 <div class="form-group">
									<input type="text" class="form-control input-lg siw" id="" placeholder="Type your search here">
								  </div>
								  <button type="submit" class="btn btn-danger btn-lg">Search</button>
							</form>
						</div>
						<div class="result-box">
							<div class="container">
								<div class="row">
									
									<?if(count($result)):?>
										<?
											$counter = 0;
										?>
										<?foreach($result AS $k=>$v):?>
											<?$counter++;?>
											<?if($counter%2 > 0):?>
												<div class="col-md-6">
											<?endif;?>
												
												<div class="panel panel-danger">
												  <div class="panel-body">
													<div class="media">
														  <a class="pull-left" href="#">
															<img class="media-object mosize" src="http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png" alt="">
														  </a>
														  <div class="media-body">
															<h4 class="media-heading"><a href=""><?echo $v->Name?></a></h4>
															<span class="desc1">Description</span>
															<span class="desc2"><?echo substr($v->Services,0,100)?>..<a href="<?php echo Yii::app()->request->baseUrl; ?>/contractor/profile/user/<?echo $v->Username?>">Read More</a></span>
														  </div>
														  <span class="pull-right">
															<a href=""><img class="btn-plus"></a>
														  </span>
													</div>
												  </div>
												  <div class="panel-footer">
												  <a href="">Like</a><a href="">Comment</a>
												  <span class="pull-right">
													<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/thumbs-up-m.png">&nbsp;5</a>
													<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/comments-m.png">&nbsp;8</a>
												  </span>
												  </div>
												</div>
												
											<?if($counter%2 == 0):?>
												</div><!-- col-md-6 -->
											<?endif;?>
										<?endforeach;?>
										
										 <?$this->widget('CLinkPager',array(
											'pages'=>$pages,
											'cssFile'=>Yii::app()->request->baseUrl.'/css/pagination.css',
											'currentPage'=>1,
											'header'=>''		
										))?>
									
									<?endif;?>
									
								
									<!-- div class="col-md-6">
										<div class="panel panel-danger">
										  <div class="panel-body">
											<div class="media">
												  <a class="pull-left" href="#">
													<img class="media-object mosize" src="http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png" alt="">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading"><a href="">Juan Dela Cruz</a></h4>
													<span class="desc1">Description</span>
													<span class="desc2">This is a sample paragraph. Lorem ipsum dolor set amet. </span>
												  </div>
												  <span class="pull-right">
													<a href=""><img class="btn-plus"></a>
												  </span>
											</div>
										  </div>
										  <div class="panel-footer">
										  <a href="">Like</a><a href="">Comment</a>
										  <span class="pull-right">
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/thumbs-up-m.png">&nbsp;5</a>
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/comments-m.png">&nbsp;8</a>
										  </span>
										  </div>
										</div>
										<div class="panel panel-danger">
										  <div class="panel-body">
											<div class="media">
												  <a class="pull-left" href="#">
													<img class="media-object mosize" src="http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png" alt="">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading"><a href="">Juan Dela Cruz</a></h4>
													<span class="desc1">Description</span>
													<span class="desc2">This is a sample paragraph. Lorem ipsum dolor set amet. </span>
												  </div>
												  <span class="pull-right">
													<a href=""><img class="btn-plus"></a>
												  </span>
											</div>
										  </div>
										  <div class="panel-footer">
										  <a href="">Like</a><a href="">Comment</a>
										  <span class="pull-right">
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/thumbs-up-m.png">&nbsp;5</a>
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/comments-m.png">&nbsp;8</a>
										  </span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="panel panel-danger">
										  <div class="panel-body">
											<div class="media">
												  <a class="pull-left" href="#">
													<img class="media-object mosize" src="http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png" alt="">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading"><a href="">Juan Dela Cruz</a></h4>
													<span class="desc1">Description</span>
													<span class="desc2">This is a sample paragraph. </span>
												  </div>
												  <span class="pull-right">
													<a href=""><img class="btn-plus"></a>
												  </span>
											</div>
										  </div>
										  <div class="panel-footer">
										  <a href="">Like</a><a href="">Comment</a>
										  <span class="pull-right">
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/thumbs-up-m.png">&nbsp;5</a>
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/comments-m.png">&nbsp;8</a>
										  </span>
										  </div>
										</div>
										<div class="panel panel-danger">
										  <div class="panel-body">
											<div class="media">
												  <a class="pull-left" href="#">
													<img class="media-object mosize" src="http://www.iconsdb.com/icons/preview/orange/businessman-xxl.png" alt="">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading"><a href="">Juan Dela Cruz</a></h4>
													<span class="desc1">Description</span>
													<span class="desc2">This is a sample paragraph. </span>
												  </div>
												  <span class="pull-right">
													<a href=""><img class="btn-plus"></a>
												  </span>
											</div>
										  </div>
										  <div class="panel-footer">
										  <a href="">Like</a><a href="">Comment</a>
										  <span class="pull-right">
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/thumbs-up-m.png">&nbsp;5</a>
											<a href=""><img src="http://www.iconsdb.com/icons/preview/gray/comments-m.png">&nbsp;8</a>
										  </span>
										  </div>
										</div -->
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>