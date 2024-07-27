<?php
	session_start();
	if(!isset($_SESSION["id_pemilik"]))
		header("Location: ../index.php?error=4");
?>
<?php
    include '../function.php';
	$db=dbconnect();
    $sql ="SELECT id_produk,nama_produk,asal_supplier,stok FROM produk
	INNER JOIN supplier ON produk.id_supplier = supplier.id_supplier;";
	$res=$db->query($sql);
?>
<html>
<head>
    <title>Print Document</title>
    <link rel="stylesheet" href="gaiya.css">
</head>
<body>
<h1 align=center> Penyimpanan Barang di Warung Laris</h1>
	<?php
	echo "<br>";
	echo "<b><h1>Alamat</h1><pre><h2>Jl. PH.H. Mustofa No.130, Kelurahan Padasuka, Kecamatan Cibeunying Kidul, Kota Bandung, Jawa Barat.</h2></pre>";
	$tanggal=date("d-m-Y");
	echo "<br>";
	echo "<b><h1>Tanggal</h1><pre><h2>".$tanggal."</h2></pre>";
	echo "<hr>";
	?>
<h2 align=center>Daftar Barang Warung Laris</h2>
<br>
    <table border="1" width="90%" style="border-collapse:collapse;" align="center">
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
    <script>
        window.load = print_d();
        function print_d(){
            window.print();
        }
    </script>
</body>
</html>