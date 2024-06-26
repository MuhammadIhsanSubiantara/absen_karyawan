<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Waktu Jam Kerja</h4>
                <!-- <p class="card-category"></p> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Keterangan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($jam as $i => $j): ?>
                                <tr id="<?= 'jam-' . $j->id_jam ?>">
                                    <td><?= ($i+1) ?></td>
                                    <td><?= $j->keterangan ?></td>
                                    <td class=""><?= $j->start ?></td>
                                    <td class="jam-finish"><?= $j->finish ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm btn-edit-jam" data-toggle="modal" data-target="#edit-jam" data-jam="<?= base64_encode(json_encode($j)) ?>"><i class="fa fa-edit"></i> Edit</a>
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