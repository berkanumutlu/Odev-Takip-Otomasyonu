<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/profile_teacher.png" alt="Öğretmen Profili">&nbsp;Profil Bilgileri</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php if($_POST) { ogretmen_profil_bilgileri_kaydet(); } ?>
			<div class="well well-lg">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
					<table>
					<tr>
						<td>Bölüm</td>
						<td>:</td>
						<td><p class="form-control-static"><?php kayitli_oldugu_bolum(); ?></p></td>
					</tr>
					<tr>
						<td>Kullanıcı adı</td>
						<td>:</td>
						<td><p class="form-control-static"><?php echo $_SESSION['kullanici_adi']; ?></p></td>
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
								<input class="form-control" type="password" name="pass1" pattern=".{8,16}" maxlength="16">
								<br>
								<input class="form-control" type="password" name="pass2" pattern=".{8,16}" maxlength="16">
							</div>
						</td>
					</tr>
					<tr>
						<td>Adı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="adi" pattern=".{2,30}" maxlength="30" value="<?php echo $_SESSION['adi']; ?>" placeholder="Ad girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Soyadı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="soyadi" pattern=".{2,30}" maxlength="30" value="<?php echo $_SESSION['soyadi']; ?>" placeholder="Soyad girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>E-Posta Adresi</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="email" name="e_posta" pattern=".{6,50}" maxlength="50" value="<?php echo $_SESSION['e_posta']; ?>" placeholder="eposta@site.com" required>
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
								<input class="form-control" type="tel" name="telno" value="<?php echo $_SESSION['telno']; ?>" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Telefon Numarası girin">
							</div>
						</td>
					</tr>
					<tr>
						<td>Adres</td>
						<td>:</td>
						<td><textarea class="form-control" style="resize: none" rows="5" cols="40" name="adres" placeholder="Bu alana Adres yazın..."><?php echo $_SESSION['adres']; ?></textarea></td>
					</tr>
					<tr>
						<td>Web Sayfası (https://...)</td>
						<td>:</td>
						<td><input type="url" class="form-control" style="resize: none" name="web_sayfasi" pattern=".{4,50}" maxlength="50" value="<?php echo $_SESSION['web_sayfasi']; ?>" placeholder="Geçerli bir Web Adresi girin"></td>
					</tr>
					<tr>
						<td>Açıklama</td>
						<td>:</td>
						<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="aciklama" placeholder="Bu alana Açıklama yazın..."><?php echo $_SESSION['aciklama']; ?></textarea></td>
					</tr>
					<tr>
						<td>İlgi Alanları (Virgül ile ayırarak yazın)</td>
						<td>:</td>
						<td><textarea class="form-control" rows="5" cols="40" style="resize: none" name="ilgi_alanlari" placeholder="Bu alana İlgi Alanlarınızı , (virgül) ile ayırarak yazın..."><?php echo $_SESSION['ilgi_alanlari']; ?></textarea></td>
					</tr>
					<tr class="tr_son">
						<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
						<td></td>
						<td><input type="submit" class="btn btn-primary" name="profil_guncelle_buton" value="Profili Güncelle"></td>
					</tr>
					</table>
				</form>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src="js/password_match.js"></script>
			</div>
		</div>
	</div>
</div>