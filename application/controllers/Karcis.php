<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karcis extends CI_Controller {

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
		// $this->load->model('m_master_ttd');
		// $this->load->model('m_rme');
		// $this->load->model('m_rme_rj');
		// $this->load->model('m_askep');
		// $this->load->helper('date');
		// $this->load->library('upload');
		$this->load->model('m_karcis');
		 date_default_timezone_set('Asia/Jakarta');
		
	}

	public function print()
	{
		// $id= $this->uri->segment(3);
		$no_rm = $this->input->post('no_rm');
		$pasien_id = $this->input->post('pasien_id');
		$kunjungan_id = $this->input->post('kunjungan_id');
		$pelayanan_id = $this->input->post('pelayanan_id');


		$data['result'] = $this->m_karcis->cetakhasil($no_rm,$pasien_id,$pelayanan_id);
		$this->load->view('karcis/cetak_karcis', $data);
	}
	
}
