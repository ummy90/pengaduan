<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Penmas');
	}

	public function index()
	{
		$this->load->view('page_login');
	}

	public function register()
	{
		// code...
		$cekAkun = $this->M_Penmas->cekData('masyarakat',['nik' => $this->input->post('nik',TRUE)]);
		if ($cekAkun->num_rows() > 0) {
			$this->session->set_flashdata('gagal','NIK sudah terdaftar!');
			redirect('welcome');
		}

		$register = array('nik' => $this->input->post('nik', TRUE),
											'username' => $this->input->post('username', TRUE),
											'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
											'nama' => $this->input->post('fullname', TRUE),
											'telepon' => $this->input->post('telepon', TRUE));
		$simpan = $this->M_Penmas->simpan('masyarakat',$register);
		if ($simpan > 0) {
			$this->session->set_flashdata('sukses','Data Berhasil Disimpan');
		}
		redirect('welcome');
	}

	public function auth()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$cekAkun = $this->M_Penmas->cekData('masyarakat',['username' => $username]);

		if ($cekAkun->num_rows() > 0) {
			$hasil = $cekAkun->row();
			if (password_verify($password, $hasil->password)) {
				$data_session = array('isLogin' => TRUE,
															'nama' => $hasil->nama,
															'username' => $hasil->username,
															'nik' => $hasil->nik,
															'telepon' => $hasil->telepon);
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			}else {
				$this->session->set_flashdata('gagal','Password Salah!');
				redirect('welcome');
			}
		}else {
			$this->session->set_flashdata('gagal','Username Tidak Ditemukan');
			redirect('welcome');
		}
	}

	public function logout()
	{
			$this->session->sess_destroy();
			redirect('welcome');
	}
}
