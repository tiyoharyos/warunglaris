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
<h1>Data Produk</h1>
<hr>
</center>
    <?php
	include_once("../function.php");
	?>
	<div class="container-xl">
	<center>
	<div class="container-fluid">
    <form class="d-flex" action='?cari' method='get'>
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='cari-data'>
      <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div>
	</center>
	<?Php
	$db = dbconnect();
	if($db->connect_errno == 0 ){
		$halaman = 10;
		$page    = isset($_GET['halaman'])? (int)$_GET['halaman']:1;
		$mulai   = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$sql     = $db->query("select * from produk ");
		$total   = $db->query("select * from produk ");
		$pages   = ceil($total->num_rows/$halaman);
		$res     = null;
		if (isset($_GET["cari-data"])) {
			$cari  = isset($_GET["cari-data"]) ? (string) $_GET["cari-data"] : "";
			$res   = cariproduk($cari,$mulai);
			$pageCari = ceil($res->num_rows / $halaman);
                         $pages = ($pageCari >= 1) ? $pageCari : $pages;
		}else {
				$sql1 ="SELECT produk.id_produk, produk.nama_produk, kategori.nama_kategori namakategori,supplier.asal_supplier  asalsupplier,
						produk.stok, produk.harga, produk.tgl_expired,pemilik.nama_pemilik namapemilik FROM produk
						JOIN kategori ON produk.id_kategori = kategori.id_kategori
						JOIN pemilik ON  produk.id_pemilik = pemilik.id_pemilik
						JOIN supplier ON produk.id_supplier = supplier.id_supplier 
						order by id_produk limit $mulai,$halaman";
			$res=$db->query($sql1);
		}
		if($res!= null){
     ?>
<br>
<div class="container-xl">
	<a href="tambahproduk.php"><button  class="btn btn-secondary btn-sm">Tambah Produk</button></a>
<table class="table table-striped table-hover">
		<tr>
			
			<th>Id Produk</th>
			<th>Nama Barang</th>
			<th>Kategori</th>
			<th>Asal Supplier</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>Tanggal Kadaluarsa</th>
			<th>Nama</th>
			<th></th>
		</tr>
	<?php
		$data = $res->fetch_row();
		do{
				list($id_produk,$nama_produk,$nama_kategori,$asal_supplier,$stok,$harga,$tgl_expired,$nama_pemilik) = $data;
	?>
			<tr id="rowHover">
				<td><?php echo $id_produk; ?></td>
				<td><?php echo $nama_produk; ?></td>
				<td><?php echo $nama_kategori; ?></td>
				<td><?php echo $asal_supplier; ?></td>
				<td><?php echo $stok; ?></td>
				<td>Rp. <?php echo number_format ($harga,0,",","."); ?></td>
				<td><?php echo $tgl_expired; ?></td>
				<td><?php echo $nama_pemilik; ?></td>
				<td><a class="btn btn-secondary btn-sm"href ="produk_edit.php?IdProduk=<?php echo $id_produk ?>">Edit </a> |
				<a class="btn btn-danger btn-sm" href ="produk_konfirmasi_hapus.php?IdProduk=<?php echo $id_produk ?>">Hapus</a> </td>
			</tr>
			<?php
		}
		while($data = $res->fetch_row());
	?>
	<td colspan = 9 align = center><?php echo $db->error; ?>
		<?php for ($i=1; $i<=$pages ; $i++){ ?>
		
		<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php }?>
	
	
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

