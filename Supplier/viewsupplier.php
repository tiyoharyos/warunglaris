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
<h1>Data Supplier</h1>
<hr>
</center>
    <?php
	$db = dbconnect();
	if($db->connect_errno == 0 ){
		$sql = "select * from supplier";
				
				
		$res = $db->query($sql);
		if($res){
     ?>
	<div class="container-xl">
<table class="table table-striped table-hover">
		<tr>
			<a href="tambahsupplier.php"><button class="btn btn-secondary btn-sm">Tambah supplier</button></a>
			<br>
			<br>
			<th>ID Supplier</th>
			<th>Nama Supplier</th>
			<th>Asal Supplier</th>
			<th>No Telepon</th>
			<th></th>
		</tr>
	<?php
		$data = $res->fetch_all(MYSQLI_ASSOC);
		foreach($data as $dt){	
	?>
			<tr id="rowHover">
				<td><?php echo $dt["id_supplier"]; ?></td>
				<td><?php echo $dt["nama_supplier"]; ?></td>
				<td><?php echo $dt["asal_supplier"]; ?></td>
				<td><?php echo $dt["no_telepon"]; ?></td>
				<td><a class="btn btn-secondary btn-sm" href ="supplier_edit.php?id_supplier=<?php echo $dt["id_supplier"] ?>">Edit </a> |
				<a class="btn btn-danger btn-sm" href ="supplier_konfirmasi_hapus.php?id_supplier=<?php echo $dt["id_supplier"] ?>">Hapus</a> </td>
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