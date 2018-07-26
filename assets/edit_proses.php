<?php 
include_once 'Library.php';
if (isset($_POST['simpan_user'])) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$jk = $_POST['jk'];
	$jurusan = $_POST['jurusan'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
	$beli = $_POST['beli'];
	$pengeluaran = $_POST['pengeluaran'];

	$db = new Library();
	$insert = $db->editUser($nim, $nama, $password, $jk, $jurusan, $no_telp, $alamat, $beli, $pengeluaran) or die("Gagal");
	if ($insert == "Success") {
		header('location: ../admin/user.php?msg=edit');
	}
}

if (isset($_POST['simpan_brg'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$kategori = $_POST['kategori'];
	$keterangan = $_POST['keterangan'];

	$db = new Library();
	$insert = $db->editBrg($id, $nama, $harga, $stok, $kategori, $keterangan) or die("Gagal");
	if ($insert == "Success") {
		header('location: ../admin/merch.php?msg=edit');
	}
}

if (isset($_POST['simpan_admin'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$db = new Library();
	$insert = $db->editAdmin($username, $password, $nama, $tanggal_lahir, $no_telp, $alamat) or die("Gagal");
	if ($insert == "Success") {
		header('location: ../admin/admin.php?msg=edit');
	}
}
?>