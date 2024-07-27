<?php include("function.php");?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<title> Log IN</title>
</head>
<body>
<body>
<?php
if (isset($_GET["error"])) {
	$error = $_GET["error"];
	if ($error==1)
		showError("Id Akun dan password tidak sesuai");
	else if ($error==2)
		showError("Error Database. Silahkan Hubungi Administrator");
	else if ($error==3)
		showError("Koneksi ke Database gagal.Autentikasi Gagal");
	else if ($error==4)
		showError("Anda Tidak Boleh Mengakses Halaman Sebelumnya. Silahkan Login Terlebih Dahulu");
	else 
		showError("Unknown Error");
}
?>
  <body>
  <div class="container-xl">
  <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Masukin ID Anda</p>
          </div>
        </div>
        <form method="post" name="f" action="login/login.php">
            <div class="row mb-3">
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Id_Pemilik" name="id_pemilik" placeholder="Masukan ID">
                </div>
            </div>
          <div class="row mb-3">
              <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="INI Password">
              </div>
          </div>
  <button type="submit" name="TblLogin" value="Login" class="btn btn-primary">Log IN</button>
</form>
</form>
</body>
</html>

</body>
</html>

