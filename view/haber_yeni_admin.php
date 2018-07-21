<head>
	<link href="css/profile.css" type="text/css" rel="stylesheet"/>
</head>
<div class="col-sm-9">
	<div class="row">
		<div class="col-sm-12">
			<?php if(isset($_POST['haber_yeni_buton'])) { admin_haber_yeni_kaydet(); } ?>
			<div class="well well-lg">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
					<table>
					<tr>
						<td>Bölüm</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<select class="form-control" name="bolum_sec" required>
									<?php admin_bolumler_hepsi(); ?>
								</select>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Haber Başlığı</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<input class="form-control" type="text" name="haber_baslik" pattern=".{2,100}" maxlength="100" style="width:95%" placeholder="Haber başlığı girin" required>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>Haber İçeriği</td>
						<td>:</td>
						<td>
							<div class="form-inline">
								<textarea class="form-control" name="haber_icerik" rows="5" cols="40" style="resize:none;width:95%;" placeholder="Bu alana Haberin İçeriğini yazın..." required></textarea>
								<span class="profil_span">*</span>
							</div>
						</td>
					</tr>
					<tr class="tr_son">
						<td><span class="help-block">Bu formda <span class="profil_span">*</span> işaretli alanlar gereklidir.</span></td>
						<td></td>
						<td><input type="submit" class="btn btn-success" name="haber_yeni_buton" value="Haberi Kaydet"></td>
					</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>