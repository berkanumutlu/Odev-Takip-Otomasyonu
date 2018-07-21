<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
	<table align="center">
	<tr>
		<td><p>Dosya Seçin (Max. 25MB)</p></td>
		<td><p>&nbsp;:&nbsp;</p></td>
		<td><input type="file" name="fileToUpload" id="fileToUpload" required></td>
	</tr>
	</table><br><br>
    <input type="submit" class="btn btn-success" value="Ödevi Gönder" name="submit">
</form>