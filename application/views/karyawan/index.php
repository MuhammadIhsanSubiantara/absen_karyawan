<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-block">
				<h4 class="card-title float-left">Data Karyawan</h4>
				<div class="d-inline ml-auto float-right">
					<a href="<?= base_url('karyawan/create') ?>" class="btn btn-success btn-sm"><i
							class="fa fa-plus"></i> Tambah</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<th>No</th>
							<th width="30%">Karyawan</th>
							<th>Kontak</th>
							<th>Aksi</th>
							<!-- <th></th> -->
						</thead>
						<tbody>
							<?php foreach ($karyawan as $i => $k): ?>
								<tr>
									<td>
										<?= $i + 1 ?>
									</td>
									<td>
										<div class="row">
											<div class="col-4 pr-1">
												<img src="<?= base_url('assets/img/profil/' . $k->foto) ?>" alt="Img Profil"
													class="img-thumbnail rounded-circle w-100">
											</div>
											<div class="col-8 pl-1 mt-3">
												<span class="font-weight-bold">
													<?= $k->nama ?>
												</span> <br>
											</div>
										</div>
									</td>
									<td>
										<address>
											Email:
											<?= $k->email ?> <br>
											Telp:
											<?= $k->telp ?>
										</address>
									</td>
									<td>
										<a href="<?= base_url('karyawan/edit/' . $k->id_user) ?>"
											class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
										<button type="button" class="btn btn-danger btn-sm btn-delete ml-2"
											data-toggle="modal" data-target="#exampleModal">
											<i class="fa fa-trash"></i> Hapus
										</button>
										<div class="modal fade" id="exampleModal" tabindex="-1"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Apakah anda yakin ingin menghapus data karyawan ini?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Batal</button>
														<a href="<?= base_url('karyawan/destroy/' . $k->id_user) ?>"
															class="btn btn-danger"><i class="fa fa-trash"></i>
															Hapus</a>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
