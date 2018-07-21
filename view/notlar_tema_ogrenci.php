<div class="col-sm-12">
	<div class="panel panel-default text-center">
		<div class="panel-body">
			<h3 class="baslik"><?php echo ogrenci_secilen_ders($notlar['ders_id']); ?></h3>
			<table>
				<tr>
					<th>Ödev Adı</th>
					<th>Ödev Notu</th>
				</tr>
				<tr>
					<th><hr></th>
					<th><hr></th>
				</tr>
				<?php
				foreach($values as $odevler)
				{
					$odev_notu = ogrenci_notlar_odev_notu($odevler['odev_id'],$_SESSION['ogr_id']);
					if($odev_notu == -1){ $odev_notu = '(Değerlendirilmedi)'; }
					if($notlar['ders_id'] == $odevler['ders_id'] )
					{
						echo '<tr>
						<td><a href="?sayfa=ogrenci/odevler/goster&id='.$odevler['odev_id'].'">'.$odevler['odev_adi'].'</a></td>
						<td>'.$odev_notu.'</td>
						</tr>';
					}
				}
				?>
			</table>
		</div>
	</div>
</div>