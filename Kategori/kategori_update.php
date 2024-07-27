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
<h1>Pembaruan Data Kategori</h1>

<div class="container-xl">
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$IdKategori		=$db->escape_string($_POST["IdKategori"]);
		$NamaKategori   =$db->escape_string($_POST["NamaKategori"]);
		// Susun query update
		$sql="UPDATE kategori SET 
			  nama_kategori='$NamaKategori'
			  WHERE id_kategori='$IdKategori'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="viewkategori.php"><button class="btn btn-success">View Kategori</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button class="btn btn-secondary">Edit Kembali</button></a>
				<a href="viewkategori.php"><button class="btn btn-primary">View Kategori</button></a>
				<?php
			}
		}
		else{ // gagal query
			?>
			Data gagal diupdate.
			<a href="javascript:history.back()"><button>Edit Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>