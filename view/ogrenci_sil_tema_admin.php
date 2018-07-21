<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogrencinin_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogrencinin_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-red">
				<th>Öğrenci ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğrenci Adı</th>
				<th>Öğrenci Soyadı</th>
				<th>Seç</th>
			</tr>
		</thead>
		<?php
			foreach($ogrenci_sil_bolum_ogrencileri as $ogrenci_sil_bilgiler)
			{
				echo '<tr>
				<td>'.$ogrenci_sil_bilgiler["ogr_id"].'</td>
				<td>'.$ogrenci_sil_bilgiler["kullanici_adi"].'</td>
				<td>'.$ogrenci_sil_bilgiler["adi"].'</td>
				<td>'.$ogrenci_sil_bilgiler["soyadi"].'</td>
				<td><input type="checkbox" name="ogrencisil[]" value="'.$ogrenci_sil_bilgiler['ogr_id'].'"></td>
				</tr>';
			}
		?>
	</table>
</div>