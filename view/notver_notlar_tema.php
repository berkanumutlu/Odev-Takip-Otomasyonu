<div class="col-sm-12">
	<?php if(isset($_POST['gonder'])){ ogretmen_notver_kaydet($values1["odev_id"],$values1["ders_id"],$_POST['ogrenci']); } ?>
	<div class="panel panel-default text-center">
		<div class="panel-body">
			<table>
				<tr>
					<th>Öğrenci Numarası</th>
					<th>Öğrenci Adı-Soyadı</th>
					<th>Ödev Notu</th>
				</tr>
				<tr>
					<th><hr></th>
					<th><hr></th>
					<th><hr></th>
				</tr>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<?php
				foreach($values as $notver_odev)
				{
					echo '<tr>
					<td>'.$notver_odev['kullanici_adi'].'</td>
					<td>'.$notver_odev['adi'].'&nbsp;'.$notver_odev['soyadi'].'</td>
					<td><input type="number" min="0" max="100" name="ogrenci['.$notver_odev['ogr_id'].'][odev_notu]" value="'.$notver_odev['odev_not'].'"></td>
					</tr>';
				}
				?>
			</table>
		</div>
	</div>
	<input type="submit" class="btn btn-success" value="Kaydet" name="gonder">
	<input type="reset" class="btn btn-dark" value="Hepsini Sıfırla">
	<input type="button" class="btn btn-danger" onclick="window.location.href='?sayfa=ogretmen/notver/dersler/goster&id=<?php echo $notver_odev_bilgiler["ders_id"];?>'" value="İptal">
	</form>
</div>