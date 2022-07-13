<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background : #F9FBFD;">


	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center"  href="<?= base_url('user/');?>" >
		<div class="sidebar-brand-icon">
			<img src="<?= base_url('assets/img/cpn_logo.png'); ?>" width="45" height="45">
		</div>
		<div class="sidebar-brand-text mx-3" style="color : #000;">CPN</div>
	</a>

	<!-- Divider -->
	<!-- menampilkan garis di sidebar -->

	<?php if($user['role_id'] <= 1){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['role_id'] <= 1){?>
	<div class="sidebar-heading" style="color : #B7BBBD;">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['role_id'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('admin/dashboard'); ?>">
			<i class="fas fa-fw fa-tachometer-alt" style="color : #B7BBBD;"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>
	<!-- Nav Item - Dashboard -->
	<?php if($user['role_id'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('admin/employeeprofile'); ?>">
			<i class="fas fa-fw fa-user" style="color : #B7BBBD;"></i>
			<span>Data Karyawann</span></a>
	</li>
	<?php } else ;?>

		<!-- Nav Item - Dashboard -->
		<?php if($user['role_id'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('admin/absenKaryawan'); ?>">
			<i class="fas fa-fw fa-tachometer-alt" style="color : #B7BBBD;"></i>
			<span>Absen Karyawan</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Kelola Cuti -->
	<?php if($user['role_id'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('admin/kelolacuti'); ?>">
			<i class="fas fa-fw fa-tachometer-alt" style="color : #B7BBBD;"></i>
			<span>Kelola Cuti</span></a>
	</li>
	<?php } else ;?>

	<!-- Setting ap -->
	<?php if($user['role_id'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('admin/settingapp'); ?>">
			<i class="fas fa-fw fa-tachometer-alt" style="color : #B7BBBD;"></i>
			<span>Setting app</span></a>
	</li>
	<?php } else ;?>
	<?php if($user['role_id'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" style="color : #000;" href="<?= base_url('user/absensi'); ?>">
			<i class="fas fa-fw fa-tachometer-alt" style="color : #B7BBBD;"></i>
			<span>Absensi</span></a>
	</li>
	<?php } else ;?>

	<!-- Divider -->
	<?php if($user['role_id'] <= 1){?>
	<hr class="sidebar-divider mt" >
	<?php } else ;?>


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->