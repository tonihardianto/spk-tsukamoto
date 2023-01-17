<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main Menu</h3>
                <ul class="nav side-menu">
                <?php if($this->session->userdata('ses_level') != 'admin'): ?>
                  <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="<?php echo base_url('permintaan') ?>"><i class="fa fa-tasks"></i> Permintaan <span class="fa fa-chevron-right"></span></a>
                  </li>
                  <li><a href="<?php echo base_url('persediaan') ?>"><i class="fa fa-tasks"></i> Persediaan <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="<?php echo base_url('dataset') ?>"><i class="fa fa-database"></i> Data Sample <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="<?php echo base_url('decision') ?>"><i class="fa fa-atom"></i> Hasil Prediksi <span class="fa fa-chevron-right"></span></a></li>
                  <?php endif; ?> 
                  <?php if($this->session->userdata('ses_level') == 'admin') :?>
                    <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a>
                    <li><a href="<?php echo base_url('monitor') ?>"><i class="fa fa-shop"></i> Produksi Cabang <span class="fa fa-chevron-right"></span></a></li>
                    
                  <li><a href="<?php echo base_url('user') ?>"><i class="fa fa-cogs"></i> User Settings <span class="fa fa-chevron-right"></span></a></li>
                  <li>
                  <!-- <li><a><i class="fa fa-shop"></i> Monitoring Cabang <span class="fa fa-plus"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('dataset') ?>">Data Sample <span class="fa fa-chevron-right"></span></a></li>
                      <li><a href="<?php echo base_url('dataproses') ?>">Data Perhitungan <span class="fa fa-chevron-right"></span></a></li>
                      <li><a href="<?php echo base_url('decision') ?>">Hasil Prediksi <span class="fa fa-chevron-right"></span></a></li>
                    </ul>
                  </li> -->
                  <?php endif; ?>
                  <?php if($this->session->userdata('ses_level') == 'admin') :?>
                    <!-- <li><a href="<?php echo base_url('cabang') ?>"><i class="fa fa-users"></i> Cabang Settings <span class="fa fa-chevron-right"></span></a></li> -->
                  <!-- <li><a href="<?php echo base_url('monitor') ?>"><i class="fa fa-shop"></i> Monitor Cabang <span class="fa fa-chevron-right"></span></a> -->
                  <?php endif; ?>
                    <!-- <a href="<?php echo base_url('report')?>"><i class=" fa fa-bar-chart"></i> Laporan <span class=" fa fa-chevron-right"></span></a> -->
                  </li>
                </ul>
              </div>

            </div>