<!-- paginate pagination -->
									
									<?if($total_cnt > $display_per_page):?>
										<div class="text-center">
												  <ul class="pagination" >
										<?
											
											$total_pages = floor($total_cnt / $display_per_page);
												if($total_cnt % $display_per_page > 0){
													$total_pages = $total_pages + 1;
												}
												
											
											$slide_cnt = floor($total_pages/$display_pages);
												if($total_pages%$display_pages > 0){
													$slide_cnt++;
												}
											
											$slide_at = floor($curr_page/$display_pages);
												if($curr_page%$display_pages > 0){
													$slide_at++;
												}
											$start_page = (($slide_at-1) * $display_pages) + 1;
												
											if($start_page > 1):?>
												<li><a href="javascript:loadPageDash(<?=($start_page-1)?>);">Prev</a></li>
											<?endif;?>
												<?
													$cnt = 0;
													$page = $start_page;
												for($cnt = 0 ; ($cnt <=  $display_pages) && ($page <= $total_pages ) ; $cnt++):?>
													<li <?echo $curr_page == $page ? 'class="active"':'' ?> ><a href="javascript:loadPageDash(<?=$page?>)">
														<?=$page++?>
														</a>
													</li>
												<?endfor;?>
											<?if($slide_at < $slide_cnt):?>
												<li><a href="javascript:loadPageDash(<?=$page-1?>)">Next</a></li>
											<?endif;?>
												
												</ul>
												<input type="hidden" name="lastpage" id="lastpage" value="<?=$page?>"/>
												<input type="hidden" name="total_cnt" id="total_cnt" value="<?=$total_cnt?>"/>
												<input type="hidden" name="start_page" id="start_page" value="<?=$start_page?>"/>
										</div>
									<? 
										
									endif; ?>
									
								<!-- paginate pagination -->