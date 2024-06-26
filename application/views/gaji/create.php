<div class="row">
          <div class="col-12">
                    <div class="card">
                              <form action="<?= base_url('gaji/store') ?>" method="post">
                              <input type="hidden" name="id_user" value="<?= $this->uri->segment(3)?>">
                                        <div class="card-header">
                                                  <h4 class="card-title">Penggajian</h4>
                                        </div>
                                        <div class="card-body border-top py-0 my-3">
                                                  <h4 class="text-muted my-3">Karyawan</h4>
                                                  <div class="row">
                                                            <div class="col-12">
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
                                                  </div>
                                                  <div class="row">
                                                            <div class="col-6">
                                                                      <div class="form-group">
                                                                                <label for="gaji_pokok">Gaji Primer</label>
                                                                                <input type="number" name="gaji_pokok" id="gaji_pokok"
                                                                                          class="form-control"
                                                                                          placeholder="Gaji Primer"
                                                                                          
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                            <div class="col-6">
                                                                      <div class="form-group">
                                                                                <label for="gaji_sekunder">Gaji Sekunder</label>
                                                                                <input type="number" name="gaji_sekunder" id="gaji_sekunder"
                                                                                          class="form-control"
                                                                                          placeholder="Gaji Sekunder"
                                                                                          
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                  </div>

                                                  <div class="row">
                                                            <div class="col-4">
                                                                      <div class="form-group">
                                                                                <label for="gaji_pokok">Bulan</label>
                                                                                <!-- <select name="bulan" id="bulan" class="form-control">
                                                                                          <option selected readonly>Pilih Bulan</option>
                                                                                          <?php for ($i=1; $i <= 12 ; $i++) { 
                                                                                                    
                                                                                          }?>
                                                                                </select> -->
                                                                                <input type="number" readonly name="bulan" id="bulan"
                                                                                          class="form-control"
                                                                                          placeholder="Bulan"
                                                                                          value="<?= (int)date('m')?>"
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                            <div class="col-4">
                                                                      <div class="form-group">
                                                                                <label for="tahun">Tahun</label>
                                                                                <input type="number" readonly name="tahun" id="tahun"
                                                                                          class="form-control"
                                                                                          placeholder="Tahun"
                                                                                          value="<?= date('Y')?>"
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                            <div class="col-4">
                                                                      <div class="form-group">
                                                                                <label for="total_absen">Total Absen</label>
                                                                                
                                                                                <input type="number" readonly name="total_absen" id="total_absen"
                                                                                          class="form-control"
                                                                                          placeholder="Total Absen"
                                                                                          value="<?php
                                                                                                    $total_absen  = $this->Absensi_model->hitung_absen($this->uri->segment(3), (int)date('m'), date("Y"));
                                                                                                    echo $total_absen['total_absen'];
                                                                                          ?>"
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                  </div>
                                                  <div class="row">
                                                  <div class="col-6">
                                                                      <div class="form-group">
                                                                                <label for="bonus">Bonus</label>
                                                                                
                                                                                <input type="number" readonly name="bonus" id="bonus"
                                                                                          class="form-control"
                                                                                          placeholder="Bonus"
                                                                                          
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                            <div class="col-6">
                                                                      <div class="form-group">
                                                                                <label for="total_gaji">Total Gaji</label>
                                                                                
                                                                                <input type="number" readonly name="total_gaji" id="total_gaji"
                                                                                          class="form-control"
                                                                                          
                                                                                          placeholder="Total Gaji"
                                                                                          required />
                                                                      </div>
                                                            </div>
                                                  </div>
                                        </div>
                                        <div class="card-body border-top py-0 my-3">
                                     
                                        </div>
                                        <div class="card-footer">
                                                  <button type="submit" class="btn btn-primary">Simpan <i
                                                                      class="fa fa-save"></i></button>
                                        </div>
                              </form>
                    </div>
          </div>
</div>
<script>
          $(document).ready(function() {
                    let gaji_pokok = $('#gaji_pokok')
                    let gaji_sekunder = $('#gaji_sekunder')
                    let total_absen = $('#total_absen')
                    let bonus = $('#bonus')
                    let total_gaji = $('#total_gaji')

                    gaji_sekunder.change(function(){
                              bonus.val(parseInt(total_absen.val()) * parseInt(gaji_sekunder.val()))
                              total_gaji.val(parseInt(bonus.val()) + parseInt(gaji_pokok.val()))
                    })
                    
                    gaji_pokok.change(function(){
                              total_gaji.val(parseInt(bonus.val() || 0) + parseInt(gaji_pokok.val()))
                    })
    });
</script>