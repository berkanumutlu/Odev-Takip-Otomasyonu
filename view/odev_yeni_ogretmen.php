<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/homework.png" alt="Yeni Ödev">&nbsp;Yeni Ödev</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php if($_POST) { if( strtotime($_POST["bitis_tarih"]) - strtotime($_POST["baslangic_tarih"]) > 0 ){ ogretmen_odev_yeni_kaydet(); }else{ uyari_mesaji('Tarih Hatası!','Bitiş tarihi, Başlangıç tarihinden önce olamaz.',false); } } ?>
			<div class="well well-lg">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
					<table>
					<tr>
						<td>Ders</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<select class="form-control" name="ders_sec" required>
									<?php ogretmen_odev_yeni_dersler(); ?>
								</select>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ödev Adı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="odev_adi" pattern=".{2,50}" maxlength="50" style="width:95%" placeholder="Ödev Adı girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ödev Açıklama</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<textarea class="form-control" name="odev_aciklama" rows="5" cols="40" style="resize:none;width:95%;" placeholder="Bu alana Ödevin Açıklamasını yazın..." required></textarea>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Başlangıç Tarihi</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="datetime-local" name="baslangic_tarih" min="<?php echo date('Y-m-d',strtotime('-1 months')).'T'.date('H:i'); ?>" value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Bitiş Tarihi</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="datetime-local" name="bitis_tarih" min="<?php echo date('Y-m-d').'T'.date('H:i',strtotime('+30 minutes')); ?>" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr class="tr_son">
						<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
						<td></td>
						<td><input type="submit" class="btn btn-success" name="odev_yeni_buton" value="Ödevi Kaydet"></td>
					</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>