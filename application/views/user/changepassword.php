<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>


	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-sm border-bottom-primary">
				<div class="card-header bg-white py-3">
					<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
						Change Password
					</h4>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<form action="<?= base_url('user/changepassword'); ?>" method="post">
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="current_password">Current
								Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" id="current_password"
									name="current_password" placeholder="Current Password">
								<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="new_password1">New
								Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" id="new_password1" name="new_password1"
									placeholder="New Password">
								<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="new_password2">Repeat
								Password</label>
							<div class="col-md-9">
								<input type="password" class="form-control" id="new_password2" name="new_password2"
									placeholder="Repeat Password">
								<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-9 offset-md-3">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
