<head>
	<link href="css/admin_panel_table.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<?php if(isset($_POST['secilenleri_sil'])){ admin_ders_sil(); } ?>
	<div class="row">
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
		<?php
			if($values==null)
			{
				echo '<p>Herhangi bir bölüm kaydı bulunamadı.</p>';
			}
			else
			{
				foreach($values as $admin_dersin_bolumler)
				{
					$ders_sil_bolum_dersleri = admin_bolume_ait_dersler($admin_dersin_bolumler['bolum_id']);
					if($ders_sil_bolum_dersleri == null){ }
					else{ include('ders_sil_tema_admin.php'); }
				}
			}
		?>
	</div>
	<div class="row" style="margin-top:10px">
		<input type="submit" class="btn btn-danger" value="Seçilenleri Sil" name="secilenleri_sil">
		<input type="reset" class="btn btn-dark" value="Hepsini Sıfırla">
		</form>
	</div>
</div>