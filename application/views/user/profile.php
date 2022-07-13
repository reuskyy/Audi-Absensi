<!-- Begin Page Content -->
	<div class="container-fluid"  
	style="padding-left: 14vw";> 
    <div class="row mt-3" style="
    padding-left: 15vw;
">
	<!-- Page Heading -->
	<h1 class="my-4"><span class="fas fa-address-card mr-2"></span>Profil Saya</h1>
	<?= $this->session->flashdata('pesan'); ?>

	<div class="row">
		<div class="col-lg-6">
		</div>
	</div>

	<div class="card p-2 shadow-sm border-bottom-primary">
		<div class="card-header bg-white">
			<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
			</h4>
			<div class="card-body">
				<div class="row">
					<div class="col-md-2 mb-4 mb-md-0">
						<img src="<?= base_url('assets/img/profile/') . $user['image'];?>" alt=""
							class="img-thumbnail rounded mb-2">
						<a href="<?= base_url('user/edit'); ?>" class="btn btn-sm btn-block btn-primary"><i
								class="fa fa-edit"></i>Edit Profile</a>
						<a href="<?= base_url('user/changePassword'); ?>" class="btn btn-sm btn-block btn-primary"><i
								class="fa fa-lock"></i> Change Password</a>
					</div>
					<div class="col-md-10">
						<h4>Account Information</h4>
						<table class="table">
							<tr>
								<th width="200">NIP</th>
								<td><?= $user['id_employee'];?></td>
							</tr>
							<tr>
								<th width="200">Name</th>
								<td><?= $user['name'];?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?= $user['email'];?></td>
							</tr>
							<tr>
								<th>Member since</th>
								<td class="text-capitalize"><?= date('d F Y', $user['date_created']) ;?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
