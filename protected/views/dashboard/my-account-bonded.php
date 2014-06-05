<form class="form-horizontal" role="form"  id="caccount-bonded">
<h1 class="postLicense">Bond</h1>
	
		<ul class="postProjUl">
			<li class="control-group">
				<div class="control-label" style="text-align:left;">
					<label for="">Bonded Agent</label>
				</div>
				<div class="controls">
					<input type="text" style="width:60%;" id="bond_agent" name="bond_agent" value="<?echo $cbond!=null ? $cbond->bond_agent:''?>" class="form-control" />	<span class="postErrors bond_agent"></span>
				</div>
			</li>
			<li class="control-group">
				<div class="control-label" style="text-align:left;">
					<label for="">Bond Value</label>
				</div>
				<div class="controls">
					<input type="text" style="width:60%;" id="bond_value" name="bond_value" value="<?echo $cbond!=null ? $cbond->bond_value:''?>" class="form-control" />	<span class="postErrors bond_value"></span>
				</div>
			</li>
			<li class="control-group">
				<div class="control-label" style="text-align:left;">
					<label for="">Bond Info</label>
				</div>
				<div class="controls">
					<textarea class="form-control" id="bond_info" name="bond_info" style="width:60%"><?echo $cbond!=null ? $cbond->info:''?></textarea>
					<label class="postProjErr bond_info"></label>
				</div>
			</li>
			
			<li class="control-group">
				<div class="controls">
					<input type="hidden" name="t" id="t" value="updatecontractorbond">
					<input type="button" class="btn btn-primary" value="Submit" id="update_bond" />
				</div>
			</li>
		</ul>
	
</form>