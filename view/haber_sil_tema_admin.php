<div class="col-sm-12">
	<?php if(isset($_POST['secilenleri_sil'])){ admin_haber_sil(); } ?>
	<div class="row">
		<div class="col-sm-12">
			<table class="w3-table-all w3-hoverable">
				<thead>
					<tr class="w3-red">
						<th>Bölüm Adı</th>
						<th>Haber Başlığı</th>
						<th>Haber İçeriği</th>
						<th>Seç</th>
					</tr>
				</thead>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<?php
					foreach($values as $haber_sil)
					{
						$bolumun_adi = admin_haberin_ait_oldugu_bolum($haber_sil['bolum_id']);
						$haberin_basligi = admin_yazi_devami($haber_sil['baslik'],10);
						$haberin_icerigi = admin_yazi_devami($haber_sil['icerik'],10);
						echo '<tr>
						<td>'.$bolumun_adi.'</td>
						<td>'.$haberin_basligi.'</td>
						<td>'.$haberin_icerigi.'</td>
						<td><input type="checkbox" name="habersil[]" value="'.$haber_sil['haber_id'].'"></td>
						</tr>';
					}
				?>
			</table>
		</div>
	</div>
	<div class="row" style="margin-top:10px">
		<input type="submit" class="btn btn-danger" value="Seçilenleri Sil" name="secilenleri_sil">
		<input type="reset" class="btn btn-dark" value="Hepsini Sıfırla">
		</form>
	</div>
</div>