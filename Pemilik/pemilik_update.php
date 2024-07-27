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

<br>
<body>
<section class="jumbotron">
<div class="container-xl">
<h1>Pembaruan Data Pemilik</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$IdPemilik	=$db->escape_string($_POST["IdPemilik"]);
		$NamaPemilik   =$db->escape_string($_POST["NamaPemilik"]);
		$JenisKelamin		=$db->escape_string($_POST["JenisKelamin"]);
		$NoTelepon	=$db->escape_string($_POST["NoTelepon"]);
		// Susun query update
		$sql="UPDATE pemilik SET 
			  nama_pemilik='$NamaPemilik',jenis_kelamin='$JenisKelamin',
			  no_telepon='$NoTelepon'
			  WHERE id_pemilik='$IdPemilik'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="viewpemilik.php"><button class="btn btn-success">View Pemilik</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button class="btn btn-secondary">Edit Kembali</button></a>
				<a href="viewPemilik.php"><button class="btn btn-primary">View Pemilik</button></a>
				<?php
			}
		}
		else{ // gagal query
			?>
			Data gagal diupdate.
			<a href="javascript:history.back()"><button class="btn btn-warning">Edit Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>