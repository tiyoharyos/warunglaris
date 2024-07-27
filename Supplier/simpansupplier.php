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
	<h1>Penyimpanan Supplier</h1>
<?php
$db = dbconnect();
if($db->connect_errno == 0){
	// bersihkan data
	$id_supplier    = $db->escape_string($_POST["id_supplier"]);
	$nama_supplier  = $db->escape_string($_POST["nama_supplier"]);
	$asal_kategori  = $db->escape_string($_POST["asal_supplier"]);
	$no_telepon  = $db->escape_string($_POST["no_telepon"]);
	$sql = "insert into supplier(id_supplier,nama_supplier,asal_supplier,no_telepon) values
			('$id_supplier','$nama_supplier','$asal_kategori','$no_telepon')";
			
	$res = $db->query($sql);
	if($res){
	if($db->affected_rows > 0){
		?>
		penyimpanan data sukses.<br>
		<a href="viewsupplier.php"><button class="btn btn-success" id='view'>View supplier</button></a>
		<?php
		}
	}else{
		?>
		penyimpanan data gagal mungkin karena kode sudah ada atau belum mengisi Form.<br>
		<a href="javascript:history.back();"><button class="btn btn-secondary" id='view'>kembali</button></a>
		<?php
	} 
	
}else
		echo "Error query : ".$db->error."<br>";


?>
</body>
</html>