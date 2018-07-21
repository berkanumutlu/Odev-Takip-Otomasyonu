<?php
include ('model/model.php');
include ('view/view.php');
// Seçilen sayfanın model, view, controller dosyalarını include etmeyi sağlayan fonksiyon
function controller($dosya,$fonksiyon='index',$parametreler=null)
{
	include('model/'.$dosya);
	include('controller/'.$dosya);
	$fonksiyon($parametreler);
}
// İstenilen işlem oluşmadığı durumunda ekrana hata mesajını yazdıran fonksiyon
function hata($mesaj)
{
	standart_sayfa_goster('hata.php','Hata!',$mesaj);
}
// Adres çubuğuna yazılan yanlış ya da hiç bulunmayan bir sayfaya gitmeye çalışıldığında hata mesajını gösteren fonksiyon
function hata_sayfa_bulunamadi()
{
	standart_sayfa_goster('hata_sayfa_bulunamadi.php','Sayfa Bulunamadı!');
}
// Giriş yapılmadan özel durumdaki sayfalara(admin paneli gibi) erişilmeye çalışıldığında hata mesajını gösteren fonksiyon
function hata_erisim_engellendi()
{
	standart_sayfa_goster('hata_erisim_engellendi.php','Erişim Engellendi!');
}
// Bir işlemin başarılı ya da başarısız olduğu durumlarda uyarı mesajı gösteren fonksiyon
function uyari_mesaji($uyari_baslik,$uyari_mesaj,$uyari_durum)
{
	if($uyari_durum == true)
	{
		uyari_mesaji_goster('uyari_dogru.php',$uyari_baslik,$uyari_mesaj);
	}
	else
	{
		uyari_mesaji_goster('uyari_yanlis.php',$uyari_baslik,$uyari_mesaj);
	}
}
?>