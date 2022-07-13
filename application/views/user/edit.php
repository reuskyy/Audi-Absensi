<!-- Begin Page Content -->
 <div class="container-fluid"  
	style="padding-left: 14vw";> 

	<!-- Page Heading -->
	<h1 class="my-4" style="padding-left: 14vw"; ><span class="fas fa-address-card mr-2"></span>Edit Profil</h1>
	<?= $this->session->flashdata('pesan'); ?>

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-sm border-bottom-primary">
				<div class="card-header bg-white py-3">

				</div>
				<div class="card-body">
				<?php echo form_open_multipart('user/edit');?>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="image">Image</label>
						<div class="col-md-7">
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url() ?>assets/img/profile/<?= $user['image']; ?>"
										alt="<?= $user['name']; ?>" class="rounded-circle shadow-sm img-thumbnail">
								</div>
								<div class="col-9">
									<input type="file" class="custom-file-input" id="image" name="image">
									<label class="btn btn-outline-primary" for="image">Photo
										Profile</label>
									<?= form_error('image', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="kode_pegawai">Kode Karyawan</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= set_value('kode_pegawai', $user['kode_pegawai']); ?>" name="kode_pegawai" id="kode_pegawai"
									type="text" class="form-control" placeholder="Your kode_pegawai..." readonly>
							</div>
							<?= form_error('kode_pegawai', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="name">Name</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= set_value('name', $user['name']); ?>" name="name" id="name"
									type="text" class="form-control" placeholder="Your name..."  readonly>
							</div>
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="email">Email</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control" id="email" name="email"
									value="<?= $user['email'];?>" readonly>
							</div>
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="tempat_lahir">Tempat Lahir</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
									value="<?= $user['tempat_lahir'];?>">
							</div>
							<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="tgl_lahir">Tanggal Lahir</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-envelope"></i></span>
								</div>
								<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
									value="<?= $user['tgl_lahir'];?>">
							</div>
							<?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-9 offset-md-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
