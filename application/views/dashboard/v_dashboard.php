
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DASHBOARD SATUSEHAT</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">

  <style>
    body {
      padding-right: 0px !important;
    }
    .bg-color{
      background-color: #bdc3c7 !important;
    }
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#0C9;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
    }

    .my-float{
        margin-top:22px;
    }

    .loader {
      background: rgba(255, 255, 255, 0.8); /* Change background color and set some transparency */
      bottom: 0;
      left: 0;
      overflow: hidden;
      position: fixed;
      right: 0;
      top: 0;
      z-index: 999;
    }

    .loader-inner {
      bottom: 0;
      height: 60px;
      left: 0;
      margin: auto;
      position: absolute;
      right: 0;
      top: 0;
      width: 100px;
    }

    .loader-line-wrap {
      animation: spin 2000ms cubic-bezier(.175, .885, .32, 1.275) infinite;
      box-sizing: border-box;
      height: 50px;
      left: 0;
      overflow: hidden;
      position: absolute;
      top: 0;
      transform-origin: 50% 100%;
      width: 100px;
    }
  .loader-line {
      border: 4px solid transparent;
      border-radius: 100%;
      box-sizing: border-box;
      height: 100px;
      left: 0;
      margin: 0 auto;
      position: absolute;
      right: 0;
      top: 0;
      width: 100px;
  }
  .loader-line-wrap:nth-child(1) { animation-delay: -50ms; }
  .loader-line-wrap:nth-child(2) { animation-delay: -100ms; }
  .loader-line-wrap:nth-child(3) { animation-delay: -150ms; }
  .loader-line-wrap:nth-child(4) { animation-delay: -200ms; }
  .loader-line-wrap:nth-child(5) { animation-delay: -250ms; }

  .loader-line-wrap:nth-child(1) .loader-line {
      border-color: hsl(0, 80%, 60%);
      height: 90px;
      width: 90px;
      top: 7px;
  }
  .loader-line-wrap:nth-child(2) .loader-line {
      border-color: hsl(60, 80%, 60%);
      height: 76px;
      width: 76px;
      top: 14px;
  }
  .loader-line-wrap:nth-child(3) .loader-line {
      border-color: hsl(120, 80%, 60%);
      height: 62px;
      width: 62px;
      top: 21px;
  }
  .loader-line-wrap:nth-child(4) .loader-line {
      border-color: hsl(180, 80%, 60%);
      height: 48px;
      width: 48px;
      top: 28px;
  }
  .loader-line-wrap:nth-child(5) .loader-line {
      border-color: hsl(240, 80%, 60%);
      height: 34px;
      width: 34px;
      top: 35px;
  }

  @keyframes spin {
      0%, 15% {
      transform: rotate(0);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  </style>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url();?>page">SATU SEHAT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <a href="#" class="nav-link has-dropdown"><img src="<?php echo base_url();?>assets/img/satusehat.jpg" alt="logo" width="40" class="shadow-light rounded-circle"></a>
          
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>API STATUS</span></a>
            </li>
            <li class="menu-header">Send API</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-solid fa-stethoscope"></i> <span>Modul Pelayanan Rawat Jalan</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>page/rajal1">Rawat Jalan Jilid 1</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>page/rajal2">Rawat Jalan Jilid 2</a></li>
              </ul>
            </li>

          <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-solid fa-hospital"></i> <span>Modul Pelayanan IGD</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>page/igd1">Pelayanan IGD Fase 1</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>page/igd2">Pelayanan IGD Fase 2</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-solid fa-bed"></i> <span>Modul Pelayanan Rawat Inap</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>page/ranap1">Rawat Inap Fase 1</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>page/ranap2">Rawat Inap Fase 2</a></li>
              </ul>
            </li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>        </aside>
      </div>


    </div>
  </div>


  <!-- General JS Scripts -->
  <script src="<?php echo base_url();?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url();?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url();?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url();?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/sweetalert/sweetalert.min.js"></script>


  <!-- Page Specific JS File -->
  <script src="<?php echo base_url();?>assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>
</body>
</html>