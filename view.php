<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$koneksi = mysqli_connect("localhost", "root", "", "surat");

$data = mysqli_query($koneksi, "SELECT * FROM surat ");

$instansi = $_ENV["INSTANSI"];

$nama_bulan = [
    "1. Januari",
    "2. Februari",
    "3. Maret",
    "4. April",
    "5. Mei",
    "6. Juni",
    "7. Juli",
    "8. Agustus",
    "9. September",
    "10. Oktober",
    "11. Novmber",
    "12. Desember"
];

//var_dump($instansi);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>MANAJEMEN SURAT</title>

    <style>
        * {
            margin: 0;
            padding: 0;

        }

        body {
            background-color: #f2f2f2;
        }


        .judul {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .box {
            text-align: center;
            margin-bottom: 20px;
        }



        .btnPlace {
            width: 100%;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .box {
            margin: 0 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="judul">
            <br>
            <?php echo $instansi; ?>
        </h1>
        <div class="btnPlace">
            <div class="box"><a href="tambah.php" class="btn btn-primary">TAMBAH SURAT</a></div>
            <div class="box"><a href="SURAT/" class="btn btn-primary">LIHAT SURAT</a></div>

        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">NO SURAT</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">TANGGAL SURAT</th>
                    <th scope="col">DARI / KEPADA</th>
                    <th scope="col">URAIAN</th>
                    <th scope="col">KODE</th>
                    <th scope="col">KETERANGAN</th>
                    <!-- <th scope="col">FILE</th> -->
                    <th scope="col">FILE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($datanya = mysqli_fetch_array($data)) {

                    $tanggal_suratnya = explode("-", $datanya['tanggal_surat']);
                    $tanggal = $tanggal_suratnya[2];
                    $bulan = str_replace(" ", "%20", $nama_bulan[(int) $tanggal_suratnya[1] - 1]);
                    $tahun = $tanggal_suratnya[0];

                    echo $tahun;
                    $surat = str_replace(" ", "%20", $datanya['file_surat']);


                ?>
                    <tr>
                        <td><?php echo $datanya['no_surat']; ?></td>
                        <td><?php echo $datanya['tanggal_input']; ?></td>
                        <td><?php echo $datanya['tanggal_surat']; ?></td>
                        <td><?php echo $datanya['dari']; ?></td>

                        <td><?php echo $datanya['uraian']; ?></td>
                        <td><?php echo $datanya['kode']; ?></td>
                        <td><?php echo $datanya['keterangan']; ?></td>
                        <td><a class="btn btn-success" href=<?php echo ("SURAT/$tahun/$bulan/$tanggal/$surat") ?>>LIHAT</a></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>



    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>