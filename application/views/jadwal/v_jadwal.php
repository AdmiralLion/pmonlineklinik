<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran Online Klinik</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <style>
    body {
  padding: 0;
  font-family: yekan;
  background-color: #b2bec3;
  text-align: right;
    }
    a:hover {
      text-decoration: none!important;
    }
    .dedcription-btn {
      width: 100%;
      height: 100px;
      position: relative;
      display: inline-block;
      border-radius: 30px;
      background-color: #fcfcfc;
      color: #ffa000;
      text-align: center;
      font-size: 18px;
      padding: 9px 0;
      transition: all 0.3s;
      padding-right: 40px;
      margin: 20px 5px;
      box-shadow: 0 3px 20px 0 rgba(0, 0, 0, 0.06);
    }
    .dedcription-btn .btn-icon {
      background-color: #ffa000;
      width: 92px;
      height: 100px;
      float: right;
      position: absolute;
      border-radius: 30px 30px 30px 0;;
      right: 0px;
      top: 0px;
      font-size: 18px;
      transition: all 0.3s;
    }
    .name-descripeion {
      font-family: sans-serif;
      position: relative;
      width: 100%;
      z-index: 9999;
    }
    .btn-icon::after {
      content: "";
      width: 0;
      height: 0;
      border-top: 45px solid #fcfcfc;
      border-right: 40px solid transparent;
      position: absolute;
      top: 0px;
      left: 0px;
      font-size: 18px;
    }
    .dedcription-btn:hover .btn-icon {
      width: 100%;
      border-radius: 30px;
    }
    .dedcription-btn:hover .btn-icon::after {
      display: none;
      opacity: 0.1;
    }
    .btn-icon i {
      position: absolute;
      right: 25px;
      top: 15px;
      color: #fff;
      font-size: 40px;
      top: 30%;
    }
    .dedcription-btn:hover {
      color: #fff!important;
    }
    .heart {
      background-color: #ff586b!important;
    }
    .book {
      background-color: #00b7c4!important;
    }
    .brain {
      background-color: #8bc34a!important;
    }
    .hover-box {
      display: flex;
      width: 100%;
      height: 100vh;
      justify-content: center;
      align-items: center;
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
    <section class="section">
      <div class="container mt-5">
        <div class="row">            
          <div class="container">
            <div class="container">
              <div class="col-md-12 mb-4">
                <table style="width:100%">
                  <tr>
                    <td style="text-align:center; font-size: 30px;"><img style="width:10%;  height: auto;" src="<?= base_url('assets/img/logo-rs.jpg');?>" alt="logo-rs"> <span class="name-descripeion">PLACEHOLDER NAMA KLIEN </span></td>
                    <!-- <td style="width:100px;"></td> -->
                  </tr>
                </table>
              </div>
            </div><br>
            <div class="hover-box">
              <div class="row">
                <?php
                  foreach($result as $row): 
                  if($row -> indikator_jadwal == 'Tidak libur'){ ?>
                    <div class="col-sm-12 col-md-6">
                      <a class="dedcription-btn" href="#">
                        <span class="name-descripeion"><?= $row -> nama_dokter;?></span><br>
                        <span class="name-descripeion"><?= $row -> nama_unit;?></span><br>
                        <span class="name-descripeion"><?= $row -> jam_mulai;?> - <?= $row -> jam_selesai;?></span><br>
                      <div class="btn-icon book">
                        <i class="fas fa-user-plus"></i>              </div>
                      </a>
                    </div>
                  <?php }else{ ?>
                    <div class="col-sm-12 col-md-6">
                    <a class="dedcription-btn" href="#">
                      <span class="name-descripeion"><?= $row -> nama_dokter;?></span><br>
                      <span class="name-descripeion"><?= $row -> nama_unit;?></span><br>
                      <span class="name-descripeion">TIDAK PRAKTEK</span><br>
                    <div class="btn-icon book">
                      <i class="fas fa-user-plus"></i>              </div>
                    </a>
                  </div>
                
                <?php }
                endforeach; ?>
                  </div>
            </div>
            <a href="<?= base_url('landing');?>" class="float">
              <i class="fa fa-home my-float"></i>
            </a>
            <div class="simple-footer">
            Made with <i class="fas fa-heart" style="color: red;"></i> NAVINC TECHNOLOGY 2024
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
  <?php echo $JavaScriptTambahan; ?>
  </script>

</body>
</html>