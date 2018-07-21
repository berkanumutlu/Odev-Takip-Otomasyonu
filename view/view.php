<?php
// Üyelik durumuna göre gösterilecek header kısmını belirleyen fonksiyon
function header_goster($headersayfasi)
{
	include $headersayfasi;
}
// Sitenin genel görünümünü sağlayan fonksiyon
function sayfa_goster($source,$title,$values=null)
{
	include 'header.php';
	include 'nav_left.php';
	include $source;
	include 'nav_right.php';
	include 'footer.php';
}
// Sitenin özel durumlardaki(Giriş sayfası gibi) görünümünü sağlayan fonksiyon
function standart_sayfa_goster($source,$title,$values=null)
{
	include 'header.php';
	include $source;
	include 'footer.php';
}
// Sitenin admin panelinin görünümünü sağlayan fonksiyon
function admin_sayfa_goster($source,$title,$values=null)
{
	include 'header.php';
	include 'nav_left_admin.php';
	include 'admin_panel.php';
	include $source;
	include 'footer.php';
}
// Öğrencinin ödevlerden aldığı notları gösteren veya Öğretmenin ödevlere not verdiği sayfayı gösteren fonksiyon
function notlar_sayfa_goster($source,$title,$values=null,$values1=null)
{
	include 'header.php';
	include 'nav_left.php';
	include $source;
	include 'footer.php';
}
// Bir işlemin başarılı ya da başarısız olduğu durumlarda uyarı mesajı gösteren fonksiyon
function uyari_mesaji_goster($source,$uyari_baslik,$uyari_mesaj)
{
	include $source;
}
?>