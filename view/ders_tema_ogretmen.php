<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h2><img src="images/lesson.png" alt="Ders">&nbsp;<?php echo ogretmen_secilen_ders($_GET["id"]); ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="row">
<?php
	if($odevler==null)
	{
		echo '<p>Bu derse ait herhangi bir ödev bulunamadı.</p><br><img src="images/plus.png" width="32px" height="32px">&nbsp;<a href="?sayfa=ogretmen/odev/yeni">Ödev Ekle</a>';
	}
	else
	{
		foreach($values as $odevler)
		{
			include('odevler_tema_ogretmen.php');
		}
	}
?>
</div>