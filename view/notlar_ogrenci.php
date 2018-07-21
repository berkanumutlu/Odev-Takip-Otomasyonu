<head>
	<link href="css/grades_student.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default text-left">
				<div class="panel-body">
					<h2><img src="images/grades.png" alt="Notlar">&nbsp;Notlar</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	<?php
	if($values==null)
	{
		echo '<p>Herhangi bir ödev göndermediniz.</p>';
	}
	else
	{
		$ders_dizisi = array();
		foreach($values as $notlar)// Aynı derse ait olan ödevlerin aynı dersin altında listeleyen fonksiyon
		{
			if(in_array($notlar['ders_id'], $ders_dizisi)) { }
			else
			{
				$ders_dizisi[] = $notlar['ders_id'];
				include('notlar_tema_ogrenci.php');
			}
		}
	}
	?>
	</div>
</div>