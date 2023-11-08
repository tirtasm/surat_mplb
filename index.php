<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$instansi = $_ENV["INSTANSI"];




// Konek ke database surat
$conn = mysqli_connect("localhost", "root", "", "surat");

// Ambil data dari tabel surat
$suratMasuk = mysqli_query($conn, "SELECT * FROM surat WHERE keterangan = 'Masuk'");
$suratKeluar = mysqli_query($conn, "SELECT * FROM surat WHERE keterangan = 'Keluar'");
$totalSurat = mysqli_query($conn, "SELECT * FROM surat");



// Hitung jumlah data 


$jumlahSuratMasuk = mysqli_num_rows($suratMasuk);
$jumlahSuratKeluar = mysqli_num_rows($suratKeluar);
$jumlahSurat = mysqli_num_rows($totalSurat);

// mengubah ke string


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <?php echo $instansi; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">sjk</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahSuratMasuk ?></h5>
                <p class="card-text">JUMLAH SURAT MASUK</p>
            </div>
        </div>
        <!-- Lanjutkan kodeenya -->

        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahSuratKeluar ?></h5>
                <p class="card-text">JUMLAH SURAT KELUAR</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahSurat ?></h5>
                <p class="card-text">JUMLAH SURAT</p>
            </div>
        </div>


        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>


</html>