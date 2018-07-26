<?php
session_start();
include_once '../assets/Library.php';
$db = new Library();

if (empty($_SESSION['user'])) {
  header('location: ../login.php');
}

$id = $_SESSION['user'];
$getId = $db->getId($id, 'user', 'nim');
$data = mysqli_fetch_array($getId);


if (isset($_GET['no'])) {
  $no = $_GET['no'];
  $x = 1;
  while ( $x <= $no) {
   $nim = $data['nim'][$no];
   $id_merch = $data['id_merch'][$no];
   $qty = $data['qty'][$no];
   $total = $data['total'][$no];
   $tanggal = date("Y-m-d");

   $insertTransaksi = $db->insertTransaksi($nim, $id_merch, $qty, $total, $tanggal);
   $x++;
 }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User - Kedai Merchandise Polinema</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue-light.min.css">
  <link rel="stylesheet" type="text/css"  href="../dist/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css"  href="../dist/css/owl.theme.css">
  <link rel="stylesheet" type="text/css"  href="../dist/css/owl.transitions.css">
</head>
<body class="hold-transition skin-blue-light sidebar-mini fixed">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../images/kmp-cart.png" alt="Kedai Merchandise Polinema" width="25px"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Kedai</b>Merchandise</span>
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
                            <img src="../images/user/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">
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
                    <img src="../images/user/<?php echo $data['foto']; ?>" class="user-image" alt="<?php echo $data['nama']; ?>">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?php echo $data['nama']; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="../images/user/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">

                      <p>
                        <?php echo $data['nama']; ?> - Mahasiswa
                        <small>Kedai Merchandise Polinema</small>
                      </p>
                    </li>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php?id=<?php echo $data['nim']; ?>" class="btn btn-default btn-flat">Profile</a>
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
              <img src="../images/user/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['nama']; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $data['nama']; ?></p>
              <!-- Status -->
              <small><i class="fa fa-user"></i> Mahasiswa</small>
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
            <li><a href="index.php"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-archive"></i> <span>Merchandise</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="aksesoris.php"><i class="fa fa-circle-o"></i> Aksesoris</a></li>
                <li><a href="jaket.php"><i class="fa fa-circle-o"></i> Jaket</a></li>
                <li><a href="polo.php"><i class="fa fa-circle-o"></i> Polo T-Shirt</a></li>
                <li><a href="stiker.php"><i class="fa fa-circle-o"></i> Stiker</a></li>
                <li><a href="tshirt.php"><i class="fa fa-circle-o"></i> T-Shirt</a></li>
              </ul>
            </li>
            <li class="active"><a href="detail_keranjang.php"><i class="fa fa-shopping-cart"></i> <span>Keranjang</span></a></li>
            <li><a href="tentang.php"><i class="fa fa-info-circle"></i> <span>Tentang</span></a></li>
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
            <i class="fa fa-shopping-cart"></i> Keranjang
            <small>Kedai Merchandise Polinema</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Beranda </a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-primary">
            <div class="box-body">
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
 <!-- <script src="../dist/js/jquery.min.js"></script> -->
 <script src="../dist/js/owl.carousel.js"></script>
 <script type="text/javascript">
  $(document).ready(function() {

    var header = $("#header");
    var list_item = $("#list-item")

    header.owlCarousel({
      // navigation : true,
      singleItem : true,
      transitionStyle : "fade",
      autoPlay :6000
    });

    list_item.owlCarousel({

      itemsCustom : [
      [0, 2],
      [450, 3],
      [600, 4],
      [700, 4],
      [1000, 5],
      [1200, 5],
      [1400, 13],
      [1600, 15]
      ],
      navigation : true

    });

  });
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
   </body>
   </html>
