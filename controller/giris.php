<?php
function kullanici_giris()
{
	if(isset($_SESSION['giris_yapildi']))// Giriş yapılmış ise Anasayfaya yönlendirilir.(Tekrar giriş yapamazsınız)
	{
		header("Location:?sayfa=anasayfa");
	}
	else// Giriş yapılmamış ise Giriş Yap sayfasına yönlendirilir.
	{
		standart_sayfa_goster('giris.php','Giriş Yap');
	}
}
function giris_kontrol()
{
	if($_POST)// POST edilmiş ise (Giriş Yap butonuna basılmış ise)
	{
		// Veritabanı
		global $connect;
		// Kullanıcı adı ve şifre bölümünde yazanları değişkenlere eşitle.
		$kullanici_adi = $_POST['uname'];
		$sifre = md5($_POST['psw']);
		// Giriş bilgilerini yapan sorgular hazırlanır.
		$giris_sorgu1=mysqli_query($connect,'SELECT * FROM yonetici WHERE kullanici_adi="'.$kullanici_adi.'" AND sifre="'.$sifre.'"');
		$giris_sorgu2=mysqli_query($connect,'SELECT * FROM ogretmen WHERE (kullanici_adi="'.$kullanici_adi.'" OR e_posta="'.$kullanici_adi.'") AND sifre="'.$sifre.'"');
		$giris_sorgu3=mysqli_query($connect,'SELECT * FROM ogrenci WHERE (kullanici_adi="'.$kullanici_adi.'" OR e_posta="'.$kullanici_adi.'") AND sifre="'.$sifre.'"');
		// Giriş yapan kullanıcının veritabanında bulunduğu tablodan bilgileri alır.
		$giris_sonuc1 = mysqli_num_rows($giris_sorgu1);
		$giris_sonuc2 = mysqli_num_rows($giris_sorgu2);
		$giris_sonuc3 = mysqli_num_rows($giris_sorgu3);
		if($giris_sonuc1 > 0)// Eğer admin giriş yapmış ise
		{
			$bilgiler = mysqli_fetch_array($giris_sorgu1);
			$_SESSION['giris_yapildi'] = true;
			$_SESSION['admin_id'] = $bilgiler['admin_id'];
			$_SESSION['adi'] = $bilgiler['adi'];
			$_SESSION['kullanici_adi'] = $bilgiler['kullanici_adi'];
			$_SESSION['sifre'] = $bilgiler['sifre'];
			$_SESSION['uye_id'] = $bilgiler['uye_id'];
		}
		else if($giris_sonuc2 > 0)// Eğer öğretmen giriş yapmış ise
		{
			$bilgiler = mysqli_fetch_array($giris_sorgu2);
			$_SESSION['giris_yapildi'] = true;
			$_SESSION['ogrt_id'] = $bilgiler['ogrt_id'];
			$_SESSION['adi'] = $bilgiler['adi'];
			$_SESSION['soyadi'] = $bilgiler['soyadi'];
			$_SESSION['kullanici_adi'] = $bilgiler['kullanici_adi'];
			$_SESSION['sifre'] = $bilgiler['sifre'];
			$_SESSION['e_posta'] = $bilgiler['e_posta'];
			$_SESSION['sehir_id'] = $bilgiler['sehir_id'];
			$_SESSION['telno'] = $bilgiler['telno'];
			$_SESSION['adres'] = $bilgiler['adres'];
			$_SESSION['web_sayfasi'] = $bilgiler['web_sayfasi'];
			$_SESSION['aciklama'] = $bilgiler['aciklama'];
			$_SESSION['ilgi_alanlari'] = $bilgiler['ilgi_alanlari'];
			$_SESSION['uye_id'] = $bilgiler['uye_id'];
			$_SESSION['bolum_id'] = $bilgiler['bolum_id'];
		}
		else if($giris_sonuc3 > 0)// Eğer öğrenci giriş yapmış ise
		{
			$bilgiler = mysqli_fetch_array($giris_sorgu3);
			$_SESSION['giris_yapildi'] = true;
			$_SESSION['ogr_id'] = $bilgiler['ogr_id'];
			$_SESSION['adi'] = $bilgiler['adi'];
			$_SESSION['soyadi'] = $bilgiler['soyadi'];
			$_SESSION['kullanici_adi'] = $bilgiler['kullanici_adi'];
			$_SESSION['sifre'] = $bilgiler['sifre'];
			$_SESSION['e_posta'] = $bilgiler['e_posta'];
			$_SESSION['sehir_id'] = $bilgiler['sehir_id'];
			$_SESSION['telno'] = $bilgiler['telno'];
			$_SESSION['adres'] = $bilgiler['adres'];
			$_SESSION['web_sayfasi'] = $bilgiler['web_sayfasi'];
			$_SESSION['aciklama'] = $bilgiler['aciklama'];
			$_SESSION['ilgi_alanlari'] = $bilgiler['ilgi_alanlari'];
			$_SESSION['uye_id'] = $bilgiler['uye_id'];
			$_SESSION['bolum_id'] = $bilgiler['bolum_id'];
		}
		else// Giriş bilgileri uyuşmuyor ise
		{
			uyari_mesaji('Hatalı giriş!','Lütfen kullanıcı adı veya şifrenizi kontrol edin.',false);
		}
	}
	if($_POST && 'giris_yapildi' == true)// Doğru giriş yapılmış ise Anasayfaya yönlendirilir.
	{
		if(isset($_SESSION['giris_yapildi']))
		{
			header("Location:?sayfa=anasayfa");
		}
	}
}
?>