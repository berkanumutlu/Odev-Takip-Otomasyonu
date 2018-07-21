<?php
// Giriş yapan öğrenciye ait tüm bilgileri listeleyen fonksiyon
function ogrenci_profil_bilgileri_tum()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogrenci WHERE ogr_id=".$_SESSION['ogr_id']."");
	$profil_bilgileri=$sorgu->fetch_all(1);
	return $profil_bilgileri;
}
// Profil bilgilerini, güncellenen bilgilerle değiştiren fonksiyon
function ogrenci_profil_bilgileri_guncel()
{
	global $connect;
	$yeni_sorgu = mysqli_query($connect,'SELECT * FROM ogrenci WHERE ogr_id="'.$_SESSION['ogr_id'].'"');
	$yeni_bilgiler = mysqli_fetch_array($yeni_sorgu,MYSQLI_ASSOC);
	
	$_SESSION['ogr_id'] = $yeni_bilgiler['ogr_id'];
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
// Öğrenciye ait profil bilgilerini veritabanına kaydeden fonksiyon
function ogrenci_profil_bilgileri_kaydet()
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
	$sorgu = "UPDATE ogrenci SET adi='".mb_convert_case(trim($_POST['adi']),MB_CASE_TITLE,'UTF-8')."', soyadi='".mb_convert_case(trim($_POST['soyadi']),MB_CASE_UPPER,'UTF-8')."', sifre='".$sifre_guncel."',
	e_posta='".trim($_POST['e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
	web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
	WHERE ogr_id='".$_SESSION['ogr_id']."'";
	$sorgu_sonuc=mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Profil Güncellendi!','Profil bilgileriniz başarılı bir şekilde güncellendi.',true);
		ogrenci_profil_bilgileri_guncel();
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Profil bilgileriniz güncellenirken bir hata oluştu.',false);
	}
}
// Öğrencinin aldığı derslerin bilgilerini gösteren fonksiyon
function ogrenci_aldigi_dersler()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM dersler WHERE ders_id IN(SELECT ders_id FROM ogr_ders WHERE ogr_id=".$_SESSION['ogr_id'].")");
	$aldigi_dersler=$sorgu->fetch_all(1);
	return $aldigi_dersler;
}
// Öğrencinin aldığı dersleri veren öğretmeni gösteren fonksiyon
function ogrenci_aldigi_dersler_ogretmen($ogretmen_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi,soyadi FROM ogretmen WHERE ogrt_id=".$ogretmen_id."");
	$aldigi_dersler_ogretmen=mysqli_fetch_object($sorgu);
	return $aldigi_dersler_ogretmen->adi.' '.$aldigi_dersler_ogretmen->soyadi;
}
// Veritabanından sadece seçilen derse ait ödevleri listeleyen fonksiyon
function ogrenci_aldigi_ders_odevler($ders_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM odevler WHERE ders_id=".$ders_id."");
	$odevler=$sorgu->fetch_all(1);
	return $odevler;
}
// Veritabanından sadece seçilen dersin bilgilerini listeleyen fonksiyon
function ogrenci_secilen_ders($ders_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM dersler WHERE ders_id=".$ders_id."");
	$secilen_ders=mysqli_fetch_object($sorgu);
	return $secilen_ders->adi;
}
// Veritabanından sadece seçilen ödeve ait bilgileri listeleyen fonksiyon
function ogrenci_odev_goster($odev_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM odevler WHERE odev_id=".$odev_id."");
	$odev=$sorgu->fetch_assoc();
	return $odev;
}
// Öğrencinin ödev gönderdiğinde veritabanına kaydeden fonksiyon
function ogrenci_odev_kaydet($odev_id,$ogr_id,$gonderme_tarihi)
{
	global $connect;
	$kontrol_sorgu = mysqli_query($connect,"SELECT * FROM ogr_odev WHERE odev_id='".$odev_id."' AND ogr_id='".$ogr_id."'");
	$gonderme_sayisi = mysqli_fetch_array($kontrol_sorgu,MYSQLI_ASSOC);
	$gonderme_sayisi['odev_gonderildi'] = $gonderme_sayisi['odev_gonderildi'] + 1;
	$kontrol = mysqli_num_rows($kontrol_sorgu);
	if($kontrol > 0)// Eğer bu veri var ise güncelle
	{
		$sorgu = "UPDATE ogr_odev SET odev_gonderildi='".$gonderme_sayisi['odev_gonderildi']."',gonderme_tarihi='".$gonderme_tarihi."' WHERE odev_id='".$odev_id."' AND ogr_id='".$ogr_id."'";
	}
	else// Eğer yok ise yeni oluştur.
	{
		$sorgu = "INSERT INTO ogr_odev(odev_id,ogr_id,odev_gonderildi,gonderme_tarihi) VALUES('".$odev_id."','".$ogr_id."',1,'".$gonderme_tarihi."')";
	}
	$sorgu_sonuc=mysqli_query($connect,$sorgu);
}
// Ödevin gönderilme sayısını bulan fonksiyon
function ogrenci_odev_gonderme_sayisi($odev_id,$ogr_id)
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT odev_gonderildi FROM ogr_odev WHERE odev_id=".$odev_id." AND ogr_id=".$ogr_id."");
	$odev_gonderme_sayisi = mysqli_fetch_object($sorgu);
	if(!isset($odev_gonderme_sayisi->odev_gonderildi)) { return '<strong><p>Bu ödev hiç gönderilmedi.</p></strong>'; }
	else { return '<p>Bu ödev <strong>'.$odev_gonderme_sayisi->odev_gonderildi.'</strong> kez gönderildi.</p>'; }
}
// Veritabanından öğrencinin ödevlerden aldığı notları listeleyen fonksiyon
function ogrenci_notlar()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM odevler INNER JOIN ogr_odev ON odevler.odev_id = ogr_odev.odev_id WHERE ogr_id=".$_SESSION['ogr_id']." ORDER BY odevler.odev_id ASC");
	$notlar=$sorgu->fetch_all(1);
	return $notlar;
}
// Veritabanından öğrencinin ödevden aldığı notu gösteren fonksiyon
function ogrenci_notlar_odev_notu($odev_id,$ogr_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT odev_not FROM ogr_odev WHERE ogr_id=".$ogr_id." AND odev_id=".$odev_id."");
	$odev_notu=mysqli_fetch_object($sorgu);
	if(isset($odev_notu->odev_not)) { return $odev_notu->odev_not; }
	else { return -1; }
}
?>