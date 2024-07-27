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
<h1>Hapus Data Pemilik</h1>
<?php
if(isset($_GET["id_pemilik"])){
	$db=dbConnect();
	$IdPemilik=$db->escape_string($_GET["id_pemilik"]);
	if($datapemilik=getDataPemilik($IdPemilik)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewpemilik.php"><button class="btn btn-secondary btn-sm">View Pemilik</button></a>
<form method="post" name="frm" action="pemilik_hapus.php">
<input type="hidden" name="IdPemilik" value="<?php echo $datapemilik["id_pemilik"];?>">
<table class="table table-striped table-hover">
<tr id="rowHover"><td>Id Pemilik</td><td><?php echo $datapemilik["id_pemilik"];?></td></tr>
<tr id="rowHover"><td>Nama Pemilik</td><td><?php echo $datapemilik["nama_pemilik"];?></td></tr>
<tr id="rowHover"><td>Jenis Kelamin</td><td><?php echo $datapemilik["jenis_kelamin"];?></td></tr>
<tr id="rowHover"><td>No Telepon</td><td><?php echo $datapemilik["no_telepon"];?></td></tr>
<tr id="rowHover"><td>&nbsp;</td><td><input class="btn btn-danger btn-sm" type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
</form>
		<?php
	}
	else
		echo "pemilik dengan Id : $IdPemilik tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "IdPemilik tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>