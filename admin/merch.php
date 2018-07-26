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
          Daftar Merchandise
          <small>Kedai Merchandise Polinema</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
          <li class="active">Daftar Merchandise</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <form action="" method="GET">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Insert Data</button>
              <select class="btn btn-primary btn-sm" name="filter" onchange="form.submit()">
                <option value="">Filter Barang</option>
                <?php 
                $filter = (isset($_GET['filter']))? strtolower($_GET['filter']) : NULL;
                ?>
                <option value="Jacket"
                <?php
                if ($filter == 'Jacket') {
                  echo "selected";
                }
                ?>>Jacket </option>
                <option value="Polo T-Shirt"<?php
                if ($filter == 'Polo T-Shirt') {
                  echo "selected";
                }
                ?>>Polo T-Shirt</option>
                <option value="T-Shirt"
                <?php
                if ($filter == 'T-Shirt') {
                  echo "selected";
                }
                ?>>T-Shirt</option>
                <option value="Accessories"
                <?php
                if ($filter == 'Accessories') {
                  echo "selected";
                }
                ?>>Accessories</option>
                <option value="Sticker"
                <?php
                if ($filter == 'Sticker') {
                  echo "selected";
                }
                ?>>Sticker</option>  
              </select>
            </form>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert Data</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="../assets/proses_insert.php" method="post" enctype="multipart/form-data">
                      <div class="form-group"><br>
                        <label class="col-sm-3 control-label">Nama Barang</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" placeholder="Nama Barang">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="harga" placeholder="Harga">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Stok</label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="stok" placeholder="Stok">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>

                        <div class="col-sm-8">
                          <select name="kategori" class="form-control">
                            <option value="">- Pilih Kategori -</option>
                            <option value="Jacket">Jacket </option>
                            <option value="Polo T-Shirt">Polo T-Shirt</option>
                            <option value="T-Shirt">T-Shirt</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Sticker">Sticker</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Foto</label>

                        <div class="col-sm-8">
                          <input type="file" name="foto">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan_merch" style="margin-right: 50px">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <?php if (isset($_GET['msg'])) {
              if ($_GET['msg'] == 'insert')
                {?>
              <div class="alert alert-success alert-sm">
                <p><i class="fa fa-check"></i> Data berhasil ditambahkan</p>
              </div>
              <?php
            }
            else if($_GET['msg'] == 'delete')
              {?>
            <div class="alert alert-success alert-sm">
              <p><i class="fa fa-check"></i> Data berhasil dihapus</p>
            </div>
            <?php
          }
          else if($_GET['msg'] == 'edit'){?>
          <div class="alert alert-success alert-sm">
            <p><i class="fa fa-check"></i> Data berhasil diedit</p>
          </div>
          <?php }} ?>
          <div class="box box-primary">
            <table class="table table-striped table-hover" >
             <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Kategori</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            <?php
            if (isset($_GET['filter'])) {
              $arrayData = $db->tampilData2('barang', 'kategori', $filter);
            }
            else if(isset($_GET['pencarian'])){
              $arrayData = $db->pencarian('barang', 'nama', $_GET['cari'] );
            }
            else{
              $arrayData = $db->tampilData('barang', 'nama');
            }

            if ($arrayData) {
              $no=1;
              foreach ($arrayData as $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href="merch_detail.php?id_brg=<?php echo  $data['id'] ?>"> <i  class="fa fa-caret-right"></i> <?php echo $data['nama']; ?></a></td>
                  <td>Rp. <?php echo number_format($data['harga']); ?></td>
                  <td><?php echo $data['stok']; ?></td>
                  <td><?php echo $data['kategori']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td>
                    <a href="merch_detail.php?id_brg=<?php echo  $data['id'] ?>" title="Lihat Data" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="merch_detail.php?id_brg=<?php echo  $data['id'] ?>#update" title="Edit Data" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="../assets/delete.php?id_brg=<?php echo  $data['id'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php $no++;} }?>
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
