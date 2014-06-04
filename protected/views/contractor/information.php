<div class="panel panel-default panel-style1 back-1">
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<span class="wrap-number-rank">
					<span class="number-rank text-center ">
						<?php echo $contractor_points ?>
					</span>
				</span>
			</div>
			<div class="col-lg-6">
				
				<span class="meta-handyman">HANDYMAN</span>
				<span class="meta-points">POINTS</span>
			</div>
		</div>
	</div>
</div>

<?php if(count($contractor_license) > 0 || count($social_accounts) > 0 || count($contractor_bond) > 0): ?>
<div class="panel panel-default panel-style1">
	<div class="panel-heading">Key Business Information</div>
	<ul class="list-group">
	<?php if(count($contractor_license)>0):?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-lg-12">
					<ul class="list-unstyled ul-info">
				
					<? if($contractor_license->license_no != ""):?>
						<li>License #: <strong><?echo $contractor_license->license_no?></strong></li>
					<? endif;?>
					<? if($contractor_license->status != ""):?>
						<li>Status: <strong><?echo $contractor_license->status?></strong></li>
					<? endif;?>
					<? if($contractor_license->type != ""):?>
						<li>Type: <strong><?echo $contractor_license->type?></strong></li>
					<? endif;?>
					<? if($contractor_license->date_issued != ""):?>
						<li>Date Issued: <strong><?echo $contractor_license->date_issued?></strong></li>
					<? endif;?>
					</ul>
				</div>
			</div>
		</li>
	<?php endif;?>
	
	<?php if(count($social_accounts) > 0):?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-lg-12">
					<ul class="list-unstyled ul-info">
					<? foreach($social_accounts as $k =>$v):
						$smodel = ContractorSocials::model()->findByPk($v->social_id);
					?>
						<? if($v->value != ""): ?>
							<li><?echo $smodel->social->social?>:  <strong><a href="<?echo $v->value?>"><? echo $v->value?></a></strong></li>
						<? endif; ?>
					<? endforeach; ?>
					</ul>
				</div>
			</div>
		</li>
	<?php endif;?>
	<?php if(count($contractor_bond) > 0):?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-lg-12">
					<ul class="list-unstyled ul-info">
				
						<?if($contractor_bond->bond_agent != ""):?>
						<li>Bonded Agent: <strong><?php echo $contractor_bond->bond_agent?></strong></li>
						<? endif;?>
						<?if($contractor_bond->bond_value != ""):?>
						<li>Bond Value: <strong><?php echo $contractor_bond->bond_value?></strong></li>
						<? endif;?>
						<?if($contractor_bond->info != ""):?>
						<li>Info: <strong><?php echo $contractor_bond->info?></strong></li>
						<? endif;?>
					</ul>
					
				</div>
			</div>
		</li>
	<?php endif;?>
	</ul>
</div>
<?php endif;?>