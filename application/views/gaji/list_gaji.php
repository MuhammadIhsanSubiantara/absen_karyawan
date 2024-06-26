
<div class="row mb-2">
	<h4 class="col-xs-12 col-sm-6 mt-0">Daftar Gaji</h4>
	<div class="col-xs-12 col-sm-6 ml-auto text-right">
		<form action="" method="get">
			<div class="row">
				<div class="col ">
					<select name="tahun" id="tahun" class="form-control">
						<option value="" disabled selected>-- Pilih Tahun</option>
						<?php for ($i = date('Y'); $i >= (date('Y') - 10); $i--): ?>
							<option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="col ">
					<button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header border-bottom">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<table class="table border-0">
							<tr>
								<th class="border-0 py-0">Nama</th>
								<th class="border-0 py-0">:</th>
								<th class="border-0 py-0">
									<?= $karyawan->nama ?>
								</th>
							</tr>
							<tr>
								<th class="border-0 py-0">No Telepon</th>
								<th class="border-0 py-0">:</th>
								<th class="border-0 py-0">
									<?= $karyawan->telp ?>
								</th>
							</tr>
							<tr>
								<th class="border-0 py-0">Email</th>
								<th class="border-0 py-0">:</th>
								<th class="border-0 py-0">
									<?= $karyawan->email ?>
								</th>
							</tr>
						</table>
					</div>
					<div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
						<div class="dropdown d-inline">
							<form action="<?= base_url('gaji/pdf_list')?>" method="post">
							<input type="submit" text="PDF"></form>
							<?php if(is_role('Admin')) {?>
							<a href="<?= base_url('gaji/set_gaji/'. $this->uri->segment(3))?>"><button class="btn btn-secondary" type="button" >
								<i class="fa fa-plus"></i>
								Tambah
							</button>
							</a>
							<?php }?>
							<div class="dropdown-menu" aria-labelledby="droprop-action">
								<a href="" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead>
						<th>No</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Gaji Pokok</th>
						<th>Gaji Sekunder</th>
						<th>Total Absen</th>
						<th>Bonus</th>
						<th>Total Gaji</th>
						
					</thead>
					<tbody>
						<?php
							if($gaji){
								$no = 1;
								foreach ($gaji as $row) {

						?>
								<tr>
								<td><?= $no?></td>
								<form action="<?= base_url('gaji/pdf_list')?>" method="post">
								
									
									<td><?= $row['bulan']?></td>
									<td><?= $row['tahun']?></td>
									<td><?= $row['gaji_pokok']?></td>
									<td><?= $row['gaji_sekunder']?></td>
									<td><?= $row['total_absen']?></td>
									<td><?= $row['bonus']?></td>
									<td><?= $row['total_gaji']?></td>

									<input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']?>">
									<input type="hidden" name="bulan" id="bulan" value="<?= $row['bulan']?>">
									<input type="hidden" name="tahun" id="tahun" value="<?= $row['tahun']?>">
									<input type="hidden" name="gaji_pokok" id="gaji_pokok" value="<?= $row['gaji_pokok']?>">
									<input type="hidden" name="gaji_sekunder" id="gaji_sekunder" value="<?= $row['gaji_sekunder']?>">
									<input type="hidden" name="total_absen" id="total_absen" value="<?= $row['total_absen']?>">
									<input type="hidden" name="bonus" id="bonus" value="<?= $row['bonus']?>">
									<input type="hidden" name="total_gaji" id="total_gaji" value="<?= $row['total_gaji']?>">
									
									<td><input type="submit"></td>
								</tr>
						<?php
								$no++;
							}
							}else{
						?>
							<tr>
								<td colspan="9">Data Tidak ada</td>
							</tr>
						<?php
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>