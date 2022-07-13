<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>


	<div class="row">
		<div class="col-lg">
			<?php if(validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors();?>
			</div>
			<?php endif; ?>

			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-black">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-black">
										Form Tambah Karyawan
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/employeeprofile');?>"
										class="btn btn-sm btn-secondary btn-icon-split">
										<span class="icon">
											<i class="fa fa-arrow-left"></i>
										</span>
										<span class="text">
											Kembali
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">


							<?= form_open(); ?>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_employee">ID Employee</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('id_employee'); ?>" name="id_employee"
											id="id_employee" type="text" class="form-control">
									</div>
									<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="kode_pegawai">Kode Karyawan</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('kode_pegawai'); ?>" name="kode_pegawai" id="kode_pegawai" type="text"
											class="form-control" required>
									</div>
									<?= form_error('kode_pegawai', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="name">Nama Karyawan</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('name'); ?>" name="name" id="name" type="text"
											class="form-control" required>
									</div>
									<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="username">Username Karyawan</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('username'); ?>" name="username" id="username" type="text"
											class="form-control" required>
									</div>
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="email">Email</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('email'); ?>" name="email" id="email" type="email"
											class="form-control" required>
									</div>
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="jabatan">Jabatan</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('jabatan'); ?>" name="jabatan" id="jabatan" type="text"
											class="form-control" required>
									</div>
									<?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="instansi">Instansi</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="CPN" name="instansi" id="instansi" type="text"
											class="form-control" readonly>
									</div>
									<?= form_error('instansi', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="npwp">NPWP</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('npwp'); ?>" name="npwp"
											id="npwp" type="text" class="form-control" required>
									</div>
									<?= form_error('npwp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="umur">Umur</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('umur'); ?>" name="umur" id="umur"
											type="text" class="form-control date" required>
									</div>
									<?= form_error('umur', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tempat_lahir">Tempat Lahir</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tempat_lahir'); ?>" name="tempat_lahir"
											id="tempat_lahir" type="text" class="form-control" required>
									</div>
									<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_lahir">Tanggal Lahir</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tgl_lahir'); ?>" name="tgl_lahir" id="tgl_lahir"
											type="date" class="form-control date" required>
									</div>
									<?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="role_id">Role Akun</label>
								<div class="col-md-5">
									<div class="input-group">
										<select name="role_id" id="role_id" class="custom-select">
											<option value="<?= set_value('role_id'); ?>" selected disabled>Pilih Role Akun
											</option>
											<?php foreach ($role as $r) : ?>
											<option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="input-group-append">
										</div>
									</div>
									<?= form_error('role_id', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_gender">Jenis Kelamin</label>
								<div class="col-md-5">
									<div class="input-group">
										<select name="id_gender" id="id_gender" class="custom-select">
											<option value="<?= set_value('id_gender'); ?>" selected disabled>Pilih Jenis Kelamin
											</option>
											<?php foreach ($gender as $gd) : ?>
											<option value="<?= $gd['id_gender'] ?>"><?= $gd['gender'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="input-group-append">
										</div>
									</div>
									<?= form_error('id_gender', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="bagian_shift">Bagian Shift</label>
								<div class="col-md-5">
									<div class="input-group">
										<select name="bagian_shift" id="bagian_shift" class="custom-select">
											<option value="<?= set_value('bagian_shift'); ?>" selected disabled>Choose
												Bagian Shift
											</option>
											<?php foreach ($bagian_shift as $bs) : ?>
											<option value="<?= $bs['id_bagian_shift'] ?>"><?= $bs['bagian_shift'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="input-group-append">
										</div>
									</div>
									<?= form_error('id_bagian_shift', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-9 offset-md-4">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
