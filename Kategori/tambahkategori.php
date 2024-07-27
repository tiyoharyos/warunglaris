<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<!DOCTYPE html>
<html><head><style>
</style><title>Warung Laris</title></head>

<?php navigator();?>

  <section class="jumbotron">
<center>
	<h1>Tambah Kategori</h1>
</center>
<div class="container-xl">
	<a href="viewkategori.php"><button class="btn btn-secondary btn-sm" id="view">view data Kategori</button></a>
<form method="Post" name="frm" action="simpankategori.php">
<table class="table table-hover">
  
	<tr>
		<td>Kode</td>
		<td><input type="text" name="id_kategori" size="4" maxlength="4"></td>
	</tr>
	<tr>
		<td>Nama Kategori</td>
		<td><input type="text" name="nama_kategori" size="25" maxlength="25"></td>
	</tr>

	<tr>
		<td></td>
		<td><input class="btn btn-success btn-sm" type="submit" name="TblSimpan" value="Simpan"></td>
	</tr>
</form>
</table>
</body>
</html>