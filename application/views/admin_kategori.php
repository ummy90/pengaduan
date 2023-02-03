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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="card-head-row">
                <div class="card-title">Data <?php echo $page ?></div>
                <div class="card-tools">
                  <?php if ($this->session->userdata('level') == 'a'): ?>
                    <button class="btn btn-primary btn-sm btn-border btn-round ml-auto" data-toggle="modal" data-target="#tambahKategori">
                      <i class="fa fa-plus"></i> Kategori
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th width="8%">No</th>
                      <th>Kategori</th>
                      <th width="15%"></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($kategori->result_array() as $kat): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $kat['kategori'] ?></td>
                        <td>
                          <?php if ($this->session->userdata('level') == 'a'): ?>
                            <a href="#" class="btn btn-xs btn-warning"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-head-row">
                <div class="card-title">Data Sub<?php echo $page ?></div>
                <div class="card-tools">
                  <button class="btn btn-primary btn-sm btn-border btn-round ml-auto" data-toggle="modal" data-target="#tambahSubKategori">
                    <i class="fa fa-plus"></i> Sub Kategori
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables2" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th width="8%">No</th>
                      <th>Kategori</th>
                      <th>Subkategori</th>
                      <th width="10%"></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Subkategori</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($subkategori->result_array() as $skat): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $skat['kategori'] ?></td>
                        <td><?php echo $skat['subkategori'] ?></td>
                        <td>
                          <a href="#" class="btn btn-xs btn-warning"><i class="far fa-edit"></i></a>
                          <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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

    <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              <span class="fw-mediumbold">
              Tambah</span>
              <span class="fw-light">
                Kategori
              </span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?php echo base_url('admin/kategori_simpan') ?>">
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Kategori</label>
                      <input type="text" name="kategori" class="form-control" required>
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

    <div class="modal fade" id="tambahSubKategori" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              <span class="fw-mediumbold">
              Tambah</span>
              <span class="fw-light">
                Sub Kategori
              </span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?php echo base_url('admin/subkategori_simpan') ?>">
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control" id="kategori" name="kategori">
                        <option>- Pilih - </option>
                        <?php foreach ($kategori->result_array() as $kat): ?>
                            <option value="<?php echo $kat['id'] ?>"><?php echo $kat['kategori']; ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Sub Kategori</label>
                      <input type="text" name="subkategori" class="form-control" required>
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
