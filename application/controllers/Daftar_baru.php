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
	
}
