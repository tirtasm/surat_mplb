<?php
// Include the database connection file
require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$koneksi = mysqli_connect("localhost", "root", "", "surat");

// Get id from URL parameter

$id = $_GET['id'];


// Select data associated with this particular id
$result = mysqli_query($koneksi, "SELECT * FROM surat WHERE id = '$id'");

// Fetch the next row of a result set as an associative array
$row=mysqli_fetch_array($result);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .btn {
            background-color: #4caf50;
            /* Warna hijau */
            border: none;
            color: white;
            /* Warna teks */
            padding: 15px 32px;
            /* Ukuran padding */
            text-align: center;
            /* Posisi teks */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            display: inline-block;
            /* Membuat tombol sejajar dengan elemen lain */
            font-size: 16px;
            /* Ukuran font */
            border-radius: 10px;
            /* Membuat sudut bulat */
        }

        .form-control {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ced4da;
        }

        .container {
            padding: 20px;
        }

        @media screen and (min-width: 900px) {
            .container {
                padding: 5%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Membuat elemen tombol dalam HTML -->

        <h1 style="text-align: center">MASUKAN DATA</h1>
        <div class="container">
            <form action="updateAction.php" method="post" enctype="multipart/form-data">

                <label for="no_surat" class="form-label">NO SURAT</label>
                <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?php echo $row['no_surat']; ?>" />
                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                <label for="tanggal" class="form-label">TANGGAL SURAT</label>
                <input type="date" name="tanggal_surat" class="form-control" id="tanggal" value="<?php echo $row['tanggal_surat']; ?>" />
                <label for="dari" class="form-label">DARI/KEPADA</label>
                <input type="text" name="dari" class="form-control" id="dari" value="<?php echo $row['dari']; ?>" />
                <label for="uraian" class="form-label">URAIAN</label>
                <textarea name="uraian" type="text" class="form-control" id="uraian" rows="5"><?php echo $row['uraian']; ?></textarea>

                <label for="kode" class="form-label">KODE</label>
                <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $row['kode']; ?>" />
                <label for="keterangan" class="form-label">KETERANGAN</label>
                <select name="keterangan" class="form-select" id="inputGroupSelect01">
                    <option value="Masuk" <?php echo ($row['keterangan'] == 'Masuk') ? 'selected' : ''; ?>>MASUK</option>
                    <option value="Keluar" <?php echo ($row['keterangan'] == 'Keluar') ? 'selected' : ''; ?>>KELUAR</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <br>

                <button class="btn btn-primary kirim" name="update">GANTI</button>
            </form>
        </div>
    </div>



</body>

</html>