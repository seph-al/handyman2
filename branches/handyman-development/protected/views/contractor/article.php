	<div class="panel panel-default">
                            <div class="panel-heading">
								<h4>Articles</h4>
							</div>
							<div class="side-articles2">
								<?php foreach( $feed->get_items(0, 5) as $item):?>
									<div class="item">
									<span class="glyphicon glyphicon-book"></span>
										<div class="side-right">
										   <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
                                                  <?php echo html_entity_decode($item->get_title()); ?>
                                           </a>
      	                                    <div class="CityDisplay">
      	                                        <?php $description = $item->get_description()?>
                                              <?php 
							                  if (strlen($description)< 50){
							                  	echo $description;
							                  }else {
							                  	echo substr($description,0,50).'...';
							                  }
							                 ?>
											</div>
											<div class="date">
												 <div class="date"><?php echo $item->get_date()?></div>
											</div>
										</div>
										<div style="clear:both"></div>
									</div>
								<?php endforeach;?>
							</div>
</div>