<?php
// Giriş yapan admine ait tüm bilgileri listeleyen fonksiyon
function admin_profil_bilgileri_tum()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM yonetici WHERE admin_id=".$_SESSION['admin_id']."");
	$profil_bilgileri=$sorgu->fetch_all(1);
	return $profil_bilgileri;
}
// Profil bilgilerini, güncellenen bilgilerle değiştiren fonksiyon
function admin_profil_bilgileri_guncel()
{
	global $connect;
	$yeni_sorgu = mysqli_query($connect,'SELECT * FROM yonetici WHERE admin_id="'.$_SESSION['admin_id'].'"');
	$yeni_bilgiler = mysqli_fetch_array($yeni_sorgu,MYSQLI_ASSOC);
	
	$_SESSION['admin_id'] = $yeni_bilgiler['admin_id'];
	$_SESSION['adi'] = $yeni_bilgiler['adi'];
	$_SESSION['kullanici_adi'] = $yeni_bilgiler['kullanici_adi'];
	$_SESSION['sifre'] = $yeni_bilgiler['sifre'];
	$_SESSION['uye_id'] = $yeni_bilgiler['uye_id'];
}
// Admine ait profil bilgilerini veritabanına kaydeden fonksiyon
function admin_profil_bilgileri_kaydet()
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
	$sorgu = "UPDATE yonetici SET adi='".mb_convert_case(trim($_POST['adi']),MB_CASE_TITLE,'UTF-8')."',
	kullanici_adi='".trim($_POST['kullanici_adi'])."', sifre='".$sifre_guncel."' WHERE admin_id='".$_SESSION['admin_id']."'";
	$sorgu_sonuc=mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Profil Güncellendi!','Profil bilgileriniz başarılı bir şekilde güncellendi.',true);
		admin_profil_bilgileri_guncel();
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Profil bilgileriniz güncellenirken bir hata oluştu.',false);
	}
}
// Admin panelinde tüm haberleri listeleyen fonksiyon
function admin_haberler_hepsi()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM haberler ORDER BY tarih DESC");
	$admin_haberler=$sorgu->fetch_all(1);
	return $admin_haberler;
}

