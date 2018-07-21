<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h2><img src="images/homework.png" alt="Ödev">&nbsp;<?php echo $odev["odev_adi"]; ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<strong><p align="left">Ödev Açıklaması</p></strong>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<p align="left"><?php echo $odev["aciklama"]; ?></p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<p><img src="images/calendar.png">&nbsp;<?php echo '<strong>Veriliş Tarihi :</strong>&nbsp;'.$odev["baslangic_tarihi"].'&emsp;<img src="images/calendar.png">&nbsp;<strong>Bitiş Tarihi :</strong>&nbsp;'.$odev["bitis_tarihi"]; ?></p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><img src="images/homework_edit.png" width="32px" height="32px">&nbsp;<a href="?sayfa=ogretmen/odev/duzenle&id=<?php echo $odev["odev_id"];?>">Ödevi Düzenle</a>&emsp;<img src="images/homework_delete.png" width="32px" height="32px">&nbsp;<a data-toggle="modal" href="#myModal">Ödevi Sil</a></p>
		<?php include 'dogrulama.php'; ?>
	</div>
</div>
<div id="output"></div>