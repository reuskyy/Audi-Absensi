<div class="row">
		<div class="col-lg">
			<?php if(validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors();?>
			</div>
			<?php endif; ?>

			<?= $this->session->set_flashdata('message'); ?><div class="row justify-content-center">
                
										
<div class="col-xl-5"  style="padding-left:15vw";>
			<div class="card mb-4">
				<div class="card-header text-center"><span class="fas fa-clock mr-1"></span>Absensi</div>
				<div class="card-body text-center">
					<div id="infoabsensi"></div>
					<div id="location-maps" style="display: none;"></div>
					<div id="date-and-clock">
						<h3 id="clocknow"></h3>
						<h3 id="datenow"></h3>
					</div>
					<div class="mt-2">
                    <?= form_open(); ?>
						<div id="func-absensi">

                        <!-- <div class="btn-group">
  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background-color: #FFFF; border: 2px solid 	#A9A9A9;">
  Keterangan
  </button> -->
  <?= form_dropdown('keterangan_absen', ['Bekerja Di Kantor / WFO' => 'Bekerja Di Kantor / WFO', 
                    'Bekerja Di Rumah / WFH' => 'Bekerja Di Rumah / WFH'], '', 
                    ['class' => 'form-control align-content-center my-2', 'id' => 'keterangan_absen']); ?> 

                            <input value="<?= $usernya['id_employee']?>" name="id_employee" id="id_employee" type="hidden"
											class="form-control" readonly required>
							<div id="jam_absen">
								<p>Waktu Datang:
								</p>
							</div>
						</div>
						
						<button class="btn btn-dark" type="submit" id="btn-absensi">Absen</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            </div>
            </div>