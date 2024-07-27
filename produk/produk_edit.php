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
  <div class="container-xl">
<h1>Edit Data Produk</h1>
<?php
if(isset($_GET["IdProduk"])){
	$db=dbConnect();
	$IdProduk=$db->escape_string($_GET["IdProduk"]);
	if ($dataproduk1=getDataProduk($IdProduk)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewproduk.php"><button class="btn btn-secondary btn-sm">View Produk</button></a>
<form method="post" name="frm" action="produk_update.php">
<table class="table table-striped table-hover">
<tr id="rowHover"><td>Id Produk</td>
    <td><input type="text" name="id_produk" size="16" maxlength="15"
	     value="<?php echo $dataproduk1["id_produk"];?>" readonly></td></tr>
		<tr id="rowHover"><td>Nama Barang</td>
    <td><input type="text" name="nama_produk" size="71" maxlength="70"
		 value="<?php echo $dataproduk1["Nama_produk"];?>"></td></tr>
		 <tr id="rowHover">
		<td>Kategori</td>
		<td><select name="id_kategori">
		<option>Pilih Kategori</option>
<?php
    $datakategori = getListkategori();
		foreach($datakategori as $data){
			echo "<option value=\"". $data["id_kategori"]. "\"";
		if($data["id_kategori"] == $dataproduk1["id_kategori"])
				echo "selected"; //default sesuai kategori sebelumnya
			echo ">" . $data["nama_kategori"]. "</option>";
	}
?>
	</select>
	</td>
	</tr>
	
	<tr id="rowHover"><td>Supplier</td>
	<td><select name="id_supplier">
		<option>Pilih Supplier</option>
		<?php
		$datasupplier= getListsupplier();
		foreach($datasupplier as $data){
		echo "<option value=\"". $data["id_supplier"]. "\"";
		if($data["id_supplier"] == $dataproduk1["id_supplier"])
				echo "selected"; //default sesuai kategori sebelumnya
			echo ">" . $data["asal_supplier"]. "</option>";
		}
	?>
	</select>
	</td>
	</tr>
		
	<tr id="rowHover"><td>Stok</td>
	<td><input type="text" name="stok" size="11" maxlength="10"
		 value="<?php echo $dataproduk1["stok"];?>"></td></tr>
		 <tr id="rowHover"><td>Harga</td>
	<td><input type="text" name="harga" size="11" maxlength="10"
		 value="<?php echo $dataproduk1["harga"];?>"></td></tr>
		 <tr id="rowHover"><td>Tanggal Kadaluarsa</td>
		<td><input type="date" name="tgl_expired" size="25" maxlength="25"
		 value="<?php echo $dataproduk1["tgl_expired"];?>"></td></tr>
		 <tr id="rowHover">
		<td>Nama yang bertanggung jawab</td>
		<td><select name="id_pemilik">
		<option>Pilih Pemilik</option>
<?php
	$datapemilik= getListpemilik();
		foreach($datapemilik as $data){
		echo "<option value=\"". $data["id_pemilik"]. "\"";
		if($data["id_pemilik"] == $dataproduk1["id_pemilik"])
				echo "selected"; //default sesuai kategori sebelumnya
			echo ">" . $data["nama_pemilik"]. "</option>";
	}
?>
	</select>
	</td>
	</tr>	 
	<tr id="rowHover"><td>&nbsp;</td>
	<td><input class="btn btn-secondary btn-sm "type="submit" name="TblUpdate" value="Update">
	    <input class="btn btn-danger btn-sm" type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Produk dengan Id : $IdProduk tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "IdProduk tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>