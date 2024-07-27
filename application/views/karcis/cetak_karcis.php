<?php
  header('Content-Type: text/html; charset=utf-8');

  header("Cache-Control: max-age=300, must-revalidate"); 

  $date_now = gmdate('d/m/Y - H:i:s',mktime(date('H')+7));
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bukti Reservasi</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
	
  </head>
  <body onload="popup()">
  <?php 
  foreach ($result as $row):
    $tgl_act_pel = $row -> tgl_act_pel;
    $tujuan = $row -> tujuan;
    $no_antrian = $row -> no_antrian;
    $kunjungan = $row -> kunjungan;
    $kso_id = $row ->kso_id;
    $no_rm = $row -> no_rm;
    $pasien = $row -> pasien;
    $sex = $row -> sex;
    $tgl = $row -> tgl;
    $alamat = $row ->alamat;
    $dokter = $row -> dokter;
    $nm_user = $row -> nm_user;
    $asal = $row -> asal;
    $rujukan = $row -> rujukan;
    $unit_id = $row -> unit_id;
  endforeach;
if($kso_id == '1'){
  $kso = 'UMUM';
}else if($kso_id == '338'){
  $kso = 'BPJS';
}
  ?>
  
    <table cellpadding="2" cellspacing="1" style="padding-right:5px; font-size:12px; border:2px solid; width:7cm; height:10cm;">
        <tr>
            <td colspan="4" style="text-transform:uppercase; font-size:16px; padding-bottom:10px; text-decoration:underline;" align="center">
        Pendaftaran Online <br>  dr.Diana Anggarani Sukotjo, Sp A 
      </td>
        </tr>
    <tr>
      <td width="65">Tanggal</td>
      <td width="5">:</td>
      <td width="170" colspan="2"><?=$tgl_act_pel?></td>
    </tr>
    <tr>
      <td>Tujuan</td>
      <td>:</td>
      <td width="170" colspan="2"><?=$tujuan?></td>
    </tr>
    <tr>
      <td>No. Antrian</td>
      <td>:</td>
      <td width="55"><?=$no_antrian?></td>
      <td width="110">Kunjungan : <?=$kunjungan?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td width="170" colspan="2"><?=ucwords(strtolower($kso))?></td>
    </tr>
    <tr>
      <td colspan="4" style="font-weight:bold; font-size:17px; text-transform:uppercase;" align="center"><?=$no_rm?></td>
    </tr>
    <tr>
      <td colspan="4" style="font-weight:bold;"><?=$pasien.'  [ '.$sex.' ]  '.strtolower($tgl)?></td>
    </tr>
    <tr>
      <td colspan="4" style="font-weight:bold;"><?=$alamat?></td>
    </tr>
    <tr>
      <td valign="top">Dokter</td>
      <td valign="top">:</td>
      <td width="170" colspan="2"><?=$dokter?></td>
    </tr>
    <!-- <tr>
      <td valign="top">User</td>
      <td valign="top">:</td>
      <td width="170" colspan="2"><?=$nm_user?></td>
    </tr> -->
    <tr>
      <td style="font-size:9px;"><?=$asal?></td>
      <td style="font-size:9px;">:</td>
      <td width="170" colspan="2" style="font-size:9px;"><?=$rujukan?></td>
    </tr>
    <tr>
      <td style="font-size:9px;">* Dicetak tanggal</td>
      <td style="font-size:9px;">:</td>
      <td width="170" colspan="2" style="font-size:9px;"><?=$date_now?></td>
    </tr>
    <tr>
      <td colspan="4" style="font-size:9px;"><hr style="border:1px solid #000;"></td>
        </tr>
          <tr>
            <td colspan="4" style="font-weight:bold; text-align:center;">Verifikasi Berkas / Pembayaran</td>
        </tr>
          <tr>
            <td colspan="4" style="font-weight:bold; text-align:center; line-height:50px; vertical-align:bottom;">(...............................................)</td>
        </tr>
    <tr>
      <td colspan="4" style="font-size:8px;"><hr style="border:1px solid #000;"></td>
    </tr>
    <?php
      if ($kso_id == 1)
      {
        echo "<tr>
            <td colspan='4' align='center' style='font-size:20px; padding-bottom:10px'>SILAHKAN MENUJU<br>KE KASIR</td>
            </tr>";
      }
      else if ($kso_id== 338)
      {
    ?>  
      <tr>
        <td style="font-size:13px;">NRM</td>
        <td style="font-size:13px;">:</td>
        <td colspan="2" style="font-size:14px;"><b><?php echo $no_rm; ?></b></td>
      </tr>
      <tr>
        <td style="font-size:13px;">Nama</td>
        <td style="font-size:13px;">:</td>
        <td colspan="2" style="font-size:14px;"><b><?php echo $pasien; ?></b></td>
      </tr>
      <tr>
        <td style="font-size:13px;">No. Antrian</td>
        <td style="font-size:13px;">:</td>
        <td colspan="2" style="font-size:14px;"><b><?php echo $no_antrian; ?></b></td>
      </tr>
      <tr>
        <td style="font-size:13px;">Debitur</td>
        <td style="font-size:13px;">:</td>
        <td colspan="2" style="font-size:14px;"><b><?php echo $kso; ?></b></td>
      </tr>
      <tr>
        <td style="font-size:13px;">Dokter</td>
        <td style="font-size:13px;">:</td>
        <td colspan="2" style="font-size:14px; padding-bottom:15px;"><b><?php echo $dokter; ?></b></td>
      </tr>
    <?php
      }
     ?>
    <tr>
      <td colspan="4" style="font-size:10px; text-align:center;  vertical-align:bottom;" >
     * Tunjukkan Bukti ini kepada petugas <br> sebagai bukti pendaftaran </td>
    </tr>
    </table>
  </body>
  
</html>
<?php  
#header tanpa parameter langsung ke antri/tunggu
header("refresh:15;url=". base_url('landing'));
?>
<script type="text/JavaScript">      
  window.load = print_d();  
  function print_d(){  
    window.print();  
  }
</script>
