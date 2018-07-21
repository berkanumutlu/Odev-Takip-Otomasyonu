<head>
	<link href="css/admin_panel_table.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<?php if(isset($_POST['secilenleri_sil'])){ admin_ogrenci_sil(); } ?>
	<div class="row">
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
		<?php
			if($values==null)
			{
				echo '<p>Herhangi bir bölüm kaydı bulunamadı.</p>';
			}
			else
			{
				foreach($values as $admin_ogrencinin_bolumler)
				{
					$ogrenci_sil_bolum_ogrencileri = admin_bolume_ait_ogrenciler($admin_ogrencinin_bolumler['bolum_id']);
					if($ogrenci_sil_bolum_ogrencileri == null){ }
					else{ include('ogrenci_sil_tema_admin.php'); }
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