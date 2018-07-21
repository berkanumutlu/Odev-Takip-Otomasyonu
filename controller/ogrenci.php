<?php
// Öğrenci menüsündeki seçenekleri gösteren fonksiyon
function goster($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 3)
	{
		if($tur==="profil")// Öğrencinin profil sayfasını gösterir.
		{
			$ogrenci_profil=ogrenci_profil_bilgileri_tum();
			sayfa_goster('profil_ogrenci.php','Profil',$ogrenci_profil);
		}
		else if($tur==="dersler")// Öğrencinin aldığı dersleri gösterir.
		{
			$ogrenci_dersler=ogrenci_aldigi_dersler();
			sayfa_goster('dersler_ogrenci.php','Aldığım Dersler',$ogrenci_dersler);
		}
		else if($tur==="ders_goster")// Öğrencinin aldığı derslerin ödevlerini gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$ogrenci_ders_odevler=ogrenci_aldigi_ders_odevler($id);
				sayfa_goster('ders_ogrenci.php','Ders',$ogrenci_ders_odevler);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="odev_goster")// Öğrencinin ödev göndermesi yaptığı sayfayı gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$odev=ogrenci_odev_goster($id);
				sayfa_goster('odev_ogrenci.php','Ödev Gönder',$odev);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="notlar")// Öğrencinin ödevlerden aldığı notları gösterir.
		{
			$ogrenci_notlar=ogrenci_notlar();
			notlar_sayfa_goster('notlar_ogrenci.php','Ödev Notları',$ogrenci_notlar);
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else// Giriş yapılmadan herhangi bir Öğrenci sayfasına ulaşılmaya çalışılır ise hata verir.
	{
		hata_erisim_engellendi();
	}
}
// Ödev dosyasını kontrol eden fonksiyon
function dosya_gonder_kontrol($odev)
{
	global $DB_FILE_NAME;
	$target_dir = "dosyalar/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$file_new_name = $odev['odev_id'].'_'.$_SESSION['kullanici_adi'].'.'.$FileType;// Dosyanın yeni adı
	// Dosya formatı uygun mu değil mi kontrol eder.
	if(isset($_POST["submit"])) {
		$check = filesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}
	// Dosya boyutu kontrol ediliyor.
	if ($_FILES["fileToUpload"]["size"] > 27262976) {
		uyari_mesaji("Dosya Boyutu Fazla!","Yüklemeye çalıştığınız dosyanın boyutu maksimum boyutunu aşıyor.<br>Maksimum boyut: 25MB",false);
		$uploadOk = 0;
	}
	// Sadece belirtilen formattaki dosyalara izin verilir.
	if($FileType != "rar" && $FileType != "zip" && $FileType != "tar" && $FileType != "tgz" && $FileType != "7z" ) {
		uyari_mesaji("Dosya Formatı Uygun Değil!","Sadece <strong>ZIP, RAR, 7Z, TAR, TGZ</strong> formatına sahip dosyalara izin verilmektedir.",false);
		$uploadOk = 0;
	}
	// Bazı hatalardan dolayı $uploadOk değer 0 olmuş ise
	else if ($uploadOk == 0) {
		echo "<p>Dosya gönderilemedi.</p>";
	// Hiçbir sıkıntı yok ise dosyayı yükle
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$uzanti = $_SERVER["DOCUMENT_ROOT"].'/'.$DB_FILE_NAME.'/dosyalar/';
			$dersin_adi = $odev['ders_id'].'_'.ogrenci_secilen_ders($odev['ders_id']);
			$odevin_yolu = 'Ödevler/'.$dersin_adi.'/'.$odev['odev_id'].'_'.$odev['odev_adi'].'/';
			rename($uzanti.$_FILES["fileToUpload"]["name"],$uzanti.$odevin_yolu.$file_new_name);
			$ayni_dosya = array_diff(scandir($uzanti.$odevin_yolu), array('..', '.'));
			for ($i = 2; $i < count($ayni_dosya)+2; $i++)// Daha önce gönderilen dosya var ise onu sil
			{
				if(strstr($ayni_dosya[$i],$odev['odev_id'].'_'.$_SESSION['kullanici_adi']))
				{
					if($ayni_dosya[$i]!=$file_new_name)
					{
						unlink($uzanti.$odevin_yolu.$ayni_dosya[$i]);
					}
				}
			}
			$suanki_zaman = date('Y-m-d H:i:s');
			ogrenci_odev_kaydet($odev['odev_id'],$_SESSION['ogr_id'],$suanki_zaman);
			uyari_mesaji("Gönderme Başarılı!","<strong>".basename( $_FILES["fileToUpload"]["name"])."</strong> adlı dosya başarılı bir şekilde yüklendi.",true);
			echo '<meta http-equiv="refresh" content="2; url=index.php?sayfa=ogrenci/dersler/goster&id='.$odev['ders_id'].'">';
		} else {
			uyari_mesaji("Hata!","Dosyanız yüklenirken bir hata oluştu.",false);
		}
	}
}
?>