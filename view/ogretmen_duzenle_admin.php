<head>
	<link href="css/admin_panel_table.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<div class="row">
	<?php
		if($values==null)
		{
			echo '<p>Herhangi bir bölüm kaydı bulunamadı.</p>';
		}
		else
		{
			foreach($values as $admin_ogretmen_bolumler)
			{
				$ogretmen_duzenle_bolum_ogretmenleri = admin_bolume_ait_ogretmenler($admin_ogretmen_bolumler['bolum_id']);
				if($ogretmen_duzenle_bolum_ogretmenleri == null){ }
				else{ include('ogretmen_duzenle_tema_admin.php'); }
			}
		}
	?>
	</div>
</div>