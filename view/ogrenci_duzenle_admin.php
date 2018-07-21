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
			foreach($values as $admin_ogrenci_bolumler)
			{
				$ogrenci_duzenle_bolum_ogrencileri = admin_bolume_ait_ogrenciler($admin_ogrenci_bolumler['bolum_id']);
				if($ogrenci_duzenle_bolum_ogrencileri == null){ }
				else{ include('ogrenci_duzenle_tema_admin.php'); }
			}
		}
	?>
	</div>
</div>