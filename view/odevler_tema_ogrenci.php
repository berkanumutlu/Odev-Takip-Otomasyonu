<div class="col-sm-12">
	<div class="well well-sm">
		<strong><h4 align="left"><?php echo '<img src="images/homework.png" alt="Ödev" width="24px" height="24px">&nbsp;<a href="?sayfa=ogrenci/odevler/goster&id='.$odevler["odev_id"].'">'.$odevler["odev_adi"].'</a>'; ?></h4></strong>
		<p align="left"><img src="images/calendar.png">&nbsp;<?php echo '<strong>Veriliş Tarihi :</strong>&nbsp;'.$odevler["baslangic_tarihi"].'&emsp;<strong>Bitiş Tarihi :</strong>&nbsp;'.$odevler["bitis_tarihi"]; ?></p>
	</div>
</div>