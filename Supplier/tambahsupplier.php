<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?><?php include_once("../function.php");?>
<!DOCTYPE html>
<html><head><style>
</style><title>Warung Laris</title></head>

<?php navigator();?>

  <section class="jumbotron">
<center>
	<h1>Tambah Supplier</h1>
</center>
<div class="container-xl">
	<a href="viewsupplier.php"><button class="btn btn-secondary btn-sm" id="view">View Supplier</button></a>
	<br>
	<br>
<form method="Post" name="frm" action="simpansupplier.php">

<table class="table table-striped table-hover">
  
<tr id="rowHover">
		<td>Id Supplier</td>
		<td><input type="text" name="id_supplier" size="4" maxlength="4"></td>
	</tr>
	<tr id="rowHover">
		<td>Nama Supplier</td>
		<td><input type="text" name="nama_supplier" size="25" maxlength="25"></td>
	</tr>
	<tr id="rowHover">
		<td>Asal Supplier</td>
		<td><input type="text" name="asal_supplier" size="25" maxlength="25"></td>
	</tr>
	<tr id="rowHover">
		<td>No Telepon</td>
		<td><input type="text" name="no_telepon" size="25" maxlength="25"></td>
	</tr>
	<tr>
		<td></td>
		<td><input class="btn btn-secondary btn-sm" type="submit" name="TblSimpan" value="Simpan"></td>
	</tr>
</form>
</table>
</body>
</html>