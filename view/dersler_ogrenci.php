<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/lesson.png" alt="Aldığım Dersler">&nbsp;Dersler</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	<?php
		if($values==null)
		{
			echo '<p>Herhangi bir derse ait kaydınız bulunamadı.</p>';
		}
		else
		{
			foreach($values as $dersler)
			{
				include('dersler_tema_ogrenci.php');
			}
		}
	?>
	</div>
</div>