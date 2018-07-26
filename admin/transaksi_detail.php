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

$idu = $_GET['id'];
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
      <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="cari" class="form-control" placeholder="Pencarian...">
          <span class="input-group-btn">
            <button type="submit" name="pencarian" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
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
        <li><a href="merch.php"><i class="fa fa-archive"></i> <span>Daftar Merchandise</span></a></li>
        <li class="active"><a href="transaksi.php"><i class="fa fa-cart-arrow-down"></i> <span>Transaksi</span></a></li>
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
        Transaksi
        <small>Kedai Merchandise Polinema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li class="active">Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <table class="table table-striped table-hoverr" >
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Barang</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Tanggal</th>
              </tr>
              <?php
              if (isset($_GET['filter'])) {
                $arrayData = $db->tampilDataTransbulan('transaksi', $filter);
              }
              else if(isset($_GET['pencarian'])){
                $arrayData = $db->pencarianTrans('transaksi', 'nim', $_GET['cari'] );
              }
              else{
                $arrayData = $db->tampilData2('transaksi', 'tanggal', $idu);
              }
              $no=1;
              if ($arrayData) {
                foreach ($arrayData as $data) {
                  $phpdate = strtotime($data['tanggal']);
                  $mysqldate = date('d M Y', $phpdate);
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                      <td>
                      <a href="user_profile.php?id_user=<?php echo  $data['nim'] ?>"><i class="fa fa-user"></i> <?php echo $data['nim']; ?></a>
                      </td>
                      <td>
                      <a href="merch_detail.php?id_brg=<?php echo  $data['id_merch'] ?>"><i class="fa fa-archive"></i> <?php echo $db->tampilNama('barang', 'id', $data['id_merch']); ?></a>
                      </td>
                      <td><?php echo $data['qty']; ?></td>
                      <td><?php echo $data['total']; ?></td>
                      <td><?php echo $mysqldate ?></td>
                      </tr>
                      <?php } }?>
                    </table>
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
