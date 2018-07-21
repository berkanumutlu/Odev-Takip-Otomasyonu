<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="row">
	<div class="col-sm-12">
		<?php if(isset($_POST['ogrenci_duzenle_buton'])) { admin_ogrenci_duzenle_kaydet($ogrenci_duzenle_bilgiler['ogr_id']); } ?>
		<div class="well well-lg">
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<table>
				<tr>
					<td>Bölüm</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<select class="form-control" name="bolum_sec" required>
								<?php admin_duzenle_bolumler($ogrenci_duzenle_bilgiler['bolum_id']); ?>
							</select>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Kullanıcı adı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="ogr_duzenle_kullanici_adi" pattern=".{2,30}" maxlength="30" placeholder="Kullanıcı Adı girin" value="<?php echo $ogrenci_duzenle_bilgiler['kullanici_adi']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<p>Şifre (8-16 karakter)</p>
						<br>
						<p>Şifre (Tekrar)</p>
					</td>
					<td>
						<p>:</p>
						<br>
						<p>:</p>
					</td>
					<td>
						<div class="password_match" data-msg="Şifre eşleşmiyor.">
							<input class="form-control" type="password" name="ogr_duzenle_pass1" pattern=".{8,16}" maxlength="16">
							<br>
							<input class="form-control" type="password" name="ogr_duzenle_pass2" pattern=".{8,16}" maxlength="16">
						</div>
					</td>
				</tr>
				<tr>
					<td>Adı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="ogr_duzenle_adi" pattern=".{2,30}" maxlength="30" placeholder="Ad girin" value="<?php echo $ogrenci_duzenle_bilgiler['adi']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Soyadı</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="text" name="ogr_duzenle_soyadi" pattern=".{2,30}" maxlength="30" placeholder="Soyad girin" value="<?php echo $ogrenci_duzenle_bilgiler['soyadi']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>E-Posta Adresi</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="email" name="ogr_duzenle_e_posta" pattern=".{6,50}" maxlength="50" placeholder="eposta@site.com" value="<?php echo $ogrenci_duzenle_bilgiler['e_posta']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Şehir</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<select class="form-control" name="sehir" required>
								<?php tum_sehirler($ogrenci_duzenle_bilgiler); ?>
							</select>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Telefon (5XX-XXX-XXXX)</td>
					<td>:</td>
					<td>
						<div class="form-inline">
							<input class="form-control" type="tel" name="telno" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Telefon Numarası girin" value="<?php echo $ogrenci_duzenle_bilgiler['telno']; ?>" required>
							<span class="profil_span">*</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Adres</td>
					<td>:</td>
					<td><textarea class="form-control" style="resize: none" rows="5" cols="40" name="adres" placeholder="Bu alana Adres yazın..."><?php echo $ogrenci_duzenle_bilgiler['adres']; ?></textarea></td>
				</tr>
				<tr>
					<td>Web Sayfası (https://...)</td>
					<td>:</td>
					<td><input type="url" class="form-control" style="resize: none" name="web_sayfasi" pattern=".{4,50}" maxlength="50" placeholder="Geçerli bir Web Adresi girin" value="<?php echo $ogrenci_duzenle_bilgiler['web_sayfasi']; ?>"></td>
				</tr>
				<tr>
					<td>Açıklama</td>
					<td>:</td>
					<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="aciklama" placeholder="Bu alana Açıklama yazın..."><?php echo $ogrenci_duzenle_bilgiler['aciklama']; ?></textarea></td>
				</tr>
				<tr>
					<td>İlgi Alanları (Virgül ile ayırarak yazın)</td>
					<td>:</td>
					<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="ilgi_alanlari" placeholder="Bu alana İlgi Alanlarını , (virgül) ile ayırarak yazın..."><?php echo $ogrenci_duzenle_bilgiler['ilgi_alanlari']; ?></textarea></td>
				</tr>
				<tr class="tr_son">
					<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="ogrenci_duzenle_buton" value="Öğrenciyi Güncelle"></td>
				</tr>
				</table>
			</form>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			<script src="js/password_match.js"></script>
		</div>
	</div>
</div>