
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
<center>
<h1>Data Kategori</h1>
<hr>
</center>
    <?php
	$db = dbconnect();
	if($db->connect_errno == 0 ){
		$sql = "select * from kategori";
				
				
		$res = $db->query($sql);
		if($res){
     ?>
	<div class="container-xl">
	
	<table class="table table-hover">
		<tr>
			<a href="tambahkategori.php"><button class="btn btn-secondary btn-sm">Tambah Kategori</button>
			<th>Id Kategori</th>
			<th>Nama Kategori</th>
			<th></th>
		</tr>
	<?php
		$data = $res->fetch_all(MYSQLI_ASSOC);
		foreach($data as $dt){	
	?>
			<tr>
				<td><?php echo $dt["id_kategori"]; ?></td>
				<td><?php echo $dt["nama_kategori"]; ?></td>
				<td><a class="btn btn-secondary btn-sm"href ="kategori_edit.php?id_kategori=<?php echo $dt["id_kategori"] ?>">Edit </a> 
				<a class="btn btn-danger btn-sm"href ="kategori_konfirmasi_hapus.php?id_kategori=<?php echo $dt["id_kategori"] ?>">Hapus</a> </td>
			</tr>
			<?php
		}
	?>
		</table>
	<?php
		$res->free();
	}else
			echo "Gagal Eksekusi SQL : ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
	}else
			echo "Gagal Koneksi : ".(DEVELOPMENT?" : ".$db->connect_error:" ")."<br>";
		?>
</body>
</html>