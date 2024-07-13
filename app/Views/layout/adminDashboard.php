<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/summernote/summernote-bs4.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/dashboard" class="brand-link">
        <img src="<?php base_url() ?>/logo.png" height="50" />
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/avatar/default.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="/dashboard" class="d-block"><?= session('username'); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/dashboard" class="nav-link <?= in_array("dashboard", $menu) ? "active" : "" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengguna" class="nav-link <?= in_array("user", $menu) ? "active" : "" ?>">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Pengguna
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview <?= in_array("masterData", $menu) ? "menu-open" : "" ?>">
              <a class="nav-link <?= in_array("masterData", $menu) ? "active" : "" ?>">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/materi" class="nav-link <?= in_array("dataMateri", $menu) ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Materi</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?= in_array("transaksi", $menu) ? "menu-open" : "" ?>">
              <a class="nav-link <?= in_array("transaksi", $menu) ? "active" : "" ?>">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                  Managemen Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/transaksi" class="nav-link <?= in_array("dataTransaksi", $menu) ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Transaksi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/rekening" class="nav-link <?= in_array("dataRekening", $menu) ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Rekening</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/bukti_pembayaran" class="nav-link <?= in_array("buktiPembayaran", $menu) ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bukti Pembayaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="/logout" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>Sukses!</h5>
              <?= session()->getFlashdata('success') ?>
            </div>
          <?php endif; ?>
          <?php if (session()->getFlashdata('failed')) : ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i>Sukses!</h5>
              <?= session()->getFlashdata('failed') ?>
            </div>
          <?php endif; ?>
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>

  <!-- jQuery -->
  <script src="<?php base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php base_url() ?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?php base_url() ?>/template/plugins/select2/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="<?php base_url() ?>/template/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- ChartJS -->
  <!-- <script src="<?php base_url() ?>/template/plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="<?php base_url() ?>/template/plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="<?php base_url() ?>/template/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php base_url() ?>/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <script src="<?php base_url() ?>/template/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <!-- <script src="<?php base_url() ?>/template/plugins/moment/moment.min.js"></script>
  <script src="<?php base_url() ?>/template/plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php base_url() ?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <!-- <script src="<?php base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <script src="<?php base_url() ?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?php base_url() ?>/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php base_url() ?>/template/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php base_url() ?>/template/dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script>
    Fancybox.bind("[data-fancybox]", {
      ClickAction: false,
    });

    function preview() {
      const file = document.querySelector('input[type=file]').files[0];
      const preview = document.querySelector('#img-preview');

      const reader = new FileReader();
      reader.readAsDataURL(file);

      reader.addEventListener("load", function(e) {
        preview.src = e.target.result;
      });
    }
  </script>
  <script>
    function displayVideo(event) {
      const file = event.target.files[0];
      const videoPlayer = document.querySelector('video');
      const videoSource = document.querySelector('source');

      console.log(file);
      console.log(videoPlayer);
      console.log(videoSource);

      if (file) {
        const fileURL = URL.createObjectURL(file);
        videoSource.src = fileURL;
        videoPlayer.load();
      }
    }
  </script>
  <script>
    $(function() {
      $("#example1").DataTable();
      $('.select2').select2();
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>