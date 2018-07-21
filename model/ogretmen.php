<?php
// Giriş yapan öğretmene ait tüm bilgileri listeleyen fonksiyon
function ogretmen_profil_bilgileri_tum()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogretmen WHERE ogrt_id=".$_SESSION['ogrt_id']."");
	$profil_bilgileri=$sorgu->fetch_all(1);
	return $profil_bilgileri;
}
// Profil bilgilerini, güncellenen bilgilerle değiştiren fonksiyon
function ogretmen_profil_bilgileri_guncel()
{
	global $connect;
	$yeni_sorgu = mysqli_query($connect,'SELECT * FROM ogretmen WHERE ogrt_id="'.$_SESSION['ogrt_id'].'"');
	$yeni_bilgiler = mysqli_fetch_array($yeni_sorgu,MYSQLI_ASSOC);
	
	$_SESSION['ogrt_id'] = $yeni_bilgiler['ogrt_id'];
	$_SESSION['adi'] = $yeni_bilgiler['adi'];
	$_SESSION['soyadi'] = $yeni_bilgiler['soyadi'];
	$_SESSION['kullanici_adi'] = $yeni_bilgiler['kullanici_adi'];
	$_SESSION['sifre'] = $yeni_bilgiler['sifre'];
	$_SESSION['e_posta'] = $yeni_bilgiler['e_posta'];
	$_SESSION['sehir_id'] = $yeni_bilgiler['sehir_id'];
	$_SESSION['telno'] = $yeni_bilgiler['telno'];
	$_SESSION['adres'] = $yeni_bilgiler['adres'];
	$_SESSION['web_sayfasi'] = $yeni_bilgiler['web_sayfasi'];
	$_SESSION['aciklama'] = $yeni_bilgiler['aciklama'];
	$_SESSION['ilgi_alanlari'] = $yeni_bilgiler['ilgi_alanlari'];
	$_SESSION['uye_id'] = $yeni_bilgiler['uye_id'];
	$_SESSION['bolum_id'] = $yeni_bilgiler['bolum_id'];
}
// Öğretmene ait profil bilgilerini veritabanına kaydeden fonksiyon
function ogretmen_profil_bilgileri_kaydet()
{
	global $connect;
	if( (md5($_POST["pass1"]) === md5($_POST["pass2"])) && (!empty($_POST["pass1"]) && !empty($_POST["pass2"])) )
	{
		$sifre_guncel = md5(trim($_POST["pass1"]));
	}
	else
	{
		$sifre_guncel = $_SESSION["sifre"];
	}
	$sorgu = "UPDATE ogretmen SET adi='".mb_convert_case(trim($_POST['adi']),MB_CASE_TITLE,'UTF-8')."', soyadi='".mb_convert_case(trim($_POST['soyadi']),MB_CASE_UPPER,'UTF-8')."', sifre='".$sifre_guncel."',
	e_posta='".trim($_POST['e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
	web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
	WHERE ogrt_id='".$_SESSION['ogrt_id']."'";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Profil Güncellendi!','Profil bilgileriniz başarılı bir şekilde güncellendi.',true);
		ogretmen_profil_bilgileri_guncel();
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Profil bilgileriniz güncellenirken bir hata oluştu.',false);
	}
}
// Öğretmenin verdiği derslerin bilgilerini gösteren fonksiyon
function ogretmen_verdigi_dersler()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM dersler WHERE ogrt_id=".$_SESSION['ogrt_id']."");
	$verdigi_dersler=$sorgu->fetch_all(1);
	return $verdigi_dersler;
}
// Öğretmenin verdiği derslerin ait olduğu bölümü gösteren fonksiyon
function ogretmen_verdigi_dersler_bolum($bolum_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM bolumler WHERE bolum_id=".$bolum_id."");
	$verdigi_dersler_bolum=mysqli_fetch_object($sorgu);
	return $verdigi_dersler_bolum->adi;
}
// Veritabanından sadece seçilen derse ait ödevleri listeleyen fonksiyon
function ogretmen_verdigi_ders_odevler($ders_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM odevler WHERE ders_id=".$ders_id."");
	$odevler=$sorgu->fetch_all(1);
	return $odevler;
}
// Veritabanından sadece seçilen dersin bilgilerini listeleyen fonksiyon
function ogretmen_secilen_ders($ders_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM dersler WHERE ders_id=".$ders_id."");
	$secilen_ders=mysqli_fetch_object($sorgu);
	return $secilen_ders->adi;
}
// Veritabanından sadece seçilen ödeve ait bilgileri listeleyen fonksiyon
function ogretmen_odev_goster($odev_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM odevler WHERE odev_id=".$odev_id."");
	$odev=$sorgu->fetch_assoc();
	return $odev;
}
// Veritabanından yeni eklenecek ödev için verilen dersleri gösteren fonksiyon
function ogretmen_odev_yeni_dersler()
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT * FROM dersler WHERE ogrt_id=".$_SESSION['ogrt_id']."");
	$sorgu_sonuc = mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">Ders Seçin</option>';
		while ($odev_dersler=mysqli_fetch_object($sorgu))
		{
			echo '<option value="'.$odev_dersler->ders_id.'">'.$odev_dersler->adi.'</option>';
        }
    }
}
// Yeni ödevi veritabanına kaydeden fonksiyon
function ogretmen_odev_yeni_kaydet()
{
	global $connect;
	$sorgu = "INSERT INTO odevler(odev_adi,aciklama,baslangic_tarihi,bitis_tarihi,ders_id) VALUES('".trim($_POST['odev_adi'])."','".trim($_POST['odev_aciklama'])."','".$_POST['baslangic_tarih']."','".$_POST['bitis_tarih']."','".$_POST['ders_sec']."')";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Ödev Eklendi!','Ödev başarılı bir şekilde eklendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=ogretmen/odevler/goster&id='.$connect->insert_id.'">';
	}
	else
	{
		uyari_mesaji('Ekleme Hatası!','Lütfen gerekli alanları belirtilen şekilde doldurun.',false);
	}
}
// Güncellenen ödev bilgilerini veritabanına kaydeden fonksiyon
function ogretmen_odev_bilgileri_duzenle($odev_id)
{
	global $connect;
	$sorgu = "UPDATE odevler SET odev_adi='".trim($_POST['odev_adi'])."', aciklama='".trim($_POST['odev_aciklama'])."',
	baslangic_tarihi='".$_POST['baslangic_tarih']."', bitis_tarihi ='".$_POST['bitis_tarih']."'
	WHERE odev_id='".$odev_id."'";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Ödev Güncellendi!','Ödev bilgileri başarılı bir şekilde güncellendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=ogretmen/odevler/goster&id='.$odev_id.'">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Lütfen gerekli alanları belirtilen şekilde doldurun.',false);
	}
}
// Seçilen ödevi veritabanından silen fonksiyon
function ogretmen_odev_sil($odevin_odev_id,$odevin_ders_id)
{
	// global $connect;
	// $sorgu = "DELETE FROM odevler WHERE odev_id=".$odevin_odev_id."";
	// $sorgu_sonuc=mysqli_query($connect,$sorgu);
	// echo '<script>$("#output").html("Merhaba")</script>';
	return "<meta http-equiv='refresh' content='1; url=index.php?sayfa=ogretmen/dersler/goster&id=".$odevin_ders_id."'>";
}
// Seçilen ödevi gönderen öğrencileri listeleyen fonksiyon
function ogretmen_odev_gonderenler($notver_odev_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT ogr_odev.odev_id, ogr_odev.ogr_id, ogr_odev.odev_not, ogrenci.adi, ogrenci.soyadi, ogrenci.kullanici_adi FROM ogrenci INNER JOIN ogr_odev ON ogrenci.ogr_id = ogr_odev.ogr_id WHERE ogr_odev.odev_id=".$notver_odev_id." ORDER BY ogrenci.kullanici_adi ASC");
	$odev_gonderenler=$sorgu->fetch_all(1);
	return $odev_gonderenler;
}
// Öğretmenin ödevlere verdiği notları veritbanına kaydeden fonksiyon
function ogretmen_notver_kaydet($notverin_odev_id,$notver_ders_id,$notver_dizisi)
{
	global $connect;
	foreach($notver_dizisi as $key => $value)
	{
		if(is_array($value))
		{
			foreach($value as $anahtar => $deger)
			{
				if($deger == null){
					$sorgu = "UPDATE ogr_odev SET odev_not=null WHERE odev_id=".$notverin_odev_id." AND ogr_id=".$key."";
					$sorgu_sonuc = mysqli_query($connect,$sorgu);
				}
				else
				{
					$sorgu = "UPDATE ogr_odev SET odev_not=".$deger." WHERE odev_id=".$notverin_odev_id." AND ogr_id=".$key."";
					$sorgu_sonuc = mysqli_query($connect,$sorgu);
				}
			}
		}
	}
	if($sorgu_sonuc)
	{
		
		uyari_mesaji('Notlar Güncellendi!','Ödev notları başarılı bir şekilde güncellendi.',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=ogretmen/notver/dersler/goster&id='.$notver_ders_id.'">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Ödev notları güncellenirken bir hata oluştu.',false);
	}
}
?>