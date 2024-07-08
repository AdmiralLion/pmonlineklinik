<?php
class m_daftar extends CI_Model {



	function __construct()
 	{
        parent::__construct();
        // $this->db2 = $this->load->database('berkas', TRUE);
        // $this->db3 = $this->load->database('lokal3', TRUE);
        // $this->db4 = $this->load->database('satset', TRUE);
        $this->db = $this->load->database("default", TRUE);
    	// $db_rme 	= $this->load->database("lokal3", TRUE);

 	}
    public function getagama()
    {
        $query = $this->db->query("SELECT * FROM ms_agama");
            return $query->result();
    }
    public function getpendidikan()
    {
        $query = $this->db->query("SELECT * FROM ms_pendidikan");
            return $query->result();
    }
    public function getpekerjaan()
    {
        $query = $this->db->query("SELECT * FROM ms_pekerjaan");
            return $query->result();
    }

    public function getwilayah()
    {
        $query = $this->db->query("SELECT * FROM ms_wilayah");
            return $query->result();
    }

    public function get_rm()
    {
        $query = $this->db->query("SELECT * FROM ms_pasien ORDER BY id DESC LIMIT 1");
            return $query->result();
    }

    public function cek_pasien($no_rm, $tgl_lahir)
    {
        $query = $this->db->query("SELECT * FROM ms_pasien WHERE no_rm = '$no_rm' AND DATE(tgl_lahir) = '$tgl_lahir'");
            return $query->result();
    }

    public function cek_pasien_baru($nama_lengkap, $tgl_lahir)
    {
        $query = $this->db->query("SELECT * FROM ms_pasien WHERE nama = '$nama_lengkap' AND DATE(tgl_lahir) = '$tgl_lahir'");
            return $query->result();
    }

    public function cek_kunj($pasien_id)
    {
        $hariini = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM b_kunjungan WHERE pasien_id = '$pasien_id' AND DATE(tgl) = '$hariini'");
            return $query->result();
    }

    public function cek_dokter($hariini)
    {
        $query = $this->db->query("SELECT mjd.*, u.nama AS nama_dokter,u.id_unit as unit_id, mu.nama AS nama_unit, (CASE WHEN jld.id IS NULL THEN 'Tidak libur' ELSE 'Libur' END) AS indikator_jadwal
        FROM ms_jadwal_dokter mjd JOIN users u ON mjd.dokter_id = u.id_user JOIN b_ms_unit mu ON mjd.unit_id = mu.id 
        LEFT JOIN jadwal_libur_dokter jld ON mjd.id = jld.ms_jadwal_id AND DATE(jld.tgl_libur) = '$hariini' ORDER BY id ASC");
            return $query->result();
    }

    public function cek_antrian($dokter_id){
        $hariini = date('Y-m-d');
        $query = $this->db->query("SELECT (COUNT(id) + 1) AS antrian FROM b_pelayanan bp WHERE bp.dokter_id = '$dokter_id' AND DATE(bp.tgl) = '$hariini'");
            return $query->result();
    }

    public function cek_antrian2($dokter_id,$hariini){
        $query = $this->db->query("SELECT COUNT(id) AS antrian FROM b_pelayanan bp WHERE bp.dokter_id = '$dokter_id' AND DATE(bp.tgl) = '$hariini'");
            return $query->result();
    }

    public function ceknobill(){
        $query = $this -> db ->query("SELECT IFNULL(MAX(no_billing)+1,1) AS no_billing FROM b_kunjungan");
        return $query->result();
    }

    public function cekbiayaumum(){
        $query = $this -> db ->query("SELECT * FROM b_ms_tindakan bmt JOIN b_ms_tindakan_kelas mtk ON bmt.id = mtk.ms_tindakan_id WHERE bmt.id = 14");
        return $query->result();
    }

    public function daftarpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill){
        $arr = array(
            'no_billing' =>$no_bill,
            'pasien_id' => $pasien_id,
            'jenis_layanan' => 1,
            'unit_id' => $unit_id,
            'tgl' => $tgl,
            'kso_id' => $kso_id,
            'tgl_act' => $hariini,
            'user_act' => '61',
            'pm' => 1
        );
        $data = $this->db->insert('b_kunjungan',$arr);
        $kunj_id = $this->db->insert_id();
        return $kunj_id;
    }

