<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
<style type="text/css">
    .table-data{
        width: 100%;
        border-collapse: collapse;
    }
    .table-data tr th,
    .table-data tr td{
        border:1px solid black;
        font-size: 11pt;
        padding: 10px 10px 10px 10px;
    }
</style>
<h3><center>Laporan Data Gaji</center></h3>
<br/>
<table class="table-data">
    <thead>
    <tr>
        <th>No</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Total Absen</th>
        <th>Gaji Pokok</th>
        <th>Gaji Sekunder</th>
        <th>Bonus</th>
        <th>Total Gaji</th>
    </tr>
    </thead>

<tbody>
    <?php
    $no=1;
    foreach($gaji as $b){
    ?>
    <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $b['bulan']; ?></td>
        <td><?= $b['tahun']; ?></td>
        <td><?= $b['total_absen']; ?></td>
        <td><?= $b['gaji_pokok']; ?></td>
        <td><?= $b['gaji_sekunder']; ?></td>
        <td><?= $b['bonus']; ?></td>
        <td><?= $b['total_gaji']; ?></td>
    </tr>
    <?php } ?>
</tbody>
</body>
</table>
</html>