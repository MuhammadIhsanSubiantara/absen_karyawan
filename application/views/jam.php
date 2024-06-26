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
                                    <td class="jam-start"><?= $j->start ?></td>
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

<!-- <?php

// Mendapatkan tahun dan bulan saat ini
$currentYear = date("Y");
$currentMonth = date("m");

// Jika pengguna mengirimkan input tahun dan bulan, gunakan input tersebut
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentYear = $_POST["year"];
    $currentMonth = $_POST["month"];
}

// Menghitung jumlah hari dalam bulan dan hari pertama dalam bulan
$numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
$firstDayOfMonth = date("N", strtotime("$currentYear-$currentMonth-01"));

// Mencetak judul kalender
echo "<h2>" . date("F Y", strtotime("$currentYear-$currentMonth-01")) . "</h2>";

// Mencetak tabel kalender
echo "<table border='1'>";
echo "<tr><th>Minggu</th><th>Senin</th><th>Selasa</th><th>Rabu</th><th>Kamis</th><th>Jumat</th><th>Sabtu</th></tr>";

// Mengisi tanggal sebelum hari pertama bulan dimulai
echo "<tr>";
for ($i = 1; $i < $firstDayOfMonth; $i++) {
    echo "<td></td>";
}

// Mengisi tanggal bulan
$day = 1;
while ($day <= $numDaysInMonth) {
    // Jika hari pertama dalam minggu, mulai baris baru
    if ($firstDayOfMonth <= 7) {
        echo "<td><a href='javascript:void(0)' onclick='showDate($day)'>$day</a></td>";
        $day++;
        $firstDayOfMonth++;
    } else {
        echo "</tr><tr>"; // Pindah ke baris baru setelah Sabtu
        $firstDayOfMonth = 1; // Reset hari pertama dalam minggu
    }
}

// Mengisi tanggal setelah hari terakhir bulan
while ($firstDayOfMonth <= 7) {
    echo "<td></td>";
    $firstDayOfMonth++;
}

echo "</tr>";
echo "</table>";

// Form untuk memilih tahun dan bulan
echo "<form method='post'>";
echo "<label for='year'>Tahun:</label>";
echo "<input type='number' id='year' name='year' value='$currentYear' min='1900' max='2100'>";
echo "<label for='month'>Bulan:</label>";
echo "<input type='number' id='month' name='month' value='$currentMonth' min='1' max='12'>";
echo "<input type='submit' value='Tampilkan'>";
echo "</form>";

?>

<script>
    // Fungsi untuk menampilkan tanggal yang diklik
    function showDate(day) {
        alert("Anda mengklik tanggal " + day);
    }
</script>

<div class="modal-wrapper">
    <div class="modal fade" id="edit-jam" tabindex="-1" role="dialog" aria-labelledby="edit-jam-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-edit-jam" action="<?= base_url('jam/update') ?>" method="post" onsubmit="return false">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-jam-label">Edit Jam <span id="edit-keterangan"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="start">Jam Mulai :</label>
                            <input type="hidden" name="id_jam" id="edit-id-jam">
                            <input type="time" name="start" id="edit-start" class="form-control" placeholder="Jam Mulai" required="reuired" />
                        </div>

                        <div class="form-group">
                            <label for="finish">Jam Selesai :</label>
                            <input type="time" name="finish" id="edit-finish" class="form-control" placeholder="Jam Selesai" required="reuired" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->