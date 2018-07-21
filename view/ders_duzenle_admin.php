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
			foreach($values as $admin_ders_bolumler)
			{
				$ders_duzenle_bolum_dersleri = admin_bolume_ait_dersler($admin_ders_bolumler['bolum_id']);
				if($ders_duzenle_bolum_dersleri == null){ }
				else{ include('ders_duzenle_tema_admin.php'); }
			}
		}
	?>
	</div>
</div>