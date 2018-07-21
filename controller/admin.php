<?php
// Admin panelini gösteren fonksiyon
function admin_goster($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 1)
	{
		if($tur==="profil")// Öğretmenin profil sayfasını gösterir.
		{
			$admin_profil=admin_profil_bilgileri_tum();
			sayfa_goster('profil_admin.php','Profil',$admin_profil);
		}
		else if($tur==="admin_panel")// Öğretmenin verdiği dersleri gösterir.
		{
			admin_sayfa_goster('admin.php','Admin Paneli');
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else// Giriş yapılmadan herhangi bir Admin sayfasına ulaşılmaya çalışılır ise hata verir.
	{
		hata_erisim_engellendi();
	}
}
// Admin menüsündeki haberlerle ilgili bölümü gösteren fonksiyon
function admin_haberler($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 1)
	{
		if($tur==="haber_yeni")// Yeni haber ekleme sayfasını gösterir.
		{
			admin_sayfa_goster('haber_yeni_admin.php','Admin: Yeni Haber Ekle');
		}
		else if($tur==="haber_duzenle")// Düzenlemek için tüm haberleri listeler.
		{
			$haber_duzenle_hepsi=admin_haberler_hepsi();
			admin_sayfa_goster('haber_duzenle_admin.php','Admin: Haber Düzenle',$haber_duzenle_hepsi);
		}
		else if($tur==="haber_duzenle_goster")// Seçilen haberi düzenleme sayfasını gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$id=$_GET["id"];
				$haber_duzenle=admin_haber_duzenle($id);
				admin_sayfa_goster('haber_goster_admin.php','Admin: Haber Düzenle: '.$haber_duzenle["haber_id"],$haber_duzenle);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="haber_sil")// Silmek için tüm haberleri listeler.
		{
			$haber_sil_hepsi=admin_haberler_hepsi();
			admin_sayfa_goster('haber_sil_admin.php','Admin: Haber Sil',$haber_sil_hepsi);
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else{ hata_erisim_engellendi(); }
}
// Admin menüsündeki derslerle ilgili bölümü gösteren fonksiyon
function admin_dersler($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 1)
	{
		if($tur==="hepsi")// Tüm dersleri gösterir.
		{
			$admin_dersler_bolumler=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('dersler_admin.php','Admin: Tüm Dersler',$admin_dersler_bolumler);
		}
		else if($tur==="ders_yeni")// Yeni ders ekleme sayfasını gösterir.
		{
			admin_sayfa_goster('ders_yeni_admin.php','Admin: Yeni Ders Ekle');
		}
		else if($tur==="ders_duzenle")// Düzenlemek için tüm dersleri listeler.
		{
			$ders_duzenle_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ders_duzenle_admin.php','Admin: Ders Düzenle',$ders_duzenle_hepsi);
		}
		else if($tur==="ders_duzenle_goster")// Seçilen dersi düzenleme sayfasını gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$duzenle_id=$_GET["id"];
				$ders_duzenle_ders=admin_ders_duzenle($duzenle_id);
				admin_sayfa_goster('ders_goster_admin.php','Admin: Ders Düzenle: '.$ders_duzenle_ders["ders_id"],$ders_duzenle_ders);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="ders_sil")// Silmek için tüm dersleri listeler.
		{
			$ders_sil_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ders_sil_admin.php','Admin: Ders Sil',$ders_sil_hepsi);
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else{ hata_erisim_engellendi(); }
}
// Admin menüsündeki öğretmenlerle ilgili bölümü gösteren fonksiyon
function admin_ogretmenler($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 1)
	{
		if($tur==="hepsi")// Tüm öğretmenleri gösterir.
		{
			$admin_ogretmenler_bolumler=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogretmenler_admin.php','Admin: Tüm Öğretmenler',$admin_ogretmenler_bolumler);
		}
		else if($tur==="ogretmen_yeni")// Yeni öğretmen ekleme sayfasını gösterir.
		{
			admin_sayfa_goster('ogretmen_yeni_admin.php','Admin: Yeni Öğretmen Ekle');
		}
		else if($tur==="ogretmen_duzenle")// Düzenlemek için tüm öğretmenleri listeler.
		{
			$ogretmen_duzenle_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogretmen_duzenle_admin.php','Admin: Öğretmen Düzenle',$ogretmen_duzenle_hepsi);
		}
		else if($tur==="ogretmen_duzenle_goster")// Seçilen öğretmeni düzenleme sayfasını gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$duzenle_id=$_GET["id"];
				$ogretmen_duzenle_ogretmen=admin_ogretmen_duzenle($duzenle_id);
				admin_sayfa_goster('ogretmen_goster_admin.php','Admin: Öğretmen Düzenle: '.$ogretmen_duzenle_ogretmen["ogrt_id"],$ogretmen_duzenle_ogretmen);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="ogretmen_sil")// Silmek için tüm öğretmenleri listeler.
		{
			$ogretmen_sil_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogretmen_sil_admin.php','Admin: Öğretmen Sil',$ogretmen_sil_hepsi);
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else{ hata_erisim_engellendi(); }
}
// Admin menüsündeki admin_ogrencilerle ilgili bölümü gösteren fonksiyon
function admin_ogrenciler($tur=false)
{
	if(isset($_SESSION['giris_yapildi']) && $_SESSION['uye_id'] == 1)
	{
		if($tur==="hepsi")// Tüm öğrencileri gösterir.
		{
			$admin_ogrenciler_bolumler=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogrenciler_admin.php','Admin: Tüm Öğrenciler',$admin_ogrenciler_bolumler);
		}
		else if($tur==="ogrenci_yeni")// Yeni öğrenci ekleme sayfasını gösterir.
		{
			admin_sayfa_goster('ogrenci_yeni_admin.php','Admin: Yeni Öğrenci Ekle');
		}
		else if($tur==="ogrenci_duzenle")// Düzenlemek için tüm öğrencileri listeler.
		{
			$ogrenci_duzenle_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogrenci_duzenle_admin.php','Admin: Öğrenci Düzenle',$ogrenci_duzenle_hepsi);
		}
		else if($tur==="ogrenci_duzenle_goster")// Seçilen öğrenciyi düzenleme sayfasını gösterir.
		{
			if(isset($_GET["id"]) && $_GET["id"]!=null)
			{
				$duzenle_id=$_GET["id"];
				$ogrenci_duzenle_ogrenci=admin_ogrenci_duzenle($duzenle_id);
				admin_sayfa_goster('ogrenci_goster_admin.php','Admin: Öğrenci Düzenle: '.$ogrenci_duzenle_ogrenci["ogr_id"],$ogrenci_duzenle_ogrenci);
			}
			else { hata_sayfa_bulunamadi(); }
		}
		else if($tur==="ogrenci_sil")// Silmek için tüm öğrencileri listeler.
		{
			$ogrenci_sil_hepsi=admin_bolum_bilgiler_hepsi();
			admin_sayfa_goster('ogrenci_sil_admin.php','Admin: Öğrenci Sil',$ogrenci_sil_hepsi);
		}
		else { hata("tür değişkeni tanımlı değil."); }// Tanımlı değil ise hata verir.
	}
	else{ hata_erisim_engellendi(); }
}
?>