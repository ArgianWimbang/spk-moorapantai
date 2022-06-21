<?php

require '../functions.php';

//AMBIL DATA YG DIKLIK HAPUS DI HALAMAN data_sepatu_sport.php TADI 
$id_alternatif = $_GET['id_alternatif'];

//JALANKAN FUNGSI HAPUS
if (hapus_sepatu($id_alternatif)) {
    echo "<script>
          alert ('Data Berhasil Di Hapus')
          document.location.href='data_sepatu_sport.php'
          </script>";
}
