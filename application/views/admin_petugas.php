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
                <?php if ($this->session->userdata('level') == 'a'): ?>
                  <button class="btn btn-primary btn-sm btn-border btn-round ml-auto" data-toggle="modal" data-target="#tambahPetugas">
                    <i class="fa fa-plus"></i> Petugas
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
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Level</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Level</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($petugas->result_array() as $p): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $p['username'] ?></td>
                        <td><?php echo $p['nama'] ?></td>
                        <td><?php echo $p['telepon'] ?></td>
                        <td><?php echo ($p['level'] == 'a') ? "Administrator" : "Operator" ; ?></td>
                        <td>
                          <a href="#" class="btn btn-xs btn-warning"><i class="fas fa-undo"></i></a>
                          <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-lock"></i></a>
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

    <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              <span class="fw-mediumbold">
              Tambah</span>
              <span class="fw-light">
                Petugas
              </span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?php echo base_url('admin/petugas_simpan') ?>">
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="telepon" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Level</label>
                      <select class="form-control" name="level">
                        <option value="a">Administrator</option>
                        <option value="p">Operator</option>
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

  </div>
</div>
