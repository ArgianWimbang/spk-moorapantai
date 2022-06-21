<?php

session_start();
//JIKA TIDAK DITEMUKAN $_SESSION['status'] (USER/ADMIN TIDAK MELIWATI TAHAP LOGIN) MAKA LEMBAR ADMIN/USER KEHALAMAN LOGIN 
if (!isset($_SESSION['status'])) {
  header("Location: ../index.php?pesan=logindahulu");
  exit;
}


require '../functions.php';

//AMBIL DATA YG DIKLIK EDIT DI HALAMAN data_sepatu_sport.php TADI 
$id_alternatif = $_GET['id_alternatif'];

//TAMPILKAN DATA DIMANA id_alternatif nya ADALAH $id_alternatif
$data_sepatu = tampilsepatu("SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ")[0];

//JIKA DIKLIK BUTTON EDIT MAKA
if (isset($_POST['edit'])) {
  //JIKA function edit_sepatu > 0 (sukses) MAKA JALANKAN FUNGSI
  if (edit_sepatu($_POST) > 0) {
    echo "<script>
          alert ('Data Berhasil Di Edit')
          document.location.href='data_sepatu_sport.php'
          </script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
    body {
      background-image: url(../img/galeri/22.jpg);
    }

    .container {
      min-height: calc(100vh - 211px - -60px);
    }



    .col-md-12 {
      padding: 8px;
    }

    .copyright {
      text-align: center;
      color: #CDD0D4
    }

    a font {
      color: whitesmoke;
    }

    .navbar-nav a:hover {
      color: darkblue;

    }
  </style>

  <title>EDIT DATA SEPATU</title>
</head>

<body bgcolor="f0f0f0">
  <form method="post" action="perhitungan.php">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <a class="navbar-brand" href="#"><img src="../img/gmd1.png" width="50"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin: 10px;">
          <a class="nav-link active" href="index.php">
            <font size="4"><b>Home</b> </font><span class="sr-only">(current)</span>
          </a>
          <a class="nav-link" href="data_kriteria.php">
            <font size="4"><b>Data Kriteria</b></font>
          </a>
          <a class="nav-link" href="data_sepatu_sport.php">
            <font size="4"><b>Data Pantai</b></font>
          </a>
          <a class="nav-link" href="#">
            <font size="4"><b><button type="submit" name="perhitungan" class="btn btn-secondary" style="font-size: 20px; margin-top: -10px;"><b>Perhitungan</b></button></b></font>
          </a>
          <a class="nav-link" href="laporan.php">
            <font size="4"><b>Hasil</b></font>
          </a>
        </div>

        <div class="navbar-nav ms-auto" style="margin: 10px;">
          <a class="log nav-link m-auto" href="../logout.php">
            <font size="4"><b>Logout</b></font>
            <img src="../img/logout.png" width="30">
          </a>
        </div>
      </div>
    </nav>
  </form>

  <br>
  <div class="container bg-light shadow p-3 mb-5">
    <div class="alert alert-secondary">
      <center><b>EDIT DATA PANTAI</b></center>
    </div>

    <div class="col-md-7">
      <form method="post" class="form-group">
        <table class="table">

          <tr>
            <td width="200"><label>Id Kriteria</label></td>
            <td> : </td>
            <td width="500"><input type="text" name="id_alternatif" value="<?= $data_sepatu['id_alternatif']; ?>" readonly class="form-control" autocomplete="off"></td>
          </tr>

          <tr>
            <td><label>Nama Kriteria</label></td>
            <td> : </td>
            <td width="500"> <input type="text" name="nama_alternatif" value="<?= $data_sepatu['nama_alternatif']; ?>" class="form-control" autocomplete="off"></td>
          </tr>

          <tr>
            <td><label>Tiket Masuk (C1)</label></td>
            <td> : </td>
            <td width="500"> <input type="text" name="c1" value="<?= $data_sepatu['c1']; ?>" class="form-control" autocomplete="off"></td>
          </tr>

          <tr>
            <td><label>Jarak (C2)</label></td>
            <td> : </td>
            <td width="500"> <input type="text" name="c2" value="<?= $data_sepatu['c2']; ?>" class="form-control" autocomplete="off"></td>
          </tr>

          <tr>
            <td><label>Fasilitas (C3)</label></td>
            <td> : </td>
            <td width="500"> <input type="text" name="c3" value="<?= $data_sepatu['c3']; ?>" class="form-control" autocomplete="off"></td>
          </tr>

          <!-- <tr>
            <td><label>Harga (C4)</label></td>
            <td> : </td>
            <td width="500"> <input type="text" name="c4" value="<?= $data_sepatu['c4']; ?>" class="form-control" autocomplete="off"></td>
          </tr> -->


          <td></td>
          <td></td>
          <td><button type="submit" name="edit" class="btn btn-warning">Edit </button> &nbsp;&nbsp;&nbsp;
            <a href="data_sepatu_sport.php" class="btn btn-danger">Batal</a>
          </td>
          </tr>
        </table>

      </form>
    </div>

  </div>


  <div class="col-md-12 bg-secondary">
    <div class="copyright">
      <h6>Copyright&copy; argianriska 2022</h6>
    </div>
  </div>


  <!-- 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="http://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>