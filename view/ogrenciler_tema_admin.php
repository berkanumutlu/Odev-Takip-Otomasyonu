<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogrenciler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogrenciler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-blue">
				<th>Öğrenci ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğrenci Adı</th>
				<th>Öğrenci Soyadı</th>
			</tr>
		</thead>
		<?php
			$bolumun_ogrencileri = admin_bolume_ait_ogrenciler($admin_ogrenciler['bolum_id']);
			if($bolumun_ogrencileri == null)
			{
				echo '<tr>
				<td>Bu bölüme ait öğrenci bulunamadı.</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>';
			}
			else
			{
				foreach($bolumun_ogrencileri as $ogrenci_bilgiler)
				{
					echo '<tr>
					<td>'.$ogrenci_bilgiler["ogr_id"].'</td>
					<td>'.$ogrenci_bilgiler["kullanici_adi"].'</td>
					<td>'.$ogrenci_bilgiler["adi"].'</td>
					<td>'.$ogrenci_bilgiler["soyadi"].'</td>
					</tr>';
				}
			}
		?>
	</table>
</div>