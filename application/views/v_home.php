<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url('assets/images/icon.png'); ?>" type="image/ico" />

	<title>Donut is Donut | Decision Makers </title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url('assets/vendors/font-awesome/css/all.min.css')?>" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
	<!-- Morris js -->
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/morris.css')?>"> -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- datepicker -->
	<link href="<?php echo base_url().'/assets/js/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'?>"
		rel="stylesheet">
	<!-- PNotify -->
	<link href="<?php echo base_url().'/assets/vendors/pnotify/dist/pnotify.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/vendors/pnotify/dist/pnotify.buttons.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/vendors/pnotify/dist/pnotify.nonblock.css'?>" rel="stylesheet">



	<!-- Custom Theme Style -->
	<link href="<?php echo base_url('assets/build/css/custom.min.css')?>" rel="stylesheet">
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
					<div class="page-title">
						<div class="title_left">
							<h3>Dashboard</h3>
						</div>

						<!-- <div class="title_right">
							<div class="col-md-5 col-sm-5   form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div> -->
					</div>

					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12">
							<div class="">
								<div class="x_content">
									<div class="row">
										<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-user"></i>
												</div>
												<div class="count"><?php echo $user ?></div>

												<h3>Data User</h3>
												<p><a href="<?php echo base_url('user') ?>"><span
															class="badge badge-info"> More info <i
																class="fa fa-arrow-right"></i></span></a></p>
												<p>Data pengguna aktif</p>
											</div>
										</div>
										<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-bookmark"></i>
												</div>
												<div class="count">
													<?php foreach($permintaan as $row):
													if($row['permintaan'] == 0){
														echo "0";
													}else{
														echo $row['permintaan']; 
													}
													endforeach ?>
												</div>

												<h3>Permintaan</h3>
												<p><a href="<?php echo base_url('permintaan') ?>"><span
															class="badge badge-info"> More info <i
																class="fa fa-arrow-right"></i></span></a></p>
												<p>Permintaan yang akan datang</p>
											</div>
										</div>
										<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-layer-group"></i>
												</div>
												<?php foreach($persediaan as $row): ?>
												<?php if($row['total'] == 0): ?>
												<div class="count">0</div>
												<?php else: ?>
												<div class="count"><?php echo $row['total']; ?></div>
												<?php endif; ?>
												<?php endforeach ?>
												<h3>Persediaan</h3>
												<p><a href="#"><span class="badge badge-info"> More info <i
																class="fa fa-arrow-right"></i></span></a></p>
												<p>Sisa persediaan kemarin</p>
											</div>
										</div>
										<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-cart-shopping"></i>
												</div>
												<div class="count">
													<?php foreach($produksi as $row): 
														if($row['total'] == 0){
															echo "0";
														}else{
															echo $row['total']; 
														}
													endforeach ?>
												</div>

												<h3>Produksi</h3>
												<p><a href="<?php echo base_url('decision') ?>"><span
															class="badge badge-info"> More info <i
																class="fa fa-arrow-right"></i></span></a></p>
												<p>Donat yang harus di produksi hari ini</p>
											</div>
										</div>
									</div>

									<!-- Shorcut -->
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="clearfix"></div>
											<div class="x_panel">
												<div class="x_title">
													<h2>Tampilkan Data</h2>
													<ul class="nav navbar-right panel_toolbox">
														<li><a class="collapse-link"><i
																	class="fa fa-chevron-up"></i></a>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"
																role="button" aria-expanded="false"><i
																	class="fa fa-wrench"></i></a>
															<div class="dropdown-menu"
																aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="#">Settings 1</a>
																<a class="dropdown-item" href="#">Settings 2</a>
															</div>
														</li>
														<li><a class="close-link"><i class="fa fa-close"></i></a>
														</li>
													</ul>
													<div class="clearfix"></div>
												</div>
												<div class="x_content1">
                                                    <form action="<?= base_url('home/show') ?>">
                                                    <div class="item form-group">
                                    <div class="item form-group">
                                        <div class="col-md-3 col-lg-12">
                                            <select class="form-control" name="userid" id="userid" required>
                                                <option value="">-Pilih cabang-</option>
                                                <?php foreach($cabang as $c): ?>
                                                <option value="<?= $c['user_id'] ?>"><?= $c['user_fullname'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label" for="f_tanggal">Dari </label>
                                        <div class="col-md-3 col-lg-10">
                                            <input type="date" class="form-control" required name="dari" id="f_tanggal">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label" for="">Sampai </label>
                                        <div class="col-md-3 col-lg-12">
                                            <input type="date" class="form-control" required name="sampai" id="f_tanggal">
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="item form-group">
                                    <label class="col-form-label" for=""></label>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-info">Tampilkan</button>
                                        <a href="<?= base_url('home') ?>" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                                                    </form>
													<!-- <button data-target="#tambahdata" data-toggle="modal" class="btn btn-info"><i class="fa fa-pen-to-square"></i> Input Permintaan</button>
													<button data-target="#tambahsedia" data-toggle="modal" class="btn btn-warning"><i class="fa fa-pen-to-square"></i> Input Persediaan</button> -->
												</div>
											</div>

										</div>
									</div>
									<br />

									<!-- begin chart -->
									<div class="row">

										<!-- bar charts group -->
										<div class="col-md-12 col-sm-12  ">
											<div class="x_panel">
												<div class="x_title">
													<h2>Grafik Permintaan dan Persediaan <small>30 hari terakhir</small>
													</h2>
													<ul class="nav navbar-right panel_toolbox">
														<li><a class="collapse-link"><i
																	class="fa fa-chevron-up"></i></a>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"
																role="button" aria-expanded="false"><i
																	class="fa fa-wrench"></i></a>
															<div class="dropdown-menu"
																aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="#">Settings 1</a>
																<a class="dropdown-item" href="#">Settings 2</a>
															</div>
														</li>
														<li><a class="close-link"><i class="fa fa-close"></i></a>
														</li>
													</ul>
													<div class="clearfix"></div>
												</div>
												<div class="x_content1">
													<div id="graph_bar_chart" style="width:100%; height:280px;"></div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>

										<!-- Line Charts group -->
										<div class="col-md-12 col-sm-12  ">
											<div class="x_panel">
												<div class="x_title">
													<h2>Grafik Produksi <small>30 hari terakhir</small></h2>
													<ul class="nav navbar-right panel_toolbox">
														<li><a class="collapse-link"><i
																	class="fa fa-chevron-up"></i></a>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"
																role="button" aria-expanded="false"><i
																	class="fa fa-wrench"></i></a>
															<div class="dropdown-menu"
																aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="#">Settings 1</a>
																<a class="dropdown-item" href="#">Settings 2</a>
															</div>
														</li>
														<li><a class="close-link"><i class="fa fa-close"></i></a>
														</li>
													</ul>
													<div class="clearfix"></div>
												</div>
												<div class="x_content1">
													<div id="graph_line_chart" style="width:100%; height:280px;"></div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>

									</div>
									<!-- end row -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /top tiles -->

		</div>
		<!-- /page content -->

		<!-- Modal form tambah permintaan -->
		<div id="tambahdata" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
			style="display: none;">
			<div class="modal-dialog modal-md">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title" id="add">Tambah Data Permintaan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- form data sample -->
						<div class="x_content">
							<br />
							<form id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">

								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span
											class="required">*</span>
									</label>
									<div class="col-md-8 col-sm-8 ">
										<input type="text" id="tanggal_minta" name="tanggal_minta" class="form-control"
											placeholder="yyyy-mm-dd" autocomplete="off">
									</div>
								</div>

								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align"
										for="first-name">Permintaan <span class="required">*</span>
									</label>
									<div class="col-md-8 col-sm-8 ">
										<input type="number" name="permintaan" id="permintaan" required="required"
											class="form-control" autocomplete="off">
									</div>
								</div>

								<!-- <div class="ln_solid"></div> -->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button id="btn_simpan_minta" class="btn btn-primary">Simpan</button>
					</div>
					</form>

				</div>
			</div>
		</div>

		<!-- Modal form tambah data persediaan -->
		<div id="tambahsedia" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
			style="display: none;">
			<div class="modal-dialog modal-md">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title" id="add">Sisa Produksi Hari ini</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- form data sample -->
						<div class="x_content">
							<br />
							<form id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span
											class="required">*</span>
									</label>
									<div class="col-md-8 col-sm-8 ">
										<input type="text" id="tanggal_sedia" value="<?php echo date('Y-m-d'); ?>"
											name="tanggal_sedia" readonly class="form-control" placeholder="yyyy-mm-dd"
											autocomplete="off">
									</div>
								</div>

								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align"
										for="first-name">Persediaan <span class="required">*</span>
									</label>
									<div class="col-md-8 col-sm-8 ">
										<input type="number" name="persediaan" id="persediaan"
											placeholder="Masukkan sisa produksi hari ini" required="required"
											class="form-control" autocomplete="off">
										<span class="text-danger"><i>NB: SISA HARI INI = PERSEDIAAN BESOK</i></span>
									</div>
								</div>

								<!-- <div class="ln_solid"></div> -->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button id="btn_simpan_sedia" class="btn btn-primary">Simpan</button>
					</div>
					</form>

				</div>
			</div>
		</div>

		<!-- footer content -->
		<?php $this->load->view('menu/footer-content'); ?>
		<!-- /footer content -->
	</div>
	</div>

	<!-- jQuery -->
	<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js')?>"></script>
  <script src="<?php echo base_url().'/assets/js/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
  <!-- Sweetalert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
	<!-- MorrisJs from cdn -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!-- PNotify -->
  <script src="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.buttons.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.nonblock.js')?>"></script>

   <!-- Select2 -->
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url('assets/build/js/custom.min.js')?>"></script>

	<script>
    // Notify
    function notify() {
      new PNotify({
        title: 'Data berhasil disimpan',
        text: 'Permintaan berhasil disimpan',
        type: 'success',
        hide: false,
        styling: 'bootstrap3'
    }, 3000);
    };


    $('#tanggal_minta').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
   	});
     $('#tanggal_sedia').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
   	});

    $(document).ready(function() {
        $('#userid').select2();
    });


    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    // Chart
		var ctx = document.getElementById("graph_bar_chart");
		Morris.Bar({
			element: 'graph_bar_chart',
			data: <?php echo $data; ?> ,
			xkey : 'tanggal',
			ykeys: ['permintaan', 'persediaan'],
			labels: ['Permintaan', 'Persediaan'],
		});

		Morris.Line({
			element: 'graph_line_chart',
			data: <?php echo $cline ?> ,
			xkey: 'tanggal',
			ykeys: ['produksi'],
			labels: ['Produksi'],
		});

    $('#btn_simpan_minta').on('click', function () {
      // setTimeout(function(){
      //     location.reload();
      // }, 3000);
    	var tanggal = $('#tanggal_minta').val();
    	var permintaan = $('#permintaan').val();
    	$.ajax({
    		type: "POST",
    		url: "<?php echo base_url('permintaan/inputPermintaan')?>",
    		dataType: "JSON",
    		data: {
    			tanggal: tanggal,
    			permintaan: permintaan
    		},
    		success: function (data) {
    			$('[name="tanggal_minta"]').val("");
    			$('[name="permintaan"]').val("");;
    			$('#tambahdata').modal('hide');

          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Permintaan berhasil disimpan',
            confirmButtonText: 'OK 👍'
          }).then((result) => {
            location.reload();
          });
    		}
    	});
    	return false;
    });

    $('#btn_simpan_sedia').on('click', function () {
    	var tanggal = $('#tanggal_sedia').val();
    	var persediaan = $('#persediaan').val();
    	$.ajax({
    		type: "POST",
    		url: "<?php echo base_url('persediaan/updatePersediaan')?>",
    		dataType: "JSON",
    		data: {
    			tanggal: tanggal,
    			persediaan: persediaan
    		},
    		success: function (data) {
    			$('[name="tanggal_sedia"]').val("");
    			$('[name="persediaan"]').val("");;
    			$('#tambahsedia').modal('hide');

          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'persediaan berhasil diperbarui',
            confirmButtonText: 'OK 👍'
          }).then((result) => {
            location.reload();
          });
    		}
    	});
    	return false;
    });
 
	</script>

</body>

</html>
