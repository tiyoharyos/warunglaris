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
	<center>
	<h1>Tambah Produk</h1>
	</center>
	<a href="viewproduk.php"><button id="view" class="btn btn-secondary btn-sm">Lihat Produk</button></a>
	<br>
	<br>
<form method="Post" name="frm" action="simpanproduk.php">
<table class="table table-striped table-hover">
  
<tr id="rowHover">
		<td>ID Produk</td>
		<td><input type="text" name="id_produk" size="72" maxlength="8"></td>
	</tr>
	<tr id="rowHover">
		<td>Nama Produk</td>
		<td><input type="text" name="nama_produk" size="72" maxlength="70"></td>
	</tr>
	<tr id="rowHover">
		<td>Kategori</td>
		<td><select class="form-select" aria-label="Default select example" name="id_kategori">
		<option  selected>pilih Kategori</option>
<?php
	$dataproduk= getListKategori();
	foreach($dataproduk as $data){
	echo "<option value=\"". $data["id_kategori"]. "\">". $data["nama_kategori"]. "</option>.\n";
	}
?>
	</select>
	</td>
	</tr>
	
	<tr id="rowHover">
		<td>Supplier</td>
		<td><select class="form-select" aria-label="Default select example" name="id_supplier">
		<option  selected>pilih Supplier</option>
<?php
	$datasupplier= getListsupplier();
	foreach($datasupplier as $data){
	echo "<option value=\"". $data["id_supplier"]. "\">". $data["asal_supplier"]. "</option>.\n";
	}
?>
	</select>
	</td>
	</tr>
	
	
	<tr id="rowHover">
		<td>Stok</td>
		<td><input type="text" name="stok" size="25" maxlength="25"></td>
	</tr>
	<tr id="rowHover">
		<td>Harga</td>
		<td><input type="text" name="harga" size="25" maxlength="25"></td>
	</tr>
	<tr id="rowHover">
		<td>Tanggal Kadaluarsa</td>
		<td><input type="date" name="tgl_expired" size="25" maxlength="25"></td>
	</tr>
	<tr id="rowHover">
		<td>Nama yang bertanggung jawab</td>
		<td><select select class="form-select" aria-label="Default select example" name="id_pemilik">
		<option selected>pilih Nama</option>
<?php
	$datapemilik= getListpemilik();
	foreach($datapemilik as $data){
	echo "<option value=\"". $data["id_pemilik"]. "\">". $data["nama_pemilik"]. "</option>.\n";
	}
?>
	</select>
	</td>
	</tr>
	<tr id="rowHover">
		<td></td>
		<td><input class="btn btn-secondary btn-sm" type="submit" name="TblSimpan" value="Simpan"></td></textarea>
	</tr>
</table>
</body>
</html>