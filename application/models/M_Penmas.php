<?php
/**
 *
 */
class M_Penmas extends CI_Model
{
  function tampilData($tabel)
  {
    return $this->db->get($tabel);
  }

  function cekData($tabel, $data)
  {
    return $this->db->get_where($tabel,$data);
  }

  function simpan($tabel, $data)
  {
    return $this->db->insert($tabel, $data);
  }

  function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->set($data);
    return $this->db->update($tabel);
  }

  function dataPengaduanBy($nik)
  {
    $this->db->select('*')->from('pengaduan a')
            ->join('subkategori b','a.idsubkategori = b.id','left')
            ->join('kategori c','b.idkategori = c.id','left')
            ->where('nik',$nik);
    return $this->db->get();
  }

  function dataPengaduan()
  {
    $this->db->select('a.*, b.subkategori, c.kategori, d.nik, d.nama, d.telepon')->from('pengaduan a')
            ->join('subkategori b','a.idsubkategori = b.id','left')
            ->join('kategori c','b.idkategori = c.id','left')
            ->join('masyarakat d','a.nik = d.nik');
    return $this->db->get();
  }
  function dataPengaduanId($id)
  {
    $this->db->select('a.*, b.subkategori, c.kategori, d.nik, d.nama, d.telepon')->from('pengaduan a')
            ->join('subkategori b','a.idsubkategori = b.id','left')
            ->join('kategori c','b.idkategori = c.id','left')
            ->join('masyarakat d','a.nik = d.nik')
            ->where('a.id',$id);
    return $this->db->get();
  }

  function dataSubKategori()
  {
    $this->db->select('*')->from('kategori a')
            ->join('subkategori b','a.id = b.idkategori','inner');
    return $this->db->get();
  }

  function dataTanggapanId($id)
  {
    $this->db->select('*')->from('tanggapan a')
            ->join('petugas b','a.idpetugas = b.id', 'left')
            ->where('a.idpengaduan',$id);
    return $this->db->get();

  }

}

?>
