<head>
	<link href="css/login.css" type="text/css" rel="stylesheet"/>
</head>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<div class="imgcontainer">
		<img src="images/login.png" alt="Avatar" class="avatar">
	</div>
	<?php giris_kontrol(); ?>
	<div class="container">
		<label for="uname"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Kullanıcı adı / E-posta adresi</b></label><input type="text" placeholder="Kullanıcı adı veya e-posta girin" name="uname" required>
		<label for="psw"><span class="glyphicon glyphicon-lock"></span>&nbsp;<b>Şifre</b></label><input type="password" placeholder="Şifre girin" name="psw" required>
		<button type="submit">Giriş Yap</button>
		<label><input type="checkbox" name="remember">&nbsp;Beni Hatırla</label>
	</div>
	<div class="container" style="background-color: #e5e1e1">
		<span class="psw">Kullanıcı adı veya şifrenizi mi <a href="">unuttunuz</a>?</span>
	</div>
</form>