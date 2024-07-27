<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<?php navigator();?>

<br>
<body>
<section class="jumbotron">
	<center>
	<h1>Tambah Pemilik</h1>
	</center>
	<div class="container-xl">
	<a class="btn btn-secondary" href="viewpemilik.php" role="button">View Pemilik</a>
	<br>
	<br>
<form method="Post" name="frm" action="simpanpemilik.php">
<table class="table table-striped table-hover">
  
	<tr>
		<td>Id Pemilik</td>
		<td><input type="text" name="id_pemilik" size="11" maxlength="4"></td>
	</tr>
	<tr>
		<td>Nama Pemilik</td>
		<td><input type="text" name="nama_pemilik" size="11" maxlength="25"></td>
	</tr>
	<tr>
		<tr><td>Jenis Kelamin</td>
    <td><select name="jenis_kelamin">
        <option>Jenis Kelamin</option>
        <option value ="1">L</option>
        <option value ="2">P</option>
        </select>
    </td></tr>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td><input type="text" name="no_telepon" size="11" maxlength="25"></td>
	</tr>
	<tr>
		<td></td>
		<td><input class="btn btn-secondary" type="submit" name="TblSimpan" value="Simpan"></td>
	</tr>
</form>
</table>
	</div>
</body>
</html>