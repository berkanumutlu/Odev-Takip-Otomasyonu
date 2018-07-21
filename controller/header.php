<?php
// Header'ın nasıl gösterileceğini belirleyen fonksiyon
function header_sec()
{
	if(isset($_SESSION['uye_id']))
	{
		if($_SESSION['uye_id'] == 1)// Eğer admin ise
		{
			header_goster('header_admin.php');
		}
		else if($_SESSION['uye_id'] == 2)// Eğer öğretmen ise
		{
			header_goster('header_ogretmen.php');
		}
		else if($_SESSION['uye_id'] == 3)// Eğer öğrenci ise
		{
			header_goster('header_ogrenci.php');
		}
	}
	else// Eğer misafir ise
	{
		header_goster('header_misafir.php');
	}
}
?>