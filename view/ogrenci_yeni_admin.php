<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<div class="row">
		<div class="col-sm-12">
			<?php if(isset($_POST['ogrenci_yeni_buton'])) { admin_ogrenci_yeni_kaydet(); } ?>
			<div class="well well-lg">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
					<table>
					<tr>
						<td>Bölüm</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<select class="form-control" name="bolum_sec" required>
									<?php admin_bolumler_hepsi(); ?>
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
								<input class="form-control" type="text" name="ogr_kullanici_adi" pattern=".{2,30}" maxlength="30" placeholder="Kullanıcı Adı girin" required>
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
								<div class="form-inline">
									<input class="form-control" type="password" name="ogr_yeni_pass1" pattern=".{8,16}" maxlength="16" style="width:95%" required>
									<span class="profil_span">*</span>
								</div>
								<br>
								<div class="form-inline">
									<input class="form-control" type="password" name="ogr_yeni_pass2" pattern=".{8,16}" maxlength="16" style="width:95%" required>
									<span class="profil_span">*</span>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>Adı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="ogr_adi" pattern=".{2,30}" maxlength="30" placeholder="Ad girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Soyadı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="ogr_soyadi" pattern=".{2,30}" maxlength="30" placeholder="Soyad girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>E-Posta Adresi</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="email" name="ogr_e_posta" pattern=".{6,50}" maxlength="50" placeholder="eposta@site.com" required>
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
									<?php tum_sehirler(); ?>
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
								<input class="form-control" type="tel" name="telno" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Telefon Numarası girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Adres</td>
						<td>:</td>
						<td><textarea class="form-control" style="resize: none" rows="5" cols="40" name="adres" placeholder="Bu alana Adres yazın..."></textarea></td>
					</tr>
					<tr>
						<td>Web Sayfası (https://...)</td>
						<td>:</td>
						<td><input type="url" class="form-control" style="resize: none" name="web_sayfasi" pattern=".{4,50}" maxlength="50" placeholder="Geçerli bir Web Adresi girin"></td>
					</tr>
					<tr>
						<td>Açıklama</td>
						<td>:</td>
						<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="aciklama" placeholder="Bu alana Açıklama yazın..."></textarea></td>
					</tr>
					<tr>
						<td>İlgi Alanları (Virgül ile ayırarak yazın)</td>
						<td>:</td>
						<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="ilgi_alanlari" placeholder="Bu alana İlgi Alanlarını , (virgül) ile ayırarak yazın..."></textarea></td>
					</tr>
					<tr class="tr_son">
						<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
						<td></td>
						<td><input type="submit" class="btn btn-success" name="ogrenci_yeni_buton" value="Öğrenciyi Kaydet"></td>
					</tr>
					</table>
				</form>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src="js/password_match.js"></script>
			</div>
		</div>
	</div>
</div>