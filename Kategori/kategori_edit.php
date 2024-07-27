<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<?php navigator();?>

  <section class="jumbotron">
<center>
<h1>Edit Data Kategori</h1>
</center>
<div class="container-xl">
<?php
if(isset($_GET["id_kategori"])){
	$db=dbConnect();
	$IdKategori=$db->escape_string($_GET["id_kategori"]);
	if($datakategori=getDataKategori($IdKategori)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewkategori.php"><button class="btn btn-secondary btn-sm">View Kategori</button></a>
<form method="post" name="frm" action="kategori_update.php">
<table class="table table-hover">
<tr><td>Id Kategori</td>
    <td><input type="text" name="IdKategori" size="16" maxlength="15"
	     value="<?php echo $datakategori["id_kategori"];?>" readonly></td></tr>
<tr><td>Nama Kategori</td>
    <td><input type="text" name="NamaKategori" size="71" maxlength="70"
		 value="<?php echo $datakategori["nama_kategori"];?>"></td></tr>
<tr><td>&nbsp;</td>
	<td><input class="btn btn-secondary btn-sm"type="submit" name="TblUpdate" value="Update">
	    <input class="btn btn-warning btn-sm"type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Kategori dengan Id : $IdKategori tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "IdKategori tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>