<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message');
                             ?>
		</div>
	</div>

	<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Preview Karyawan</h5><hr>
        <p class="card-text">
        <table class="table">
									<tr>
                                    <?php foreach($employeeprofile as $ep) : ?>
										<th width="200">NIP</th>
										<td><?= $ep['id_employee'];?></td>
									</tr>
									<tr>
										<th>Name</th>
										<td><?= $ep['name'];?></td>
									</tr>
                                    <?php endforeach; ?>
								</table>
        </p>
        <a href="<?= base_url('admin/employeeprofile')?>" class="btn btn-primary">Tutup</a>
      </div>
    </div>
  </div>