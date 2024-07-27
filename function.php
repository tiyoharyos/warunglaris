<?php

define("DEVELOPMENT",true); //manyatakan situs masih dalam pengembangan
function dbconnect(){
	$db = new mysqli("localhost","root","","warunglaris");
	return $db;
}


function getListKategori(){
		$db = dbconnect(); 
		if($db->connect_errno == 0){
			$res=$db->query("select * from kategori order by id_kategori");
			if($res){
				$data = $res->fetch_all(MYSQLI_ASSOC);
				$res->free();
				return $data;
			}else
				return False;
		}else
			return false;
	}
function getListsupplier(){
		$db = dbconnect(); 
		if($db->connect_errno == 0){
			$res=$db->query("select * from supplier order by id_supplier");
			if($res){
				$data = $res->fetch_all(MYSQLI_ASSOC);
				$res->free();
				return $data;
			}else
				return False;
		}else
			return false;
	}
function getListpemilik(){
		$db = dbconnect(); 
		if($db->connect_errno == 0){
			$res=$db->query("select * from pemilik order by id_pemilik");
			if($res){
				$data = $res->fetch_all(MYSQLI_ASSOC);
				$res->free();
				return $data;
			}else
				return False;
		}else
			return false;
	}		
	
function getDataKategori($IdKategori)
{
	$db = dbconnect();
	$IdKategori = $IdKategori;
		if($db->errno == 0){
			$res = $db->query("SELECT * from kategori where id_kategori = '$IdKategori' ");
		if($res){
				$data = $res->fetch_assoc();
				return $data;
			}else
				return False;
		}else
			return False;
}
function getDataPemilik($IdPemilik)
{
	$db = dbconnect();
	$IdPemilik = $IdPemilik;
		if($db->errno == 0){
			$res = $db->query("SELECT * from pemilik where id_pemilik = '$IdPemilik' ");
		if($res){
				$data = $res->fetch_assoc();
				return $data;
			}else
				return False;
		}else
			return False;
}
function getDataSupplier($IdSupplier)
{
	$db = dbconnect();
	$IdSupplier = $IdSupplier;
		if($db->errno == 0){
			$res = $db->query("SELECT * from supplier where id_supplier = '$IdSupplier' ");
		if($res){
				$data = $res->fetch_assoc();
				return $data;
			}else
				return False;
		}else
			return False;
}
function getDataProduk($IdProduk)
{
	$db = dbconnect();
	$IdProduk = $IdProduk;
		if($db->errno == 0){
			$res = $db->query(" Select produk.id_produk,produk.Nama_produk,
                                kategori.nama_kategori NamaKategori,produk.id_kategori,
                                supplier.asal_supplier NamaSupplier,produk.id_supplier,produk.stok,produk.harga,
                                produk.tgl_expired,
                                pemilik.nama_pemilik NamaPemilik,produk.id_pemilik
                                FROM produk
                                JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                JOIN pemilik ON  produk.id_pemilik = pemilik.id_pemilik
                                JOIN supplier ON produk.id_supplier = supplier.id_supplier
                                where produk.id_produk='$IdProduk'");
		if($res){
				$data = $res->fetch_assoc();
				return $data;
			}else
				return False;
		}else
			return False;
}


function cariproduk($cari,$mulai){
		$db = dbconnect();
		$sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' LIMIT $mulai,5 ";
		$res =$db->query($sql);
		return $res;
}
function navigator(){
	?>
	  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <!-- Bootstrap CSS -->
	     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="gaiya.css">
		<link rel="stylesheet" href="../gaiya.css">
		<link rel="stylesheet" href="style.css">
	    <title>Warung Laris</title>
	  </head>
	  <body>
	  <nav class="navbar navbar-expand-lg navbar navbar-dark shadow-sm fixed-top " style="background-color: #17181F">
	    <div class="container">
		 <a class="navbar-brand" href="#">Warung Laris</a>
		 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
		   aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		   <span class="navbar-toggler-icon"></span>
		 </button>
		 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		   <div class="navbar-nav ms-auto">
		    <a class="nav-link" href="../login/admin_utama.php">Beranda</a>
			<a class="nav-link" href="../Pemilik/viewpemilik.php">Pemilik</a>
			<a class="nav-link" href="../produk/viewproduk.php">Produk</a>
			<a class="nav-link" href="../Kategori/viewkategori.php">Kategori</a>
			<a class="nav-link" href="../Supplier/viewsupplier.php">Supplier </a>
			<a class="nav-link" href="../dokumen/test.php">Dokumen </a>
			<a class="nav-link" href="../login/logout.php">Keluar </a>
		   </div>
		 </div>
	    </div>
	  </nav>
	<?php
}
function showError($message){
	?>
<div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
<?php echo $message;?>
</div>
	<?php
}
?>