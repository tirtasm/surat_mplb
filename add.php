<?php
$koneksi = mysqli_connect("localhost", "root", "", "surat");
$no_surat = $_POST['no_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$dari = $_POST['dari'];
$dari = $_POST['kepada'];
$uraian = $_POST['uraian'];
$kode = $_POST['kode'];
$keterangan = $_POST['keterangan'];
$file = $_FILES['fileUpload']['name'];

$tanggal_input = date("d-m-Y");


//echo $tanggal_surat;

$tanggal_suratnya = explode('-', $tanggal_surat);
$tahun_surat = $tanggal_suratnya[0];
$bulan_surat = $tanggal_suratnya[1];
$tgl_surat = $tanggal_suratnya[2];


//$tanggal_surat = date('m');

//echo $tanggal_surat;

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
    "11. November",
    "12. Desember"
];

//echo date('d', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat));

$folder_hari = date('d', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat));
$folder_bulan = $nama_bulan[(int)date('m', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat)) - 1];
$folder_tahun = date('Y', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat));




// Menentukan lokasi upload file

//var_dump($source);

$folder = 'SURAT/';




if (!is_dir($folder)) {
    mkdir($folder);
}

if (!is_dir($folder . $folder_tahun)) {
    mkdir($folder . $folder_tahun);
}
if (!is_dir($folder . $folder_tahun . '/' . $folder_bulan)) {
    mkdir($folder . $folder_tahun . '/' . $folder_bulan);
}
if (!is_dir($folder . $folder_tahun . '/' . $folder_bulan . '/' . $folder_hari)) {
    mkdir($folder . $folder_tahun . '/' . $folder_bulan . '/' . $folder_hari);
}

//var_dump($_FILES);

$pic = $_FILES["fileUpload"]["name"];
$folder = "/SURAT/";
$path = $folder . $pic;




// Memindahkan file ke folder yang telah ditentukan
if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "SURAT/" . "$folder_tahun/$folder_bulan/$folder_hari/" . $_FILES["fileUpload"]["name"])) {
    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href = 'index.php';
    </script>
    ";
}



mysqli_query($koneksi, "INSERT INTO `surat` (`id`, `no_surat`, `tanggal_input`, `tanggal_surat`, `dari`, `uraian`, `kode`, `keterangan`, `file_surat`) VALUES (NULL, '$no_surat', '$tanggal_input', '$tanggal_surat', '$dari', '$uraian', '$kode', '$keterangan', '$file');");
