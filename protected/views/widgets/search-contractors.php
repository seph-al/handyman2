<?php
	/*widget for search contractor*/
?>

<form action="">
	<select name="projecttype">
		<option value="">Select Project Type</option>
		<?foreach($projects AS $projecttype => $index):?>
			<option value="<?echo $index->ProjectTypeId?>"><?echo $index->Name?></option>
		<?endforeach;?>
	</select>&nbsp;
	<input type="text" placeholder="your zipcode" name="zipcode"/>
	<button type="submit">Search</button>
</form>

<?if(count($contractors) > 0):?>
	<?foreach($contractors AS $k=>$v):?>
		<p><?echo $v->Name?></p>
	<?endforeach;?>
<?else:?>
	<a href="http://handyman.com">Sign to Handyman.com now!</a>
<?endif;?>
