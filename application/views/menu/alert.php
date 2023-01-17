<?php
if ($this->session->has_userdata('fail')) { ?>
<div class="alert alert-danger alert-dismissible " role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	</button>
	Gagal <i class="fa fa-warning"></i> <?php echo $this->session->userdata('fail');?>
</div>
<?php }elseif($this->session->has_userdata('success')){ ?>
	<div class="alert alert-success alert-dismissible " role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	</button>
	Success <i class="fa fa-info-circle"></i> <?php echo $this->session->userdata('success');?>
</div>
<?php }elseif($this->session->has_userdata('error')){ ?>
	<?php }elseif($this->session->has_userdata('success')){ ?>
	<div class="alert alert-danger alert-dismissible " role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	</button>
	Error <i class="fa fa-warning"></i> <?php echo $this->session->userdata('error');?>
</div>
<?php } ?>