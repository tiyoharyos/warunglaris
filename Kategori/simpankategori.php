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
<center>
	<h1>Penyimpanan Kategori</h1>
</center>
<div class="container-xl">
<?php
$db = dbconnect();
if($db->connect_errno == 0){
	// bersihkan data
	$kode     = $db->escape_string($_POST["id_kategori"]);
	$nama_kategori  = $db->escape_string($_POST["nama_kategori"]);
	
	$sql = "insert into kategori(id_kategori,nama_kategori) values
			('$kode','$nama_kategori')";
			
	$res = $db->query($sql);
	if($res){
	if($db->affected_rows > 0){
		?>
		penyimpanan data sukses.<br>
		<a href="viewkategori.php"><button class="btn btn-success" id='view'>View kategori</button></a>
		<?php
		}
	}else{
		?>
		penyimpanan data gagal mungkin karena kode sudah ada atau belum mengisi Form.<br>
		<a href="javascript:history.back();"><button  id='view'>kembali</button></a>
		<?php
	} 
	
}else
		echo "Error query : ".$db->error."<br>";


?>
</body>
</html>