<div class="col-sm-12">
	<table class="w3-table-all w3-hoverable">
		<thead>
			<tr class="w3-yellow">
				<th>Bölüm Adı</th>
				<th>Haber Başlığı</th>
				<th>Haber İçeriği</th>
				<th>Düzenle</th>
			</tr>
		</thead>
		<?php
			foreach($values as $haber_duzenle)
			{
				$bolumun_adi = admin_haberin_ait_oldugu_bolum($haber_duzenle['bolum_id']);
				$haberin_basligi = admin_yazi_devami($haber_duzenle['baslik'],10);
				$haberin_icerigi = admin_yazi_devami($haber_duzenle['icerik'],10);
				echo '<tr>
				<td>'.$bolumun_adi.'</td>
				<td>'.$haberin_basligi.'</td>
				<td>'.$haberin_icerigi.'</td>
				<td><a href="?sayfa=admin/haber/duzenle/goster&id='.$haber_duzenle['haber_id'].'">Düzenle</a></td>
				</tr>';
			}
		?>
	</table>
</div>