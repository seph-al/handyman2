<span class="postJobHead">Ask A Question</span>
					 <form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/questions/post">
	<table class="qa-form-tall-table" style="width:100%">
		<tbody>
			<tr style="vertical-align:middle;">
				<td class="qa-form-tall-data" width="*" style="padding:8px;">
				   <input class="qa-form-tall-text form-control frm" type="text" name="q_title"></input>
				   <button class="btn btn-danger ask" type="submit">Ask</button>
				</td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" value="1" name="doask1"></input>
</form>