// Haberin ait olduğu bölümü gösteren fonksiyon
function admin_haberin_ait_oldugu_bolum($bolum_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT adi FROM bolumler WHERE bolum_id=".$bolum_id."");
	$bolumun_adi=mysqli_fetch_object($sorgu);
	return $bolumun_adi->adi;
}
// Veritabanından yeni eklenecek haber için bölümleri listeleyen fonksiyon
function admin_bolumler_hepsi()
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT * FROM bolumler ORDER BY bolum_id");
	$sorgu_sonuc = mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">Bölüm Seçin</option>';
		while ($haber_bolumler=mysqli_fetch_object($sorgu))
		{
			echo '<option value="'.$haber_bolumler->bolum_id.'">'.$haber_bolumler->adi.'</option>';
        }
    }
}
// Yeni haberi veritabanına kaydeden fonksiyon
function admin_haber_yeni_kaydet()
{
	global $connect;
	$suanki_tarih = date('Y-m-d H:i:s');
	$sorgu = "INSERT INTO haberler(baslik,icerik,tarih,bolum_id,uye_id) VALUES('".trim($_POST['haber_baslik'])."',
	'".trim($_POST['haber_icerik'])."','".$suanki_tarih."','".$_POST['bolum_sec']."','".$_SESSION['uye_id']."')";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Haber Eklendi!','Haber başarılı bir şekilde eklendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin">';
	}
	else
	{
		uyari_mesaji('Ekleme Hatası!','Haber, veritabanına kaydedilirken bir hata oluştu.',false);
	}
}
// Yazının içeriğini sınırlayıp sonuna ... ekleyen fonksiyon
function admin_yazi_devami($metin,$metin_limiti)
{
	$kelime = explode(" ",$metin);
	$sayac = count($kelime);
	$yeni_metin = array();
	if($sayac > $metin_limiti)
	{
		for($i = 0; $i <= $metin_limiti; $i++)
		{
			$yeni_metin[$i] = $kelime[$i];
		}
		$sonuc_metin = implode(" ",$yeni_metin);
		return $sonuc_metin.'...';
	}
	else{ return $metin; }
}
// Veritabanından sadece seçilen habere ait bilgileri listeleyen fonksiyon
function admin_haber_duzenle($haber_duzenle_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM haberler WHERE haber_id=".$haber_duzenle_id."");
	$haber_goster=$sorgu->fetch_assoc();
	return $haber_goster;
}
// Veritabanında kayıtlı olan tüm Bölümleri listeleyen fonksiyon
function admin_duzenle_bolumler($duzenle_bolum_id)
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT * FROM bolumler ORDER BY bolum_id ASC");
	$sorgu_sonuc = mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">Bölüm Seçin</option>';
		while ($duzenle_bolumler = mysqli_fetch_object($sorgu))
		{
			if($duzenle_bolumler->bolum_id == $duzenle_bolum_id)
			{
				echo '<option value="'.$duzenle_bolumler->bolum_id.'" selected>'.$duzenle_bolumler->adi.'</option>';
			}
			else
			{
				echo '<option value="'.$duzenle_bolumler->bolum_id.'">'.$duzenle_bolumler->adi.'</option>';
			}
        }
    }
}
// Güncellenen haber bilgilerini veritabanına kaydeden fonksiyon
function admin_haber_duzenle_kaydet($haberin_id)
{
	global $connect;
	$sorgu = "UPDATE haberler SET baslik='".trim($_POST['haber_duzenle_baslik'])."', icerik='".trim($_POST['haber_duzenle_icerik'])."',
	bolum_id='".$_POST['haber_duzenle_bolum_sec']."' WHERE haber_id='".$haberin_id."'";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Haber Güncellendi!','Haber bilgileri başarılı bir şekilde güncellendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/haber/duzenle">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Haber güncellenirken bir hata oluştu.',false);
	}
}
// Veritabanından seçilen haberi/haberleri silmeyi sağlayan fonksiyon
function admin_haber_sil()
{
	global $connect;
	if(isset($_POST['habersil']))
	{
		$silinecekler = implode(', ', $_POST['habersil']);
		$sorgu = "DELETE FROM haberler WHERE haber_id IN(".$silinecekler.")";
		$sorgu_sonuc = mysqli_query($connect,$sorgu);
		if($sorgu_sonuc)
		{
			uyari_mesaji('Haber Silindi!','Seçilen '.count($_POST['habersil']).' adet Haber başarılı bir şekilde silindi.',true);
			echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/haber/sil">';
		}
		else
		{
			uyari_mesaji('Silme Hatası!','Haber silinirken bir hata oluştu.',false);
		}
	}
	else
	{
		echo "<script>alert('Listeden bir haber seçin.');</script>";
	}
}
// Veritabanında bulunan tüm bölümleri listeleyen fonksiyon
function admin_bolum_bilgiler_hepsi()
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM bolumler ORDER BY bolum_id");
	$bolumler_hepsi=$sorgu->fetch_all(1);
	return $bolumler_hepsi;
}
// Bölüme ait olan dersleri listeleyen fonksiyon
function admin_bolume_ait_dersler($bolumun_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM dersler WHERE bolum_id=".$bolumun_id." ORDER BY dersler.adi ASC");
	$bolum_dersler=$sorgu->fetch_all(1);
	return $bolum_dersler;
}
// Dersin öğretmenini gösteren fonksiyon
function admin_dersin_ogretmen_bilgileri($ogretmenin_id)
{
	global $connect;
	$sorgu=mysqli_query($connect,"SELECT * FROM ogretmen WHERE ogrt_id=".$ogretmenin_id."");
	@$dersler_ogretmen=mysqli_fetch_object($sorgu);
	if($dersler_ogretmen == null){ return '-'; }
	else{ return $dersler_ogretmen->adi.'&nbsp;'.$dersler_ogretmen->soyadi; }
}
// Yeni dersi veritabanına kaydeden fonksiyon
function admin_ders_yeni_kaydet()
{
	global $connect;
	$sorgu = "INSERT INTO dersler(adi,aciklama,bolum_id,ogrt_id) VALUES('".trim($_POST['ders_adi'])."',
	'".trim($_POST['ders_aciklama'])."','".$_POST['bolum_sec']."','".$_POST['ogretmen_sec']."')";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Ders Eklendi!','Ders başarılı bir şekilde eklendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ders/hepsi">';
	}
	else
	{
		uyari_mesaji('Ekleme Hatası!','Ders, veritabanına kaydedilirken bir hata oluştu.',false);
	}
}
// Veritabanından sadece seçilen derse ait bilgileri listeleyen fonksiyon
function admin_ders_duzenle($ders_duzenle_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM dersler WHERE ders_id=".$ders_duzenle_id."");
	$ders_goster=$sorgu->fetch_assoc();
	return $ders_goster;
}
// Veritabanından yeni eklenecek ders için bölümleri listeleyen fonksiyon
function admin_ogretmenler_hepsi()
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT ogrt_id,adi,soyadi FROM ogretmen ORDER BY adi ASC");
	$sorgu_sonuc = mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">Öğretmen Seçin</option>';
		while ($ders_ogretmenler=mysqli_fetch_object($sorgu))
		{
			echo '<option value="'.$ders_ogretmenler->ogrt_id.'">'.$ders_ogretmenler->adi.'&nbsp;'.$ders_ogretmenler->soyadi.'</option>';
        }
    }
}
// Veritabanında kayıtlı olan tüm Öğretmenleri listeleyen fonksiyon
function admin_duzenle_ogretmenler($duzenle_ogretmen_id)
{
	global $connect;
	$sorgu = mysqli_query($connect,"SELECT * FROM ogretmen ORDER BY adi ASC");
	$sorgu_sonuc = mysqli_num_rows($sorgu);
	if ($sorgu_sonuc > 0)
	{
		echo '<option value="">Öğretmen Seçin</option>';
		while ($duzenle_ogretmenler = mysqli_fetch_object($sorgu))
		{
			if($duzenle_ogretmenler->ogrt_id == $duzenle_ogretmen_id)
			{
				echo '<option value="'.$duzenle_ogretmenler->ogrt_id.'" selected>'.$duzenle_ogretmenler->adi.'&nbsp;'.$duzenle_ogretmenler->soyadi.'</option>';
			}
			else
			{
				echo '<option value="'.$duzenle_ogretmenler->ogrt_id.'">'.$duzenle_ogretmenler->adi.'&nbsp;'.$duzenle_ogretmenler->soyadi.'</option>';
			}
        }
    }
}
// Güncellenen ders bilgilerini veritabanına kaydeden fonksiyon
function admin_ders_duzenle_kaydet($dersin_id)
{
	global $connect;
	$sorgu = "UPDATE dersler SET adi='".trim($_POST['ders_adi'])."', aciklama='".trim($_POST['ders_aciklama'])."',
	bolum_id='".$_POST['ders_duzenle_bolum_sec']."', ogrt_id='".$_POST['ders_duzenle_ogretmen_sec']."'
	WHERE ders_id='".$dersin_id."'";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Ders Güncellendi!','Ders bilgileri başarılı bir şekilde güncellendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ders/duzenle">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Ders güncellenirken bir hata oluştu.',false);
	}
}
// Veritabanından seçilen dersi/dersleri silmeyi sağlayan fonksiyon
function admin_ders_sil()
{
	global $connect;
	if(isset($_POST['derssil']))
	{
		$silinecekler = implode(', ', $_POST['derssil']);
		$sorgu = "DELETE FROM dersler WHERE ders_id IN(".$silinecekler.")";
		$sorgu_sonuc = mysqli_query($connect,$sorgu);
		if($sorgu_sonuc)
		{
			uyari_mesaji('Ders Silindi!','Seçilen '.count($_POST['derssil']).' adet Ders başarılı bir şekilde silindi.',true);
			echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ders/sil">';
		}
		else
		{
			uyari_mesaji('Silme Hatası!','Ders silinirken bir hata oluştu.',false);
		}
	}
	else
	{
		echo "<script>alert('Listeden bir ders seçin.');</script>";
	}
}
// Veritabanında bulunan tüm öğretmenleri listeleyen fonksiyon
function admin_ogretmen_bilgiler_hepsi()
{
	global $connect;
	$sorgu=$connect->query("SELECT ogrt_id, adi, soyadi, kullanici_adi FROM ogretmen ORDER BY adi");
	$ogretmenler_hepsi=$sorgu->fetch_all(1);
	return $ogretmenler_hepsi;
}
// Bölüme ait olan öğretmenleri listeleyen fonksiyon
function admin_bolume_ait_ogretmenler($bolumun_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogretmen WHERE bolum_id=".$bolumun_id." ORDER BY ogretmen.adi ASC");
	$bolum_ogretmenler=$sorgu->fetch_all(1);
	return $bolum_ogretmenler;
}
// Yeni öğretmeni veritabanına kaydeden fonksiyon
function admin_ogretmen_yeni_kaydet()
{
	global $connect;
	$sorgu = "INSERT INTO ogretmen(adi,soyadi,kullanici_adi,sifre,e_posta,sehir_id,telno,adres,web_sayfasi,aciklama,ilgi_alanlari,bolum_id,uye_id)
	VALUES('".mb_convert_case(trim($_POST['ogrt_adi']),MB_CASE_TITLE,'UTF-8')."', '".mb_convert_case(trim($_POST['ogrt_soyadi']),MB_CASE_UPPER,'UTF-8')."',
	'".trim($_POST['ogrt_kullanici_adi'])."', '".md5(trim($_POST["ogrt_yeni_pass1"]))."', '".trim($_POST['ogrt_e_posta'])."', '".$_POST['sehir']."',
	'".$_POST['telno']."', '".trim($_POST['adres'])."', '".trim($_POST['web_sayfasi'])."', '".trim($_POST['aciklama'])."',
	'".trim($_POST['ilgi_alanlari'])."', '".$_POST['bolum_sec']."', 2)";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Öğretmen Eklendi!','Öğretmen başarılı bir şekilde eklendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogretmen/hepsi">';
	}
	else
	{
		uyari_mesaji('Ekleme Hatası!','Öğretmen, veritabanına kaydedilirken bir hata oluştu.',false);
	}
}
// Veritabanından sadece seçilen öğretmene ait bilgileri listeleyen fonksiyon
function admin_ogretmen_duzenle($ogretmen_duzenle_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogretmen WHERE ogrt_id=".$ogretmen_duzenle_id."");
	$ogretmen_goster=$sorgu->fetch_assoc();
	return $ogretmen_goster;
}
// Güncellenen öğretmen bilgilerini veritabanına kaydeden fonksiyon
function admin_ogretmen_duzenle_kaydet($ogretmen_id)
{
	global $connect;
	if( (md5($_POST["ogrt_duzenle_pass1"]) === md5($_POST["ogrt_duzenle_pass2"])) && (!empty($_POST["ogrt_duzenle_pass1"]) && !empty($_POST["ogrt_duzenle_pass2"])) )
	{
		$sorgu = "UPDATE ogretmen SET adi='".mb_convert_case(trim($_POST['ogrt_duzenle_adi']),MB_CASE_TITLE,'UTF-8')."', soyadi='".mb_convert_case(trim($_POST['ogrt_duzenle_soyadi']),MB_CASE_UPPER,'UTF-8')."',
		kullanici_adi='".trim($_POST['ogrt_duzenle_kullanici_adi'])."', sifre='".md5(trim($_POST["ogrt_duzenle_pass1"]))."',
		e_posta='".trim($_POST['ogrt_duzenle_e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
		web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
		WHERE ogrt_id='".$ogretmen_id."'";
	}
	else
	{
		$sorgu = "UPDATE ogretmen SET adi='".mb_convert_case(trim($_POST['ogrt_duzenle_adi']),MB_CASE_TITLE,'UTF-8')."',
		soyadi='".mb_convert_case(trim($_POST['ogrt_duzenle_soyadi']),MB_CASE_UPPER,'UTF-8')."', kullanici_adi='".trim($_POST['ogrt_duzenle_kullanici_adi'])."',
		e_posta='".trim($_POST['ogrt_duzenle_e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
		web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
		WHERE ogrt_id='".$ogretmen_id."'";
	}
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Öğretmen Güncellendi!','Öğretmen bilgileri başarılı bir şekilde güncellendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogretmen/duzenle">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Öğretmen güncellenirken bir hata oluştu.',false);
	}
}
// Veritabanından seçilen öğretmeni/öğretmenleri silmeyi sağlayan fonksiyon
function admin_ogretmen_sil()
{
	global $connect;
	if(isset($_POST['ogretmensil']))
	{
		$silinecekler = implode(', ', $_POST['ogretmensil']);
		$sorgu = "DELETE FROM ogretmen WHERE ogrt_id IN(".$silinecekler.")";
		$sorgu_sonuc = mysqli_query($connect,$sorgu);
		if($sorgu_sonuc)
		{
			uyari_mesaji('Öğretmen Silindi!','Seçilen '.count($_POST['ogretmensil']).' Öğretmen başarılı bir şekilde silindi.',true);
			echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogretmen/sil">';
		}
		else
		{
			uyari_mesaji('Silme Hatası!','Öğretmen silinirken bir hata oluştu.',false);
		}
	}
	else
	{
		echo "<script>alert('Listeden bir öğretmen seçin.');</script>";
	}
}
// Bölüme ait olan öğrencileri listeleyen fonksiyon
function admin_bolume_ait_ogrenciler($bolumun_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogrenci WHERE bolum_id=".$bolumun_id." ORDER BY ogrenci.kullanici_adi");
	$bolum_ogrenciler=$sorgu->fetch_all(1);
	return $bolum_ogrenciler;
}
// Yeni öğrenciyi veritabanına kaydeden fonksiyon
function admin_ogrenci_yeni_kaydet()
{
	global $connect;
	$sorgu = "INSERT INTO ogrenci(adi,soyadi,kullanici_adi,sifre,e_posta,sehir_id,telno,adres,web_sayfasi,aciklama,ilgi_alanlari,bolum_id,uye_id)
	VALUES('".mb_convert_case(trim($_POST['ogr_adi']),MB_CASE_TITLE,'UTF-8')."', '".mb_convert_case(trim($_POST['ogr_soyadi']),MB_CASE_UPPER,'UTF-8')."',
	'".trim($_POST['ogr_kullanici_adi'])."', '".md5(trim($_POST["ogr_yeni_pass1"]))."', '".trim($_POST['ogr_e_posta'])."', '".$_POST['sehir']."',
	'".$_POST['telno']."', '".trim($_POST['adres'])."', '".trim($_POST['web_sayfasi'])."', '".trim($_POST['aciklama'])."',
	'".trim($_POST['ilgi_alanlari'])."', '".$_POST['bolum_sec']."', 3)";
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Öğrenci Eklendi!','Öğrenci başarılı bir şekilde eklendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogrenci/hepsi">';
	}
	else
	{
		uyari_mesaji('Ekleme Hatası!','Öğrenci, veritabanına kaydedilirken bir hata oluştu.',false);
	}
}
// Veritabanından sadece seçilen öğrenciye ait bilgileri listeleyen fonksiyon
function admin_ogrenci_duzenle($ogrenci_duzenle_id)
{
	global $connect;
	$sorgu=$connect->query("SELECT * FROM ogrenci WHERE ogr_id=".$ogrenci_duzenle_id."");
	$ogrenci_goster=$sorgu->fetch_assoc();
	return $ogrenci_goster;
}
// Güncellenen öğrenci bilgilerini veritabanına kaydeden fonksiyon
function admin_ogrenci_duzenle_kaydet($ogrenci_id)
{
	global $connect;
	if( (md5($_POST["ogr_duzenle_pass1"]) === md5($_POST["ogr_duzenle_pass2"])) && (!empty($_POST["ogr_duzenle_pass1"]) && !empty($_POST["ogr_duzenle_pass2"])) )
	{
		$sorgu = "UPDATE ogrenci SET adi='".mb_convert_case(trim($_POST['ogr_duzenle_adi']),MB_CASE_TITLE,'UTF-8')."', soyadi='".mb_convert_case(trim($_POST['ogr_duzenle_soyadi']),MB_CASE_UPPER,'UTF-8')."',
		kullanici_adi='".trim($_POST['ogr_duzenle_kullanici_adi'])."', sifre='".md5(trim($_POST["ogr_duzenle_pass1"]))."',
		e_posta='".trim($_POST['ogr_duzenle_e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
		web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
		WHERE ogr_id='".$ogrenci_id."'";
	}
	else
	{
		$sorgu = "UPDATE ogrenci SET adi='".mb_convert_case(trim($_POST['ogr_duzenle_adi']),MB_CASE_TITLE,'UTF-8')."',
		soyadi='".mb_convert_case(trim($_POST['ogr_duzenle_soyadi']),MB_CASE_UPPER,'UTF-8')."', kullanici_adi='".trim($_POST['ogr_duzenle_kullanici_adi'])."',
		e_posta='".trim($_POST['ogr_duzenle_e_posta'])."', sehir_id='".$_POST['sehir']."', telno='".$_POST['telno']."', adres='".trim($_POST['adres'])."',
		web_sayfasi='".trim($_POST['web_sayfasi'])."', aciklama='".trim($_POST['aciklama'])."', ilgi_alanlari='".trim($_POST['ilgi_alanlari'])."'
		WHERE ogr_id='".$ogrenci_id."'";
	}
	$sorgu_sonuc = mysqli_query($connect,$sorgu);
	if($sorgu_sonuc)
	{
		uyari_mesaji('Öğrenci Güncellendi!','Öğrenci bilgileri başarılı bir şekilde güncellendi.<br><br><b>Yönlendiriliyorsunuz...</b>',true);
		echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogrenci/duzenle">';
	}
	else
	{
		uyari_mesaji('Güncelleme Hatası!','Öğrenci güncellenirken bir hata oluştu.',false);
	}
}
// Veritabanından seçilen öğrenciyi/öğrencileri silmeyi sağlayan fonksiyon
function admin_ogrenci_sil()
{
	global $connect;
	if(isset($_POST['ogrencisil']))
	{
		$silinecekler = implode(', ', $_POST['ogrencisil']);
		$sorgu = "DELETE FROM ogrenci WHERE ogr_id IN(".$silinecekler.")";
		$sorgu_sonuc = mysqli_query($connect,$sorgu);
		if($sorgu_sonuc)
		{
			uyari_mesaji('Öğrenci Silindi!','Seçilen '.count($_POST['ogrencisil']).' Öğrenci başarılı bir şekilde silindi.',true);
			echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=admin/ogrenci/sil">';
		}
		else
		{
			uyari_mesaji('Silme Hatası!','Öğrenci silinirken bir hata oluştu.',false);
		}
	}
	else
	{
		echo "<script>alert('Listeden bir öğrenci seçin.');</script>";
	}
}
?>