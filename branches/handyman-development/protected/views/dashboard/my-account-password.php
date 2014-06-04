<form class="form-horizontal" role="form"  id="caccountpasswordform">
							
								<div class="containNew">	<span class="postJobHead">Change Password</span>
									<div class="contain">
										<ul class="postProjUl">
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">Old Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="oldpassword" name="oldpassword" value="<?php echo $cmodel->Password?>" class="form-control" autocomplete="off" />	<span class="postErrors oldpassword"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">New Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="cuspassword" name="cuspassword" value="" class="form-control" autocomplete="off" />	<span class="postErrors cuspassword"></span>
												</div>
											</li>
											<li class="control-group">
												<div class="control-label" style="text-align:left;">
													<label for="business_name">Confirm New Password<span class="starcolor">*</span>
													</label>
												</div>
												<div class="controls">
													<input type="password" style="width:60%;" id="cusconfpwd" name="cusconfpwd" value="" class="form-control" autocomplete="off" />	<span class="postErrors cusconfpwd"></span>
												</div>
											</li>
											<li class="control-group marg0">
												<div class="control-label empty">
													<label for="business_name">&nbsp;</label>
												</div>
												<div class="controls">
												      <input type="hidden" name="t" id="t" value="updatecontractorpassword">
													<input type="button" class="btn btn-primary" value="Submit" id="change_pass" />
												</div>
											</li>
										</ul>
									</div>
								</div>
							
						</form>