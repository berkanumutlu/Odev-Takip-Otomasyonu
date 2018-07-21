<div class="col-sm-9">
<?php
	$notver_odev=$values;
	$notver_odev_bilgiler=$values1;
	include('notver_odev_tema_ogretmen.php');
?><br><br>
<p>NotVer:&nbsp;<a href="?sayfa=ogretmen/notver/dersler/goster&id=<?php echo $notver_odev_bilgiler["ders_id"]; ?>">Ödevlere Geri Dön</a></p>
</div>