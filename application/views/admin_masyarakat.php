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
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=0; foreach ($masyarakat->result_array() as $m): $no++;?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $m['nik'] ?></td>
                        <td><?php echo $m['nama'] ?></td>
                        <td><?php echo $m['telepon'] ?></td>
                        <td></td>
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
