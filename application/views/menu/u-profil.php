<div class="navbar nav_title" style="border: 0;">
	<a href="<?php echo base_url('users/dashboard'); ?>" class="site_title"><img width="25px" height="25px" src="<?php echo base_url('assets/images/icon.png') ?>" alt=""> <span>Donat is Bulat</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
	<div class="profile_pic">
		<img src="<?php echo base_url('assets/images/img.jpg')?>" alt="..." class="img-circle profile_img">
	</div>
	<div class="profile_info">
		<span>Welcome,</span>
		<h2><?php echo $this->session->userdata('ses_name'); ?></h2>
	</div>
</div>