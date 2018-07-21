<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="row">
	<div class="col-sm-12">
		<?php if(isset($_POST['ders_duzenle_buton'])) { admin_ders_duzenle_kaydet($ders_duzenle_bilgiler['ders_id']); } ?>
		<div class="well well-lg">
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<table>
				<tr>
					<td>Bölüm</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<select class="form-control" name="ders_duzenle_bolum_sec" required>
								<?php admin_duzenle_bolumler($ders_duzenle_bilgiler['bolum_id']); ?>
							</select>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Öğretmen</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<select class="form-control" name="ders_duzenle_ogretmen_sec" required>
								<?php admin_duzenle_ogretmenler($ders_duzenle_bilgiler['ogrt_id']); ?>
							</select>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Ders Adı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="ders_adi" pattern=".{2,100}" maxlength="100" style="width:95%" placeholder="Ders adı girin" value="<?php echo $ders_duzenle_bilgiler['adi']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Ders Açıklaması</td>
					<td>:</td>
					<td>
						<textarea class="form-control" name="ders_aciklama" rows="5" cols="40" style="resize:none" placeholder="Bu alana Dersin Açıklamasını yazın..."><?php echo $ders_duzenle_bilgiler['aciklama']; ?></textarea>
					</td>
				</tr>
				<tr class="tr_son">
					<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="ders_duzenle_buton" value="Dersi Güncelle"></td>
				</tr>
				</table>
			</form>
		</div>
	</div>
</div>