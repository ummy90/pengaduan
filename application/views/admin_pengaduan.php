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
                <h4 class="card-title">Data <?php echo $page ?></h4>
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
                      <th>Pelapor</th>
                      <th>Tanggal</th>
                      <th>Kategori</th>
                      <th width="30%">Isi</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Pelapor</th>
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
                        <td><?php echo $p['nama'] ?></td>
                        <td><?php echo $p['tanggal'] ?></td>
                        <td><?php echo $p['kategori'] ?></td>
                        <td><?php echo $p['isi_pengaduan'] ?></td>
                        <td>
                          <?php if ($p['status'] == '2'): ?>
                            <a href="<?php echo base_url('admin/tanggapan/').$p['id'] ?>" class="btn btn-success btn-xs btn-block">Selesai</a>
                          <?php elseif ($p['status'] == '1'): ?>
                            <a href="<?php echo base_url('admin/tanggapan/').$p['id'] ?>" class="btn btn-warning btn-xs btn-block">Proses</a>
                          <?php else: ?>
                            <button class="btn btn-primary btn-xs btn-border btn-block" data-toggle="modal" data-target="#tindakan<?php echo $p['id'] ?>">
                              Tindakan
                            </button>
                          <?php endif; ?>
                        </td>
                        <!-- modal tindakan -->
                        <div class="modal fade" id="tindakan<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">
                                  <span class="fw-mediumbold">
                                  Tindakan</span>
                                  <span class="fw-light">
                                    Pengaduan
                                  </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="<?php echo base_url('admin/tanggapan_simpan') ?>">
                                <div class="modal-body">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Pelapor</label>
                                          <input type="text" class="form-control" value="<?php echo $p['nama'] ?>" readonly>
                                          <input type="hidden" name="pengaduan" value="<?php echo $p['id'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Tanggal</label>
                                        <input type="text" class="form-control" value="<?php echo $p['tanggal'] ?>" readonly>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Kategori</label>
                                          <input type="text" class="form-control" value="<?php echo $p['kategori'] ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Sub Kategori</label>
                                        <input type="text" class="form-control" value="<?php echo $p['subkategori'] ?>" readonly>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <label>Isi Pengaduan</label>
                                          <textarea rows="3" class="form-control" readonly><?php echo $p['isi_pengaduan'] ?></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-8">
                                        <div class="form-group">
                                          <label>Tanggapan</label>
                                          <textarea rows="3" class="form-control" name="tanggapan"></textarea>
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <label>Status</label>
                                          <select class="form-control" name="status">
                                            <option>- Pilih -</option>
                                            <option value="1">Proses</option>
                                            <option value="2">Selesai</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        <!-- modal proses -->
                        <div class="modal fade" id="proses<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">
                                  <span class="fw-mediumbold">
                                  Tindakan</span>
                                  <span class="fw-light">
                                    Pengaduan
                                  </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="<?php echo base_url('admin/tanggapan_simpan') ?>">
                                <div class="modal-body">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Pelapor</label>
                                          <input type="text" class="form-control" value="<?php echo $p['nama'] ?>" readonly>
                                          <input type="hidden" name="pengaduan" value="<?php echo $p['id'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Tanggal</label>
                                        <input type="text" class="form-control" value="<?php echo $p['tanggal'] ?>" readonly>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Kategori</label>
                                          <input type="text" class="form-control" value="<?php echo $p['kategori'] ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Sub Kategori</label>
                                        <input type="text" class="form-control" value="<?php echo $p['subkategori'] ?>" readonly>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <label>Isi Pengaduan</label>
                                          <textarea rows="3" class="form-control" readonly><?php echo $p['isi_pengaduan'] ?></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-8">
                                        <div class="form-group">
                                          <label>Tanggapan</label>
                                          <textarea rows="3" class="form-control" name="tanggapan"></textarea>
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <label>Status</label>
                                          <select class="form-control" name="status">
                                            <option>- Pilih -</option>
                                            <option value="1">Proses</option>
                                            <option value="2">Selesai</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                          </div>
                        </div>


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
