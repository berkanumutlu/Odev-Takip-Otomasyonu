<?php
	// Database Değişkenleri Tanımlama
	$DB_HOST = "localhost";// Veritabanı uzantısı
	$DB_USERNAME = "root";// Veritabanı kullanıcı adı
	$DB_PASSWORD = "";// Veritabanı şifresi
	$DB_NAME = "odev_takip_otomasyonu";// Veritabanı adı
	$DB_FILE_NAME = "Odev_Takip_Otomasyonu";// Dosya adı
	// MySQL Bağlantısı
	$connect = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);
	// Veritabanı bağlantısı kontrolü
	if(mysqli_connect_error())// Veritabanı bağlantısında sorun olursa hata mesajı verir.
	{
		die("Veritabanına bağlanırken hata oluştu. Hata: " . mysqli_connect_error());
	}
	else
	{
		// echo "MySQL bağlantısı başarılı bir şekilde yapıldı.";
		mysqli_query($connect,"SET NAMES UTF8");// Karakter kodlaması seçimi
		date_default_timezone_set('Europe/Istanbul');// Zaman dilimi seçimi
	}
?>