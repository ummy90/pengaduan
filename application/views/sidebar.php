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
        <li class="nav-item <?php echo (($this->uri->segment(1) == "dashboard") and ($this->uri->segment(2) == "")) ? "active" : "" ; ?>">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item <?php echo ((($this->uri->segment(1) == "dashboard") and ($this->uri->segment(2) == "pengaduan"))or ($this->uri->segment(2) == "pengaduanInput")) ? "active" : "" ; ?>">
          <a href="<?php echo base_url('dashboard/pengaduan') ?>">
            <i class="fas fa-desktop"></i>
            <p>Pengaduan</p>
          </a>
        </li>

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
