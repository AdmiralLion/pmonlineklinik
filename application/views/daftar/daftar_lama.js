$(document).ready(function() {
    
    // $('#login').on('click', function() {
    //     alert('test');
    // })

    $('#cek_rm').on('click', function () {
        var no_rm = $('#no_rm').val();
        var tgl_lahir = $('#tgl_lahir').val();

        swal.fire({
            title: 'Cek RM',
            text: 'Apakah data yang anda masukkan sudah sesuai ?',
            icon: 'warning',
            input: 'select',
            inputOptions: {
                penj: 'Penjamin',
                UMUM: 'UMUM',
                BPJS: 'BPJS'
            },
            inputLabel: 'Pilih Penjamin UMUM / BPJS',
            customClass: {
                input: 'inline-flex',
                inputLabel: 'inline-flex'
            },
            showCancelButton: true,
            confirmButtonText: "Simpan",
            reverseButtons: true,
            inputValidator: function (value) {
                return new Promise(function (resolve, reject) {
                  if (value == 'penj') {
                    resolve('Silahkan Pilih Penjamin Terlebih Dahulu !');
                  } else {
                    resolve();
                  }
                });
              }
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('daftar_lama/cek_pasien');?>", //dilanjut besok
                    data: {
                        no_rm: no_rm,
                        tgl_lahir: tgl_lahir
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_msgs = data3.kode_msgs;
                        var error_msgs = data3.msgs;
                        var namapx = data3.nama;
                        var no_rm = data3.no_rm;
                        var tgl_lahir = data3.tgl_lahir;
                        var pasien_id = data3.pasien_id;
                        var kso = result.value;
                        // console.log(kso);
                        if(kode_msgs == '400'){
                            swal.fire("Error", error_msgs , "error");
                        }else{
                            swal.fire("Data Ada", error_msgs, "success");
                            get_dokter(no_rm,kso,pasien_id);
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal.fire("Gagal", "Sistem Eror", "error");
                });
            }
        });
    });

    function get_dokter(no_rm,kso,pasien_id){
        $.ajax({
            type:"POST",
            url: "<?= base_url('daftar_lama/get_dokter');?>", //dilanjut besok
            cache: false,
                success : function(data){
                // console.log(data);
                var html = '';
                        var i;
                        var n =0;
                            var data = $.parseJSON(data);
                $.each(data, function(i){
                    if(data[i].indikator_jadwal == 'Tidak libur'){
                        var btndokter = '<div class="col-md-4 mb-3"> <button id="avail" class="pil_dokter" data="'+data[i].id+'" data-dokter="'+data[i].dokter_id+'"data-norm="'+no_rm+'"data-kso="'+kso+'"data-tgl="'+data[i].tgl+'"data-poli="'+data[i].nama_unit+'"data-namadok="'+data[i].nama_dokter+'"data-pasienid="'+pasien_id+'"data-unitid="'+data[i].unit_id+'"><div class="button-image"><img style="width:100px;" src="<?=base_url("assets/img/doctor.png");?>" alt="Image" /></div><div class="button-content"><div class="button-text">'+data[i].nama_dokter+' - '+ data[i].nama_unit+'<br> <br>'+data[i].jam_mulai+'-'+data[i].jam_selesai+'<br> Jumlah Pasien <br> '+data[i].antrian+'</div></div></button></div>';
                    }else{
                        var btndokter = '<div class="col-md-4 mb-3"> <button class="pil_dokter2" data="'+data[i].id+'" data-dokter="'+data[i].dokter_id+'"><div class="button-image"><img style="width:100px;" src="<?=base_url("assets/img/doctor.png");?>" alt="Image" /></div><div class="button-content"><div class="button-text">'+data[i].nama_dokter+' - '+ data[i].nama_unit+'<br> LIBUR </div></div></button></div>';
                    }
                    
                    // if(data[i].id){
                            n++;
                    html += btndokter;
                                    // menambahkan untuk ttd dan print
                               
                    // }else{
                    //     $("#tab_profil1").removeAttr("style");
                    //     }
                    });
                    $('.tampung_result').html(html);
            }
        });
    }

    $('.tampung_result').on('click','#avail', function () {
        var dokter_id=$(this).attr('data-dokter');
        var no_rm=$(this).attr('data-norm');
        var kso_id=$(this).attr('data-kso');
        var tgl=$(this).attr('data-tgl');
        var poli=$(this).attr('data-poli');
        var namadok=$(this).attr('data-namadok');
        var pasien_id=$(this).attr('data-pasienid');
        var unit_id=$(this).attr('data-unitid');


        swal.fire({
            title: 'Pendaftaran Poli ' + poli + ' Dokter ' + namadok,
            text: 'Apakah anda yakin untuk mendaftar ke tujuan tersebut ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Simpan",
            reverseButtons: true
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('daftar_lama/daftar_poli');?>", //dilanjut besok
                    data: {
                        no_rm: no_rm,
                        pasien_id: pasien_id,
                        dokter_id: dokter_id,
                        unit_id: unit_id,
                        kso_id: kso_id,
                        tgl: tgl,
                        poli: poli,
                        namadok: namadok,
                    },
                    cache: false
                }).done(function (data) {
                    var data3 = $.parseJSON(data);
                    var i;
                    $.each(data3, function(i){
                        var kode_status = data3.kode_status;
                        var pesan_status = data3.pesan_status;
                        if(kode_status == '400'){
                            swal.fire("Error", pesan_status , "error");
                        }else{
                            swal.fire("Data Ada", pesan_status, "success");
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal.fire("Gagal", "Sistem Eror", "error");
                });
            }
        });
    });
})