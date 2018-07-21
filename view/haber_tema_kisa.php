<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-3">
			<div class="well well-sm">
				<strong><p><?php echo haberin_yazari($haber["uye_id"]); ?></p></strong>
				<img src="images/default_avatar.png" class="img-rounded" height="70" width="60">
				<strong><p style="margin-top:2px;margin-bottom:1px;">Tarih:</p></strong>
				<p><?php echo $haber["tarih"]; ?></p>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="well">
				<strong><u><p><?php echo haberin_ait_oldugu_bolum($haber["bolum_id"]); ?></p></u></strong>
				<strong><h4 align="left"><?php echo $haber["baslik"]; ?></h4></strong>
				<p align="left"><?php echo haber_devami($haber["haber_id"],$haber["icerik"],40); ?></p>
			</div>
		</div>
	</div>
</div>