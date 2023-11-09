<?php
// Melakukan koneksi ke database MySQL  
require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$koneksi = mysqli_connect("localhost", "root", "", "surat");
// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table

$get_data = mysqli_query($koneksi, "SELECT * FROM surat WHERE id='$id'");

$nama_file_surat = mysqli_fetch_assoc($get_data);
$nama_file = $nama_file_surat["file_surat"];

var_dump($nama_file_surat);

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



$tanggal_surat = $nama_file_surat['tanggal_surat'];

$tanggal_suratnya = explode('-', $tanggal_surat);
$tahun_surat = $tanggal_suratnya[0];
$bulan_surat = $tanggal_suratnya[1];
$tgl_surat = $tanggal_suratnya[2];

$folder_hari = date('d', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat));
$folder_bulan = $nama_bulan[(int)date('m', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat)) - 1];
$folder_tahun = date('Y', mktime(0, 0, 0, $bulan_surat, $tgl_surat, $tahun_surat));



// Delete

unlink("SURAT/" . "$folder_tahun/$folder_bulan/$folder_hari/" .$nama_file);

$delete = mysqli_query($koneksi, "DELETE FROM surat WHERE id = '$id'");

// Redirect to the main display page (index.php in our case)
header("Location:view.php");

?>
