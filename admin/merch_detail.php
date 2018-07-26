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

$idm = $_GET['id_brg'];
$getIdm = $db->getId($idm, 'barang', 'id');
$datam = mysqli_fetch_array($getIdm);
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
    <header class="main-header">
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
        <li><a href="user.php"><i class="fa fa-address-book"></i> <span>Daftar User</span></a></li>
        <li class="active"><a href="merch.php"><i class="fa fa-archive"></i> <span>Daftar Merchandise</span></a></li>
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
        Detail Merchandise
        <small><?php echo $datam['nama']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li><a href="merch.php"><i class="fa fa-archive"></i> Daftar Merchandise </a></li>
        <li class="active">Detail Merchandise</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-body">
              <img src="../images/merch/<?php echo $datam['foto']; ?>" class="img-responsive" alt="Image">
              <h3 class="profile-username text-center"><?php echo $datam['nama']; ?></h3>
              <p class="text-muted text-center"><i class="fa fa-tag"></i> <?php echo $datam['kategori']; ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Harga</b> <a class="pull-right">Rp. <?php echo number_format($datam['harga']); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah Stok</b> <a class="pull-right">Sisa <?php echo $datam['stok']; ?> Barang</a>
                </li>
                <div class="text-center" style="margin-top: 20px">
                  <a href="../assets/delete.php?id_brg=<?php echo  $datam['id'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Data</a>
                </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#update" data-toggle="tab">Update Data</a></li>
            </ul>
              <div class="tab-pane" id="update">
                <form class="form-horizontal" action="../assets/edit_proses.php" method="post">
                  <div class="form-group">
                    <label for="inputId" class="col-sm-2 control-label">Id Barang</label>

                    <div class="col-sm-10">
                      <p class="form-control" disabled><?php echo $datam['id']; ?></p>
                      <input type="text" class="form-control hidden" id="inputId" value="<?php echo $datam['id']; ?>" name="id">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nama Barang</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNama" value="<?php echo $datam['nama']; ?>" name="nama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputHarga" class="col-sm-2 control-label">Harga</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" id="inputHarga" value="<?php echo $datam['harga']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStok" class="col-sm-2 control-label">stok</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" id="inputStok" value="<?php echo $datam['stok']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKategori" class="col-sm-2 control-label">Kategori</label>

                    <div class="col-sm-10">
                     <select name="kategori" required class="btn btn-default">
                      <option value="Jacket"
                      <?php if ($data[4] == 'Jacket') {
                        echo "selected";
                      } ?>
                      >Jaket </option>
                      <option value="Polo T-Shirt"
                      <?php if ($data[4] == 'Polo T-Shirt') {
                        echo "selected";
                      } ?>
                      >Polo T-Shirt</option>
                      <option value="T-Shirt"
                      <?php if ($data[4] == 'T-Shirt') {
                        echo "selected";
                      } ?>
                      >T-Shirt</option>
                      <option value="Accessories"
                      <?php if ($data[4] == 'Accessories') {
                        echo "selected";
                      } ?>
                      >Accessories</option>
                      <option value="Sticker"
                      <?php if ($data[4] == 'Sticker') {
                        echo "selected";
                      } ?>
                      >Sticker</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKeterangan" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="keterangan" id="inputKeterangan"><?php echo $datam['keterangan']; ?> </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="simpan_brg"><i class="fa fa-edit"></i>  Edit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
   <!--  <div class="pull-right hidden-xs">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <div class="pull-right">
     <strong>Copyright &copy; 2017 <a href="#">Kedai Merchandise Polinema</a></strong> All rights reserved.
   </div>
   Supported By : <a href="http://www.polinema.ac.id">Politeknik Negeri Malang</a>
 </footer>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.2.3 -->
 <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
   </body>
   </html>
