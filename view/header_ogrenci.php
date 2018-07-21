		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="">
				<?php echo '<span class="glyphicon glyphicon-user">&nbsp;</span>'.mb_convert_case($_SESSION['adi'],MB_CASE_UPPER,'UTF-8').'&nbsp;'.mb_convert_case($_SESSION['soyadi'],MB_CASE_UPPER,'UTF-8'); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="?sayfa=ogrenci/profil"><span class="glyphicon glyphicon-user">&nbsp;</span>Profil</a></li>
				<li><a href="?sayfa=ogrenci/dersler"><span class="glyphicon glyphicon-list">&nbsp;</span>Dersler</a></li>
				<li><a href="?sayfa=ogrenci/notlar"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Notlar</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href ="?sayfa=cikis"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Çıkış Yap</a></li>
			</ul>
		</li>