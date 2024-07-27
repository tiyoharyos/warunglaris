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
	<h1>Penyimpanan Data Produk</h1>
<?php
$db = dbconnect();
if($db->connect_errno == 0){
	// bersihkan data
	$idproduk = $db->escape_string($_POST["id_produk"]);
	$nama     = $db->escape_string($_POST["nama_produk"]);
	$kategori = $db->escape_string($_POST["id_kategori"]);
	$supplier = $db->escape_string($_POST["id_supplier"]);
	$stok     = $db->escape_string($_POST["stok"]);
	$harga    = $db->escape_string($_POST["harga"]);
	$tanggal  = $db->escape_string($_POST["tgl_expired"]);
	$pemilik  = $db->escape_string($_POST["id_pemilik"]);

	$sql = "insert into produk(id_produk,nama_produk,id_kategori,id_supplier,stok,harga,tgl_expired,id_pemilik) values
			('$idproduk','$nama','$kategori','$supplier','$stok ','$harga','$tanggal','$pemilik') ";
			
	$res = $db->query($sql);
		echo $db->error;
	if($res){
	if($db->affected_rows > 0){
		?>
		penyimpanan data sukses.<br>
		<a href="viewproduk.php"><button class="btn btn-success" id="view">View produk</button></a>
		<?php
		}
	}else{
		?>
		penyimpanan data gagal mungkin karena idproduk sudah ada.<br>
		<a href="javascript:history.back();"><button class="btn btn-secondary" id='view'>kembali</button></a>
		<?php
	} 
	
}else
		echo "Error query : ".$db->error."<br>";


?>
</body>
</html>