<!--
-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Localhost: 127.0.0.1:3306
-- Server Version: 5.7.19
-- PHP Version: 7.1.9
--
-- Copyright © 2018 by Berkan ÜMÜTLÜ. All Rights Reserved.
-->
<?php
// Oturum başlatılıyor.
session_start();
// Gerekli kontrol fonksiyonları çalıştırılması için "controller.php" include ediliyor.
require 'controller/controller.php';
// Sayfalar arası geçiş "sayfa" değişkeni ile sağlanmaktadır.
// "month" ile "year" değişkenleri takvimi görüntülemek için kullanılır.
// "sayfa" değişkeni veya "month" ile "year" değişkeni değeri boş değil ise
if(!empty($_GET["sayfa"]) || (!empty($_GET["month"]) && !empty($_GET["year"])))
{
	$sayfa = $_GET["sayfa"];
	switch($sayfa)
	{
		case "anasayfa"	: { controller('anasayfa.php','anasayfa_goster'); break;}
		case "giris"	: { controller('giris.php','kullanici_giris'); break;}
		case "cikis"	: { controller('cikis.php','cikis'); break;}
		
		case "admin"	: { controller('admin.php','admin_goster','admin_panel'); break;}
		case "admin/profil"	: { controller('admin.php','admin_goster','profil'); break;}
		
		case "admin/haber/yeni"	: { controller('admin.php','admin_haberler','haber_yeni'); break;}
		case "admin/haber/duzenle"	: { controller('admin.php','admin_haberler','haber_duzenle'); break;}
		case "admin/haber/duzenle/goster"	: { controller('admin.php','admin_haberler','haber_duzenle_goster'); break;}
		case "admin/haber/sil"	: { controller('admin.php','admin_haberler','haber_sil'); break;}
		
		case "admin/ders/hepsi"	: { controller('admin.php','admin_dersler','hepsi'); break;}
		case "admin/ders/yeni"	: { controller('admin.php','admin_dersler','ders_yeni'); break;}
		case "admin/ders/duzenle"	: { controller('admin.php','admin_dersler','ders_duzenle'); break;}
		case "admin/ders/duzenle/goster"	: { controller('admin.php','admin_dersler','ders_duzenle_goster'); break;}
		case "admin/ders/sil"	: { controller('admin.php','admin_dersler','ders_sil'); break;}
		
		case "admin/ogretmen/hepsi"	: { controller('admin.php','admin_ogretmenler','hepsi'); break;}
		case "admin/ogretmen/yeni"	: { controller('admin.php','admin_ogretmenler','ogretmen_yeni'); break;}
		case "admin/ogretmen/duzenle"	: { controller('admin.php','admin_ogretmenler','ogretmen_duzenle'); break;}
		case "admin/ogretmen/duzenle/goster"	: { controller('admin.php','admin_ogretmenler','ogretmen_duzenle_goster'); break;}
		case "admin/ogretmen/sil"	: { controller('admin.php','admin_ogretmenler','ogretmen_sil'); break;}
		
		case "admin/ogrenci/hepsi"	: { controller('admin.php','admin_ogrenciler','hepsi'); break;}
		case "admin/ogrenci/yeni"	: { controller('admin.php','admin_ogrenciler','ogrenci_yeni'); break;}
		case "admin/ogrenci/duzenle"	: { controller('admin.php','admin_ogrenciler','ogrenci_duzenle'); break;}
		case "admin/ogrenci/duzenle/goster"	: { controller('admin.php','admin_ogrenciler','ogrenci_duzenle_goster'); break;}
		case "admin/ogrenci/sil"	: { controller('admin.php','admin_ogrenciler','ogrenci_sil'); break;}
		
		case "ogretmen/profil"	: { controller('ogretmen.php','goster','profil'); break;}
		case "ogretmen/dersler"	: { controller('ogretmen.php','goster','dersler'); break;}
		case "ogretmen/dersler/goster"	: { controller('ogretmen.php','goster','ders_goster'); break;}
		case "ogretmen/odevler/goster"	: { controller('ogretmen.php','goster','odev_goster'); break;}
		case "ogretmen/odev/yeni"	: { controller('ogretmen.php','goster','odev_yeni'); break;}
		case "ogretmen/odev/duzenle"	: { controller('ogretmen.php','goster','odev_duzenle'); break;}
		case "ogretmen/notver"	: { controller('ogretmen.php','goster','notver'); break;}
		case "ogretmen/notver/dersler/goster"	: { controller('ogretmen.php','goster','notver_ders_goster'); break;}
		case "ogretmen/notver/odevler/goster"	: { controller('ogretmen.php','goster','notver_odev_goster'); break;}
		
		case "ogrenci/profil"	: { controller('ogrenci.php','goster','profil'); break;}
		case "ogrenci/dersler"	: { controller('ogrenci.php','goster','dersler'); break;}
		case "ogrenci/dersler/goster"	: { controller('ogrenci.php','goster','ders_goster'); break;}
		case "ogrenci/odevler/goster"	: { controller('ogrenci.php','goster','odev_goster'); break;}
		case "ogrenci/notlar"	: { controller('ogrenci.php','goster','notlar'); break;}
		
		case "haber/hepsi"	: { controller('haber.php','goster','hepsi'); break;}
		case "haber/goster"	: { controller('haber.php','goster'); break;}
		
		default	: { hata_sayfa_bulunamadi();}
	}
}
else// Eğer atanmamış ise Hata Sayfasını gösteren fonksiyon çağırılır.
{
	hata_sayfa_bulunamadi();
}
?>