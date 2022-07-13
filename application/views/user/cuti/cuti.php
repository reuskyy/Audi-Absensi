<?php if (is_it()) { ?>
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

			<?= $this->session->flashdata('pesan'); ?>




			<!-- DataTales Example -->
			<div class="row">
				<div class="col">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-black">
										Cuti
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('user/cuti_add') ?>"
										class="btn btn-sm btn-success btn-icon-split ">
										<span class="icon">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">
											Cuti
										</span>
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%"
										cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>Tipe Cuti</th>
												<th>Alasan Cuti</th>
												<th>Tanggal Mulai</th>
												<th>Tanggal Akhir</th>
												<th>Status Cuti</th>
												<th>Catatan</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($cuti as $c) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $c->tipe_cuti; ?></td>
												<td><?= $c->alasan_cuti; ?></td>
												<td><?= $c->tgl_mulai; ?></td>
												<td><?= $c->tgl_akhir; ?></td>
												<td>
																	<?php if($c->id_status==1){
																		echo'<a class="badge badge-warning">Menunggu...</a>';
																	} elseif($c->id_status==2){
																		echo '<a class="badge badge-success">Disetujui</a>';
																	} elseif($c->id_status==3){
																		echo '<a class="badge badge-danger">Ditolak</a>';
																	}; ?>
																</td>
												<td><?= $c->catatan; ?></td>
												<?php $i++; ?>
												<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>


						<!-- /.container-fluid -->

						<?php } else { ?>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
