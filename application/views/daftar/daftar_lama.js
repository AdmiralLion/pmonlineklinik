$(document).ready(function() {
    
    // $('#login').on('click', function() {
    //     alert('test');
    // })

    $('#cek_rm').on('click', function () {
        var no_rm = $('#no_rm').val();
        var tgl_lahir = $('#tgl_lahir').val();

        swal({
            title: 'Daftar Klinik',
            text: 'Apakah data yang anda masukkan sudah sesuai ?',
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
                        if(kode_msgs == '400'){
                            swal("Error", error_msgs , "error");
                        }else{
                            swal("Data Ada", error_msgs, "success");
                            get_dokter();
                        }
                    });
                }).fail(function (data) {
                    console.log(data);
                    swal("Gagal", "Sistem Eror", "error");
                });
            }
        });
    });

    function get_dokter(){
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
                        var btn_clinical = '<div class="col-md-4 mb-3"> <button class="pil_dokter" data="'+data[i].id+'" data-dokter="'+data[i].dokter_id+'"><div class="button-image"><img style="width:100px;" src="<?=base_url("assets/img/doctor.png");?>" alt="Image" /></div><div class="button-content"><div class="button-text">'+data[i].nama_dokter+' - '+ data[i].nama_unit+'<br> Jam Praktek <br>'+data[i].jam_mulai+'-'+data[i].jam_selesai+'</div></div></button></div>';
                    }else{
                        var btn_clinical = '<div class="col-md-4 mb-3"> <button class="pil_dokter2" data="'+data[i].id+'" data-dokter="'+data[i].dokter_id+'"><div class="button-image"><img style="width:100px;" src="<?=base_url("assets/img/doctor.png");?>" alt="Image" /></div><div class="button-content"><div class="button-text">'+data[i].nama_dokter+' - '+ data[i].nama_unit+'<br> LIBUR </div></div></button></div>';
                    }
                    
                    // if(data[i].id){
                            n++;
                    html += btn_clinical;
                                    // menambahkan untuk ttd dan print
                               
                    // }else{
                    //     $("#tab_profil1").removeAttr("style");
                    //     }
                    });
                    $('.tampung_result').html(html);
            }
        });
    }
})