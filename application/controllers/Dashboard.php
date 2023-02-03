<?php
/**
 *
 */
class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_Penmas');
    if (!empty($this->session->userdata('isLogin') == false)) {
      $this->session->set_flashdata('gagal','Silakan Login Terlebih Dahulu');
      redirect('welcome');
    }
  }

  public function index()
  {
    $data = array('pengaduan_semua' => $this->M_Penmas->cekData('pengaduan',['nik' => $this->session->userdata('nik')]),
                  'pengaduan_proses' => $this->M_Penmas->cekData('pengaduan',['nik' => $this->session->userdata('nik'),'status' => '1']),
                  'pengaduan_selesai' => $this->M_Penmas->cekData('pengaduan',['nik' => $this->session->userdata('nik'),'status' => '2']));
    // $this->load->view('masyarakat_dashboard',$data);
    $this->template->load_admin('index','dashboard',$data);
  }

  public function pengaduan()
  {
    $data = array('pengaduan_semua' => $this->M_Penmas->dataPengaduanBy($this->session->userdata('nik')));
    $this->template->load_admin('index','pengaduan',$data);
  }

  public function pengaduanProses($id)
  {
    $data = array('pengaduan' => $this->M_Penmas->dataPengaduanId($id)->row(),
                  'tanggapan' => $this->M_Penmas->dataTanggapanId($id));
    $this->template->load_admin('index','pengaduan_proses',$data);
  }

  public function pengaduanInput()
  {
    $data = array('kategori' => $this->M_Penmas->tampilData('kategori'));
    $this->template->load_admin('index','pengaduan_input',$data);
  }

  function subkategori($id_kategori)
  {
    $sub = $this->M_Penmas->cekData('subkategori',['idkategori' => $id_kategori]);
    $data = "<option value=''>- Pilih -</option>";
    foreach ($sub->result() as $value) {
        $data .= "<option value='".$value->id."'>".$value->subkategori."</option>";
    }
    echo $data;
  }

  public function pengaduanSimpan()
  {
    $pengaduan = array('nik' => $this->session->userdata('nik'),
                    'idsubkategori' => $this->input->post('subkategori', TRUE),
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'isi_pengaduan' => $this->input->post('isi_pengaduan', TRUE),
                    'foto' => $this->uploadberkas(),
                    'status' => '0');
    $simpan = $this->M_Penmas->simpan('pengaduan',$pengaduan);
    if ($simpan) {
      $this->session->set_flashdata('sukses','Data Berhasil Disimpan');
    }
    redirect('dashboard/pengaduan');
  }

  function uploadberkas(){
    $config['upload_path'] = './berkas/';
    $config['allowed_types'] = 'pdf|jpg|png|jpeg|';
    $this->load->library('upload',$config);
    $this->upload->do_upload('foto');
    $datafile = $this->upload->data();
    $link = $config['upload_path'].$datafile['file_name'];
    return $link;
  }

}

?>
