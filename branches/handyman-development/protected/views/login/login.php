<div class="contain">
		<div class="staticContentSec">
			<div class="container">
				<!-- Nav tabs -->
				<div id="errors"></div>
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#homeowner" data-toggle="tab">Home Owner Login</a></li>
				  <li><a href="#contractor" data-toggle="tab">Contractor Login</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="homeowner">
						<form class="form-horizontal" role="form" style="width:50%; margin-top:20px;" id="homeownerloginform">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="homeowner_email" name="homeowner_email" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" id="homeowner_password" name="homeowner_password" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label>Forgot Your Password <a href="#">Click Here</a></label><br><br>
								<label>
								  <input type="checkbox"> Remember me
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="button" id="homeowner_sign_in" class="btn btn-default">Sign in</button>
							  &nbsp;&nbsp;&nbsp;Or Login To&nbsp;
							  <?php if(Yii::app()->crugeconnector->hasEnabledClients):?>
							      <?php 
							            $cc = Yii::app()->crugeconnector;
							            foreach($cc->enabledClients as $key=>$config){
							                $image = CHtml::image($cc->getClientDefaultImage($key));
							                echo CHtml::link($image,
							                    $cc->getClientLoginUrl($key,'homeowner'));
							            }
							        ?>
							  <?php endif;?>
							</div>
						  </div>
						  <input type="hidden" name="t" id="t" value="loginhomeowner">
						</form>
				  </div>
				  <div class="tab-pane" id="contractor">
						<form class="form-horizontal" role="form" style="width:50%; margin-top:20px;" id="contractorloginform">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="contractor_email" name="contractor_email" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" id="contractor_password" name="contractor_password" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label>Forgot Your Password <a href="#">Click Here</a></label><br><br>
								<label>
								  <input type="checkbox"> Remember me
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="button" id="contractor_sign_in" class="btn btn-default">Sign in</button>
							  <input type="hidden" name="t" id="t" value="logincontractor">
							</div>
						  </div>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js"></script>