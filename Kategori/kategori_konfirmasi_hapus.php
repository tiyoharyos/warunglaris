<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>

<?php navigator();?>

  <section class="jumbotron">
<center>

<h1>Hapus Data Kategori</h1>
</center>
<div class="container-xl">
<?php
if(isset($_GET["id_kategori"])){
	$db=dbConnect();
	$IdKategori=$db->escape_string($_GET["id_kategori"]);
	if($datakategori=getDataKategori($IdKategori)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewkategori.php"><button class="btn btn-secondary btn-sm">View Produk</button></a>
<form method="post" name="frm" action="kategori_hapus.php">
<input type="hidden" name="IdKategori" value="<?php echo $datakategori["id_kategori"];?>">
<table class="table table-hover">
<tr><td>Id Kategori</td><td><?php echo $datakategori["id_kategori"];?></td></tr>
<tr><td>Nama Kategori</td><td><?php echo $datakategori["nama_kategori"];?></td></tr>
<tr><td>&nbsp;</td><td><input class="btn btn-danger btn-sm" type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Kategori dengan Id : $IdKategori tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "IdKategori tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>