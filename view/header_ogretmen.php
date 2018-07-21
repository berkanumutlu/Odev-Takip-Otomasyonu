		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="">
				<?php echo '<span class="glyphicon glyphicon-user">&nbsp;</span>'.mb_convert_case($_SESSION['adi'],MB_CASE_UPPER,'UTF-8').'&nbsp;'.mb_convert_case($_SESSION['soyadi'],MB_CASE_UPPER,'UTF-8'); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="?sayfa=ogretmen/profil"><span class="glyphicon glyphicon-user">&nbsp;</span>Profil</a></li>
				<li><a href="?sayfa=ogretmen/dersler"><span class="glyphicon glyphicon-list">&nbsp;</span>Dersler</a></li>
				<li><a href="?sayfa=ogretmen/odev/yeni"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Ödev Ekle</a></li>
				<li><a href="?sayfa=ogretmen/notver"><span class="glyphicon glyphicon-check">&nbsp;</span>Ödevlere Not Ver</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href ="?sayfa=cikis"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Çıkış Yap</a></li>
			</ul>
		</li>