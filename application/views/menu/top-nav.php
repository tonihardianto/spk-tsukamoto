<?php 
  $this->load->model('m_dataproses');
  $data = $this->m_dataproses->getTotalPermintaanUser()->result_array();
  $permintaan = $this->m_dataproses->getTotalPermintaanUser()->num_rows();;
?>
<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('assets/images/img.jpg')?>" alt=""><?php echo $this->session->userdata('ses_name'); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="badge bg-green"><?php echo $permintaan; ?></span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <?php foreach($data as $key): ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url('permintaan'); ?>" class="dropdown-item">
                        <span class="image"><i class=" fa fa-cube"></i></span>
                        <span>
                          <span><?php echo $key['permintaan'] ?> Pcs</span>
                          <span class="time"> <?php echo $key['tanggal'] ?></span>
                        </span>
                        <span class="message">
                          Permintaan <b><?php echo $key['permintaan'] ?></b> Pcs untuk tanggal <b><?php echo $key['tanggal'] ?></b>
                        </span>

                      </a>
                    </li>
                    <?php endforeach; ?>
                    <li class="nav-item">
                      <div class="text-center">
                        <a href="<?php echo base_url('permintaan'); ?>" class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>