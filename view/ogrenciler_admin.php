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
			foreach($values as $admin_ogrenciler)
			{
				include('ogrenciler_tema_admin.php');
			}
		}
	?>
	</div>
</div>