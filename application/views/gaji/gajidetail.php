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
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Gaji Pokok</th>
                            <th>Gaji Sekunder</th>
                            <th>Total Absen</th>
                            <th>Status</th>
                            <!-- <th></th> -->
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($gaji as $b): ?>
                                <tr>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $b->nama; ?>
                                                </span> <br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $b->bulan; ?>
                                                </span> <br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $b->gaji_pokok; ?>
                                                </span> <br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $b->gaji_sekunder; ?>
                                                </span> <br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $absen; ?>
                                                </span> <br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-8 pl-1 mt-3">
                                                <span class="font-weight-bold">
                                                    <?= $b->status; ?>
                                                </span> <br>
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