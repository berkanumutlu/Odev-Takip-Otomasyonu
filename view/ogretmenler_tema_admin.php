<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ogretmenler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ogretmenler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-blue">
				<th>Öğretmen ID</th>
				<th>Kullanıcı Adı</th>
				<th>Öğretmen Adı</th>
				<th>Öğretmen Soyadı</th>
			</tr>
		</thead>
		<?php
			$bolumun_ogretmenleri = admin_bolume_ait_ogretmenler($admin_ogretmenler['bolum_id']);
			if($bolumun_ogretmenleri == null)
			{
				echo '<tr>
				<td>Bu bölüme ait öğretmen bulunamadı.</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>';
			}
			else
			{
				foreach($bolumun_ogretmenleri as $ogretmen_bilgiler)
				{
					echo '<tr>
					<td>'.$ogretmen_bilgiler["ogrt_id"].'</td>
					<td>'.$ogretmen_bilgiler["kullanici_adi"].'</td>
					<td>'.$ogretmen_bilgiler["adi"].'</td>
					<td>'.$ogretmen_bilgiler["soyadi"].'</td>
					</tr>';
				}
			}
		?>
	</table>
</div>