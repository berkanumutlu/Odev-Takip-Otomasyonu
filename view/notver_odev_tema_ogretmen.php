<head>
	<link href="css/grades_teacher.css" type="text/css" rel="stylesheet"/>
</head>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default text-left">
			<div class="panel-body">
				<h2><img src="images/homework.png" alt="NotVer: Ödev">&nbsp;NotVer: <?php echo $notver_odev_bilgiler["odev_adi"]; ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<?php
	if($notver_odev==null)
	{
		echo '<p>Bu ödevi gönderen öğrenci olmadı.</p>';
	}
	else
	{
		include('notver_notlar_tema.php');
	}
	?>
</div>