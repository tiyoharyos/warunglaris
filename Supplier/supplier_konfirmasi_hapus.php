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
<center>
<h1>Hapus Data Supplier</h1>
</center>
<?php
if(isset($_GET["id_supplier"])){
	$db=dbConnect();
	$IdSupplier=$db->escape_string($_GET["id_supplier"]);
	if($datasupplier=getDataSupplier($IdSupplier)){
		?>
<a href="viewsupplier.php"><button class="btn btn-secondary btn-sm">View Supplier</button></a>
<form method="post" name="frm" action="supplier_hapus.php">
<input type="hidden" name="IdSupplier" value="<?php echo $datasupplier["id_supplier"];?>">
<table class="table table-striped table-hover">
<tr id="rowHover"><td>Id Supplier</td><td><?php echo $datasupplier["id_supplier"];?></td></tr>
<tr id="rowHover"><td>Nama Supplier</td><td><?php echo $datasupplier["nama_supplier"];?></td></tr>
<tr id="rowHover"><td>Asal Supplier</td><td><?php echo $datasupplier["asal_supplier"];?></td></tr>
<tr id="rowHover"><td>No Telepon</td><td><?php echo $datasupplier["no_telepon"];?></td></tr>
<tr id="rowHover"><td>&nbsp;</td><td><input class="btn btn-danger btn-sm" type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Supplier dengan Id : $IdSupplier tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "IdSupplier tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>