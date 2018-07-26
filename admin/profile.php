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
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li><a href="user.php"><i class="fa fa-address-book"></i> <span>Daftar User</span></a></li>
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
        Admin Profile
        <small><?php echo $data['nama']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li class="active">Admin Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <center> <img class="img-responsive img-circle" src="../images/admin/<?php echo $data['foto']; ?>" alt="<?php echo $data['nama']; ?>"></center>
              <h3 class="profile-username text-center"><?php echo $data['nama']; ?></h3>
              <p class="text-muted text-center">Admin - Kedai Merchandise Polinema</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#update" data-toggle="tab">Update Data</a></li>
            </ul> 
            <div class="tab-pane" id="update">
              <form class="form-horizontal" action="../assets/edit_proses.php" method="post">
                <div class="form-group">
                  <label for="inputusername" class="col-sm-2 control-label">username</label>

                  <div class="col-sm-10">
                    <p class="form-control" disabled><?php echo $data['username']; ?></p>
                    <input type="text" class="form-control hidden" id="inputusername" value="<?php echo $data['username']; ?>" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPass" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPass" value="<?php echo $data['password']; ?>" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="inputName" value="<?php echo $data['nama']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputtanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" id="inputtanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp" class="col-sm-2 control-label">Nomor Telepon</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_telp" id="inputTelp" value="<?php echo $data['no_telp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="inputAlamat"><?php echo $data['alamat']; ?> </textarea>
                  </div>
                </div>
                <div class="form-group date">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="simpan_admin"><i class="fa fa-edit"></i>  Edit</button>
                    <br><br>
                  </div>
                </div>
              </form>
            </div>
          </div>
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