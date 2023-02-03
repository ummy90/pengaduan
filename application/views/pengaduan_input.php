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
                <h4 class="card-title">Input Pengaduan</h4>
              </div>
            </div>
            <?php echo form_open_multipart('dashboard/pengaduanSimpan');?>
              <div class="card-body">
                <div class="row mt-3">
                  <div class="col-md-4">
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
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Sub Kategori</label>
                      <select class="form-control" id="subkategori" name="subkategori">
                        <option>- Pilih -</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" id="date" name="tanggal" placeholder="Password">
                    </div>
                  </div>

                </div>
                <div class="row mt-3">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Isi Laporan Pengaduan</label>
                      <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Upload Foto</label>
                      <input type="file" class="form-control-file" id="fileFoto" class="fileFoto" name="foto">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success" type="submit">Laporkan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
