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
            <form action="add.php" method="post" enctype="multipart/form-data">
                <label for="no_surat" class="form-label">NO SURAT</label>
                <input required type="text" name="no_surat" class="form-control" id="no_surat" />
                <label for="tanggal" class="form-label">TANGGAL SURAT</label>
                <input required type="date" name="tanggal_surat" class="form-control" id="tanggal" />
                <label for="dari" class="form-label">DARI/KEPADA</label>
                <input required type="text" name="dari" class="form-control" id="dari" />
                <label for="uraian" class="form-label">URAIAN</label>
                <textarea name="uraian" type="text" class="form-control" id="uraian" rows="3"></textarea>
                <label for="kode" class="form-label">KODE</label>
                <input required type="text" name="kode" class="form-control" id="kode" />
                <label for="keterangan" class="form-label">KETERANGAN</label>
                <select name="keterangan" class="form-select" id="inputGroupSelect01">
                    <option value="Masuk">MASUK</option>
                    <option value="Keluar">KELUAR</option>

                </select>
                <br>
                <label for="formFileLg" class="form-label">FILE SURAT</label>
                <input required name="fileUpload" class="form-control form-control-lg" id="formFileLg" type="file" accept="application/" />

                <button class="btn btn-primary kirim">KIRIM</button>
            </form>
        </div>
    </div>

    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>


</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["tanggal_surat"];
    $today = date("Y-m-d");

    if ($selectedDate < $today) {
        echo '<p style="color: red;">Please select a date today or in the future.</p>';
    } else {    
        echo '<p style="color: green;">Date is valid!</p>';
        // Process the form data if the date is valid
        // ...
    }
}
?>