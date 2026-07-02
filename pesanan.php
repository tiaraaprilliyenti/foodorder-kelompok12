<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT pesanan.*, menu.nama_menu
FROM pesanan
JOIN menu ON pesanan.id_menu = menu.id_menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Pesanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#A8E6CF,#DCEDC1);
    min-height:100vh;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0px 8px 20px rgba(0,0,0,0.2);
}

h2{
    color:#2E7D32;
    font-weight:bold;
}

.table thead{
    background:#4CAF50;
    color:white;
}

.table tbody tr:hover{
    background:#E8F5E9;
}

.btn{
    border-radius:25px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>🛒 Data Pesanan</h2>

<a href="index.php" class="btn btn-secondary">
🏠 Dashboard
</a>

</div>

<a href="tambah_pesanan.php" class="btn btn-success mb-3">
➕ Tambah Pesanan
</a>

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>No</th>
<th>Nama Pelanggan</th>
<th>Menu</th>
<th>Jumlah</th>
<th>Total Harga</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_pelanggan']; ?></td>

<td><?= $d['nama_menu']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td>Rp <?= number_format($d['total_harga'],0,',','.'); ?></td>

<td>

<a href="edit_pesanan.php?id=<?= $d['id_pesanan']; ?>" class="btn btn-warning btn-sm">
✏ Edit
</a>

<a href="hapus_pesanan.php?id=<?= $d['id_pesanan']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
🗑 Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>