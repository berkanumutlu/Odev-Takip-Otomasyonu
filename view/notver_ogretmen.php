<div class="col-sm-7">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/lesson.png" alt="NotVer: Dersler">&nbsp;NotVer: Dersler</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	<?php
		if($values==null)
		{
			echo '<p>Verdiğiniz herhangi bir ders bulunamadı.</p>';
		}
		else
		{
			foreach($values as $notver_dersler)
			{
				include('notver_dersler_tema_ogretmen.php');
			}
		}
	?>
	</div>
</div>