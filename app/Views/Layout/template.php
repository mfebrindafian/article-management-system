<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('/plugins/fontawesome-free/css/all.min.css') ?>" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.min.css') ?>" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('/plugins/toastr/toastr.min.css') ?>" />
  <!-- datatables -->
  <link rel="stylesheet" href="<?= base_url('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">


  <!-- custom css -->
  <link rel=" stylesheet" href="<?= base_url('/css/custom.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/css/trix.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/css/viewer.min.css') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?= base_url('/images/bps.png') ?>">
  <title><?= $title; ?></title>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container px-0">
        <!-- Brand Logo -->
        <a href="<?= base_url('/dashboard') ?>" class="ml-0 brand-link d-flex justify-content-center align-content-center" style="border: none">
          <span class="brand-text font-weight-light ml-0"><img src="<?= base_url('images/BPS.png') ?>" alt="Logo BPS" style="width: 40px;" /></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <?php $list_menu = session('list_menu') ?>
            <?php $angle = '#' ?>
            <?php $list_submenu = session('list_submenu') ?>
            <?php foreach ($list_menu as $list) : ?>
              <?php if ($list['is_active'] == 'Y' && $list['view_level'] == 'Y') : ?>
                <?php foreach ($list_submenu as $sub) {
                  if ($sub['menu_id'] == $list['id'])
                    $angle = 'right fas fa-angle-left';
                }  ?>
                <?php if ($angle == '#') : ?>
                  <li class="nav-item <?= ($menu == $list['nama_menu']) ? 'active' : '' ?>">
                    <a href="<?= base_url($list['link']); ?>" class="nav-link">
                      <?= $list['nama_menu']; ?>
                    </a>
                  </li>
                <?php else : ?>

                  <li class="nav-item dropdown <?= ($menu == $list['nama_menu']) ? 'active' : '' ?>">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= $list['nama_menu']; ?></a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <?php foreach ($list_submenu as $sub) : ?>
                        <?php if (($sub['menu_id'] == $list['id']) && $sub['is_active'] == 'Y' && $sub['view_level'] == 'Y') :  ?>
                          <li><a href="<?= base_url($sub['link']); ?>" class="dropdown-item"><?= $sub['nama_submenu']; ?></a></li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Profile Dropdown Menu -->
          <li class="nav-item dropdown">

            <a href="#" class="nav-link" data-toggle="dropdown"><?= session('fullname'); ?><i class="right fas fa-angle-down" style="margin-left: 10px"></i> </a>

            <div class="dropdown-menu dropdown-menu-md">
              <a href="<?= base_url('/profile') ?>" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <?php $list_level = session('list_user_level') ?>
              <?php foreach ($list_level as $list) : ?>
                <form action="<?= base_url('/switchLevel') ?>" method="POST">
                  <input type="text" name="id" id="id" value="<?= $list['level_id']; ?>" class="d-none">
                  <button type="submit" class="dropdown-item roles <?= ($list['level_id'] == session('level_id')) ? 'aktif' : '' ?>"><?= $list['nama_level']; ?></button>
                </form>
              <?php endforeach; ?>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('/logout') ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->




    <!-- jQuery -->
    <script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>


    <!-- RENDER DARI HALAMAN LAIN -->

    <?= $this->renderSection('content'); ?>
    <footer class="main-footer d-none">
      <strong>Copyright &copy; Magang 2022. </strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Powered by</b> <a target="_blank" href="https://adminlte.io">AdminLTE.io</a>
      </div>
    </footer>
  </div>

  <div id="loader" class="w-100 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="book">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <script>
    function ready() {
      var $loader = $('#loader');
      $('#loader').addClass('fadeout')
      setTimeout(function() {
        $loader.remove();
      }, 300);

      var $content = $('.content-wrapper');
      $('.content-wrapper').addClass('fadein')
      setTimeout(function() {
        $content.removeClass('d-none');
      }, 300);

      var $footer = $('.main-footer');
      $('.main-footer').addClass('fadein')
      setTimeout(function() {
        $footer.removeClass('d-none');
      }, 300);
    }
    $(document).ready(function() {
      ready()
    })
  </script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url('/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('/dist/js/adminlte.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
</body>

</html>