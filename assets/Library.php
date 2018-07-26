<?php
include_once 'database.php';
class Library
{
	private $host   = DB_HOST;
	private $user   = DB_USER;
	private $pass   = DB_PASS;
	private $dbname = DB_NAME;

	private $db;

	public function __construct(){
		$this->koneksi();
	}

	function koneksi(){
		$this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname) or die("Gagal Koneksi");
		return $this->db;
	}

	function cekLogin($username, $password){
		$queryAdm = $this->db->query("SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");
		$queryUsr = $this->db->query("SELECT * FROM user WHERE nim = '".$username."' AND password = '".$password."'");
		session_start();
		if ($queryAdm->num_rows>0) {
			$_SESSION['admin'] = $username;
			header('location: admin/');
		}
		elseif ($queryUsr->num_rows>0) {
			$_SESSION['user'] = $username;
			header('location: user/');
		}
		else{
			header('location: login.php?msg='.urlencode('Username atau Password anda salah!'));
		}
	}

	function select2($table, $kategori){
		$query = $this->db->query("SELECT * FROM $table WHERE kategori = '$kategori'") or die("Query Salah");
		return $query;
	}	

	function tampilData($table, $coloumn){
		$query = $this->db->query("SELECT * FROM $table ORDER BY $coloumn");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
	}

	function tampilDataLimit($table, $coloumn,  $limit){
		$query = $this->db->query("SELECT * FROM $table ORDER BY $coloumn DESC LIMIT $limit");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
	}

	function tampilData2($table, $coloumn, $id){
		$query = $this->db->query("SELECT * FROM $table WHERE $coloumn = '$id'");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
	}

	function tampilData3($table, $coloumn){
		$query = $this->db->query("SELECT * FROM $table GROUP BY $coloumn");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
	}

	function tampilDataTransBulan($table, $id){
		$query = $this->db->query("SELECT * FROM $table WHERE month(tanggal) = '$id' ORDER BY nim");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
	}


	function getId($id, $table, $coloumn){
		$query = $this->db->query("SELECT * FROM $table WHERE $coloumn = '$id'");
		return $query;
	}

	function insertUser($nim, $nama, $email, $password, $jk, $jurusan, $no_telp, $alamat, $foto, $pengeluaran){
		$query = $this->db->query("INSERT INTO user VALUES('$nim', '$nama', '$email', '$password', '$jk', '$jurusan', '$no_telp', '$alamat', '$foto',  '$pengeluaran')") or die("Query Salah");
		header('location: user.php');
		return "Success";
	}

	function insertBrg($nama, $harga, $stok, $kategori, $keterangan, $foto){
		$query = $this->db->query("INSERT INTO barang VALUES(NULL, '$nama', '$harga', '$stok', '$kategori', '$keterangan', '$foto')");
		return "Success";
	}

	function transaksiUser($id, $total){
		$queryUser = $this->db->query("SELECT * FROM user WHERE nim = '$id'");
		$pengeluaran = 0;
		while($data = mysqli_fetch_array($queryUser)){
			$pengeluaran = $data['pengeluaran'];
		}
		$pengeluaran+=$total;
		$queryUser = $this->db->query("UPDATE user SET pengeluaran = '$pengeluaran' WHERE nim = '$id'");
	}

	function tampilJoin($id){
		$query = $this->db->query("SELECT * FROM barang b JOIN transaksi t ON b.id = t.id_merch WHERE t.id_merch = '$id'");
		$data = mysqli_fetch_array($query);
		return $data['nama'];
	}

	function tampilNama($table, $coloumn, $id){
		$query = $this->db->query("SELECT * FROM $table WHERE $coloumn = '$id'");
		$data = mysqli_fetch_array($query);
		return $data['nama'];
	}

	function transaksiBarang($id, $qty){
		$queryBarang = $this->db->query("SELECT * FROM barang WHERE id = '$id'");
		$jumlah = 0;
		while ($data = mysqli_fetch_array($queryBarang)) {
			$jumlah = $data['stok'];
		}
		if (($jumlah-=$qty) >= 0) {
			$queryBarang = $this->db->query("UPDATE barang SET stok = '$jumlah' WHERE id = '$id'");
		}
		else{
			header('location: detail_keranjang.php?msg=outofstock');
		}
	}

	function insertTransaksi($nim, $id_merch, $qty, $total, $tanggal){
		$query = $this->db->query("INSERT INTO transaksi VALUES(NULL, '$nim', '$id_merch', '$qty', '$total', '$tanggal', 'N')");
		return "Success";
	}

	function delete($id, $table, $coloumn){
		$query = $this->db->query("DELETE FROM $table WHERE $coloumn = '$id'") or die("Query Salah");
		return "Success";
	}

	function editUser($nim, $nama, $password, $jk, $jurusan, $no_telp, $alamat, $beli, $pengeluaran){
		$query = $this->db->query("UPDATE user SET nama = '$nama', password = '$password', jk = '$jk', jurusan = '$jurusan', no_telp = '$no_telp', alamat = '$alamat', beli = '$beli', pengeluaran = '$pengeluaran' WHERE nim = '$nim'") or die("Query Salah");
		return "Success";
	}

	function editBrg($id, $nama, $harga, $stok, $kategori, $keterangan, $foto){
		$query = $this->db->query("UPDATE barang SET nama = '$nama', harga = '$harga', stok = '$stok', kategori = '$kategori', keterangan = '$keterangan' WHERE id = '$id'") or die("Query Salah");
		return "Success";
	}

	function editAdmin($username, $password, $nama, $tanggal_lahir, $no_telp, $alamat){
		$query = $this->db->query("UPDATE admin SET password = '$password', nama = '$nama', tanggal_lahir = '$tanggal_lahir', no_telp = '$no_telp', alamat = '$alamat' WHERE username = '$username'") or die("Query Salah");
		return "Success";
	}

	function keranjang($key){
		$query = $this->db->query("SELECT * FROM barang WHERE id = '$key'");
		return $query;
	}

	function pencarian($table, $coloumn, $kata){
		$query = $this->db->query("SELECT * FROM $table WHERE $coloumn LIKE '%$kata%'");
		return $query;
	}

	function pencarianTrans($table, $coloumn, $kata){
		$query = $this->db->query("SELECT * FROM $table WHERE $coloumn LIKE '%$kata%' ORDER BY nim");
		return $query;
	}

}
?>