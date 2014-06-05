<form class="form-horizontal" role="form"  id="caccount-license">
	<div class="containNew">
		<div class="contain">
		<span class="postJobHead">License Information</span>
			<ul class="postProjUl">
				<li class="control-group">
					<div class="control-label" style="text-align:left;">
						<label for="">License Number</label>
					</div>
					<div class="controls">
						<input type="text" style="width:60%;" id="license_num" name="license_num" value="<?echo $clicense!= null ? $clicense->license_no:''?>" class="form-control" />	<span class="postErrors license_num"></span>
					</div>
				</li>
				<li class="control-group">
					<div class="control-label" style="text-align:left;">
						<label for="">Status</label>
					</div>
					<div class="controls">
						<input type="text" style="width:60%;" id="license_status" name="license_status" value="<?echo $clicense!= null ? $clicense->status:''?>" class="form-control" />	<span class="postErrors license_status"></span>
					</div>
				</li>
				<li class="control-group">
					<div class="control-label" style="text-align:left;">
						<label for="">Type</label>
					</div>
					<div class="controls">
						<input type="text" style="width:60%;" id="license_type" name="license_type" value="<?echo $clicense!= null ? $clicense->type:''?>" class="form-control" />	<span class="postErrors license_type"></span>
					</div>
				</li>
				<li class="control-group">
					<div class="control-label" style="text-align:left;">
						<label for="">Date Issued</label>
					</div>
					<div class="controls">
						<input type="text" style="width:60%;" id="license_dateissued" name="license_dateissued" value="<?echo $clicense!= null ? $clicense->date_issued:''?>" class="form-control" />	<span class="postErrors license_dateissued"></span>
					</div>
				</li>
				<li class="control-group">
					<div class="control-label" style="text-align:left;">
						<label for="">License Info</label>
					</div>
					<div class="controls">
						<textarea class="form-control" id="license_info" name="license_info" style="width:60%"><?echo $clicense!= null ? $clicense->info:''?></textarea>
						<label class="postProjErr license_info"></label>
					</div>
				</li>
				
				<li class="control-group">
					<div class="controls">
						<input type="hidden" name="t" id="t" value="updatecontractorlicense">
						<input type="button" class="btn btn-primary" value="Update License" id="update_license" />
					</div>
				</li>
			</ul>
		</div>
	</div>
</form>	