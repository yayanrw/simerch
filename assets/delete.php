<?php
 require 'Library.php';
if (isset($_GET['id_user'])) {
	$db = new Library();
	$id = $_GET['id_user'];
	$delete = $db->delete($id, 'user', 'nim') or die("Data gagal dihapus");
	if ($delete == "Success") {
		header('location: ../admin/user.php?msg=delete');
	}
}

if (isset($_GET['id_brg'])) {
	$db = new Library();
	$id = $_GET['id_brg'];
	$delete = $db->delete($id, 'barang', 'id') or die("Data gagal dihapus");
	if ($delete == "Success") {
		header('location: ../admin/merch.php?msg=delete');
	}
}
 ?>