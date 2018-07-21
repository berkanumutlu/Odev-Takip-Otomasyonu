<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h2><img src="images/homework.png" alt="Ödev">&nbsp;<?php echo $odev["odev_adi"]; ?></h2>
			</div>
		</div>
	</div>
</div>
<?php if($_POST){ dosya_gonder_kontrol($odev); } ?>
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
			<p><?php echo ogrenci_odev_gonderme_sayisi($odev['odev_id'],$_SESSION['ogr_id']); ?></p>
			<p><?php $bu_odevin_notu = ogrenci_notlar_odev_notu($odev['odev_id'],$_SESSION['ogr_id']); if($bu_odevin_notu >= 0){ echo 'Bu ödevden <strong>'.$bu_odevin_notu.' puan</strong> aldınız.'; } ?></p>
		</div>
	</div>
</div>