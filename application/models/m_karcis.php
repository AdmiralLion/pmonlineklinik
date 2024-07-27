<?php

class M_karcis extends CI_Model
{
	public function cetakhasil($norm,$idPas,$idPel)
	{
        $tes ="SELECT mp.id, 
        DATE_FORMAT(p.tgl_act, '%d-%m-%Y %H:%i') AS tgl_act_pel,
        u.nama AS tujuan,
        p.no_antrian,
        p.kso_id,
        IF(bk.is_baru = 0,'Lama','Baru') AS kunjungan,
        mp.no_rm, 
        mp.nama AS pasien, 
        mp.sex,
        DATE_FORMAT(mp.tgl_lahir, '%d %M %Y') AS tgl, 
        mp.alamat,
        pg.nama AS dokter,
        IFNULL(peg.nama,'-') AS nm_user,
        IF(p.unit_id_asal = 0 OR p.unit_id_asal = 183, 'Asal Kunjungan', 'Dirujuk dari') AS asal,
        IF(p.unit_id_asal = 0, 'Pendaftaran  Online', u.nama) AS rujukan,
        p.unit_id
        FROM b_pelayanan p
          INNER JOIN b_kunjungan bk ON bk.id = p.kunjungan_id
          INNER JOIN ms_pasien mp ON p.pasien_id = mp.id  
          INNER JOIN b_ms_unit u ON p.unit_id = u.id
          INNER JOIN users pg ON p.dokter_id = pg.id_user
          LEFT JOIN users peg ON peg.id_user = bk.user_act
        WHERE p.id = ? AND (bk.pm = 1)
        ORDER BY p.id ASC";
        $hasil = $this->db->query($tes,array($idPel));
        $data = $hasil->result();
        return $data;
    }
    public function queryantri($norm,$idPas,$idPel)
    {
        $tes = "SELECT mp.id, p.id AS pelayanan_id,
        DATE_FORMAT(p.tgl_act, '%d-%m-%Y %H:%i') AS tgl_act_pel,
        u.nama AS tujuan,
        p.no_antrian,
        p.no_sample,
        p.dokter_id,
        p.tgl AS tglperiksa,
        IF(bk.isbaru = 0,'Lama','Baru') AS kunjungan,
        ks.nama AS kso,
        ks.id AS kso_id,
        mp.no_rm, 
        mp.id,
        mp.nama AS pasien, 
        mp.sex,
        DATE_FORMAT(mp.tgl_lahir, '%d %M %Y') AS tgl, 
        mp.alamat,
        pg.nama AS dokter,
        IFNULL(peg.nama,'-') AS nm_user,
        IF(p.unit_id_asal = 0 OR p.unit_id_asal = 183, 'Asal Kunjungan', 'Dirujuk dari') AS asal,
        IF(p.unit_id_asal = 0, 'Pendaftaran  Online', u.nama) AS rujukan,
        p.unit_id
        FROM b_pelayanan p
          INNER JOIN b_kunjungan bk ON bk.id = p.kunjungan_id
          INNER JOIN b_ms_pasien mp ON p.pasien_id = mp.id  
          INNER JOIN b_ms_unit u ON p.unit_id = u.id
          INNER JOIN b_ms_pegawai pg ON p.dokter_id = pg.id
          LEFT JOIN b_ms_pegawai peg ON peg.id = bk.user_act
          LEFT JOIN b_ms_kso ks ON ks.id = p.kso_id
        WHERE p.id = ? AND (bk.pm = 1 OR bk.is_pm_ol = 1)
        ORDER BY p.id ASC";
        $hasil = $this->db->query($tes,array($idPel));
        $data = $hasil->result();
        return $data;
    }
    public function inputantri($idUnit,$idPegawai,$idPas,$idPel,$tglPeriksa,$no_antrian,$tujuan,$namapas,$namadok,$alamat)
    {
      // dd($idPas);
       $arr = array(
            'idUnit' => $idUnit,
            'idPegawai' => $idPegawai,
            'idPas' => $idPas,
            'idPel' => $idPel,
            'tglPeriksa' => $tglPeriksa,
            'no_antrian' => $no_antrian,
            'tujuan' => $tujuan,
            'namapas' => $namapas,
            'namadok' => $namadok,
            'alamat' => $alamat
        );
        $data = $this->db->insert('b_live_antrian',$arr);
        return $data;
    }
    public function antriantemp($idPas)
    {
      $this->db->select('*');
      $this->db->from('b_live_antrian');
      $this->db->where('idPas',$idPas); //masih belum ketemu
      $data = $this->db->get()->result();
      // dd($idPas);
      return $data;
    }
    public function antrianlog($idPas,$tgl,$tglminggu)
    {
      $this->db->select('*');
      $this->db->from('b_live_antrian');
      $this->db->where('idPas',$idPas);
      $this->db->where('tglPeriksa BETWEEN"'.$tgl.'" and "'.$tglminggu.'"');
      $data = $this->db->get()->result();
      // dd($idPas);
      return $data;
    }
    public function cetakantri($idPas)
    {
      // dd($idPas);
        $tes = "SELECT bp.id,bp.pasien_id,bp.no_antrian, 1+bp.no_antrian AS antrian_selanjutnya, bp.kunjungan_id,bs.kunjungan_id,bs.pelayanan_id FROM b_pelayanan bp INNER JOIN b_soap bs on bp.kunjungan_id = bs.kunjungan_id AND bp.id = bs.pelayanan_id WHERE bp.pasien_id = ? AND bp.tgl = ? ORDER BY tgl DESC, no_antrian DESC LIMIT 1";
        $hasil = $this->db->query($tes,array($idPas,$tglPeriksa));
        $data = $hasil->result();
        // dd($data);
        return $data;
    }
}