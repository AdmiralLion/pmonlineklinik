
<?php
      $no_rmbaru = $pxbaru['no_rm'];
      $tgl_lahirbaru = $pxbaru['tgl_lahir'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran Online Klinik</title>

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
      padding: 0;
      font-family: sans-serif;
      background-color: #b2bec3;
    }
    /* a:hover {
      text-decoration: none!important;
    } */

    table {
      background-color: white;

    }

    td {
      padding:10px;
    }
    tr{
        height:30px;
    }
    .inline-flex {
      display: inline-flex !important;
      margin: .5em !important;
    }

   /* Base styles for button */
.pil_dokter {
    border: none;
    background-color: #2ecc71;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Ensure contents stay within the button */
    position: relative; /* Position for absolute child elements */
    width: 200px; /* Set a fixed width for consistent size */
    height: 300px; /* Set a fixed height for consistent size */
}

   /* Base styles for button */
   .pil_dokter2 {
    border: none;
    background-color: #95a5a6;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Ensure contents stay within the button */
    position: relative; /* Position for absolute child elements */
    width: 200px; /* Set a fixed width for consistent size */
    height: 300px; /* Set a fixed height for consistent size */
}

   /* Base styles for button */
   .pil_dokter3 {
    border: none;
    background-color: #e74c3c;
    color: white;
    padding: 15px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Ensure contents stay within the button */
    position: relative; /* Position for absolute child elements */
    width: 200px; /* Set a fixed width for consistent size */
    height: 300px; /* Set a fixed height for consistent size */
}

/* Style for button image */
.button-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 50%; /* Set height for the image section */
    overflow: hidden; /* Hide overflow content */
    border-radius: 10px 10px 0 0; /* Rounded corners only at the top */
}

.button-img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover; /* Ensure image covers the container */
    border-radius: 10px 10px 0 0; /* Rounded corners only at the top */
}

/* Style for button content */
.button-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60%; /* Set height for the content section */
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for text */
    padding: 10px;
    box-sizing: border-box;
    border-radius: 0 0 10px 10px; /* Rounded corners only at the bottom */
    transition: background-color 0.3s ease; /* Smooth transition effect */
}

/* Style for button text */
.button-text {
    color: white;
    font-weight: bold;
    font-size: 16px;
    line-height: 1.5;
    text-align: center;
}

/* Hover effect for button */
.pil_dokter:hover .button-content {
    background-color: rgba(0, 0, 0, 0.9); /* Darken background on hover */
}

/* Hover effect for button */
.pil_dokter2:hover .button-content {
    background-color: rgba(0, 0, 0, 0.9); /* Darken background on hover */
}

.pil_dokter3:hover .button-content {
    background-color: rgba(0, 0, 0, 0.9); /* Darken background on hover */
}

.tampung_result {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px; /* Adjust as needed for spacing between buttons */
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
            <!-- <form action="" method="POST"> -->
            <table style="width:80%; height:650px;" align="center">
            <tr style="height: 10px;">
              <td colspan="2" style="background-color: aquamarine; text-align:center; height:5px;">PENDAFTARAN PASIEN BARU</td>
            </tr>
            <tr>
              <td style="width:200px;">Masukkan No RM dan tgl Lahir : </td>
              <td>
                <div class="row">
                  <div class="col-md-4 mb-4">
                    <input style="width:100%;" type="text" class="form-control" name="no_rm" id="no_rm" value="<?= $no_rmbaru;?>" placeholder="Nomor RM" require>
                  </div>
                  <div class="col-md-4 mb-4">
                    <input type="date" style="width:200px;" class="form-control" value="<?= $tgl_lahirbaru;?>" name="tgl_lahir" id="tgl_lahir" require>
                  </div>
                  <div class="col-md-4 mb-4">
                    <button style="width:100%;" id="cek_rm" class="btn btn-info btn-icon">
                      <i class="fas fa-search"></i> &nbsp; Cari
                    </button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
              <div class="col-12 col-lg-8 offset-lg-2 col-xs-12 text-center">
                  <div class="tampung_result"></div>
              </div>
              </td>
            </tr>
            <a href="<?= base_url('landing');?>" class="float">
              <i class="fa fa-home my-float"></i>
            </a>
            </table>
            <!-- </form> -->
            <div class="simple-footer">
            Made with <i class="fas fa-heart" style="color: red;"></i> NAVINC TECHNOLOGY 2024
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="<?php echo base_url();?>assets/modules/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <script>
  <?php 
  echo $JavaScriptTambahan; 
  ?>
  </script>

</body>
</html>