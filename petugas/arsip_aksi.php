<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = $_SESSION['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$rand = rand();

$ekstensi =  array('png','jpg','jpeg','gif','pdf');

$filenameB = $_FILES['arsip_fileB']['name'];
$ukuran = $_FILES['arsip_fileB']['size'];
$ext = pathinfo($filenameB, PATHINFO_EXTENSION);

$filenameC = $_FILES['arsip_fileC']['name'];
$ukuran = $_FILES['arsip_fileC']['size'];
$ext = pathinfo($filenameC, PATHINFO_EXTENSION);

$filenameD = $_FILES['arsip_fileD']['name'];
$ukuran = $_FILES['arsip_fileD']['size'];
$ext = pathinfo($filenameD, PATHINFO_EXTENSION);

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$notlp = $_POST['notlp'];
$pekerjaan = $_POST['pekerjaan'];
$box = $_POST['box'];
$tgllahir = $_POST['tgllahir'];
$tempatlahir = $_POST['tempatlahir'];
$alamat = $_POST['alamat'];
$tglkredit = $_POST['tglkredit'];
$tglakhir = $_POST['tglakhir'];
$kckcp = $_POST['kckcp'];

if($jenis && $ukuran == "php") {
	header("location:arsip.php?alert=gagal");
}else{
	$D = $rand.'_'.$filenameD;
	move_uploaded_file($_FILES['arsip_fileD']['tmp_name'], '../arsip/'.$rand.'_'.$filenameD);

	$C = $rand.'_'.$filenameC;
	move_uploaded_file($_FILES['arsip_fileC']['tmp_name'], '../arsip/'.$rand.'_'.$filenameC);

	$B = $rand.'_'.$filenameB;
	move_uploaded_file($_FILES['arsip_fileB']['tmp_name'], '../arsip/'.$rand.'_'.$filenameB);

	move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
	$nama_file = $rand.'_'.$filename;
	
	mysqli_query($koneksi, "insert into arsip values (NULL,'$waktu','$petugas','$kode','$nama','$jenis','$kategori','$keterangan','$nama_file', '$box', '$tgllahir', '$tempatlahir', '$tglkredit', '$pekerjaan', '$alamat', '$notlp', '$B', '$C', '$D', '$tglakhir', '$kckcp')")or die(mysqli_error($koneksi));
	header("location:arsip.php?alert=sukses");
}
