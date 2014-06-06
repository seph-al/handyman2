<form class="form-horizontal" role="form"  id="caccount-socials">
							
								<div class="containNew">	<span class="postJobHead">Social Accounts</span>
									<div class="contain">
										<ul class="postProjUl">
											<?foreach($socials AS $k=>$v):?>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name"><?echo $v->social?></label>
												</div>
												<div class="controls">
													<input type="text" style="width:60%;" id="social_<?echo $v->social_id?>" name="social_<?echo $v->social_id?>" value="<?echo $user_socials[$v->social_id]?>" class="form-control socials" autocomplete="off" />
													<div class="alert alert-danger" style="display:none;width:60%" id="social_notif_<?echo $v->social_id?>">...</div>
												</div>
											</li>
											<?endforeach;?>
							
												<li class="control-group">
													<div class="controls">
														<input type="hidden" name="t" id="t" value="updatecontractorsocial">
														<input type="button" class="btn btn-primary" value="Save Social Accounts" id="update_socials" />
													</div>
												</li>
										</ul>
									</div>
								</div>
							
						</form>