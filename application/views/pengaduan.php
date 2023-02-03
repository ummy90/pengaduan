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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Data Pengaduan</h4>
                <!-- <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal" data-target="#tambahPengaduan">
                  <i class="fa fa-plus"></i> Pengaduan
                </button> -->
                <a href="<?php echo base_url('dashboard/pengaduanInput') ?>" class="btn btn-primary btn-sm btn-round ml-auto"><i class="fa fa-plus"></i> Pengaduan</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Kategori</th>
                      <th width="50%">Isi</th>
                      <th width="15%">Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Kategori</th>
                      <th>Isi</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($pengaduan_semua->result_array() as $p): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $p['tanggal'] ?></td>
                        <td><?php echo $p['kategori'] ?></td>
                        <td><?php echo $p['isi_pengaduan'] ?></td>
                        <td>
                          <?php if ($p['status'] == '0'): ?>
                            <a href="#" class="btn btn-link btn-sm"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-link btn-sm btn-danger"><i class="fas fa-times"></i></a>
                          <?php elseif ($p['status'] == '1'):?>
                            <a href="<?php echo base_url('dashboard/pengaduanProses/').$p['id'] ?>" class="btn btn-warning btn-xs">Proses</a>
                          <?php elseif ($p['status'] == '2'):?>
                            <a href="#" class="btn btn-success btn-block btn-xs">Selesai</a>
                          <?php endif; ?>
                        </td>
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
