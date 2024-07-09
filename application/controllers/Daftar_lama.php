<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_lama extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct()
	{
		parent::__construct();
		$this->load->model('m_daftar');
		 date_default_timezone_set('Asia/Jakarta');
		
	}

	public function index()
	{
		if($this->input->post('no_rmsend') != ''){
			$no_rm = $this->input->post('no_rmsend');
			$tgl_lahir = $this->input->post('tgl_lahirsend');
		}else{
			$no_rm = '';
			$tgl_lahir = date('Y-m-d');
		}

	
		$data['pxbaru'] = [
			'no_rm' => $no_rm,
			'tgl_lahir' => $tgl_lahir
		];
		$data['JavaScriptTambahan'] = $this->load->view('daftar/daftar_lama.js',$data,TRUE);
		$this->load->view('daftar/v_daftar_lama.php',$data, get_class($this));
	}

	public function cek_pasien()
	{
		$no_rm = $this->input->post('no_rm');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$data1['cekpx'] = $this->m_daftar->cek_pasien($no_rm,$tgl_lahir);
		if(count($data1['cekpx']) > 0){
			foreach($data1['cekpx'] as $row):
				$nama = $row -> nama;
				$pasien_id = $row -> id;
			endforeach;
			$data1['cekkunj'] = $this->m_daftar->cek_kunj($pasien_id);
			if(count($data1['cekkunj']) > 0){
				$data = [
					'kode_msgs' => '400',
					'msgs' => 'Pasien No RM : ' . $no_rm . ' Sudah Terdaftar di kunjungan hari ini Silahkan hubungi Klinik ',
					'nama' => $nama,
					'pasien_id' => $pasien_id,
					'no_rm' => $no_rm,
					'tgl_lahir' => $tgl_lahir
				];
			}else{
				$data = [
					'kode_msgs' => '201',
					'msgs' => 'Pasien No RM : ' . $no_rm . ' Bernama : ' . $nama,
					'nama' => $nama,
					'pasien_id' => $pasien_id,
					'no_rm' => $no_rm,
					'tgl_lahir' => $tgl_lahir
				];
			}
		}else{
			$data = [
				'kode_msgs' => '400',
				'msgs' => 'Pasien Dengan No RM : ' . $no_rm . ' Tidak Ditemukan Silahkan Menghubungi Admin Klinik ...',
				'nama' => '-',
				'pasien_id' => '-',
				'no_rm' => $no_rm,
				'tgl_lahir' => $tgl_lahir
			];
		}
		echo json_encode($data);
	}

	public function get_dokter()
	{
		$hariini = date('Y-m-d');
		$data1['test'] = $this->m_daftar->cek_dokter($hariini);	
		foreach($data1['test'] as $row):
			$id = $row -> id;
			$nama = $row -> nama_dokter;
			$nama_unit = $row -> nama_unit;
			$dokter_id = $row -> dokter_id;
			$unit_id = $row -> unit_id;
			$jam_mulai = $row -> jam_mulai;
			$jam_selesai = $row -> jam_selesai;
			$indikator_jadwal = $row -> indikator_jadwal;
			$data1['cekantrian'] = $this -> m_daftar -> cek_antrian2($dokter_id,$hariini);
			foreach($data1['cekantrian'] as $rows):
				$antrian = $rows -> antrian;
			endforeach;
			$data[] = [
				'id' => $id,
				'nama_dokter' => $nama,
				'nama_unit' => $nama_unit,
				'unit_id' => $unit_id,
				'dokter_id' => $dokter_id,
				'jam_mulai' => $jam_mulai,
				'jam_selesai' => $jam_selesai,
				'indikator_jadwal' => $indikator_jadwal,
				'tgl' => $hariini,
				'antrian' => $antrian
			];
		endforeach;
		echo json_encode($data);
	}

	public function daftar_poli()
	{
		$hariini = date('Y-m-d H:i:s');
		$no_rm = $this->input->post('no_rm');
		$dokter_id = $this->input->post('dokter_id');
		$pasien_id = $this->input->post('pasien_id');
		$unit_id = $this->input->post('unit_id');
		$kso_id = $this->input->post('kso_id');
		if($kso_id == 'UMUM'){
			$kso_id = '1';
			$data['cekbiaya'] = $this -> m_daftar -> cekbiayaumum();
			foreach($data['cekbiaya'] as $row):
				$biaya = $row -> tarip;
			endforeach;
		}else if($kso_id == 'BPJS'){
			$kso_id = '338';
			$biaya = '0';
		}
		$tgl = $this->input->post('tgl');
		$poli = $this->input->post('poli');
		$namadok = $this->input->post('namadok');
		$data['ceknobill'] = $this -> m_daftar -> ceknobill();
		foreach($data['ceknobill'] as $row):
			$no_bill = $row -> no_billing;
		endforeach;
		$data['send'] = $this-> m_daftar-> daftarpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill);
		$kunj_id = $data['send'];
		$data['cekantrian'] = $this -> m_daftar -> cek_antrian($dokter_id);
		foreach($data['cekantrian'] as $row):
			$antrian = $row -> antrian;
		endforeach;
		$data['pel'] = $this-> m_daftar-> daftarpelpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill,$kunj_id,$antrian);
		$pel_id = $data['pel'];
		$data['tindakan'] = $this -> m_daftar -> daftartinpoli($no_rm,$dokter_id,$pasien_id,$kso_id,$tgl,$unit_id,$namadok,$hariini,$no_bill,$kunj_id,$antrian,$pel_id,$biaya);
		if($data['send'] > 0 AND $data['pel'] > 0 AND $data['tindakan'] == TRUE){
			$status = [
				'kode_status' => '201',
				'pesan_status' => 'Daftar Berhasil Antrian Nomor ' .$antrian,
				'pasien_id' => $pasien_id,
				'kunjungan_id' => $kunj_id,
				'pelayanan_id' => $pel_id
			];
		}else{
			$status = [
				'kode_status' => '400',
				'pesan_status' => 'Sistem Eror Reload Halaman',
				'pasien_id' => '-',
				'kunjungan_id' => '-',
				'pelayanan_id' => '-'

			];
		}
		
		echo json_encode($status);
	}
	
}
