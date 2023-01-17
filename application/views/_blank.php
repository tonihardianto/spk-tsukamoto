<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url().'assets/vendors/bootstrap/dist/css/bootstrap.min.css';?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url().'assets/vendors/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url().'assets/vendors/nprogress/nprogress.css';?>" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?= base_url().'assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css';?>" rel="stylesheet"/>

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
          <div class="row">
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
									<!-- content here -->
								</div>
							</div>
						</div>
					</div>
          </div>
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

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url().'assets/build/js/custom.min.js'; ?>"></script>
  </body>
</html>