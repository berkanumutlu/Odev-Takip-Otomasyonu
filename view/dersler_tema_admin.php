<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<caption><h3><?php echo $admin_bolumler["bolum_id"].'&nbsp;-&nbsp;'.$admin_bolumler["adi"]; ?><h3></caption>
		<thead>
			<tr class="w3-blue">
				<th>Ders ID</th>
				<th>Ders Adı</th>
				<th>Ders Açıklaması</th>
				<th>Dersin Öğretmeni</th>
			</tr>
		</thead>
		<?php
			$bolumun_dersleri = admin_bolume_ait_dersler($admin_bolumler['bolum_id']);
			if($bolumun_dersleri == null)
			{
				echo '<tr>
				<td>Bu bölüme ait ders bulunamadı.</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>';
			}
			else
			{
				foreach($bolumun_dersleri as $ders_bilgiler)
				{
					$dersin_ogretmeni = admin_dersin_ogretmen_bilgileri($ders_bilgiler["ogrt_id"]);
					$dersin_adı = admin_yazi_devami($ders_bilgiler["adi"],5);
					$dersin_aciklamasi = admin_yazi_devami($ders_bilgiler["aciklama"],5);
					if($dersin_aciklamasi == null){ $dersin_aciklamasi = '-'; }
					echo '<tr>
					<td>'.$ders_bilgiler["ders_id"].'</td>
					<td>'.$dersin_adı.'</td>
					<td>'.$dersin_aciklamasi.'</td>
					<td>'.$dersin_ogretmeni.'</td>
					</tr>';
				}
			}
		?>
	</table>
</div>