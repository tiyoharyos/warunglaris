<?php include_once("../function.php");?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	if(isset($_POST["TblLogin"])){
		$id_pemilik=$db->escape_string($_POST["id_pemilik"]);
		$password=$db->escape_string($_POST["pass"]);
		$sql="SELECT id_pemilik, nama_pemilik, jenis_kelamin, no_telepon  from pemilik
			  WHERE id_pemilik='$id_pemilik' and pass='$password'";
		$res=$db->query($sql);
		if($res){
			if($res->num_rows==1){
				$data=$res->fetch_assoc();
				session_start();
				$_SESSION["id_pemilik"]=$data["id_pemilik"];
				$_SESSION["nama_pemilik "]=$data["nama_pemilik"];
				$_SESSION["email"]=$data["email"];
				$_SESSION["jenis_kelamin"]=$data["jenis_kelamin"];
				header("Location: admin_utama.php");
			}
			else
				header("Location: ../index.php?error=1");
		}
	}
	else
		header("Location: ../index.php?error=2");
}
else
	header("Location: ../index.php?error=3");
?>
<?php navigator();?>

