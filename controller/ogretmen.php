<?php
// Öğretmen menüsündeki seçenekleri gösteren fonksiyon
function goster($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 2)
	{
		if($tur==="profil")// Öğretmenin profil sayfasını gösterir.
		{
			$ogretmen_profil=ogretmen_profil_bilgileri_tum();
			sayfa_goster('profil_ogretmen.php','Profil',$ogretmen_profil);
		}
		else if($tur==="dersler")// Öğretmenin verdiği dersleri gösterir.
		{
			$ogretmen_dersler=ogretmen_verdigi_dersler();
			sayfa_goster('dersler_ogretmen.php','Verdiğim Dersler',$ogretmen_dersler);
		}
		else if($tur==="ders_goster")// Öğretmenin verdiği derslerin ödevlerini gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$ogretmen_ders_odevler=ogretmen_verdigi_ders_odevler($id);
				sayfa_goster('ders_ogretmen.php','Ders',$ogretmen_ders_odevler);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="odev_goster")// Öğretmenin ödev içeriğini görüntülediği sayfayı gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$odev=ogretmen_odev_goster($id);
				sayfa_goster('odev_ogretmen.php','Ödev',$odev);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="odev_yeni")// Öğretmenin yeni ödev eklediği sayfayı gösterir.
		{
			sayfa_goster('odev_yeni_ogretmen.php','Yeni Ödev Ekle');
		}
		else if($tur==="odev_duzenle")// Öğretmenin ödevi düzenlediği sayfayı gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$ogretmen_odev_duzenle=ogretmen_odev_goster($id);
				sayfa_goster('odev_duzenle_ogretmen.php','Ödev Düzenle',$ogretmen_odev_duzenle);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="notver")// Öğretmenin not vermesi için verdiği dersleri gösterir.
		{
			$ogretmen_notver=ogretmen_verdigi_dersler();
			sayfa_goster('notver_ogretmen.php','Ödevlere Not Ver',$ogretmen_notver);
		}
		else if($tur==="notver_ders_goster")// Öğretmenin not vermesi için seçtiği dersin ödevlerini gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$ogretmen_notver_ders_odevler=ogretmen_verdigi_ders_odevler($id);
				sayfa_goster('notver_ders_ogretmen.php','NotVer: Ders',$ogretmen_notver_ders_odevler);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="notver_odev_goster")// Öğretmenin not vermesi için seçtiği ödevi gönderen öğrencileri gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$notver_odevin_id=$_GET["id"];
				$ogretmen_notver_odev_gonderenler=ogretmen_odev_gonderenler($notver_odevin_id);
				$ogretmen_notver_odev_bilgiler=ogretmen_odev_goster($notver_odevin_id);
				notlar_sayfa_goster('notver_odev_ogretmen.php','NotVer: Ödev',$ogretmen_notver_odev_gonderenler,$ogretmen_notver_odev_bilgiler);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else// Giriş yapılmadan herhangi bir Öğretmen sayfasına ulaşılmaya çalışılır ise hata verir.
	{
		hata_erisim_engellendi();
	}
}
?>