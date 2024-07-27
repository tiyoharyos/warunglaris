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
  <div class="container-xl">
<h1>Hapus Data Produk</h1>
<?php
if(isset($_GET["IdProduk"])){
	$db=dbConnect();
	$IdProduk=$db->escape_string($_GET["IdProduk"]);
	if($dataproduk=getDataProduk($IdProduk)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewproduk.php"><button class="btn btn-secondary btn-sm">View Produk</button></a>
<form method="post" name="frm" action="produk_hapus.php">
<input type="hidden" name="IdProduk" value="<?php echo $dataproduk["id_produk"];?>">
<table class="table table-striped table-hover">
<tr id="rowHover"><td>Id Produk</td><td><?php echo $dataproduk["id_produk"];?></td></tr>
<tr id="rowHover"><td>Nama barang</td><td><?php echo $dataproduk["Nama_produk"];?></td></tr>
<tr id="rowHover"><td>Kategori</td><td><?php echo $dataproduk["NamaKategori"];?></td></tr>
<tr id="rowHover"><td>Supplier</td><td><?php echo $dataproduk["NamaSupplier"];?></td></tr>
<tr id="rowHover"><td>Stok</td><td><?php echo $dataproduk["stok"];?></td></tr>
<tr id="rowHover"><td>Harga</td><td><?php echo $dataproduk["harga"];?></td></tr>
<tr id="rowHover"><td>Tanggal Kadaluarsa</td><td><?php echo $dataproduk["tgl_expired"];?></td></tr>
<tr id="rowHover"><td>Nama Yang Bertanggung Jawab</td><td><?php echo $dataproduk["NamaPemilik"];?></td></tr>
<tr id="rowHover"><td>&nbsp;</td><td><input class="btn btn-danger btn-sm" type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "produk dengan Id : $IdProduk tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "IdProduk tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>