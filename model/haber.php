<?php
// Veritabanından bütün haber bilgilerini listeleyen fonksiyon
function tum_haberleri_cek()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM haberler ORDER BY tarih DESC");
	$haberler=$sorgu->fetch_all(1);
	return $haberler;
}
// Veritabanından sadece seçilen haberin bilgilerini listeleyen fonksiyon
function tek_haber_cek($id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM haberler WHERE haber_id=".$id."");
	$haber=$sorgu->fetch_assoc();
	return $haber;
}
// Veritabanından son 4 haberin bilgilerini listeleyen fonksiyon
function son_haberleri_cek()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM haberler ORDER BY tarih DESC LIMIT 4");
	$haberler=$sorgu->fetch_all(1);
	return $haberler;
}
// Haber içeriği fazla ise belli bir sınırdan kesip içeriğin sonuna "devamı" yazısını ekleyen fonksiyon
function haber_devami($metin_id,$metin,$metin_limiti)
{
	$kelime = explode(" ",$metin);
	$sayac = count($kelime);
	if($sayac > $metin_limiti)
	{
		for($i = 0; $i <= $metin_limiti; $i++)
		{
			if($i==$metin_limiti)
			{
				echo $kelime[$i];
			}
			else
			{
				echo $kelime[$i].' ';
			}
		}
		echo '... <a href="?sayfa=haber/goster&id='.$metin_id.'">Devamı</a>';
	}
	else
	{
		echo $metin;
	}
}
// Haberin ait olduğu bölümü gösteren fonksiyon
function haberin_ait_oldugu_bolum($bolum_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM bolumler WHERE bolum_id=".$bolum_id."");
	$bolumun_adi=mysqli_fetch_object($sorgu);
	return $bolumun_adi->adi;
}
// Haberi yazan yazarın bilgilerini gösteren fonksiyon
function haberin_yazari($yazar_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM yonetici WHERE uye_id=".$yazar_id."");
	$yazarin_adi=mysqli_fetch_object($sorgu);
	return $yazarin_adi->adi;
}
?>