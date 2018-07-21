<div class="col-sm-7">
<?php
	$odev=$values;
	include('odev_tema_ogrenci.php');
	
	$suanki_zaman = date('Y-m-d H:i:s');
	if(strtotime($odev["bitis_tarihi"]) - strtotime($suanki_zaman) > 0)// Ödevin süresi dolmamış ise
	{
		include('dosya_gonder.php');
	}
	else// Ödevin süresi dolmuş ise
	{
		echo '<p><img src="images/cross.png" width="32px" height="32px">&nbsp;Artık bu ödevi gönderemezsiniz.</p>';
	}
?><br><br>
<p><a href="?sayfa=ogrenci/dersler/goster&id=<?php echo $odev["ders_id"];?>">Ödevlere Geri Dön</a></p>
</div>