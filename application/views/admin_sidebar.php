<div class="sidebar">

  <div class="sidebar-background"></div>
  <div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?php echo base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              <?php echo $this->session->userdata('nama') ?>
              <span class="user-level"><?php echo $this->session->userdata('nik') ?></span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav">
        <li class="nav-item active">
          <a href="<?php echo base_url('admin/dashboard') ?>">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Master Data</h4>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/kategori') ?>">
            <i class="fas fa-desktop"></i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/masyarakat') ?>">
            <i class="fas fa-desktop"></i>
            <p>Masyarakat</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('admin/petugas') ?>">
            <i class="fas fa-desktop"></i>
            <p>Petugas</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Pengaduan</h4>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/pengaduan') ?>">
            <i class="fas fa-desktop"></i>
            <p>Pengaduan</p>
          </a>
        </li>
        <?php if ($this->session->userdata('level') == 'a'): ?>
          <li class="nav-item">
            <a href="#">
              <i class="fas fa-desktop"></i>
              <p>Laporan</p>
            </a>
          </li>
        <?php endif; ?>

        <!-- <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li> -->
      </ul>
    </div>
  </div>
</div>
