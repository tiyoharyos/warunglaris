<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php include_once("../function.php");

	$db=dbconnect();
    $sql ="SELECT id_produk,nama_produk,asal_supplier,stok FROM produk
	INNER JOIN supplier ON produk.id_supplier = supplier.id_supplier;";
	$res=$db->query($sql);
?>

<!DOCTYPE html>
<html><head><style>
</style><title>Warung Laris</title></head>

<?php navigator();?>
<body>
    
<div class="container-xl">
<section class="jumbotron">
<h1 align=center>Penyimpanan Barang di Warung Laris</h1>
	<?php
	echo "<br>";
	echo "<b><h4>Alamat</h4><pre><h5>Jl. PH.H. Mustofa No.130, Kelurahan Padasuka, Kecamatan Cibeunying Kidul, Kota Bandung, Jawa Barat.</h5></pre>";
	$tanggal=date("d-m-Y");
	echo "<br>";
	echo "<b><h4>Tanggal</h4><pre><h5>".$tanggal."</h5></pre>";
	?>
</section>
</div>
<hr>
<div class="container-xl">
<h2 align=center>Daftar Barang Warung Laris</h2>

<table class="table table-striped table-hover">

        <tr class="tableheader">
            <th rowspan="1">ID Produk</th>
            <th>Nama Produk</th>
            <th>Asal Supplier</th>
			<th>Stok</th>
        </tr>
        <?php 
		$data=$res->fetch_all(MYSQLI_ASSOC);
		foreach($data as $hasil){ ?>
        <tr id="rowHover">
            <td width="10%" align="center"><?php echo $hasil['id_produk']; ?></td>
            <td width="25%" id="column_padding"><?php echo $hasil['nama_produk']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['asal_supplier']; ?></td>
			<td width="10%" id="column_padding"><?php echo $hasil['stok']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br />
    <button class="btn btn-secondary btn-sm" style="margin-left:5%" onClick="print_d()">Print Document</button>
    <script>
        function print_d(){
            window.open("print.php","_blank");
        }
    </script>
</body>
</html>
