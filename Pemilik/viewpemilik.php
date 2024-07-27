<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<?php navigator();?>

  <section class="jumbotron">
<center>
<h1>Data Pemilik</h1>
<hr>
</center>
     <?php
	include_once("../function.php");
	$db = dbconnect();
	if($db->connect_errno == 0 ){
		$sql = "select * from pemilik";
				
				
		$res = $db->query($sql);
		if($res){
     ?>
	<div class="container-xl">
		<table class="table table-striped table-hover">
			<tr>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<a href="tambahpemilik.php"><button class="btn btn-secondary me-md-2 btn-sm" type="button">Tambah Pemilik</button></a>
				</div>
			<br>
				<th>id_pemilik</th>
				<th>Nama pemilik</th>
				<th>Jenis Kelamin</th>
				<th>No Telepon</th>
				<th></th>
			</tr>
	<?php
		$data = $res->fetch_all(MYSQLI_ASSOC);
		foreach($data as $dt){	
	?>
			<tr id="rowHover">
				<td><?php echo $dt["id_pemilik"]; ?></td>
				<td><?php echo $dt["nama_pemilik"]; ?></td>
				<td><?php echo $dt["jenis_kelamin"]; ?></td>
				<td><?php echo $dt["no_telepon"]; ?></td>
				<td><a class="btn btn-secondary btn-sm" href ="pemilik_edit.php?id_pemilik=<?php echo $dt["id_pemilik"] ?>"role="button">Edit </a> |
				<a class="btn btn-danger btn-sm" href ="pemilik_konfirmasi_hapus.php?id_pemilik=<?php echo $dt["id_pemilik"] ?>">Hapus</a> </td>
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
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>