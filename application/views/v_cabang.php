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
							<div class="x_panel">
								<!-- <div class="alert alert-warning alert-dismissible " role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
											aria-hidden="true">×</span>
									</button>
									<strong style="color: red;">Warning! <i class="fa fa-warning"></i></strong> This page is under development. Dont make any change!
								</div> -->
								<div class="x_title">
									<h2>Halaman Data Cabang</h2>
									<ul class="nav navbar-right panel_toolbox">
										<?php 
											$level = $this->session->userdata('ses_level');
											if($level == 'admin'){
												echo "<li><a href='#tambahdata' data-target='#tambahdata' data-toggle='modal' class='btn btn-info'>Tambah Data <i class='fa fa-plus'></i></a></li>";
												
											}
										?>
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
												<th>Nama cabang</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
											$no=0; $no++;
											foreach($data->result_array() as $row):
											?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><b><?php echo $row['cabang_nama'] ?></b></td>
												<td><b><?php echo $row['cabang_alamat'] ?></b></td>
												<td style="text-align: center;">
												
												<?php 
												$level = $this->session->userdata('ses_level');
												if($level == 'admin'){
													echo "<button data-toggle='modal' data-target='#update$row[cabang_id]'  class='btn btn-sm btn-info'> Update <i class='fa fa-edit'></i></button>";
													echo "<button data-toggle='modal' data-target='#delete$row[cabang_id]'  class='btn btn-sm btn-danger'> Delete <i class='fa fa-trash'></i></button>";
												} else {
													echo "<a href='#' data-toggle='tooltip' data-placement='top' title='' data-original-title='Tidak ada aksi! Karena bukan Administrator.'><span class='badge badge-info'>Forbidden</span></a>";
												} ?>
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

            <!-- modal tambah Cabang -->
            <div id="tambahdata" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
            	style="display: none;">
            	<div class="modal-dialog modal-lg">
            		<div class="modal-content">

            			<div class="modal-header">
            				<h4 class="modal-title" id="add">Tambah Data Cabang</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            						aria-hidden="true">×</span>
            				</button>
            			</div>
            			<div class="modal-body">
            				<!-- form tambah Cabang -->
                            <div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('cabang/insertCabang') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Cabang <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="text" name="nama" id="nama" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</label>
											<div class="col-md-8 col-sm-8 ">
												<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"></textarea>
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

			<!-- modal update data -->
			<?php foreach($update->result_array() as $row): ?>
			<div id="update<?php echo $row['cabang_id'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"
            	style="display: none;">
            	<div class="modal-dialog modal-lg">
            		<div class="modal-content">

            			<div class="modal-header">
            				<h4 class="modal-title" id="add">Update data <b><?php echo  $row['cabang_nama'] ?></b> ?</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            						aria-hidden="true">×</span>
            				</button>
            			</div>
            			<div class="modal-body">
            				<!-- form update user -->
                            <div class="x_content">
									<br />
									<form method="POST" action="<?php echo base_url('cabang/updateCabang') ?>" id="form-hitung" data-parsley-validate class="form-horizontal form-label-left">
										<input type="hidden" value="<?php echo $row['cabang_id'] ?>" name="id" id="id">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Cabang <span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 ">
												<input type="text" name="nama" value="<?php echo $row['cabang_nama'] ?>" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat Cabang <span class="required">*</label>
											<div class="col-md-8 col-sm-8 ">
												<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"><?php echo $row['cabang_alamat'] ?></textarea>
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
				<div id="delete<?php echo $i['cabang_id'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
						<form method="POST" action="<?php echo base_url('cabang/deleteCabang') ?>">
                        <div class="modal-header">
                          <h4 class="modal-title red" id="myModalLabel2"><i class="fa fa-warning"></i> Peringatan!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
							<input type="hidden" name="id" value="<?php echo $i['cabang_id'] ?>">
                          <h4>Yakin ingin menghapus Cabang <b class="red"><?php echo $i['cabang_nama'] ?></b> ?</h4>
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

			<!-- /page content -->

			<!-- footer content -->
			<?php $this->load->view('menu/footer-content'); ?> 
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
</body>

</html>