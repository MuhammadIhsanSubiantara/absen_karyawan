<div class="row">
	<div class="col-12 col-md-4">
		<div class="card">
			<form action="<?= base_url('user/update_foto') ?>" method="post" enctype="multipart/form-data">
				<div class="card-header">
					<h4 class="card-title">Foto Profil</h4>
				</div>
				<div class="card-body text-center">
					<img src="<?= base_url('assets/img/profil/' . $user->foto) ?>" alt="Foto Profil"
						class="d-fluid w-75">
				</div>
				<div class="card-footer">
					<div class="custom-file mb-3">
						<input type="file" name="foto" class="custom-file-input" id="input-foto"
							aria-describedby="input-foto" accept="image/*">
						<label class="custom-file-label" for="input-foto">Pilih Gambar</label>
					</div>

					<button type="submit" class="btn btn-primary btn-block mt-2">Simpan <i
							class="fa fa-save"></i></button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-12 col-md-8">
		<div class="card">
			<form action="<?= base_url('user/edit_profil') ?>" method="post">
				<div class="card-header">
					<h4 class="card-title">Edit Profil</h4>
				</div>
				<div class="card-body border-top py-0 my-3">
					<h4 class="text-muted my-3">Profil</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="nik">NIk : </label>
								<input type="hidden" name="id_user" value="<?= $this->uri->segment(3) ?>">
								<input type="text" name="nik" id="nik" value="<?= $user->nik ?>" class="form-control"
									placeholder="Masukan NIK Karyawan" disabled required="reuqired" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="nama">Nama Lengkap : </label>
								<input type="text" name="nama" id="nama" value="<?= $user->nama ?>" class="form-control"
									placeholder="Masukana Nama Lengkap Karyawan" required="reuqired" />
							</div>
						</div>
					</div>
					<div class="row">
						<div
							class="col-xs-12 <?= ($this->session->role == 'Karyawan') ? 'col-sm-6 col-md-4' : 'col-sm-6' ?>">
							<div class="form-group">
								<label for="telp">No. Telp : </label>
								<input type="tel" name="telp" id="telp" value="<?= $user->telp ?>" class="form-control"
									placeholder="Masukan No. Telp" required="reuqired" />
							</div>
						</div>
						<div
							class="col-xs-12 <?= ($this->session->role == 'Karyawan') ? 'col-sm-6 col-md-4' : 'col-sm-6' ?>">
							<div class="form-group">
								<label for="email">E-mail : </label>
								<input type="email" name="email" id="email" value="<?= $user->email ?>"
									class="form-control" placeholder="Masukan Email" required="reuqired" />
							</div>
						</div>
					</div>
				</div>
				<div class="card-body border-top py-0 my-3">
					<h4 class="text-muted my-3">Akun</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" value="<?= $user->username ?>"
									class="form-control" placeholder="Masukan Username" required="reuqired" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control"
									placeholder="********" />
								<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row w-100">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<button type="submit" class="btn btn-primary btn-block">Simpan <i
									class="fa fa-save"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
