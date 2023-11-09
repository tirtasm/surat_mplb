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
    <style>
        .tes {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .tes>a {
            margin: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <?php echo $instansi; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">sjk</span>
            </button>

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
        <div class="tes">
            <a href="tambah.php" class="btn btn-primary">TAMBAH SURAT</a>
            <a href="view.php" class="btn btn-primary">LIHAT SURAT</a>

        </div>

        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>


</html>