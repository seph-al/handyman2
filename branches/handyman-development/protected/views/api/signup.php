<table width="730" cellspacing="0" cellpadding="0" border="0" align="" style="border:50px solid #79BAEC;font:normal 14px/15px Verdana">
	<thead>
		<tr>
			<th align="center" style="padding:15px;background:#BDEDFF" colspan="3">
				<img alt="#" src="http://www.handyman.com/images/logo.gif"></img>
			</th>
		</tr>
	</thead>
	<tbody style="display:block;font:normal 13px/17px Verdana;margin-top:15px">
		<tr style="display:block;margin-bottom:10px;color:#f89b2e;font:normal 16px/17px Verdana;padding:0 25px">
			<td align="left" style="font-weight:bold" colspan="3">Hi <?php echo $huser->firstname?>,</td>
		</tr>
		<tr style="display:block;margin-bottom:10px;padding:0 25px">
			<td align="left" style="font:bold 16px/17px Verdana" colspan="3">Thank you for signing up for a <?php echo CHtml::encode(Yii::app()->name); ?> account</td>
		</tr>
		<tr style="display:block;margin:20px 0 10px;padding:0 25px">
			<td width="25%" valign="top" align="left" style="display:inline-block;font-weight:bold">Email</td>
			<td width="5%" valign="top" align="center" style="display:inline-block;font-weight:bold">:</td>
			<td width="60%" valign="top" align="left" style="display:inline-block"><a target="_blank" href="mailto:<?php echo $huser->email?>"><?php echo $huser->email?></a>
			</td>
		</tr>
		<tr style="display:block;margin:20px 0 10px;padding:0 25px">
			<td width="25%" valign="top" align="left" style="display:inline-block;font-weight:bold">Password</td>
			<td width="5%" valign="top" align="center" style="display:inline-block;font-weight:bold">:</td>
			<td width="60%" valign="top" align="left" style="display:inline-block"><?php echo $huser->password?></td>
		</tr>
		<tr style="display:block;margin:35px 0 20px;width:630px">
			<td style="display:block"><span><font color="#888888"></font></span><span><font color="#888888"></font></span>
				<table style="display:block;font-weight:bold;font-size:13px">
					<tbody>
						<tr style="display:block;padding:0 25px;color:#407012">
							<td valign="top" align="left">Thanks</td>
						</tr>
						<tr style="display:block;padding:0 25px;color:#407012">
							<td valign="top" align="left">Handymen</td>
						</tr>
						<tr style="display:block;padding:0 25px;margin-top:15px">
							<td valign="top" align="left" colspan="3"><a target="_blank" href="" style="text-decoration:none;color:#1576ac">http://www.<?php echo CHtml::encode(Yii::app()->name);?></a>
							</td>
						</tr>
					</tbody>
				</table>
				<table style="width:630px;background:#BDEDFF;padding:15px;font:normal 11px/17px Verdana;text-align:center;">
					<tbody>
						<tr>
							<td><a target="_blank" style="color:#000000;text-decoration:none;" href="<?php echo Yii::app()->request->baseUrl; ?>/home/about">About us</a>
							</td>
							<td><a target="_blank" style="color:#000000;text-decoration:none" href="<?php echo Yii::app()->request->baseUrl; ?>/home/privacy">Privacy Policy</a>
							</td>
							<td><a target="_blank" style="color:#000000;text-decoration:none" href="<?php echo Yii::app()->request->baseUrl; ?>/home/terms">Terms & Conditions</a>
							</td>
							<td><a target="_blank" style="color:#000000;text-decoration:none" href="<?php echo Yii::app()->request->baseUrl; ?>/faq">Faq</a>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td style="display:block">
				<table style="width:630px;background:#BDEDFF;font:normal 11px/17px Verdana">
					<tbody>
						<tr style="display:block;color:#000000;text-align:center">
							<td style="text-align:center;display:block">
								<a style="display:inline-block;margin-right:10px;background:url(http://icons.iconarchive.com/icons/lunartemplates/modern-social-media-rounded/32/Facebook-icon.png) no-repeat left top;width:32px;min-height:32px" href="#145dee6f61f9f443_"></a>
								<a style="display:inline-block;margin-right:10px;background:url(http://icons.iconarchive.com/icons/lunartemplates/modern-social-media-rounded/32/Twitter-icon.png) no-repeat left top;width:32px;min-height:32px" href="#145dee6f61f9f443_"></a>
								<a style="display:inline-block;margin-right:10px;background:url(http://icons.iconarchive.com/icons/lunartemplates/modern-social-media-rounded/32/GooglePlus-icon.png) no-repeat left top;width:32px;min-height:32px" href="#145dee6f61f9f443_"></a>
								<a style="display:inline-block;margin-right:10px;background:url(http://icons.iconarchive.com/icons/lunartemplates/modern-social-media-rounded/32/Pinterest-icon.png) no-repeat left top;width:32px;min-height:32px" href="#145dee6f61f9f443_"></a>
								<a style="display:inline-block;margin-right:10px;background:url(http://icons.iconarchive.com/icons/lunartemplates/modern-social-media-rounded/32/LinkedIn-icon.png) no-repeat left top;width:32px;min-height:32px" href="#145dee6f61f9f443_"></a>
							</td>
						</tr>
						<tr style="display:block;color:#000000;text-align:center;padding:10px 0">
							<td style="text-align:center;display:block">Powered by Copyright@2014 - Handymen.Com</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>