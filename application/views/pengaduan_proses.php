<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Pengaduan</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Pengaduan</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Detail Pengaduan</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td width="30%">Tanggal</td><td><?php echo $pengaduan->tanggal ?></td>
                    </tr>
                    <tr>
                      <td>Kategori</td><td><?php echo $pengaduan->kategori ?></td>
                    </tr>
                    <tr>
                      <td>Sub Kategori</td><td><?php echo $pengaduan->subkategori ?></td>
                    </tr>
                    <tr>
                      <td>Isi Pelaporan</td><td><?php echo $pengaduan->isi_pengaduan ?></td>
                    </tr>
                    <tr>
                      <td>Status</td><td><?php echo ($pengaduan->status == '1') ? "Proses" : "Selesai" ;  ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Gambar</h4>
              </div>
            </div>
            <div class="card-body">
              <img src="<?php echo base_url($pengaduan->foto) ?>" width="360px" alt="">
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Riwayat Penyelesaian</h4>
                <!-- <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal" data-target="#tambahPengaduan">
                  <i class="fa fa-plus"></i> Pengaduan
                </button> -->
                <!-- <a href="<?php echo base_url('dashboard/pengaduanInput') ?>" class="btn btn-primary btn-sm btn-round ml-auto"><i class="fa fa-plus"></i> Pengaduan</a> -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th width="75%">Tanggapan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Tanggapan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($tanggapan->result_array() as $t): $no++; ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $t['tanggal'] ?></td>
                        <td><?php echo $t['tanggapan'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
