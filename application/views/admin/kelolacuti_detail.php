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

			<?= $this->session->set_flashdata('message'); ?>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Edit Cuti
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/kelolacuti');?>"
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
							<?= $this->session->flashdata('message'); ?>


							<?= form_open(); ?>

							<?php
                    foreach ($cuti as $value ) {
                ?>

							<div class="row form-group">
								<!-- <label class="col-md-4 text-md-right" for="id_cuti">ID cuti</label> -->
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['id_cuti']; ?>" name="id_cuti"
											id="id_cuti" type="hidden" class="form-control" readonly>
									</div>
									<?= form_error('id_cuti', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_employee">NIP</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['id_employee']; ?>" name="id_employee"
											id="id_employee" type="text" class="form-control" readonly>
									</div>
									<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_employee">Name</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['name']; ?>" name="id_employee"
											id="id_employee" type="text" class="form-control" readonly>
									</div>
									<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
					<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_tipe_cuti">Tipe Cuti</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['tipe_cuti']; ?>" name="id_tipe_cuti"
											id="id_tipe_cuti" type="text" class="form-control" readonly>
									</div>
									<?= form_error('id_tipe_cuti', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="alasan_cuti">Alasan Cuti</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['alasan_cuti']; ?>" name="alasan_cuti"
											id="alasan_cuti" type="text" class="form-control" readonly>
									</div>
									<?= form_error('alasan_cuti', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_mulai">Tanggal Mulai</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo date('d-m-Y', strtotime($value['tgl_mulai'])); ?>" name="tgl_mulai"
											id="tgl_mulai" type="text" class="form-control" readonly>
									</div>
									<?= form_error('tgl_mulai', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_akhir">Tanggal Akhir</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo date('d-m-Y', strtotime($value['tgl_akhir'])); ?>" name="tgl_akhir" id="tgl_akhir"
											type="text" class="form-control" type="date" readonly>
									</div>
									<?= form_error('tgl_akhir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_status">Status Cuti</label>
								<div class="col-md-5">
									<div class="input-group">
										<select class="custom-select" name='id_status' id='id_status'
											value="<?php echo $a['id_status']; ?>">
											<option value='0' selected disabled></option>
											<?php foreach ($status_cuti as $a) { ?>
											<option value="<?php echo $a['id_status']; ?>" <?php if ($a['id_status'] == $value['id_status']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $a['status_cuti']; ?>
											</option>
											<?php } ?>
										</select>
									</div>
									<?= form_error('id_status', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="catatan">Catatan</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['catatan']; ?>" name="catatan" id="catatan"
											type="text" class="form-control">
									</div>
									<?= form_error('catatan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-9 offset-md-4">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
								<?php
                    }
                ?>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
