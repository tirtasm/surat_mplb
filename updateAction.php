<?php
$koneksi = mysqli_connect("localhost", "root", "", "surat");
$id = $_POST['id'];
$no_surat = $_POST['no_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$dari = $_POST['dari'];
$uraian = $_POST['uraian'];
$kode = $_POST['kode'];
$keterangan = $_POST['keterangan'];
$file = $_FILES['fileUpload']['name'];

$tanggal_input = date("d-m-Y");



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


if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "SURAT/" . "$folder_tahun/$folder_bulan/$folder_hari/" . $_FILES["fileUpload"]["name"])) {
    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href = 'index.php';
    </script>
    
    ";
}

// Memindahkan file ke folder yang telah ditentukan
if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $no_surat = mysqli_real_escape_string($koneksi, $_POST['no_surat']);
    $tanggal_surat = mysqli_real_escape_string($koneksi, $_POST['tanggal_surat']);
    $dari = mysqli_real_escape_string($koneksi, $_POST['dari']);
    $uraian = $_POST['uraian'];
    $kode = $_POST['kode'];
    $keterangan = $_POST['keterangan'];
    

    $tanggal_input = date("d-m-Y");

    // Check for empty fields
		// Update the database table
		
		
        // Display success message
        echo "<script>
        alert('Data Berhasil Diedit');
        document.location.href = 'view.php';
        </script>";
    
        

        //buatkan print echo 
    
}

$koneksi = mysqli_connect("localhost", "root", "", "surat");

// Get id from form input
$id = $_POST['id'];

    // Update file in the database
    $result = mysqli_query($koneksi, "UPDATE surat SET `no_surat` = '$no_surat' ,`tanggal_surat` = '$tanggal_surat', `dari` = '$dari' ,`uraian`='$uraian',`kode`='$kode',`keterangan`='$keterangan' WHERE `id`=$id");
    mysqli_query($koneksi, $result);

mysqli_close($koneksi);
?>
