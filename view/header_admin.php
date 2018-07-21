		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="">
				<?php echo '<span class="glyphicon glyphicon-user">&nbsp;</span>'.mb_convert_case($_SESSION['adi'],MB_CASE_UPPER,'UTF-8'); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="?sayfa=admin/profil"><span class="glyphicon glyphicon-user">&nbsp;</span>Profil</a></li>
				<li><a href="?sayfa=admin"><span class="glyphicon glyphicon-cog">&nbsp;</span>Admin Paneli</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href ="?sayfa=cikis"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Çıkış Yap</a></li>
			</ul>
		</li>