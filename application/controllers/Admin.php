<?php
/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_Penmas');
  }

  public function index()
  {
    $this->load->view('admin_login');
  }

  public function auth()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$cekAkun = $this->M_Penmas->cekData('petugas',['username' => $username]);

		if ($cekAkun->num_rows() > 0) {
			$hasil = $cekAkun->row();
			if (password_verify($password, $hasil->password)) {
				$data_session = array('isLogin' => TRUE,
                              'idpetugas' => $hasil->id,
															'nama' => $hasil->nama,
															'username' => $hasil->username,
															'telepon' => $hasil->telepon,
                              'level' => $hasil->level);
				$this->session->set_userdata($data_session);
				redirect('admin/dashboard');
			}else {
				$this->session->set_flashdata('gagal','Password Salah!');
				redirect('admin');
			}
		}else {
			$this->session->set_flashdata('gagal','Username Tidak Ditemukan');
			redirect('admin');
		}
	}

  public function resetpassword()
  {
    $username = $this->input->post('username',true);
    $password = $this->input->post('passwordsignin', true);
    $confirmpassword = $this->input->post('confirmpassword', true);

    $cekAkun = $this->M_Penmas->cekData('petugas',['username' => $username]);
    if ($cekAkun->num_rows() > 0) {
      if ($password == $confirmpassword) {
        $data = array('password' => password_hash($password, PASSWORD_DEFAULT));
        $where = array('username' => $username);
        $update = $this->M_Penmas->update('petugas',$data,$where);
        if ($update) {
          $this->session->set_flashdata('sukses','Password berhasil diubah');
          redirect('admin');
        }
      }else {
        $this->session->set_flashdata('gagal','Password tidak sama');
        redirect('admin');
      }
    }else{
      $this->session->set_flashdata('gagal','Username tidak ditemukan');
      redirect('admin');
    }
  }

  public function logout()
	{
			$this->session->sess_destroy();
			redirect('admin');
	}

  public function dashboard()
  {
    $data = array('pengaduan_semua' => $this->M_Penmas->tampilData('pengaduan'),
                  'pengaduan_proses' => $this->M_Penmas->cekData('pengaduan',['status' => '1']),
                  'pengaduan_selesai' => $this->M_Penmas->cekData('pengaduan',['status' => '2']));
    $this->template->load_admin('admin_index','admin_dashboard',$data);
  }

  public function kategori()
  {
    $data = array('page' => 'Kategori',
                  'kategori'=> $this->M_Penmas->tampilData('kategori'),
                  'subkategori' => $this->M_Penmas->dataSubKategori());
    $this->template->load_admin('admin_index','admin_kategori',$data);
  }

  public function kategori_simpan()
  {
    $data = array('kategori' => $this->input->post('kategori',true));
    $simpan = $this->M_Penmas->simpan('kategori',$data);
    if ($simpan) {
      $this->session->set_flashdata('sukses','Data Kategori berhasil disimpan');
    }else{
      $this->session->set_flashdata('gagal','Data Kategori gagal disimpan');
    }
    redirect('admin/kategori');
  }

  public function subkategori_simpan()
  {
    $data = array('idkategori' => $this->input->post('kategori'),
                  'subkategori' => $this->input->post('subkategori'));
    $simpan = $this->M_Penmas->simpan('subkategori',$data);
    if ($simpan) {
      $this->session->set_flashdata('sukses','Data Sub Kategori berhasil disimpan');
    }else{
      $this->session->set_flashdata('gagal','Data Sub Kategori gagal disimpan');
    }
    redirect('admin/kategori');
  }

  public function masyarakat()
  {
    $data = array('page' => 'Masyarakat',
                  'masyarakat' => $this->M_Penmas->tampilData('masyarakat'));
    $this->template->load_admin('admin_index','admin_masyarakat',$data);
  }

  public function petugas()
  {
    $data = array('page' => 'Petugas',
                  'petugas' => $this->M_Penmas->tampilData('petugas'));
    $this->template->load_admin('admin_index','admin_petugas',$data);
  }

  public function petugas_simpan()
  {
    $data = array('username' => $this->input->post('username'),
                  'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                  'nama' => $this->input->post('nama'),
                  'telepon' => $this->input->post('telepon'),
                  'level' => $this->input->post('level'));
    $simpan = $this->M_Penmas->simpan('petugas',$data);
    if ($simpan) {
      $this->session->set_flashdata('sukses','Data Petugas berhasil disimpan');
    }else{
      $this->session->set_flashdata('gagal','Data Petugas gagal disimpan');
    }
    redirect('admin/petugas');
  }

  public function pengaduan()
  {
    $data = array('page' => 'Pengaduan',
                  'pengaduan_semua' => $this->M_Penmas->dataPengaduan());
    $this->template->load_admin('admin_index','admin_pengaduan',$data);
  }

  public function tanggapan($id)
  {
    $data = array('page' => 'Tanggapan',
                  'pengaduan' => $this->M_Penmas->dataPengaduanId($id)->row(),
                  'tanggapan' => $this->M_Penmas->dataTanggapanId($id));
    $this->session->set_userdata('idp',$id);
    $this->template->load_admin('admin_index','admin_tanggapan',$data);
  }

  public function tanggapan_simpan()
  {
    $data = array('idpengaduan' => $this->input->post('pengaduan'),
                  'idpetugas' => $this->session->userdata('idpetugas'),
                  'tanggapan' => $this->input->post('tanggapan'),
                  'tanggal' => gmdate('Y-m-d'));
    $data2 = array('status' => $this->input->post('status'));
    $where = array('id' => $this->input->post('pengaduan'));
    $simpan = $this->M_Penmas->simpan('tanggapan',$data);
    $update = $this->M_Penmas->update('pengaduan',$data2,$where);
    if ($simpan) {
      $this->session->set_flashdata('sukses','Data Tanggapan berhasil disimpan');
    }else{
      $this->session->set_flashdata('gagal','Data Tanggapan gagal disimpan');
    }
    redirect('admin/pengaduan');
  }

}

?>
