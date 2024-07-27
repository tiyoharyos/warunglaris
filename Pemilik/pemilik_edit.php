<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");?>
<?php navigator();?>

<br>
<body>
<section class="jumbotron">
<div class="container-xl">
<h1>Edit Data Pemilik</h1>
<?php
if(isset($_GET["id_pemilik"])){
	$db=dbConnect();
	$IdPemilik=$db->escape_string($_GET["id_pemilik"]);
	if($datapemilik=getDataPemilik($IdPemilik)){// cari data produk, kalau ada simpan di $data
		?>
<a href="viewpemilik.php"><button  class="btn btn-secondary">View Pemilik</button></a>
<br>
<form method="post" name="frm" action="pemilik_update.php">
<table class="table table-striped table-hover">
		<tr><td>Id Pemilik</td>
			<td><input type="text" name="IdPemilik" size="20" maxlength="15"
	     	value="<?php echo $datapemilik["id_pemilik"];?>" readonly></td></tr>
		<tr><td>Nama Pemilik</td>
			<td><input type="text" name="NamaPemilik" size="20" maxlength="70"
		 	value="<?php echo $datapemilik["nama_pemilik"];?>"></td></tr>
		<tr><td>Jenis Kelamin</td>
    			<td><select name="JenisKelamin">
			<option value ="<?php echo $datapemilik["jenis_kelamin"];?>"><?php echo $datapemilik["jenis_kelamin"];?>(Default)</option>
       		 <option value ="1">L</option>
       		 <option value ="2">P</option>
		</select>
		</td></tr>
		<tr><td>No.Telepon</td>
		<td><input type="text" name="NoTelepon" size="20" maxlength="10"
		 value="<?php echo $datapemilik["no_telepon"];?>"></td></tr>
		<tr><td>&nbsp;</td>
		<td><input class="btn btn-secondary" type="submit" name="TblUpdate" value="Update">
	    <input class="btn btn-warning" type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Pemilik dengan Id : $IdPemilik tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "IdPemilik tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>