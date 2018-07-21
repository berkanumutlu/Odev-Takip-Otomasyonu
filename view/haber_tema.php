<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h3><img src="images/website_news.png" alt="Site Haberleri">&nbsp;<?php echo $haber["baslik"]; ?></h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<strong><?php echo haberin_ait_oldugu_bolum($haber["bolum_id"]); ?></strong>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="well well-sm">
			<strong><p><?php echo haberin_yazari($haber["uye_id"]); ?></p></strong>
			<img src="images/default_avatar.png" class="img-rounded" height="70" width="60">
			<strong><p style="margin-top:2px;margin-bottom:1px;">Tarih:</p></strong>
			<p><?php echo $haber["tarih"]; ?></p>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
<div class="row">
	<div class="col-sm-12">
		<pre style="text-align:left"><?php echo $haber["icerik"]; ?></pre>
	</div>
</div>