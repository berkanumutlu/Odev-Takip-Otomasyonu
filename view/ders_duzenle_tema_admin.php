<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_ders_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_ders_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-yellow">
				<th>Ders ID</th>
				<th>Ders Adı</th>
				<th>Ders Açıklaması</th>
				<th>Dersin Öğretmeni</th>
				<th>Düzenle</th>
			</tr>
		</thead>
		<?php
			foreach($ders_duzenle_bolum_dersleri as $ders_duzenle_bilgiler)
			{
				$dersin_ogretmeni = admin_dersin_ogretmen_bilgileri($ders_duzenle_bilgiler["ogrt_id"]);
				$dersin_adı = admin_yazi_devami($ders_duzenle_bilgiler["adi"],5);
				$dersin_aciklamasi = admin_yazi_devami($ders_duzenle_bilgiler["aciklama"],5);
				if($dersin_aciklamasi == null){ $dersin_aciklamasi = '-'; }
				echo '<tr>
				<td>'.$ders_duzenle_bilgiler["ders_id"].'</td>
				<td>'.$dersin_adı.'</td>
				<td>'.$dersin_aciklamasi.'</td>
				<td>'.$dersin_ogretmeni.'</td>
				<td><a href="?sayfa=admin/ders/duzenle/goster&id='.$ders_duzenle_bilgiler['ders_id'].'">Düzenle</a></td>
				</tr>';
			}
		?>
	</table>
</div>