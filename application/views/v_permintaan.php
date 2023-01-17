<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url('assets/images/icon.png'); ?>" type="image/ico" />

	<title> <?php echo $title; ?> </title>

	<!-- Bootstrap -->
	<link href="<?= base_url().'assets/vendors/bootstrap/dist/css/bootstrap.min.css';?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url().'assets/vendors/font-awesome/css/all.min.css';?>" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url().'assets/vendors/nprogress/nprogress.css';?>" rel="stylesheet">
	<!-- jQuery custom content scroller -->
	<link href="<?= base_url().'assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css';?>"
		rel="stylesheet" />
	<!-- datepicker -->
	<link href="<?php echo base_url().'/assets/js/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'?>" rel="stylesheet" >

	<!-- Datatables -->

	<link href="<?= base_url().'assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css';?>" rel="stylesheet">
	<link href="<?= base_url().'assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css';?>"
		rel="stylesheet">
	<link href="<?= base_url().'assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css';?>"
		rel="stylesheet">
	<link href="<?= base_url().'assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css';?>"
		rel="stylesheet">
	<link href="<?= base_url().'assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css';?>"
		rel="stylesheet">

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
							<?php $this->load->view('menu/alert'); ?>
							<div class="x_panel">
								<div class="x_title">
									<h2>Data Permintaan Tertunda</h2>
									<ul class="nav navbar-right panel_toolbox">
                                        <li><a style="color: white;" href="#tambahdata" data-target="#tambahdata" data-toggle="modal" class="btn btn-info">Tambah Data <i class="fa fa-plus"></i></a></li>
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
												aria-haspopup="true" aria-expanded="false"><i
													class="fa fa-wrench"></i></a>
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
									<table id="datatable-responsive"
										class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
										width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Permintaan</th>
                                                <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
											$no=0; $no++;
											foreach($permintaan->result_array() as $row):
											?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $row['tanggal'] ?></td>
												<td><b><?php echo $row['permintaan'] ?></b> Pcs</td>
                                                <td style="text-align: center; color: white;">
													<button data-toggle="modal" data-target="#proses<?php echo $row['id'] ?>"  class="btn btn-sm btn-info"><i class="fa fa-refresh"></i> Produksi </button>
													<button data-toggle="modal" data-target="#update<?php echo $row['id'] ?>"  class="btn btn-sm btn-warning"><i class="fa fa-pen-to-square"></i> Update </button>
													<button data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>

                                                </td>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- modal tambah dataset -->
            <div id="tambahdata" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
            	style="display: none;">
            	<div class="modal-dialog modal-md">
            		<div class="modal-content">

            			<div class="modal-header">
            				<h4 class="modal-title" id="add">Tambah Data Sample</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            						aria-hidden="true">×</span>
            				</button>
            			</div>
            			<div class="modal-body">
            				<!-- form data sample -->
                            <div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('permintaan/insertPermintaan') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
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
											<div class="col-md-8 col-sm-8 ">
												<input type="number" name="permintaan" id="first-name" required="required" class="form-control" autocomplete="off">
											</div>
										</div>

										<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Persediaan <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="number" name="persediaan" id="last-name" name="last-name" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Produksi </label>
											<div class="col-md-8 col-sm-8 ">
												<input type="number" name="produksi" id="middle-name" class="form-control" type="text" name="middle-name">
											</div>
										</div> -->
										
										<!-- <div class="ln_solid"></div> -->
								</div>
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            				<button type="submit" class="btn btn-primary">Simpan</button>
            			</div>
                        </form>

            		</div>
            	</div>
            </div>

			<!-- modal update permintaan -->
			<?php foreach ($update->result_array() as $row) :  ?>
            <div id="update<?php echo $row['id'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
            	style="display: none;">
            	<div class="modal-dialog modal-md">
            		<div class="modal-content">

            			<div class="modal-header">
            				<h4 class="modal-title" id="add">Ubah Permintaan ?</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            						aria-hidden="true">×</span>
            				</button>
            			</div>
            			<div class="modal-body">
            				<!-- form update-->
                            <div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('permintaan/updatePermintaan') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">
										<input type="hidden" name="id1" id="id1" value="<?php echo $row['id']; ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="text" value="<?php echo $row['tanggal'] ?>" id="tanggal1" name="tanggal1" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Permintaan <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="number" value="<?php echo $row['permintaan']; ?>" name="permintaan1" id="permintaan1" required="required" class="form-control" autocomplete="off">
											</div>
										</div>
										
										<!-- <div class="ln_solid"></div> -->
								</div>
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            				<button type="submit" class="btn btn-primary">Simpan</button>
            			</div>
                        </form>

            		</div>
            	</div>
            </div>
			<?php endforeach; ?>

			<!-- Modal Delete -->
            <?php foreach($delete->result_array() as $i): ?>
				<div id="delete<?php echo $i['id'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
						<form method="POST" action="<?php echo base_url('permintaan/deletePermintaan') ?>">
                        <div class="modal-header">
                          <h4 class="modal-title red" id="myModalLabel2"><i class="fa fa-warning"></i> Peringatan!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
							<input type="hidden" name="id2" value="<?php echo $i['id'] ?>">
                          <h4>Yakin ingin menghapus permintaan sebesar <b class="red"><?php echo $i['permintaan'] ?></b> Pcs ?</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
            <?php endforeach ?>

            <!-- modal proses produksi -->
            <?php foreach($permintaan1->result_array() as $key): ?>
            <div id="proses<?php echo $key['id'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
            	style="display: none;">
            	<div class="modal-dialog modal-md">
            		<div class="modal-content">

            			<div class="modal-header">
            				<h4 class="modal-title" id="add">Lanjutkan ke proses produksi ?</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            						aria-hidden="true">×</span>
            				</button>
            			</div>
            			<div class="modal-body">
            				<!-- form data sample -->
                            <div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('dataproses/getPrediksi') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <input type="hidden" name="id" value="<?php echo $key['id'] ?>">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input id="birthday" readonly  value="<?php echo $key['tanggal'] ?>" name="tanggal" class="form-control" type="text" required="required">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Permintaan <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="number" value="<?php echo $key['permintaan'] ?>" readonly name="permintaan" id="first-name" required="required" class="form-control" autocomplete="off">
											</div>
										</div>


										<!-- <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Produksi </label>
											<div class="col-md-8 col-sm-8 ">
												<input type="number" name="produksi" id="middle-name" class="form-control" type="text" name="middle-name">
											</div>
										</div> -->
										
										<!-- <div class="ln_solid"></div> -->
								</div>
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            				<button type="submit" class="btn btn-primary">Proses</button>
            			</div>
                        </form>

            		</div>
            	</div>
            </div>
            <?php endforeach; ?>

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
	<script
		src="<?= base_url().'assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js';?>">
	</script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js')?>"></script>
	<script src="<?php echo base_url().'/assets/js/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
	<!-- Sweetalert 2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url().'assets/vendors/datatables.net/js/jquery.dataTables.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-buttons/js/buttons.print.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js';?>">
	</script>
	<script src="<?= base_url().'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/jszip/dist/jszip.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/pdfmake/build/pdfmake.min.js';?>"></script>
	<script src="<?= base_url().'assets/vendors/pdfmake/build/vfs_fonts.js';?>"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?= base_url().'assets/build/js/custom.min.js'; ?>"></script>
	<script>
		$('#tanggal1').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
   	});
	</script>

</body>

</html>