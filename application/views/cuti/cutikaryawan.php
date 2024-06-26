<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('cuti/inputcuti') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title">Pengajuan Cuti</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                            <label for="id_user" >Karyawan:</label>
                                <?php if (is_role('Admin')): ?>
                                <select name="id_user" id="id_user" class="form-control" required>
                                    <option value="" class="form-control" disabled selected>Pilih Karyawan</option>
                                <?php foreach ($users as $b) { ?>
                                    <option value="<?= $b->id_user;?>" class="form-control"> <?= $b->nama; ?> </option>
                                    <?php } ?>
                                </select>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <!--<div class="form-group">
                                <label for="nama">Nama Lengkap : </label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukana Nama Lengkap Karyawan" required="reuqired" />
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="tanggal_cuti">Tanggal:</label>
                                <input type="date" id="tanggal_cuti" name="tanggal_cuti" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group">
                            <label for="tipe">Jenis Cuti:</label>
                            <select id="tipe" name="tipe" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Cuti</option>
                                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                                    <option value="Cuti Sakit">Cuti Sakit</option>
                                    <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                    <option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
                                    <option value="Cuti Lainnya">Cuti Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="form-group">
                                <label for="alasan">Keterangan:</label>
                                <textarea id="alasan" name="alasan" rows="4" cols="50" maxlength="128" required="" class="form-control"></textarea>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" onclick="history.go(-1)">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengajuan Cuti</h4>
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <tbody>
                        <tr>
                            <form action="<?= base_url('cuti/inputcuti') ?>" method="post">
                            <?php if (is_role('Admin')): ?>
                                <label for="id_user">Karyawan:</label><br>
                                <select name="id_user" id="id_user">
                                    <option value="all">-----all-----</option>
                                <?php foreach ($users as $b) { ?>
                                    <option value="<?= $b->id_user;?>"> <?= $b->nama; ?> </option>
                                    <?php } ?>
                                </select><br>
                            <?php endif ?>

                                <label for="tanggal_cuti">Tanggal:</label><br>
                                <input type="date" id="tanggal_cuti" name="tanggal_cuti" required=""><br><br>

                                <select id="alasan" name="alasan" required>
                                    <option value="" disabled selected>Pilih Jenis Cuti</option>
                                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                                    <option value="Cuti Sakit">Cuti Sakit</option>
                                    <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                    <option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
                                    <option value="Cuti Lainnya">Cuti Lainnya</option>
                                </select>
                                <br><br>
                                <label for="keterangan">Keterangan:</label><br>
                                <textarea id="keterangan" name="keterangan" rows="4" cols="50" maxlength="128" required=""></textarea>
                                    <br><br>
                                <button onclick="history.go(-1)">Cancel</button><button type="submit"
                                    value="Submit">Submit</button>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>