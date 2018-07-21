<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/profile_student.png" alt="Yönetici Profili">&nbsp;Profil Bilgileri</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php if($_POST) { admin_profil_bilgileri_kaydet(); } ?>
			<div class="well well-lg">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
					<table>
					<tr>
						<td>Kullanıcı adı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="kullanici_adi" pattern=".{2,30}" maxlength="30" placeholder="Kullanıcı Adı girin" value="<?php echo $_SESSION['kullanici_adi']; ?>" required>
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