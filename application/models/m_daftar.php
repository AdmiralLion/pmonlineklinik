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

    public function cek_pasien($no_rm, $tgl_lahir)
    {
        $query = $this->db->query("SELECT * FROM ms_pasien WHERE no_rm = '$no_rm' AND DATE(tgl_lahir) = '$tgl_lahir'");
            return $query->result();
    }

    public function cek_dokter($hariini)
    {
        $query = $this->db->query(" SELECT mjd.*, u.nama AS nama_dokter, mu.nama AS nama_unit, (CASE WHEN jld.id IS NULL THEN 'Tidak libur' ELSE 'Libur' END) AS indikator_jadwal
        FROM ms_jadwal_dokter mjd JOIN users u ON mjd.dokter_id = u.id_user JOIN b_ms_unit mu ON mjd.unit_id = mu.id 
        LEFT JOIN jadwal_libur_dokter jld ON mjd.id = jld.ms_jadwal_id AND DATE(jld.tgl_libur) = '$hariini' ORDER BY id ASC");
            return $query->result();
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
}