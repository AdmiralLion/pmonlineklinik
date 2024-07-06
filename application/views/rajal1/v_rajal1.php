<?php echo $sidebar; ?>
      <!-- Main Content -->

<div class="main-content">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                  </div>
                  <div class="card-body">
                  <div class="loader">
                                  <div class="loader-inner">
                                    <div class="loader-line-wrap">
                                      <div class="loader-line"></div>
                                    </div>
                                    <div class="loader-line-wrap">
                                      <div class="loader-line"></div>
                                    </div>
                                    <div class="loader-line-wrap">
                                      <div class="loader-line"></div>
                                    </div>
                                    <div class="loader-line-wrap">
                                      <div class="loader-line"></div>
                                    </div>
                                    <div class="loader-line-wrap">
                                      <div class="loader-line"></div>
                                    </div>
                                  </div>
                                </div>
                    <br>
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <div class="input-group" style="width:auto;">
                        <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                        <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
                        <button class="btn btn-icon btn-success" id="btn_search"><i class="fas fa-search"></i></button>
                        </div>
                        <br>
                    </div>
                    <!-- <table>
                      <tbody id="tes">
                        <tr>
                          <td>
                          <button class="btn btn-icon icon-left btn-info" id="kirim_bundle2" data="631744" data_tglact="2024-01-21 08:18:03" data_tglpulang="null" data_nama_dokter="dr. ROXANTIN UTAMI, Sp.S" data_nik_dokter="3578086210720001" data_nama_px="BICHE NUR AISYAH" data_nik_px="3578195202630001" data_unit_ihs="ffcaf308-807b-47a2-ae1f-706c5fa3b234" data_nama_unit="Poli Spesialis Saraf"><i class="fas fa-upload"></i> Bundle</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <a href="tes_kirim2" class="btn btn-icon icon-left btn-info">kir</a> -->
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table_2">
                        <thead>
                          <tr>
                            <th class="text-center" style="width:20px; text-align:center;">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th style="width:20px; text-align:center;">No RM</th>
                            <th style="width:30px; text-align:center;">Nama</th>
                            <th style="width:20px; text-align:center;">Tgl Kunjungan</th>
                            <th style="width:20px; text-align:center;">Poli</th>
                            <th style="width:20px; text-align:center;">Encounter</th>
                            <th style="width:20px; text-align:center;">Condition</th>
                            <th style="width:20px; text-align:center;">Observation</th>
                            <th style="width:20px; text-align:center;">Procedure</th>
                            <th style="width:20px; text-align:center;">Composition</th>
                            <th style="width:20px; text-align:center;">Medication</th>
                            <th style="width:20px; text-align:center;">Bundle</th>
                          </tr>
                        </thead>
                        <tbody id="rajal_kunj">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
<script>
<?php echo $JavaScriptTambahan; ?>
</script>
<?php echo $footer; ?>