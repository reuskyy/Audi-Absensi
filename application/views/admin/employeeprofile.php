<!-- Begin Page Content -->
	<div class="container-fluid" style="padding-left: 14vw";> 
	<h1 class="my-4"><span class="fas fa-user-tie mr-2"></span>Data Karyawan</h1>
	<!-- Page Heading 
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1> -->


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
				<div class="col-md-12">
					<div class="card shadow-sm border-bottom-black">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<!-- <h4 class="h5 align-middle m-0 font-weight-bold text-black">
										Form Input Employee Profile
									</h4> -->
								</div>
								<div>
									<a href="<?= base_url('download/karyawan') ?>"
										class="btn btn-sm btn-success">
										<span class="icon">
											<i class="fa fa-download" aria-hidden="true"></i>
										</span>
										<span class="text">
											Excel
										</span>
									</a>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/employeeprofile_add') ?>"
										class="btn btn-sm btn-success">
										<span class="icon">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">
											Input Employee
										</span>
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<!-- <th>Foto</th> -->
												<th>Nama</th>
												<th>Username</th>
												<th>Kode Pegawai</th>
												<th>NPWP</th>
												<th>Jenis Kelamin</th>
												<th>Role</th>
												<th>Bagian Shift</th>
												<th>Verifikasi</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($employeeprofile as $ep) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<!-- <td><?= $ep['image']; ?></td> -->
												<td><?= $ep['name']; ?></td>
												<td><?= $ep['username']; ?></td>
												<td><?= $ep['kode_pegawai']; ?></td>
												<td><?= $ep['npwp']; ?></td>
												<td><?= $ep['gender']; ?></td>
												<td>
													<?php if($ep['role_id']==1){
																		echo'<a class="badge badge-danger">Administrator</a>';
																	} elseif($ep['role_id']==2){
																		echo '<a class="badge badge-success">Karyawan</a>';
																	}; ?>
												</td>
												<td><a class="badge badge-success"><?= $ep['bagian_shift']; ?></a></td>
												<td>
													<?php if($ep['is_active']==1){
																		echo'<a class="badge badge-success">Terverifikasi</a>';
																	} elseif($ep['is_active']==0){
																		echo '<a class="badge badge-danger">Tak Terverifikasi</a>';
																	}; ?>
												</td>
												<td>
													<a href="<?= base_url('admin/employeeprofile_lihat/') . $ep['id_employee'] ?>"
														class="btn btn-circle btn-success btn-sm"><i
															class="fa fa-user"></i></a>
													<a onclick="return confirm('Yakin ingin hapus?')"
														href="<?= base_url('admin/employeeprofile_delete/') . $ep['id_employee'] ?>"
														class="btn btn-circle btn-danger btn-sm"><i
															class="fa fa-trash"></i></a>
													<a href="<?= base_url('admin/employeeprofile_edit'); ?>?id=<?php echo $ep['id_employee']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
													<a href="<?= base_url('admin/toggle/') . $ep['id_employee'] ?>"
														class="btn btn-circle btn-sm <?= $ep['is_active'] ? 'btn-secondary' : 'btn-success' ?>"
														title="<?= $ep['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i
															class="fa fa-fw fa-power-off"></i></a>
												</td>
												<?php $i++; ?>
												<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<!-- /.container-fluid -->
