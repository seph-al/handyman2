 <div class="row">
                <div class="col-lg-12">
                    <div class="latest-body">
                        <ul class="list-unstyled ul-posted-jobs" id="projects">
							
							
							<?php foreach($projects as $k=>$v): ?>
								<li class="li-latest-intern" id="project_<?php echo $v->project_id?>">
                                <div class="row">
                                    <div class=" col-lg-6">
                                        <div class="content-job">
                                            <h3><a href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->description)?>">
													<?php
														$pmodel = Projects::model()->findByPk($v->project_id);
														$project_type = $pmodel->type->Name;
														echo $project_type;
														//echo $v->project_id;
													?>	
												</a>
											</h3>
                                            <div class="desc-job">
                                                <span class="tagline"><?php echo $v->description?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-3">
                                        <div class="action-dash text-center">
                                            <a class="btn btn-default" href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->description)?>" data-toggle="tooltip" data-placement="top" title="View Project">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a class="btn btn-default" href="<?php echo Yii::app()->request->baseUrl; ?>/project/jobdetails/pj_id/<?php echo $v->project_id?>/n/<?php echo Yii::app()->Ini->slugstring($v->description)?>" data-toggle="tooltip" data-placement="top" title="Add Photos">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            <a class="btn btn-default" href="<?php echo Yii::app()->request->baseUrl; ?>/project/edit?pj_id=<?php echo $v->project_id?>" data-toggle="tooltip" data-placement="top" title="Edit Project">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger deleteproject" href="javascript:;" id="deleteproject_<?php echo $v->project_id?>" data-toggle="tooltip" data-placement="top" title="Delete Project">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-3">
                                        <ul class="list-unstyled meta-type">
                                            <li class="dateType dateStyle"><i class="fa fa-calendar"></i> Date Posted</li>
                                            <li class="date"><date><?php echo date('m/d/Y', strtotime( $v->date_added));?></date></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
							
							
							
								<?php endforeach; ?>
						
							
                            
                           
                        </ul>
						<br />
						
                    </div>
                </div>
            </div>
			<?php $this->renderPartial('pagination',array('total_cnt'=>$total_cnt,
								'display_per_page'=>$display_per_page,
								'curr_page'=>$curr_page,
								'display_pages'=>$display_pages)); ?>
								
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/homeownerdash.js"></script>