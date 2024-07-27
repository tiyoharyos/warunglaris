<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<?php navigator();?>

  <section class="jumbotron">
<br>
<div class="container-xl">
<body>
	<h1>Penyimpanan Pemilik</h1>
<?php
$db = dbconnect();
if($db->connect_errno == 0){
	// bersihkan data
	$idpemilik     = $db->escape_string($_POST["id_pemilik"]);
	$nama  = $db->escape_string($_POST["nama_pemilik"]);
	$jk  = $db->escape_string($_POST["jenis_kelamin"]);
	$hp = $db->escape_string($_POST["no_telepon"]);
	
	$sql = "insert into pemilik(id_pemilik,nama_pemilik,jenis_kelamin,no_telepon) values
			('$idpemilik ','$nama','$jk','$hp')";
			
	$res = $db->query($sql);
	if($res){
	if($db->affected_rows > 0){
		?>
		penyimpanan data sukses.<br>
		<a href="viewpemilik.php"><button class="btn btn-success" id='view'>View pemilik</button></a>
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