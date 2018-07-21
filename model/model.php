<?php
include 'veritabani.php';
// Veritabanına kayıtlı olan tüm Şehirleri listeleyen fonksiyon
function tum_sehirler($gelen_dizi=null)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT * FROM sehirler");
	$sorgu_sonuc=mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">İl Seçin</option>';
		while ($sehirler=mysqli_fetch_object($sorgu))
		{
			if( ($sehirler->sehir_id == $_SESSION['sehir_id']) || ($sehirler->sehir_id  == $gelen_dizi['sehir_id']) )
			{
				echo '<option value="'.$sehirler->sehir_id.'" selected>'.$sehirler->plaka_kodu.' - '.$sehirler->sehir_adi.'</option>';
			}
			else
			{
				echo '<option value="'.$sehirler->sehir_id.'">'.$sehirler->plaka_kodu.' - '.$sehirler->sehir_adi.'</option>';
			}
        }
    }
}
// Öğretmenin veya Öğrencinin kayıtlı olduğu bölümü gösteren fonksiyon
function kayitli_oldugu_bolum()
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM bolumler WHERE bolum_id=".$_SESSION['bolum_id']."");
	$bolum=mysqli_fetch_object($sorgu);
	echo $bolum->adi;
}
?>