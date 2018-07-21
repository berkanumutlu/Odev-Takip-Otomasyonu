<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/website_news.png" alt="Site Haberleri">&nbsp;Site Haberleri</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php
			foreach($values as $haber)
			{
				include('haber_tema_kisa.php');
			}
		?>
	</div>
	<?php
		if($_GET["sayfa"]==="haber/hepsi"){ }
		else{ echo '<a href="?sayfa=haber/hepsi">Daha eski haberler</a>...'; }
	?>
</div>