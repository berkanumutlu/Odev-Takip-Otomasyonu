<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogrenci_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogrenci_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-yellow">
				<th>Öğrenci ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğrenci Adı</th>
				<th>Öğrenci Soyadı</th>
				<th>Düzenle</th>
			</tr>
		</thead>
		<?php
			foreach($ogrenci_duzenle_bolum_ogrencileri as $ogrenci_duzenle_bilgiler)
			{
				echo '<tr>
				<td>'.$ogrenci_duzenle_bilgiler["ogr_id"].'</td>
				<td>'.$ogrenci_duzenle_bilgiler["kullanici_adi"].'</td>
				<td>'.$ogrenci_duzenle_bilgiler["adi"].'</td>
				<td>'.$ogrenci_duzenle_bilgiler["soyadi"].'</td>
				<td><a href="?sayfa=admin/ogrenci/duzenle/goster&id='.$ogrenci_duzenle_bilgiler['ogr_id'].'">Düzenle</a></td>
				</tr>';
			}
		?>
	</table>
</div>