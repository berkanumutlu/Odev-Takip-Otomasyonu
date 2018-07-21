<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogretmen_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogretmen_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-yellow">
				<th>Öğretmen ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğretmen Adı</th>
				<th>Öğretmen Soyadı</th>
				<th>Düzenle</th>
			</tr>
		</thead>
		<?php
			foreach($ogretmen_duzenle_bolum_ogretmenleri as $ogretmen_duzenle_bilgiler)
			{
				echo '<tr>
				<td>'.$ogretmen_duzenle_bilgiler["ogrt_id"].'</td>
				<td>'.$ogretmen_duzenle_bilgiler["kullanici_adi"].'</td>
				<td>'.$ogretmen_duzenle_bilgiler["adi"].'</td>
				<td>'.$ogretmen_duzenle_bilgiler["soyadi"].'</td>
				<td><a href="?sayfa=admin/ogretmen/duzenle/goster&id='.$ogretmen_duzenle_bilgiler['ogrt_id'].'">Düzenle</a></td>
				</tr>';
			}
		?>
	</table>
</div>