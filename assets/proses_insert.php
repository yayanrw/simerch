<?php 
session_start();

if (empty($_SESSION['admin'])) {
  header('location: ../login.php');
}

include '../assets/Library.php';
$db = new Library();

if (isset($_POST['simpan_user'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $jk = $_POST['jk'];
  $jurusan = $_POST['jurusan'];
  $no_telp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];
  $pengeluaran = 0;
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $path = "../images/user/".$foto;
  move_uploaded_file($tmp, $path);


  $insert = $db->insertUser($nim, $nama, $password, $jk, $jurusan, $no_telp, $alamat, $foto, $beli, $pengeluaran) or die("Gagal");
  if ($insert == "Success") {
    header('location: ../admin/user.php?msg=insert');
  } 
}

 if (isset($_POST['simpan_merch'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  $keterangan = $_POST['keterangan'];
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $path = "../images/merch/".$foto;
  move_uploaded_file($tmp, $path);

  $insert = $db->insertBrg($nama, $harga, $stok, $kategori, $keterangan, $foto) or die("Gagal");
  if ($insert == "Success") {
    header('location: ../admin/merch.php?msg=insert');
  }
 }
 ?>