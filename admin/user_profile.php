<?php
session_start();
include_once '../assets/Library.php';
$db = new Library();

if (empty($_SESSION['admin'])) {
  header('location: ../login.php');
}

$id = $_SESSION['admin'];
$getId = $db->getId($id, 'admin', 'username');
$data = mysqli_fetch_array($getId);

$idu = $_GET['id_user'];
$getIdu = $db->getId($idu, 'user', 'nim');
$datau = mysqli_fetch_array($getIdu);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Kedai Merchandise Polinema</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../images/kmp-cart.png" alt="Kedai Merchandise Polinema" width="25px"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>KMP</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <ul class="dropdown-menu">
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li>
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../images/admin/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">
                      </div>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
              </ul>
            </li>
            <!-- /.messages-menu -->



            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../images/admin/<?php echo $data['foto']; ?>" class="user-image" alt="<?php echo $data['nama']; ?>">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $data['nama']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../images/admin/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">

                  <p>
                    <?php echo $data['nama']; ?> - Admin
                    <small>Kedai Merchandise Polinema</small>
                  </p>
                </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php?id=<?php echo $data['username']; ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../assets/logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/admin/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $data['nama']; ?></p>
          <!-- Status -->
          <small><i class="fa fa-user"></i> Admin</small>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pencarian...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li class="active"><a href="user.php"><i class="fa fa-address-book"></i> <span>Daftar User</span></a></li>
        <li><a href="merch.php"><i class="fa fa-archive"></i> <span>Daftar Merchandise</span></a></li>
        <li><a href="transaksi.php"><i class="fa fa-cart-arrow-down"></i> <span>Transaksi</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
        <small><?php echo $datau['nama']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li><a href="user.php"><i class="fa fa-user"></i> User </a></li>
        <li class="active">User Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <center>
                <img style="height: 200px " class="img-responsive img-circle" src="../images/user/<?php echo $datau['foto']; ?>" alt="<?php echo $datau['nama']; ?>">
              </center>
              <h3 class="profile-username text-center"><?php echo $datau['nama']; ?></h3>

              <p class="text-muted text-center"><?php echo $datau['jurusan']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Pengeluaran</b> <a class="pull-right">Rp. <?php echo $datau['pengeluaran']; ?></a>
                </li>
                <li class="list-group-item">
                  <strong><i class="fa fa-user margin-r-5"></i> NIM</strong>
                  <p class="text-muted"><?php echo $datau['nim']; ?></p>
                </li>
                <li class="list-group-item">
                  <strong><i class="fa fa-lock margin-r-5"></i> Password</strong>
                  <p class="text-muted"><?php echo $datau['password']; ?></p>
                </li>
                <li class="list-group-item">
                  <strong><i class="fa fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
                  <p class="text-muted"><?php echo $datau['jk']; ?></p>
                </li>
                <li class="list-group-item">
                  <strong><i class="fa fa-phone margin-r-5"></i> Nomor Telepon</strong>
                  <p class="text-muted"><?php echo $datau['no_telp']; ?></p>
                </li>
                <li class="list-group-item">
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                  <p class="text-muted"><?php echo $datau['alamat']; ?></p>
                </li>
                <div class="text-center" style="margin-top: 20px">
                  <a href="../assets/delete.php?id_user=<?php echo  $datau['nim'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Data</a>
                </div>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Aktivitas</a></li>
              <li><a href="#update" data-toggle="tab">Update Data</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <?php 
                    $no = 1;
                    $arrayData = $db->tampilData2('transaksi', 'nim', $idu);
                    if ($arrayData) {
                      foreach ($arrayData as $data) {
                        ?>
                        <div class="callout callout-default callout-sm"> 
                          <img style="height: 50%; margin-right: 10px" class="img-circle img-responsive" src="../images/user/<?php echo $datau['foto']; ?>" alt="">
                          <h5>No. <?php echo $no++; ?><br>Membeli <?php echo $db->tampilJoin($data['id_merch']); ?> sebanyak <?php echo $data['qty'] ; ?> Pcs dengan total biaya Rp. <?php echo number_format($data['total']); ?> <br>
                          Pada 
                          <?php
                            $phpdate = strtotime($data['tanggal']);
                            $mysqldate = date('d M Y - H:i:s', $phpdate);
                            echo $mysqldate ?>
                          </h5>
                        </div>
                        <?php }} ?>
                    </div></div>
                  </div>  


                  <div class="tab-pane" id="update">
                    <form class="form-horizontal" action="../assets/edit_proses.php" method="post">
                      <div class="form-group">
                        <label for="inputNim" class="col-sm-2 control-label">NIM</label>

                        <div class="col-sm-10">
                          <p class="form-control" disabled><?php echo $datau['nim']; ?></p>
                          <input type="text" class="form-control hidden" id="inputNim" value="<?php echo $datau['nim']; ?>" name="nim">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPass" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPass" value="<?php echo $datau['password']; ?>" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" id="inputName" value="<?php echo $datau['nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputJk" class="col-sm-2 control-label">Jenis Kelamin</label>

                        <div class="col-sm-10">
                          <input type="radio" name="jk" value="Laki-laki" required
                          <?php
                          if ($datau['jk'] == 'Laki-laki') {
                            echo "checked";
                          }
                          ?>
                          >Pria
                          <input type="radio" name="jk" value="Perempuan" required
                          <?php 
                          if ($datau['jk'] == 'Perempuan') {
                            echo "checked";
                          }
                          ?>
                          >Wanita
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputJurusan" class="col-sm-2 control-label">Jurusan</label>

                        <div class="col-sm-10">
                         <select name="jurusan" required class="btn btn-default">
                          <option value="Akuntansi"
                          <?php if ($datau['jurusan'] == 'Akuntansi') {
                            echo "selected";
                          } ?>
                          >Akuntansi</option>
                          <option value="Administrasi Bisnis"
                          <?php if ($datau['jurusan'] == 'Administrasi') {
                            echo "selected";
                          } ?>
                          >Administrasi Bisnis</option>
                          <option value="Teknologi Informasi"
                          <?php if ($datau['jurusan'] == 'Teknologi Informasi') {
                            echo "selected";
                          } ?>
                          >Teknologi Informasi</option>
                          <option value="Teknik Elektro"
                          <?php if ($datau['jurusan'] == 'Teknik Elektro') {
                            echo "selected";
                          } ?>
                          >Teknik Elektro</option>
                          <option value="Teknik Kimia"
                          <?php if ($datau['jurusan'] == 'Teknik Kimia') {
                            echo "selected";
                          } ?>
                          >Teknik Kimia</option>
                          <option value="Teknik Sipil"
                          <?php if ($datau['jurusan'] == 'Teknik Sipil') {
                            echo "selected";
                          } ?>
                          >Teknik Sipil</option>
                          <option value="Teknik Mesin"
                          <?php if ($datau['jurusan'] == 'Teknik Me
                            sin') {
                            echo "selected";
                          } ?>
                          >Teknik Mesin</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputTelp" class="col-sm-2 control-label">Nomor Telepon</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_telp" id="inputTelp" value="<?php echo $datau['no_telp']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="inputAlamat"><?php echo $datau['alamat']; ?> </textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputKeluar" class="col-sm-2 control-label">Pengeluaran</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pengeluaran" id="inputKeluar" value="<?php echo $datau['pengeluaran']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="simpan_user"><i class="fa fa-edit"></i>  Edit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <div class="pull-right">
       <strong>Copyright &copy; 2017 <a href="#">Kedai Merchandise Polinema</a></strong> All rights reserved.
     </div>
     Supported By : <a href="http://www.polinema.ac.id">Politeknik Negeri Malang</a>
   </footer>
   <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <script src="../dist/js/app.min.js"></script>
 </body>
 </html>

 <?php 
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

  $insert = $db->editUser($nim, $nama, $password, $jk, $jurusan, $no_telp, $alamat, $beli, $pengeluaran) or die("Gagal");
  if ($insert == "Success") {
    header('location: user.php');
  }
  else{
    echo "Data gagal disimpan<br>";
    header('location: user.php');
  }
  exit();
}

?>