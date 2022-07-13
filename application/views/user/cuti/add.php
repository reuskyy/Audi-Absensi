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

			<?= $this->session->set_flashdata('message'); ?><div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Leaves
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('user/leaves');?>"
										class="btn btn-sm btn-secondary btn-icon-split">
										<span class="icon">
											<i class="fa fa-arrow-left"></i>
										</span>
										<span class="text">
											Back
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message'); ?>


							<?= form_open(); ?>
										<input value="<?= $usernya['id_employee']?>" name="id_employee" id="id_employee" type="hidden"
											class="form-control" readonly required>

							<div class="row form-group">
							<label class="col-md-4 text-md-right" for="id_tipe_cuti">Tipe Cuti</label>
							<div class="col-md-5">
								<div class="input-group">
									<select name="id_tipe_cuti" id="id_tipe_cuti" class="custom-select" required>
										<option value="<?= set_value('id_tipe_cuti'); ?>" selected disabled>
										</option>
										<?php foreach ($tipe_cuti as $l) : ?>
										<option value="<?= $l['id_tipe_cuti'] ?>"><?= $l['tipe_cuti'] ?></option>
										<?php endforeach; ?>
									</select>
									<div class="input-group-append">
									</div>
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
										<textarea value="<?= set_value('alasan_cuti'); ?>" name="alasan_cuti" id="alasan_cuti" type="text"
											class="form-control" required></textarea>
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
										<input value="<?= set_value('tgl_mulai'); ?>" name="tgl_mulai" id="tgl_mulai" type="date"
											class="form-control" required>
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
										<input value="<?= set_value('tgl_akhir'); ?>" name="tgl_akhir" id="tgl_akhir" type="date"
											class="form-control" required>
									</div>
									<?= form_error('tgl_akhir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

						<div class="row form-group">
							<div class="col-md-9 offset-md-4">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>