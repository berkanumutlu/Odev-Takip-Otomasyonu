<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogretmenin_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogretmenin_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-red">
				<th>Öğretmen ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğretmen Adı</th>
				<th>Öğretmen Soyadı</th>
				<th>Seç</th>
			</tr>
		</thead>
		<?php
			foreach($ogretmen_sil_bolum_ogretmenleri as $ogretmen_sil_bilgiler)
			{
				echo '<tr>
				<td>'.$ogretmen_sil_bilgiler["ogrt_id"].'</td>
				<td>'.$ogretmen_sil_bilgiler["kullanici_adi"].'</td>
				<td>'.$ogretmen_sil_bilgiler["adi"].'</td>
				<td>'.$ogretmen_sil_bilgiler["soyadi"].'</td>
				<td><input type="checkbox" name="ogretmensil[]" value="'.$ogretmen_sil_bilgiler['ogrt_id'].'"></td>
				</tr>';
			}
		?>
	</table>
</div>