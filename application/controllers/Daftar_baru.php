<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_baru extends CI_Controller {

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

        $this->db = $this->load->database('default', TRUE);
		//  $this->db4 = $this->load->database('satset', TRUE);
		 date_default_timezone_set('Asia/Jakarta');
		 
		
	}

	public function index()
	{
		$data['user'] = '';
		$data['list_agama'] = $this->m_daftar->getagama();
		$data['list_pendidikan'] = $this->m_daftar->getpendidikan();
		$data['list_pekerjaan'] = $this->m_daftar->getpekerjaan();
		$data['list_wilayah'] = $this->m_daftar->getwilayah();
		$data['JavaScriptTambahan'] = $this->load->view('daftar/daftar_baru.js',$data,TRUE);
		$this->load->view('daftar/v_daftar_baru.php',$data, get_class($this));
	}

	public function daftar_baru()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$no_ktp = $this->input->post('no_ktp');
		$nama_ortu = $this->input->post('nama_ortu');
		$jenis_kel = $this->input->post('jenis_kel');
		$agama = $this->input->post('agama');
		$goldar = $this->input->post('goldar');
		$status_menikah = $this->input->post('status_menikah');
		$no_bpjs = $this->input->post('no_bpjs');
		$no_hp = $this->input->post('no_hp');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pend_terakhir = $this->input->post('pend_terakhir');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat_ktp = $this->input->post('alamat_ktp');
		$alamat_rt = $this->input->post('alamat_rt');
		$alamat_rw = $this->input->post('alamat_rw');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');

		$data1['cekpx'] = $this->m_daftar->cek_pasien_baru($nama_lengkap,$tgl_lahir);
		if(count($data1['cekpx']) > 0){
			$data = [
				'kode_msgs' => '400',
				'msgs' => 'Pasien Dengan nama dan tanggal lahir tersebut sudah ada silahkan hubungi admin : ',
				'no_rm' => '-',
				'tgl_lahir' => '-',
				'pasien_id' => '-'
			];
		}else{
			$data1['getrm'] = $this -> m_daftar->get_rm();
			// dd($data1);
			foreach($data1['getrm'] as $row):
				$pasien_id = $row -> id;
				$temprm = $row -> no_rm;
			endforeach;
			$temprm++;
			$no_rmbaru = '000'.$temprm;
			$data1['daftarpx'] = $this->m_daftar->daftar_px_baru($no_rmbaru,$nama_lengkap,$no_ktp,$nama_ortu,$jenis_kel,$agama,$goldar,$status_menikah,$no_bpjs,$tgl_lahir,$pend_terakhir,$pekerjaan,$alamat_ktp,$alamat_rt,$alamat_rw,$alamat_domisili,$provinsi,$kota,$kecamatan,$desa,$no_hp);
			if($data1['daftarpx'] == TRUE){
				$data = [
					'kode_msgs' => '201',
					'msgs' => 'Pasien Berhasil Daftar Dengan Nomor RM : ' . $no_rmbaru . ' Tunggu beberapa saat anda akan diarahkan kehalaman pendaftaran dokter ',
					'no_rm' => $no_rmbaru,
					'tgl_lahir' => $tgl_lahir,
					'pasien_id' => $pasien_id,
				];
			}else{
				$data = [
					'kode_msgs' => '401',
					'msgs' => 'Sistem Eror',
					'no_rm' => '-',
					'tgl_lahir' => $tgl_lahir,
					'pasien_id' => '-'
				];
			}
			
		}
		echo json_encode($data);
	}
	
}
