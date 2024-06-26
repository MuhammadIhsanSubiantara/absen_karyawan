<!--
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengajuan Cuti</h4>
                
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <form method="post" action="<?= base_url('cuti/tambahcuti') ?>"><br>
                                    <h5><input type="submit" value="Submit Cuti"></h5>
                                </form>
                            </th>
                        </thead>
                        
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Alasan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $a = 1;
                        foreach ($cuti as $b) { ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>

                                <td><?= $b->nama; ?></td>

                                <td><?= $b->tanggal_cuti; ?></td>

                                <td>
                                    <div class="content"><?= $b->alasan; ?></div>
                                </td>
                                <td>
                                    <?php if (is_role('Admin')): ?>
                                        <form action="cuti/togglecuti" method="post">
                                            <input type="hidden" id="id_cuti" name="id_cuti" value=<?= $b->id_cuti; ?>>
                                            <input type="submit" name="status" value="<?= $b->status; ?>">
                                        </form>
                                        <?php else: ?>
                                            <?= $b->status; ?>
                                            <?php endif ?>
                                    </td>

                            </tr>
                        <?php } ?>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <style max-width: 400px; word-wrap: break-word;></style> -->
    <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-block">
				<h4 class="card-title float-left">Data Cuti</h4>
				<div class="d-inline ml-auto float-right">
					<a href="<?= base_url('cuti/tambahcuti') ?>" class="btn btn-success btn-sm"><i
							class="fa fa-plus"></i> Tambah Cuti</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<th>No.</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Status</th>
							<!-- <th></th> -->
						</thead>
						<tbody>
							<?php $a = 1; foreach ($cuti as $b) : ?>
								<tr>
									<td>
										<?= $a++ ?>
									</td>
									<td>
										<div class="row">
											
											<div class="col-8 pl-1 mt-3">
												<span class="font-weight">
                                                <?= $b->nama; ?>
												</span> <br>
											</div>
										</div>
									</td>
									<td>
                                    <div class="row">
											
											<div class="col-8 pl-1 mt-3">
												<span class="font-weight">
                                                <?= $b->tanggal_cuti; ?>
												</span> <br>
											</div>
										</div>
									</td>
                                    <td>
                                    <div class="row">
											
											<div class="col-8 pl-1 mt-3">
												<span class="font-weight">
                                                <?= $b->tipe; ?>
												</span> <br>
											</div>
										</div>
									</td>
                                    <td>
                                    <div class="row">
											
											<div class="col-8 pl-1 mt-3">
												<span class="font-weight">
                                                <?= $b->alasan; ?>
												</span> <br>
											</div>
										</div>
									</td>
									<td><?php if ($b->status=='on'): 
                                        $warna = 'primary'
                                        ?>
                                        
                                        <?php else:
                                            $warna = 'danger'
                                            ?>
                                        <?php endif ?>
                                        <?php if (is_role('Admin')): ?>
                                        <form action="cuti/togglecuti" method="post">
                                            <input type="hidden" id="id_cuti" name="id_cuti" value=<?= $b->id_cuti; ?>>
                                            <input type="submit" name="status" class="btn btn-<?= $warna ?> btn-sm" value="<?= $b->status; ?>">
                                        </form>
                                        <?php else: ?>
                                            <input type="submit" name="status" class="btn btn-<?= $warna ?> btn-sm" value="<?= $b->status; ?>">
                                            <?php endif ?>
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