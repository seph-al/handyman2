<?php foreach($cities as $k=>$v): ?>
	<option value="<?php echo $v->CityId ?>"  name="<?php echo $v->Name ?>"><?php echo $v->Name ?></option>
<?php endforeach; ?>