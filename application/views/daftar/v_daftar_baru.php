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
      font-family: sans-serif;
      background-color: #b2bec3;
    }
    a:hover {
      text-decoration: none!important;
    }

    table {
      background-color: white;

    }

    td {
      padding:10px;
    }
    tr{
        height:30px;
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
            <!-- <form id="send_pxbaru" method="POST"> -->
            <table style="width:80%; height:650px;" align="center">
            <tr>
              <td colspan="6" style="background-color: aquamarine; text-align:center;">PENDAFTARAN PASIEN BARU</td>
            </tr>
                <tr>
                    <td style="width:100px;">Nama Lengkap : </td>
                    <td style="width:25%;"> <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"></td>
                </tr>
                <tr>
                    <td style="width:80px;">No KTP : </td>
                    <td style="width:180px;"> <input class="form-control" type="text" name="no_ktp" id="no_ktp"  placeholder="Nomor KTP"></td>
                </tr>
                <tr>
                    <td style="width:100px;">Nama Orang tua : </td>
                    <td style="width:25%;"> <input class="form-control" type="text" name="nama_ortu" id="nama_ortu" placeholder="Nama Ortu"></td>
                </tr>
                <tr>
                    <td style="width:100px;">Jenis Kelamin : </td>
                    <td style="width:150px;"> 
                    <select class="form-control" name="jenis_kel" id="jenis_kel">
                      <option value="">-- Pilih --</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    </td>                
                </tr>
                <tr>
                    <td style="width:100px;">Agama : </td>
                    <td style="width:25%;">
                      <select class="form-control" name="agama" id="agama">
                        <option value="">-- Pilih --</option>
                        <?php 
                        foreach($list_agama as $row): ?>
                        <option value="<?= $row -> id;?>"><?= $row -> nama;?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>      
                </tr>
                <tr>
                    <td style="width:100px;">Golongan Darah : </td>
                    <td style="width:150px;"> 
                      <input class="form-control" type="text" name="goldar" id="goldar" placeholder="Golongan Darah">
                    </td>    
                </tr>
                <tr>
                    <td style="width:100px;">Status Menikah : </td>
                    <td style="width:25%;">
                      <select class="form-control" name="status_menikah" id="status_menikah">
                        <option value="">-- Pilih --</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                        <option value="Lain - Lain">Lain - Lain</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td style="width:100px;">No BPJS : </td>
                    <td style="width:150px;"> 
                      <input class="form-control" type="text" name="no_bpjs" id="no_bpjs" placeholder="Nomor Keanggotaan BPJS">
                    </td>        
                </tr>
                <tr>
                    <td style="width:100px;">No Handphone : </td>
                    <td style="width:150px;"> 
                      <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="Nomor Telefon / HP">
                    </td>        
                </tr>
                <tr>
                    <td style="width:100px;">Tanggal Lahir : </td>
                    <td style="width:150px;"> 
                      <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" >
                    </td>          
                </tr>
                <tr>
                    <td style="width:100px;">Pendidikan Terakhir : </td>
                    <td style="width:150px;"> 
                      <select class="form-control" name="pend_terakhir" id="pend_terakhir">
                        <option value="">-- Pilih --</option>
                        <?php 
                        foreach($list_pendidikan as $row): ?>
                        <option value="<?= $row -> id;?>"><?= $row -> nama;?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>  
                </tr>
                <tr>
                    <td style="width:100px;">Pekerjaan : </td>
                    <td style="width:100%;">
                      <select class="form-control" name="pekerjaan" id="pekerjaan">
                        <option value="">-- Pilih --</option>
                        <?php 
                        foreach($list_pekerjaan as $row): ?>
                        <option value="<?= $row -> id;?>"><?= $row -> nama;?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>             
                </tr>
                <tr>
                    <td style="width:100px;">Alamat Asli KTP : </td>
                    <td style="width:100%;">
                      <input class="form-control" type="text" name="alamat_ktp" id="alamat_ktp" placeholder="Alamat Asli">
                    </td>
                </tr>
                <tr>
                    <td style="width:100px;">Alamat Domisili : </td>
                    <td style="width:100%;">
                      <div class="row">
                      <div class="col-md-2 mb-3">
                      <input class="form-control" type="text" name="alamat_rt" id="alamat_rt" placeholder="RT">
                      </div>
                      <div class="col-md-2 mb-3">
                      <input class="form-control" type="text" name="alamat_rw" id="alamat_rw" placeholder="RW">
                      </div>
                      <div class="col-md-4 mb-3"><input class="form-control" type="text" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat Domisili"></div>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td style="width:100px;">Provinsi</td>
                  <td style="width:100%;">
                      <select style="padding:10px;" class="form-control" name="provinsi" id="provinsi">
                      </select>
                    </td>  
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                    <select style="padding:10px;" class="form-control" name="kota" id="kota">
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                    <select style="padding:10px;" class="form-control" name="kecamatan" id="kecamatan">
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                    <select style="padding:10px;" class="form-control" name="desa" id="desa">
                      </select>
                    </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <table style="width:100%">
                      <tr>
                        <td style="width:50%; text-align:center"> <button id="simpan" type="submit" class="btn btn-success btn-icon"><i class="fas fa-save"></i> Simpan </button></td>
                        <td style="width:50%; text-align:center"> <button id="reset" class="btn btn-info btn-icon"><i class="fas fa-history"></i> Reset </button></td>
                      </tr>
                    </table>
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
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  <script src="<?php echo base_url();?>assets/modules/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
  <?php 
  echo $JavaScriptTambahan; 
  ?>
  </script>
  <script>
  $(document).ready(function() {
      // Fetch wilayah data from backend (replace with your actual data retrieval method)
      var wilayahData = <?php echo json_encode($list_wilayah); ?>; // This should be your actual PHP array/object

      // console.log(wilayahData);
      // Function to populate provinsi options on page load
      // Function to populate select options based on parent ID and parent Kode
  function populateOptions(parentId, parentKode, level, targetSelect) {
    var options = '<option value="">-- Pilih --</option>';
    for (var i = 0; i < wilayahData.length; i++) {
      if (wilayahData[i].parent_id === parentId && wilayahData[i].level === level && wilayahData[i].parent_kode === parentKode) {
        options += '<option value="' + wilayahData[i].id_wil + '">' + wilayahData[i].nama + '</option>';
      }
    }
    $(targetSelect).html(options);
  }

  // Function to populate provinsi options on page load
      function populateProvinsiOptions() {
        var options = '<option value="">-- Provinsi --</option>';
        // var t = 0;
        for (var i = 0; i < wilayahData.length; i++) {
          // t++;
          if (wilayahData[i].level === '1') {
            options += '<option value="' + wilayahData[i].id_wil + '">' + wilayahData[i].nama + '</option>';
          }
        }
        $('#provinsi').html(options);
      }

      // Call function to populate provinsi options on page load
      populateProvinsiOptions();

      // Event listener for provinsi change
      $('#provinsi').change(function() {
        var provinsiId = $(this).val();
        var provData = wilayahData.find(function(item) {
          return item.id_wil == provinsiId;
        });
        populateOptions(provinsiId, provData.kode, '2', '#kota'); // Populate kota options
        // $('#kota').html('<option value="">-- Kota --</option>'); // Reset kecamatan options
        $('#kecamatan').html('<option value="">-- Kecamatan --</option>'); // Reset kecamatan options
        $('#desa').html('<option value="">-- Desa --</option>'); // Reset desa options
      });

      // Event listener for kota change
      $('#kota').change(function() {
        var kotaId = $(this).val();
        var kotaData = wilayahData.find(function(item) {
          return item.id_wil == kotaId;
        });
        populateOptions(kotaId, kotaData.kode, '3', '#kecamatan'); // Populate kecamatan options
        $('#desa').html('<option value="">-- Desa --</option>'); // Reset desa options
      });

      // Event listener for kecamatan change
      $('#kecamatan').change(function() {
        var kecamatanId = $(this).val();
        var kecamatanData = wilayahData.find(function(item) {
          return item.id_wil == kecamatanId;
        });
        populateOptions(kecamatanId, kecamatanData.kode, '4', '#desa'); // Populate desa options
      });
    });
  </script>

</body>
</html>