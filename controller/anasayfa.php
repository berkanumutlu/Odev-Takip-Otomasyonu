<?php
function anasayfa_goster()// Anasayfayı gösterir.
{
	$haberler=son_haberleri_cek();
	sayfa_goster('haber.php','Anasayfa',$haberler);
}
?>