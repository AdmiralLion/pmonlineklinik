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

		$data['user'] = '';
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
			endforeach;
			$data = [
				'kode_msgs' => '201',
				'msgs' => 'Pasien No RM : ' . $no_rm . ' Bernama : ' . $nama,
				'nama' => $nama,
				'no_rm' => $no_rm,
				'tgl_lahir' => $tgl_lahir
			];
		}else{
			$data = [
				'kode_msgs' => '400',
				'msgs' => 'Pasien Dengan No RM : ' . $no_rm . ' Tidak Ditemukan Silahkan Menghubungi Admin Klinik ...',
				'nama' => '-',
				'no_rm' => $no_rm,
				'tgl_lahir' => $tgl_lahir
			];
		}
		echo json_encode($data);
	}

	public function get_dokter()
	{
		$hariini = date('Y-m-d');
		$data = $this->m_daftar->cek_dokter($hariini);	
		echo json_encode($data);
	}
	
}
