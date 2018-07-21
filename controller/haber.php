<?php
// Diğer üyelere haberin nasıl gösterileceğini belirleyen fonksiyon
function goster($tur=false)
{
	if($tur==="hepsi")// Tüm haberler gösterilir.
	{
		$haberler=tum_haberleri_cek();
		sayfa_goster('haber.php','Tüm Haberler',$haberler);
	}
	else if($tur==="son")// Son 4 Haber gösterilir.(Anasayfada göstermek için)
	{
		$haberler=son_haberleri_cek();
		sayfa_goster('haber.php','Son Haberler',$haberler);
	}
	else// Haberin Başlığına tıklandığında sadece o haber gösterilir.
	{
		if(isset($_GET["id"]) && $_GET["id"]!=null)
		{
			$id=$_GET["id"];
			$haber=tek_haber_cek($id);
			sayfa_goster('haber_goster.php','Haber',$haber);
		}
		else { hata_sayfa_bulunamadi(); }
	}
}
?>