    public function daftarpelpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill,$kunj_id,$antrian)
    {
        $tes = "INSERT INTO b_pelayanan ( no_antrian, 
        jenis_kunjungan, pasien_id, kunjungan_id, jenis_layanan, unit_id, 
        kso_id, kelas_id, tgl, dilayani, tgl_act, user_act, unit_id_asal,
        dokter_id
        )
        VALUES (?,'1', ?, ?, '1', ?,?, '1', ?, '0', ?,  ?, '61',?)";
        $data = $this->db->query($tes,array($antrian,$pasien_id,$kunj_id,$unit_id,$kso_id,$tgl,$hariini,$unit_id,$dokter_id));
        $pel_id = $this->db->insert_id();
        return $pel_id;
    }

    public function daftartinpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill,$kunj_id,$antrian,$pel_id,$biaya)
	{
        if($kso_id == '338'){
            $karcis_id = '1';
        }else{
            $karcis_id = '11';
        }
         $arr = array(
            'ms_tindakan_kelas_id' => $karcis_id,
            'ms_tindakan_unit_id' => $unit_id,
            'kunjungan_id' => $kunj_id,
            'pelayanan_id' => $pel_id,
            'kso_id' => $kso_id,
            'tgl' => $tgl,
            'qty' => '1',
            'biaya' => $biaya,
            'user_id' => $dokter_id,
            'type_dokter' => '0',
            'tgl_act' => $hariini,
            'user_act' => $dokter_id,
            'unit_act' => $unit_id,
        );
        $data = $this->db->insert('b_tindakan',$arr);
        return $data;
    }

    public function inserttoken($token,$expires_in,$tglskrg)
    {
        $query = $this->db->query("INSERT INTO token_satset VALUES ('','$token','$expires_in','$tglskrg')");
        return $query;
    }

    public function getdiagnosa($kunjungan_id)
    {
        $query = $this->db->query(" SELECT bd.*, bmd.nama FROM b_diagnosa bd JOIN b_ms_diagnosa bmd ON bd.ms_diagnosa_id = bmd.id WHERE kunjungan_id = '$kunjungan_id'");
        return $query->result();
    }

    public function getobservasi($soap_id)
    {
        $query = $this->db->query("SELECT * FROM soap_obj WHERE soap_id = '$soap_id'");
        return $query->result();
    }

    public function daftar_px_baru($no_rm,$nama_lengkap,$no_ktp,$nama_ortu,$jenis_kel,$agama,$goldar,$status_menikah,$no_bpjs,$tgl_lahir,$pend_terakhir,$pekerjaan,$alamat_ktp,$alamat_rt,$alamat_rw,$alamat_domisili,$provinsi,$kota,$kecamatan,$desa,$no_hp)
    {
        $hariini = date('Y-m-d H:i:s');
        $tes = "INSERT INTO ms_pasien (no_rm, 
        nama, no_ktp, no_bpjs, sex, agama, 
        gol_darah, tgl_lahir, alamat, rt, rw, desa_id, kec_id,
        kab_id,prop_id,telp,pendidikan_id,pekerjaan_id,nama_ortu,user_act,tgl_act,alamat_domisili,stt_nikah)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $data = $this->db->query($tes, array(
            $no_rm,
            $nama_lengkap,
            $no_ktp,
            $no_bpjs,
            $jenis_kel,
            $agama,
            $goldar,
            $tgl_lahir,
            $alamat_ktp,
            $alamat_rt,
            $alamat_rw,
            $desa,
            $kecamatan,
            $kota,
            $provinsi,
            $no_hp,
            $pend_terakhir,
            $pekerjaan,
            $nama_ortu,
            null,
            $hariini,
            $alamat_domisili,
            $status_menikah
        ));
        return $data;
    }
}