<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title"><?php echo $page ?></h4>
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
            <a href="#"><?php echo $page ?></a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Pengaduan</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pelapor</label>
                    <input type="text" class="form-control" value="<?php echo $pengaduan->nama ?>" readonly>
                    <input type="hidden" name="pengaduan" value="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Tanggal</label>
                  <input type="text" class="form-control" value="<?php echo $pengaduan->tanggal ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" value="<?php echo $pengaduan->kategori ?>" readonly>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Sub Kategori</label>
                  <input type="text" class="form-control" value="<?php echo $pengaduan->subkategori ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Isi Pengaduan</label>
                    <textarea rows="3" class="form-control" readonly><?php echo $pengaduan->isi_pengaduan ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Data <?php echo $page ?></h4>
                <?php if ($pengaduan->status != '2'): ?>
                  <button class="btn btn-primary btn-sm btn-border btn-round ml-auto" data-toggle="modal" data-target="#tambahTanggapan">
                    <i class="fa fa-plus"></i> Tanggapan
                  </button>
                <?php endif; ?>
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
                      <th width="70%">Isi Tanggapan</th>
                      <th>Petugas</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th width="70%">Isi Tanggapan</th>
                      <th>Petugas</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($tanggapan->result_array() as $t): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $t['tanggal'] ?></td>
                        <td><?php echo $t['tanggapan'] ?></td>
                        <td><?php echo $t['nama'] ?></td>
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
