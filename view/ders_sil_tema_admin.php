<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_dersin_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_dersin_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-red">
				<th>Ders ID</th>
				<th>Ders Adı</th>
				<th>Ders Açıklaması</th>
				<th>Dersin Öğretmeni</th>
				<th>Seç</th>
			</tr>
		</thead>
		<?php
			foreach($ders_sil_bolum_dersleri as $ders_sil_bilgiler)
			{
				$dersin_ogretmeni = admin_dersin_ogretmen_bilgileri($ders_sil_bilgiler["ogrt_id"]);
				$dersin_adı = admin_yazi_devami($ders_sil_bilgiler["adi"],5);
				$dersin_aciklamasi = admin_yazi_devami($ders_sil_bilgiler["aciklama"],5);
				if($dersin_aciklamasi == null){ $dersin_aciklamasi = '-'; }
				echo '<tr>
				<td>'.$ders_sil_bilgiler["ders_id"].'</td>
				<td>'.$dersin_adı.'</td>
				<td>'.$dersin_aciklamasi.'</td>
				<td>'.$dersin_ogretmeni.'</td>
				<td><input type="checkbox" name="derssil[]" value="'.$ders_sil_bilgiler['ders_id'].'"></td>
				</tr>';
			}
		?>
	</table>
</div>