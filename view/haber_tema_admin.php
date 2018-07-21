<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="row">
	<div class="col-sm-12">
		<?php if(isset($_POST['haber_guncelle_buton'])) { admin_haber_duzenle_kaydet($haber_duzenle['haber_id']); } ?>
		<div class="well well-lg">
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<table>
				<tr>
					<td>Bölüm</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<select class="form-control" name="haber_duzenle_bolum_sec" required>
								<?php admin_duzenle_bolumler($haber_duzenle['bolum_id']); ?>
							</select>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Haber Başlığı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="haber_duzenle_baslik" pattern=".{2,100}" maxlength="100" style="width:95%" placeholder="Haber başlığı girin" value="<?php echo $haber_duzenle['baslik']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Haber İçeriği</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<textarea class="form-control" name="haber_duzenle_icerik" rows="5" cols="40" style="resize:none;width:95%;" placeholder="Bu alana Haberin İçeriğini yazın..." required><?php echo $haber_duzenle['icerik']; ?></textarea>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr class="tr_son">
					<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="haber_guncelle_buton" value="Haberi Güncelle"></td>
				</tr>
				</table>
			</form>
		</div>
	</div>
</div>