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
<h1>Pembaruan Data Produk</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$idproduk = $db->escape_string($_POST["id_produk"]);
		$nama     = $db->escape_string($_POST["nama_produk"]);
		$kategori = $db->escape_string($_POST["id_kategori"]);
		$supplier = $db->escape_string($_POST["id_supplier"]);
		$stok     = $db->escape_string($_POST["stok"]);
		$harga    = $db->escape_string($_POST["harga"]);
		$tanggal  = $db->escape_string($_POST["tgl_expired"]);
		$pemilik  = $db->escape_string($_POST["id_pemilik"]);
		// Susun query update
		$sql="UPDATE produk SET 
			  nama_produk='$nama',id_kategori='$kategori',
			  id_supplier='$supplier',stok='$stok',harga='$harga'
			  ,tgl_expired='$tanggal',id_pemilik='$pemilik'
			  WHERE id_produk='$idproduk'";
		// Eksekusi query update
		$res=$db->query($sql);
		echo $db->error;
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="viewproduk.php"><button class="btn btn-success btn-sm">View Produk</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button class="btn btn-secondary btn-sm">Edit Kembali</button></a>
				<a href="viewproduk.php"><button class ="btn btn-warning btn-sm">View Produk</button></a>
				<?php
			}
		}
		else{ // gagal query
			?>
			Data gagal diupdate.
			<a href="javascript:history.back()"><button class="btn btn-secondary btn-sm">Edit Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>