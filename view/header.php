<?php include 'genel_ayarlar.php'; ?>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="?sayfa=anasayfa">S.Ü. Teknoloji Fakültesi</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<?php controller('header.php','header_sec'); ?>
			</ul>
		</div>
	</div>
</nav>
<h1>&nbsp;<?php echo $title; ?></h1>