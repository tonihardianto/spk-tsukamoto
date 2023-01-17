<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="<?php echo base_url('assets/images/icon.png'); ?>" type="image/ico" />

    <title>Decision Maker - Perhitungan </title>

    <!-- Bootstrap -->
    <link href="<?= base_url().'assets/vendors/bootstrap/dist/css/bootstrap.min.css';?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url().'assets/vendors/font-awesome/css/all.min.css';?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url().'assets/vendors/nprogress/nprogress.css';?>" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?= base_url().'assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css';?>" rel="stylesheet"/>

    <!-- Datatables -->
    
    <link href="<?= base_url().'assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css';?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url().'assets/build/css/custom.min.css';?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <!-- Menu Profil -->
            <?php $this->load->view('menu/profil'); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view('menu/side-nav'); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
        <?php $this->load->view('menu/footer'); ?>
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('menu/top-nav'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
              </div>
            </div> -->

            <!-- Form -->
          <div class="clearfix"></div>
					<!-- <div id="<?php  ?>" class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Perhitungan <small>Produksi Donat</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('dataproses/getPrediksi') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" name="tanggal" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Permintaan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="permintaan" id="first-name" required="required" class="form-control ">
                        <span class="red">Sample : Min: 24 Max: 500</span>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Persediaan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="persediaan" id="last-name" name="last-name" required="required" class="form-control">
                        <span class="red">Sample : Min: 10 Max: 100</span>
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<a href="<?php echo base_url('dataproses') ?>" class="btn btn-primary" type="reset">Reset</a>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div> -->

          </div>
            <!-- end Form -->

            <!-- Tabel Perhitungan -->
            <div class="clearfix"></div>
          <div id="<?php echo $x ?>" class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2> <small>Perhitungan Fuzzy Tsukamoto </small></h2>
                  <!-- <div><span><a href="<?php echo base_url('decision') ?>" class="btn btn-primary" type="reset"><i class="fa fa-info-circle"> Lihat Hasil</a></i></span></div> -->
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                  <p>Data selama <b>30 hari</b> mulai <b>1 Januari 2022</b> sampai <b>30 Januari 2022</b></p>
                    <table>
                      <tbody>
                        <tr>
                          <td>Permintaan maksimum</td>
                          <td> :</td>
                          <td><?php echo $max_permintaan ?></td>
                        </tr>
                        <tr>
                          <td>Permintaan minimum</td>
                          <td> :</td>
                          <td><?php echo $min_permintaan ?></td>
                        </tr>
                        <tr>
                          <td>Titik tengah permintan</td>
                          <td> :</td>
                          <td><?php echo $tengah_permintaan ?></td>
                        </tr>
                        <tr>
                          <td>Persediaan maksimum</td>
                          <td> :</td>
                          <td><?php echo $max_persediaan ?></td>
                        </tr>
                        <tr>
                          <td>Persediaan minimum</td>
                          <td> :</td>
                          <td><?php echo $min_persediaan ?></td>
                        </tr>
                        <tr>
                          <td>Titik tengah persediaan</td>
                          <td> :</td>
                          <td><?php echo $tengah_persediaan ?></td>
                        </tr>
                        <tr>
                          <td>Produksi maksimum</td>
                          <td> :</td>
                          <td><?php echo $max_produksi ?></td>
                        </tr>
                        <tr>
                          <td>Produksi minimum</td>
                          <td> :</td>
                          <td><?php echo $min_produksi ?></td>
                        </tr>
                        <tr>
                          <td>Titi tengah produksi</td>
                          <td> :</td>
                          <td><?php echo $tengah_produksi ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Data saat ini</b>
                    <table>
                      <tbody>
                      <tr>
                          <td>Permintaan</td>
                          <td> :</td>
                          <td><?php echo $permintaan ?></td>
                        </tr>
                        <tr>
                          <td>Persediaan</td>
                          <td> :</td>
                          <td><?php echo $persediaan ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Hasil Perhitungan Variabel</b>
                    <br>
                    <br>
                    <b><i class="fa fa-arr"></i> miu</b>
                    <table>
                      <tbody>
                        <tr>
                            <td>miu permintaan turun</td>
                            <td> :</td>
                            <td><?php echo $miu_pmt_turun ?></td>
                        </tr>
                        <tr>
                            <td>miu permintaan tetap</td>
                            <td> :</td>
                            <td><?php echo $miu_pmt_tetap ?></td>
                        </tr>
                        <tr>
                          <td>miu permintaan naik</td>
                          <td> :</td>
                          <td><?php echo $miu_pmt_naik ?></td>
                        </tr>
                        <tr>
                          <td>miu persediaan sedikit</td>
                          <td> :</td>
                          <td><?php echo $miu_psd_sedikit ?></td>
                        </tr>
                        <tr>
                          <td>miu persediaan sedang</td>
                          <td> :</td>
                          <td><?php echo $miu_psd_sedang ?></td>
                        </tr>
                        <tr>
                          <td>miu persediaan banyak</td>
                          <td> :</td>
                          <td><?php echo $miu_psd_banyak ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Nilai Alfa untuk setiap aturan</b>
                    <table>
                      <tbody>
                        <tr>
                          <td>Alfa 1</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_turun.','.$miu_psd_banyak ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_satu ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 2</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_turun.','.$miu_psd_sedang ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_dua ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 3</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_turun.','.$miu_psd_sedikit ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_tiga ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 4</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_tetap.','.$miu_psd_banyak ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_empat ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 5</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_tetap.','.$miu_psd_sedang?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_lima ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 6</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_tetap.','.$miu_psd_sedikit ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_enam ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 7</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_naik.','.$miu_psd_banyak ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_tujuh ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 8</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_naik.','.$miu_psd_sedang ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_delapan ?></td>
                        </tr>
                        <tr>
                          <td>Alfa 9</td>
                          <td> :</td>
                          <td>min(<?php echo $miu_pmt_naik.','.$miu_psd_sedikit ?>)</td>
                          <td> =</td>
                          <td><?php echo $alfa_sembilan ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Nilai z untuk setiap aturan</b>
                    <table>
                      <tbody>
                        <tr>
                          <td>z1</td>
                          <td> :</td>
                          <td><?php echo $z1 ?></td>
                        </tr>
                        <tr>
                          <td>z2</td>
                          <td> :</td>
                          <td><?php echo $z2 ?></td>
                        </tr>
                        <tr>
                          <td>z3</td>
                          <td> :</td>
                          <td><?php echo $z3 ?></td>
                        </tr>
                        <tr>
                          <td>z4</td>
                          <td> :</td>
                          <td><?php echo $z4 ?></td>
                        </tr>
                        <tr>
                          <td>z5</td>
                          <td> :</td>
                          <td><?php echo $z5 ?></td>
                        </tr>
                        <tr>
                          <td>z6</td>
                          <td> :</td>
                          <td><?php echo $z6 ?></td>
                        </tr>
                        <tr>
                          <td>z7</td>
                          <td> :</td>
                          <td><?php echo $z7 ?></td>
                        </tr>
                        <tr>
                          <td>z8</td>
                          <td> :</td>
                          <td><?php echo $z8 ?></td>
                        </tr>
                        <tr>
                          <td>z9</td>
                          <td> :</td>
                          <td><?php echo $z9 ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Nilai Alfa z untuk setiap aturan</b>
                    <table>
                      <tbody>
                        <tr>
                          <td>alfaz1</td>
                          <td> :</td>
                          <td><?php echo $alfaz1 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz2</td>
                          <td> :</td>
                          <td><?php echo $alfaz2 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz3</td>
                          <td> :</td>
                          <td><?php echo $alfaz3 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz4</td>
                          <td> :</td>
                          <td><?php echo $alfaz4 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz5</td>
                          <td> :</td>
                          <td><?php echo $alfaz5 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz6</td>
                          <td> :</td>
                          <td><?php echo $alfaz6 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz7</td>
                          <td> :</td>
                          <td><?php echo $alfaz7 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz8</td>
                          <td> :</td>
                          <td><?php echo $alfaz8 ?></td>
                        </tr>
                        <tr>
                          <td>alfaz9</td>
                          <td> :</td>
                          <td><?php echo $alfaz9 ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Total Alfa dan Alfaz</b>
                    <table>
                      <tbody>
                        <tr>
                          <td>Alfaz total</td>
                          <td> :</td>
                          <td><?php echo $alfaz_total ?></td>
                        </tr>
                        <tr>
                          <td>Alfa total</td>
                          <td> :</td>
                          <td><?php echo $alfa_total ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <b>Jadi, menurut perhitungan metode <i>Tsukamoto</i>, donat yang harus di produksi adalah <strong><?php echo $prediksi ?></strong> Pcs atau <strong><?php echo $adonan ?></strong> adonan </b>
                    <br>
								</div>
							</div>
						</div>
					</div>

          

            <!-- Data table -->
            <!-- <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Perhitungan<small>Produksi Donat</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Full name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                          <th>Extn.</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                          <td>5421</td>
                          <td>t.nixon@datatables.net</td>
                        
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div> -->

            <!-- end Data table -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url().'assets/vendors/jquery/dist/jquery.min.js';?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url().'assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js';?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url().'assets/vendors/fastclick/lib/fastclick.js';?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url().'assets/vendors/nprogress/nprogress.js';?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?= base_url().'assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js';?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url().'assets/vendors/datatables.net/js/jquery.dataTables.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.print.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/jszip/dist/jszip.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/pdfmake/build/pdfmake.min.js';?>"></script>
    <script src="<?= base_url().'assets/vendors/pdfmake/build/vfs_fonts.js';?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url().'assets/build/js/custom.min.js'; ?>"></script>

    <!-- <script>
      var hide = document.getElementById('x-content');
      hide.style.display = 'none';
    </script>
    <script>
      var hilang = document.getElementById('form-hilang');
      hilang.style.display = 'none';
    </script> -->

  </body>
</html>