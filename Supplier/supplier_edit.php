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
<h1>Edit Data Supplier</h1>
</center>
<?php
if(isset($_GET["id_supplier"])){
	$db=dbConnect();
	$IdSupplier=$db->escape_string($_GET["id_supplier"]);
	if($datasupplier=getDatasupplier($IdSupplier)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewsupplier.php"><button class="btn btn-secondary btn-sm">View Supplier</button></a>
<form method="post" name="frm" action="supplier_update.php">
<table class="table table-striped table-hover">
<tr id="rowHover"><td>Id Supplier</td>
    <td><input type="readonly" name="IdSupplier" size="71" maxlength="15"
	     value="<?php echo $datasupplier["id_supplier"];?>" readonly></td></tr>
		<tr id="rowHover"><td>Nama Supplier</td>
    <td><input type="text" name="NamaSupplier" size="71" maxlength="70"
		 value="<?php echo $datasupplier["nama_supplier"];?>"></td></tr>
		 <tr id="rowHover"><td>Asal Supplier</td>
    <td><input type="text" name="AsalSupplier" size="71" maxlength="70"
		 value="<?php echo $datasupplier["asal_supplier"];?>"></td></tr>
		 <tr id="rowHover"><td>No.Telepon</td>
	<td><input type="text" name="NoTelepon" size="11" maxlength="10"
		 value="<?php echo $datasupplier["no_telepon"];?>"></td></tr>
<tr><td>&nbsp;</td>
	<td><input class="btn btn-secondary btn-sm" type="submit" name="TblUpdate" value="Update">
	    <input class="btn btn-danger btn-sm" type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Supplier dengan Id : $IdSupplier tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "IdSupplier tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>