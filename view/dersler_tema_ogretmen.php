<div class="col-sm-12">
	<div class="well well-sm">
		<strong><h3><?php echo '<a href="?sayfa=ogretmen/dersler/goster&id='.$dersler["ders_id"].'">'.$dersler["adi"].'</a>'; ?></h3></strong>
		<h5 align="left"><img src="images/category.png" width="24px" height="24px">&nbsp;<?php echo ogretmen_verdigi_dersler_bolum($dersler["bolum_id"]); ?></h5>
		<p align="left"><img src="images/info.png">&nbsp;<?php if($dersler["aciklama"]==null){ echo 'Bu derse ait açıklama bulunamadı.'; } else{ echo $dersler["aciklama"]; } ?></p>
	</div>
</div>