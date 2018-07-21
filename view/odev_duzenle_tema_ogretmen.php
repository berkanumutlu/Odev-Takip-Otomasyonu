<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h2><img src="images/homework_edit.png" alt="Ödev Düzenle">&nbsp;Ödev Düzenle:&nbsp;<?php echo $odev_duzenle['odev_adi']; ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php if($_POST) { ogretmen_odev_bilgileri_duzenle($odev_duzenle['odev_id']); } ?>
		<div class="well well-lg">
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<table>
				<tr>
					<td>Ders</td>
					<td>:</td>
					<td><p class="form-control-static"><?php echo ogretmen_secilen_ders($odev_duzenle["ders_id"]); ?></p></td>
				</tr>
				<tr>
					<td>Ödev Adı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="odev_adi" pattern=".{2,50}" maxlength="50" style="width:95%" placeholder="Ödev Adı girin" value="<?php echo $odev_duzenle['odev_adi']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Ödev Açıklama</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<textarea class="form-control" name="odev_aciklama" rows="5" cols="40" style="resize:none;width:95%;" placeholder="Bu alana Ödevin Açıklamasını yazın..." required><?php echo $odev_duzenle['aciklama']; ?></textarea>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Başlangıç Tarihi</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="datetime-local" name="baslangic_tarih" value="<?php echo date('Y-m-d',strtotime($odev_duzenle['baslangic_tarihi'])).'T'.date('H:i',strtotime($odev_duzenle['baslangic_tarihi'])); ?>">
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Bitiş Tarihi</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="datetime-local" name="bitis_tarih" value="<?php echo date('Y-m-d',strtotime($odev_duzenle['bitis_tarihi'])).'T'.date('H:i',strtotime($odev_duzenle['bitis_tarihi'])); ?>">
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr class="tr_son">
					<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="odev_guncelle_buton" value="Ödevi Güncelle"></td>
				</tr>
				</table>
			</form>
		</div>
	</div>
</div>