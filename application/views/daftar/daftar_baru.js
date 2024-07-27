$(document).ready(function() {
    
    $('#reset').on('click', function() {
        $('#nama_lengkap').val('');
        $('#no_ktp').val('');
        $('#nama_ortu').val('');
        $('#jenis_kel').val('');
        $('#agama').val('');
        $('#goldar').val('');
        $('#status_menikah').val('');
        $('#no_bpjs').val('');
        $('#tgl_lahir').val('');
        $('#pend_terakhir').val('');
        $('#pekerjaan').val('');
        $('#alamat_ktp').val('');
        $('#alamat_rt').val('');
        $('#alamat_rw').val('');
        $('#alamat_domisili').val('');
        $('#provinsi').val('');
        $('#kota').val('');
        $('#kecamatan').val('');
        $('#desa').val('');
        $('#no_hp').val('');
    })


    
    $('#simpan').on('click', function () {
        var nama_lengkap = $('#nama_lengkap').val();
        var no_ktp = $('#no_ktp').val();
        var nama_ortu = $('#nama_ortu').val();
        var jenis_kel = $('#jenis_kel').val();
        var agama = $('#agama').val();
        var goldar = $('#goldar').val();
        var status_menikah = $('#status_menikah').val();
        var no_bpjs = '-';
        var no_hp = $('#no_hp').val();
        var tgl_lahir = $('#tgl_lahir').val();
        var pend_terakhir = $('#pend_terakhir').val();
        var pekerjaan = $('#pekerjaan').val();
        var alamat_ktp = $('#alamat_ktp').val();
        var alamat_rt = $('#alamat_rt').val();
        var alamat_rw = $('#alamat_rw').val();
        var alamat_domisili = $('#alamat_domisili').val();
        var provinsi = $('#provinsi').val();
        var kota = $('#kota').val();
        var kecamatan = $('#kecamatan').val();
        var desa = $('#desa').val();

        if(nama_lengkap == '' || no_ktp == '' || nama_ortu == '' || jenis_kel == ''  || agama == '' || goldar == '' || status_menikah == ''  || no_bpjs == '' || no_hp == '' || tgl_lahir == ''  || pend_terakhir == '' || pekerjaan == '' || alamat_ktp == ''  || alamat_rt == '' || alamat_rw == '' || alamat_domisili == ''  || provinsi == '' || kota == '' || kecamatan == ''  || desa == ''){
            alert('Lengkapi isian terlebih dahulu ! ');
        }else{
            swal.fire({
                title: 'Pendaftaran Pasien Baru',
                text: 'Apakah data yang anda masukkan sudah sesuai ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Simpan",
                reverseButtons: true,
                inputValidator: function (value) {
                    return new Promise(function (resolve, reject) {
                      if (nama_lengkap == null || no_ktp == null || tgl_lahir == null || alamat_ktp == null) {
                        resolve('Lengkapi Nama, No KTP, Tgl Lahir, dan Alamat Ktp');
                      } else {
                        console.log('asd');
                        resolve();
                      }
                    });
                  }
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('daftar_baru/daftar_baru');?>", //dilanjut besok
                        data: {
                            nama_lengkap: nama_lengkap,
                            no_ktp: no_ktp,
                            nama_ortu: nama_ortu,
                            jenis_kel: jenis_kel,
                            agama: agama,
                            goldar: goldar,
                            status_menikah: status_menikah,
                            no_bpjs: no_bpjs,
                            no_hp: no_hp,
                            tgl_lahir: tgl_lahir,
                            pend_terakhir: pend_terakhir,
                            pekerjaan: pekerjaan,
                            alamat_ktp: alamat_ktp,
                            alamat_rt: alamat_rt,
                            alamat_rw: alamat_rw,
                            alamat_domisili: alamat_domisili,
                            provinsi: provinsi,
                            kota: kota,
                            kecamatan: kecamatan,
                            desa: desa,
                        },
                        cache: false
                    }).done(function (data) {
                        var data3 = $.parseJSON(data);
                        var i;
                        $.each(data3, function(i){
                            var kode_msgs = data3.kode_msgs;
                            var error_msgs = data3.msgs;
                            var no_rm = data3.no_rm;
                            var tgl_lahir = data3.tgl_lahir;
                            var pasien_id = data3.pasien_id;

                            if(kode_msgs == '400' || kode_msgs == '401'){
                                swal.fire("Error", error_msgs , "error");
                            }else{
                                // swal.fire("Berhasil ", error_msgs, "success");
                                swal.fire({
                                    title: "Berhasil",
                                    text: error_msgs,
                                    icon: "success",
                                    timer: 5000, // Show success message for 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false, // Hide "OK" button
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup().querySelector("b");
                                        timerInterval = setInterval(() => {
                                          timer.textContent = `${Swal.getTimerLeft()}`;
                                        }, 100);
                                      },
                                });
            
                                // Set a timer to redirect after 3 seconds
                                setTimeout(function () {
                                    // Replace this with your redirection logic or other action
                                    // sessionStorage.setItem('no_rm', 'no_rm');
                                    // sessionStorage.setItem('tgl_lahir', 'tgl_lahir');
                                    // window.location.href = "<?= base_url('daftar_lama');?>";
                                    var url = "<?= base_url('daftar_lama');?>";
                                    var form = $('<form action="' + url + '" method="post">' +
                                    '<input type="text" name="no_rmsend" value="' + no_rm + '" />' +
                                    '<input type="text" name="tgl_lahirsend" value="' + tgl_lahir + '" />' +
                                    '</form>');
                                    $('body').append(form);
                                    form.submit();
                                }, 5000); // 3000 milliseconds = 3 seconds
                            }
                        });
                    }).fail(function (data) {
                        console.log(data);
                        swal.fire("Gagal", "Sistem Eror", "error");
                    });
                }
            });
        }
    });

    function post(path, parameters) {
        var form = $('<form></form>');
    
        form.attr("method", "post");
        form.attr("action", path);
    
        $.each(parameters, function(key, value) {
            var field = $('<input></input>');
    
            field.attr("type", "hidden");
            field.attr("name", key);
            field.attr("value", value);
    
            form.append(field);
        });
    
        // The form needs to be a part of the document in
        // order for us to be able to submit it.
        $(document.body).append(form);
        form.submit();
    }
})