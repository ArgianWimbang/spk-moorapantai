<?php
session_start();
//JIKA TIDAK DITEMUKAN $_SESSION['status'] (USER/ADMIN TIDAK MELIWATI TAHAP LOGIN) MAKA LEMBAR ADMIN/USER KEHALAMAN LOGIN 
if (!isset($_SESSION['status'])) {
  header("Location: ../index.php?pesan=logindahulu");
  exit;
}

require '../functions.php';

//MEMBUKA SEMUA DATA YG ADA DI TABLE ALTERNATIF
$data_sepatu = tampilsepatu("SELECT * FROM alternatif");

//MEMBUKU KEMBALI UNTUK MEMBACA TOTAL DATA YANG ADA
$data_sepatu1 = mysqli_query($con, "SELECT * FROM alternatif");

//JIKA DI KLIK BUTTON CARI MAKA
if (isset($_POST['cari'])) {
  $input = $_POST['input'];
  //TAMPILKAN DATA YANG DI INPUTKAN 
  $data_sepatu = tampilsepatu("SELECT * FROM alternatif WHERE nama_alternatif LIKE '%$input%' OR id_alternatif LIKE '%$input%' ");
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

    @media (min-width: 1050px) {

      .hitung {
        display: none;
      }

    }

    .col-md-12 {
      padding: 8px;
    }

    .copyright {
      text-align: center;
      color: #CDD0D4;

    }

    a font {
      color: whitesmoke;
    }

    .navbar-nav a:hover {
      color: darkblue;

    }

    tr:hover {
      -webkit-transform: scale(1.03);
      transform: scale(1.03);
      font-weight: bold;
    }
  </style>

  <title>DATA PANTAI</title>
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
    </nav>


    <br>
    <div class="container bg-light shadow p-3 mb-5">
      <div class="alert alert-secondary">
        <center><b>DATA PANTAI</b></center>
      </div>
  </form>

  <div class="form-inline">
    <form method="POST" action="" class="form-group">
      <input type="text" name="input" autofocus autocomplete="off" class="form-control shadow">
      <button type="submit" name="cari" class="btn btn-primary shadow">Cari</button>
    </form>

  </div>
  <br>
  <a href="tambah_data_sepatu.php" class="btn btn-success">Tambah Data</a>
  <br><br>
  <div class="hitung">
    <button type="submit" name="perhitungan" class="btn btn-primary" style=" margin-top: -10px;"><b>hitung</b></button>
  </div>

  <script>
    function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
          }
        }
      } else {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
          }
        }
      }
    }
  </script>

  <div class="table-responsive p-4">
    <table class="table table-striped shadow p-3 mb-5">
      <?php $tot = mysqli_num_rows($data_sepatu1);
      echo "Total Data : <b>" . $tot . "</b>";
      ?>
      <tr class="bg-secondary">
        <th>Pilih <br> (semua)
          <input type="checkbox" onchange="checkAll(this)" name="chk[]">
        </th>
        <th>Id Alternatif</th>
        <th>Nama Pantai Alternatif</th>
        <th>Tiket Masuk (C1) Cost</th>
        <th>Jarak (C2) Cost</th>
        <th>Fasilitas (C3) Benefit</th>
        <th>Aksi</th>
      </tr>

      <?php foreach ($data_sepatu as $sepatu) { ?>
        <tr>
          <td><input type="checkbox" name="id_alternatif[]" id="pilih" value="<?= $sepatu['id_alternatif']; ?>"></td>
          <td><?= $sepatu['id_alternatif']; ?></td>
          <td><?= $sepatu['nama_alternatif']; ?></td>
          <td><?= $sepatu['c1']; ?></td>
          <td><?= $sepatu['c2']; ?></td>
          <td><?= $sepatu['c3']; ?></td>
          <td><a href="edit_data_sepatu.php?id_alternatif=<?= $sepatu['id_alternatif']; ?>" class="btn btn-warning">Edit</a> <a href="hapus_data_sepatu.php?id_alternatif=<?= $sepatu['id_alternatif']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>

      <?php } ?>


    </table>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>