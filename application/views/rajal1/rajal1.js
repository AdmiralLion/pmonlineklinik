$(document).ready(function() {
    
    $('#login').on('click', function() {
        alert('test');
    })

    // $('#btn_search').click(function(){
    //     dataTable.draw();
    //  });

    "use strict";

    // $("[data-checkboxes]").each(function() {
    //     var me = $(this),
    //       group = me.data('checkboxes'),
    //       role = me.data('checkbox-role');
      
    //     me.change(function() {
    //       var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
    //         checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
    //         dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
    //         total = all.length,
    //         checked_length = checked.length;
      
    //       if(role == 'dad') {
    //         if(me.is(':checked')) {
    //           all.prop('checked', true);
    //         }else{
    //           all.prop('checked', false);
    //         }
    //       }else{
    //         if(checked_length >= total) {
    //           dad.prop('checked', true);
    //         }else{
    //           dad.prop('checked', false);
    //         }
    //       }
    //     });
    //   });
    var $loading = $('.loader').hide();
    $(document).ajaxStart(function () {
      $loading.show();
    });
    
    $(document).ajaxStop(function () {
      $loading.hide();
    });

    $('#table_2').DataTable({
        "columns": [
            { "orderable": false, "searchable": false }, // Checkbox column
            { "data": "no_rm" },
            { "data": "nama" },
            { "data": "tgl" },
            { "data": "poli" },
            { "data": "encounter" },
            { "data": "condition" },
            { "data": "observasi" },
            { "data": "composition" },
            { "data": "procedure" },
            { "data": "medication" },
            { "data": "bundle" }
        ],
        "paging": true, // Enable pagination
    });
    
    $('#btn_search').on('click', function() {
        var tgl_mulai = $('#search_fromdate').val();
        var tgl_selesai = $('#search_todate').val();
        var table = $('#table_2').DataTable();
        table.destroy();
        $.ajax({
            type: 'POST',
            url: "../page/getkunj",//dilanjut besok
            data: {
                tgl_mulai:tgl_mulai,
                tgl_selesai: tgl_selesai,
            },
            cache:false,
            success : function(data){
                console.log(data);
                var data3 = $.parseJSON(data);
                var html;
                var n =0;
                var loop =0;
                console.log(data3);
              $.each(data3.kunjungan, function(index, kunjungan) {
                n++;
                var kunjungan_id = kunjungan.id;
                var pelayanan_id = kunjungan.pelayanan_id;
                var tgl_act = kunjungan.tgl_act;
                var tgl_pulang = kunjungan.tgl_pulang;
                var nama_dokter = kunjungan.nama_dokter;
                var nik_dokter = kunjungan.nik_dokter;
                var nama_px = kunjungan.nama_px;
                var nik_px = kunjungan.no_ktp;
                var unit_ihs = kunjungan.ihs_id;
                var nama_unit = kunjungan.nama_unit;
                // console.log('Kunjungan ID:', kunjungan_id);
                var kunjungan_encounter = data3.cekencounter[index];
                var diagnosa = data3.diagnosa[index];
               
                var diagnosa_condition = data3.cekcondition[index];
                var observasi_status = data3.cekobservation[index];
                var procedure_status = data3.cekprocedure[index];
                var composition_status = data3.cekcomposition[index];
                var medication_status = data3.cekmedication[index];
                var observasi = data3.observasi[index];
                var procedure = data3.procedure[index];
                var composition = data3.composition[index];
                var medication = data3.medication[index];
                

                // var btn_medication = '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Medication </button></td>';
                // var btn_composition = '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Composition </button></td>';
                

                console.log('Kunjungan:', kunjungan);
                // console.log('kunjungan_encounter:', kunjungan_encounter);
                console.log('Diagnosa:', diagnosa);
                console.log('observasi:', observasi);
                console.log('composition:', composition);
                console.log('medication:', medication)
                // var btn_encounter = '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_enc" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Encounter</button></td>';

                if(kunjungan_encounter == 'success'){
                    var btn_encounter = '<td><button class="btn btn-sm btn-icon icon-left btn-success" data="'+kunjungan_id+'" disabled><i class="fas fa-check"></i> Success</button></td>';
                }else{
                    var btn_encounter = '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_enc" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Encounter</button></td>';
                }
                if(diagnosa.length > 0){
                    if(diagnosa_condition == 'success'){
                        var btn_condition =  '<td><button class="btn btn-sm btn-icon icon-left btn-success" data="'+kunjungan_id+'" disabled><i class="fas fa-check"></i> Success </button></td>';
                    }else{
                        var btn_condition =  '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_condition" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Condition </button></td>';
                    }
                }else{
                    var btn_condition =  '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Condition </button></td>';
                }

                if(observasi != undefined && observasi != 'undefined' && observasi.length > 0){
                    if(observasi_status == 'success'){
                        var btn_observasi =  '<td><button class="btn btn-sm btn-icon icon-left btn-success" id="kirim_observasi" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" disabled><i class="fas fa-check"></i> Success </button></td>';
                    }else{
                        var btn_observasi =  '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_observasi" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Observasi </button></td>';
                    }
                  }else{
                      var btn_observasi =  '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Observasi </button></td>';
                  }

                  if(procedure != undefined && procedure != 'undefined' && procedure.length > 0){
                    if(procedure_status == 'success'){
                        var btn_procedure =  '<td><button class="btn btn-sm btn-icon icon-left btn-success" id="kirim_procedure" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" disabled><i class="fas fa-check"></i> Success </button></td>';
                    }else{
                        var btn_procedure =  '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_procedure" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Procedure </button></td>';
                    }
                  }else{
                      var btn_procedure =  '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Procedure </button></td>';
                  }

                  if(kunjungan_encounter == 'success' || diagnosa_condition == 'success' || observasi_status == 'success'){
                    var btn_bundle = '<td><button class="btn btn-sm btn-icon icon-left btn-success" id="kirim_bundle"  data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_tglpulang="'+tgl_pulang+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'" disabled><i class="fas fa-check"></i> Success </button></td>';
                  }else if(diagnosa.length == 0 || observasi.length == 0){
                    var btn_bundle =  '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Bundle </button></td>';
                  }else{
                    var btn_bundle = '<td><button class="btn btn-icon icon-left btn-info" id="kirim_bundle"  data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_tglpulang="'+tgl_pulang+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Bundle</button></td>';
                  }

                  if(composition.length > 0){
                    if(composition_status == 'success'){
                        var btn_composition =  '<td><button class="btn btn-sm btn-icon icon-left btn-success" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" disabled><i class="fas fa-check"></i> Success </button></td>';
                    }else{
                        var btn_composition =  '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_composition" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Composition </button></td>';
                    }
                }else{
                    var btn_composition = '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Composition </button></td>';
                }

                if(medication != undefined && medication != 'undefined' && medication.length > 0){
                    if(medication_status == 'success'){
                        var btn_medication = '<td><button class="btn btn-sm btn-icon icon-left btn-success" data="'+kunjungan_id+'" disabled><i class="fas fa-check"></i> Success</button></td>';
                    }else{
                        var btn_medication = '<td><button class="btn btn-sm btn-icon icon-left btn-info" id="kirim_medication" data="'+kunjungan_id+'" data_pel="'+pelayanan_id+'" data_tglact="'+tgl_act+'" data_nama_dokter="'+nama_dokter+'" data_nik_dokter="'+nik_dokter+'" data_nama_px="'+nama_px+'" data_nik_px="'+nik_px+'" data_unit_ihs="'+unit_ihs+'" data_nama_unit="'+nama_unit+'"><i class="fas fa-upload"></i> Medication</button></td>';
                    }
                }else{
                    var btn_medication = '<td><button class="btn btn-sm btn-icon icon-left btn-danger" disabled><i class="fas fa-window-close"></i> Medication </button></td>';
                }
                


                html += '<tr>'  +
                '<th class="text-center">' +
                '<div class="custom-checkbox custom-control">' +
                '<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-' + n + '">' +
                '<label for="checkbox-' + n + '" class="custom-control-label">&nbsp;</label>' +
                '</div>' +
                '</th>' +
                '<td>' + kunjungan.no_rm + '</td>' +
                '<td>' + kunjungan.nama_px + '</td>' +
                '<td>' + kunjungan.tgl_act + '</td>' +
                '<td>' + kunjungan.nama_unit + '</td>' +
                btn_encounter +
                btn_condition +
                btn_observasi +
                btn_procedure +
                btn_composition +
                btn_medication +
                btn_bundle + '</tr>';
              }) 
              $('#rajal_kunj').html(html);

              $("[data-checkboxes]").each(function() {
                var me = $(this),
                  group = me.data('checkboxes'),
                  role = me.data('checkbox-role');
              
                me.change(function() {
                  var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
                    checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
                    dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
                    total = all.length,
                    checked_length = checked.length;
              
                  if(role == 'dad') {
                    if(me.is(':checked')) {
                      all.prop('checked', true);
                    }else{
                      all.prop('checked', false);
                    }
                  }else{
                    if(checked_length >= total) {
                      dad.prop('checked', true);
                    }else{
                      dad.prop('checked', false);
                    }
                  }
                });
              });

              var table2 = $('#table_2').DataTable({
                "columns": [
                    { "orderable": false, "searchable": false }, // Checkbox column
                    { "data": "no_rm" },
                    { "data": "nama" },
                    { "data": "tgl" },
                    { "data": "poli" },
                    { "data": "encounter" },
                    { "data": "condition" },
                    { "data": "observasi" },
                    { "data": "procedure" },
                    { "data": "composition" },
                    { "data": "medication" },
                    { "data": "bundle" }
                ],
                "paging": true, // Enable pagination
            });
            table2.draw();
            }
        })
    })

    $('#rajal_kunj').on('click', '#kirim_enc', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        swal({
            title: 'Kirim Data Encounter?',
            text: 'Apakah anda yakin untuk mengirim data encounter ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    type: 'POST',
                    url: "../page/send_enc", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });

    $('#rajal_kunj').on('click', '#kirim_condition', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        // var diagnosa = $(this).attr('data_diag');
        swal({
            title: 'Kirim Data Condition?',
            text: 'Apakah anda yakin untuk mengirim data condition ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    type: 'POST',
                    url: "../page/send_cond", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                        // diagnosa:diagnosa
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });
    

    $('#rajal_kunj').on('click', '#kirim_observasi', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        // var diagnosa = $(this).attr('data_diag');
        swal({
            title: 'Kirim Data Observastion?',
            text: 'Apakah anda yakin untuk mengirim data observation ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    type: 'POST',
                    url: "../page/send_obs", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });

    $('#rajal_kunj').on('click', '#kirim_procedure', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        // var diagnosa = $(this).attr('data_diag');
        swal({
            title: 'Kirim Data Procedure?',
            text: 'Apakah anda yakin untuk mengirim data procedure ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    type: 'POST',
                    url: "../page/send_proc", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });

    $('#rajal_kunj').on('click', '#kirim_bundle', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var tgl_pulang = $(this).attr('data_tglpulang');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        swal({
            title: 'Kirim Data Bundle?',
            text: 'Apakah anda yakin untuk mengirim data bundle ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    async:true,
                    type: 'POST',
                    url: "<?= base_url();?>page/send_bund", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        tgl_pulang:tgl_pulang,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    }
                }).done(function (data) {
                    console.log(data);
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });

    $('#rajal_kunj').on('click', '#kirim_composition', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var tgl_pulang = $(this).attr('data_tglpulang');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        swal({
            title: 'Kirim Data Composition?',
            text: 'Apakah anda yakin untuk mengirim data composition ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    async:true,
                    type: 'POST',
                    url: "<?= base_url();?>page/send_comp", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        tgl_pulang:tgl_pulang,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    }
                }).done(function (data) {
                    console.log(data);
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });


    $('#rajal_kunj').on('click', '#kirim_medication', function () {
        var kunjungan_id = $(this).attr('data');
        var pelayanan_id = $(this).attr('data_pel');
        var tgl_act = $(this).attr('data_tglact');
        var tgl_pulang = $(this).attr('data_tglpulang');
        var nama_dokter = $(this).attr('data_nama_dokter');
        var nik_dokter = $(this).attr('data_nik_dokter');
        var nama_px = $(this).attr('data_nama_px');
        var nik_px = $(this).attr('data_nik_px');
        var unit_ihs = $(this).attr('data_unit_ihs');
        var nama_unit = $(this).attr('data_nama_unit');
        swal({
            title: 'Kirim Data Medication?',
            text: 'Apakah anda yakin untuk mengirim data Medication ?',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: "Kirim",
            },
            dangerMode: true,
        }).then(function (willSend) {
            if (willSend) {
                $.ajax({
                    async:true,
                    type: 'POST',
                    url: "<?= base_url();?>page/send_med", //dilanjut besok
                    data: {
                        kunjungan_id: kunjungan_id,
                        pelayanan_id: pelayanan_id,
                        tgl_act: tgl_act,
                        tgl_pulang:tgl_pulang,
                        nama_dokter: nama_dokter,
                        nik_dokter: nik_dokter,
                        nama_px: nama_px,
                        nik_px:nik_px,
                        unit_ihs: unit_ihs,
                        nama_unit: nama_unit
                    }
                }).done(function (data) {
                    console.log(data);
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_error;
                        var error_msgs = data3.desc_error;
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Terkirim", "Data berhasil terkirim", "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Data gagal terkirim", "error");
                });
            }
        });
    });
    
      
      $(".pwstrength").pwstrength();
      
      $('.daterange-cus').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        drops: 'down',
        opens: 'right'
      });
      $('.daterange-btn').daterangepicker({
        ranges: {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      }, function (start, end) {
        $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      });
      
      $(".colorpickerinput").colorpicker({
        format: 'hex',
        component: '.input-group-append',
      });
      $(".inputtags").tagsinput('items');
      
    
})