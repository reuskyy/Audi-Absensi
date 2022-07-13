<div class="container-fluid" style="padding-left:15vw";>
	</div> 
	<div class="row mt-3">
		<div class="col-xl-7"  style="padding-left:15vw";>
			<div class="card mb-4">
				<div class="card-header text-center">
					<span class="fas fa-user mr-1"></span>Identitas Diri
				</div>
				<div class="card-body">
					<div class="row detail">
						<div class="col-md-2 col-sm-4 col-6 p-2">
							<img class="img-thumbnail"
								src="<?= ($user['image'] == 'default.png' ? base_url('assets\img\profile\default.png') : base_url('assets\img\profile/' . $user['image'])); ?>"
								class="card-img" style="width:45%;">
						</div>
						<div class="col-md-10 col-sm-8 col-6">
							<dl class="row">
								<dt class="col-sm-5">Nama Lengkap:</dt>
								<dd class="col-sm-7"><?= $user['name'] ?></dd>
								<dt class="col-sm-5">Umur:</dt>
								<dd class="col-sm-7"><?= $user['umur'] ?><div class="ml-1 d-inline">Tahun</div>
								</dd>
								<dt class="col-sm-5">Instansi:</dt>
								<dd class="col-sm-7 text-truncate"><?= $user['instansi'] ?></dd>
								<dt class="col-sm-5">Jabatan:</dt>
								<dd class="col-sm-7"><?= $user['jabatan'] ?></dd>
								<dt class="col-sm-5">NPWP:</dt>
								<dd class="col-sm-7"><?= $user['npwp'] ?></dd>
								<dt class="col-sm-5">Tempat / Tanggal Lahir:</dt>
								<dd class="col-sm-7"><?= $user['tempat_lahir'] ?>, <?= $user['tgl_lahir'] ?></dd>
								<dt class="col-sm-5">Jenis Kelamin:</dt>
								<dd class="col-sm-7">
									<?= $shiftpegawai = ($user['id_gender'] == 1) ? 'Laki-laki' : (($user['id_gender'] == 2) ? 'Perempuan' : ''); ?>
								</dd>
								<dt class="col-sm-5">Shift Bekerja:</dt>
								<dd class="col-sm-7">
									<?= $shiftpegawai = ($user['bagian_shift'] == 1) ? '<span class="badge badge-success">Full Time</span>' : (($user['bagian_shift'] == 2) ? '<span class="badge badge-warning">Part Time</span>' : '<span class="badge badge-primary">Shift Time</span>'); ?>
								</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Kode Karyawan: <?= $user['kode_pegawai'] ?></div>
						<div class="text-muted">Akun Dibuat: <?= date('d F Y', $user['date_created']); ?></div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-xl-5"  style="padding-right:10vw";>
			<div class="card mb-4">
				<div class="card-header text-center"><span class="fas fa-clock mr-1"></span>Absensi</div>
				<div class="card-body text-center">
					<div id="infoabsensi"></div>
					<!-- <?php if ($dataapp['maps_use'] == 1) : ?>
                        <div id='maps-absen' style='width: 100%; height:250px;'></div>
                        <hr>
                    <?php endif; ?>  -->
					<div id="location-maps" style="display: none;"></div>
					<div id="date-and-clock">
						<h3 id="clocknow"></h3>
						<h3 id="datenow"></h3>
					</div>
					<?= form_dropdown('ket_absen', ['Bekerja Di Kantor / WFO' => 'Bekerja Di Kantor / WFO', 'Bekerja Di Rumah / WFH' => 'Bekerja Di Rumah / WFH', 'Sakit' => 'Sakit', 'Cuti' => 'Cuti'], '', ['class' => 'form-control align-content-center my-2', 'id' => 'ket_absen']); ?>
					<div class="mt-2">
						<div id="func-absensi">
							<p class="font-weight-bold">Status:
								<?= $statuspegawai = (empty($dbabsensi['status_pegawai'])) ? '<span class="badge badge-primary">Belum Absen</span>' : (($dbabsensi['status_pegawai'] == 1) ? '<span class="badge badge-success">Sudah Absen</span>' : '<span class="badge badge-danger">Absen Terlambat</span>'); ?>
							</p>
							<div id="jamabsen">
								<p>Waktu Datang:
									<?= $jammasuk = (empty($dbabsensi['jam_masuk'])) ? '00:00:00' : $dbabsensi['jam_masuk']; ?>
								</p>
								<p>Waktu Pulang:
									<?= $jammasuk = (empty($dbabsensi['jam_pulang'])) ? '00:00:00' : $dbabsensi['jam_pulang']; ?>
								</p>
							</div>
						</div>
						
						<button class="btn btn-dark" id="btn-absensi">Absen</button>
                    </div>
                </div>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
					<script>
						$("#btn-absensi").click(function(e) {

							let ket_absen = $('#ket_absen').val();

$.ajax({
    type: "POST",
    url: '<?= base_url('admin/absenajax'); ?>',
    data: {
        ket_absen: ket_absen
    }, // serializes the form's elements.
    dataType: 'json',
   
    success: function(response) {
        if (response.success == true) {
            swal.fire({
                icon: 'success',
                title: 'Absen Sukses',
                text: 'Anda Telah Absen!',
                showConfirmButton: false,
                timer: 1500
            });
            $('#func-absensi').load(location.href + " #func-absensi");
        } else {
            $("#infoabsensi").html(response.msgabsen).show().delay(3000).fadeOut();
            swal.close()
        }
    },
    error: function() {
        swal.fire("Absen Gagal", "Ada Kesalahan Saat Absen!", "error");
    }
});


});
</script>
				<div class="card-footer">
					<div class="d-flex align-items-center justify-content-between">
						<div class="text-muted">Absen Datang Jam: 06:00:00</div>
						<div class="text-muted">Absen Pulang Jam: 17:00:00</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal QR Code -->
<div class="modal fade" id="qrcodemodal" tabindex="-1" role="dialog" aria-labelledby="qrcodemodal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="qrcodemodallabel"><span class="fas fa-qrcode mr-1"></span></h5>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<img class="img my-2"
						src="<?= $img_source = ($user['qr_code_image'] == 'no-qrcode.png' ? base_url('assets/img/no-qrcode.png') : base_url('storage/qrcode_pegawai/' . $user['qr_code_image'])); ?>"
						style="width:50%;">
				</div>
				<dl class="row">
					<dt class="col-sm-5">Nama Lengkap:</dt>
					<dd class="col-sm-7"><?= $user['name'] ?></dd>
					<dt class="col-sm-5">NPWP:</dt>
					<dd class="col-sm-7"><?= $user['npwp'] ?></dd>
					<dt class="col-sm-5">Kode Karyawan:</dt>
					<dd class="col-sm-7"><?= $user['kode_pegawai'] ?></dd>
				</dl>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>