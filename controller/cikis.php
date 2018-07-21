<?php
function cikis()// Kullanıcı çıkışı yapılır ve Anasayfaya yönlendirilir.
{
	session_destroy();
	header("Location:?sayfa=anasayfa");
}
?>