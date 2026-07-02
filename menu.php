<?php
include 'koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#FFE29F,#FFA99F);
    min-height:100vh;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0px 8px 20px rgba(0,0,0,0.2);
}

h2{
    color:#E65100;
    font-weight:bold;
}

.table thead{
    background:#FF9800;
    color:white;
}

.table tbody tr:hover{
    background:#fff3e0;
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

<h2>🍔 Data Menu</h2>

<a href="index.php" class="btn btn-secondary">
🏠 Dashboard
</a>

</div>

<a href="tambah_menu.php" class="btn btn-success mb-3">
➕ Tambah Menu
</a>

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>No</th>
<th>Nama Menu</th>
<th>Harga</th>
<th>Stok</th>
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

<td><?= $d['nama_menu']; ?></td>

<td>Rp <?= number_format($d['harga'],0,',','.'); ?></td>

<td><?= $d['stok']; ?></td>

<td>

<a href="edit_menu.php?id=<?= $d['id_menu']; ?>" class="btn btn-warning btn-sm">
✏ Edit
</a>

<a href="hapus_menu.php?id=<?= $d['id_menu']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus menu ini?')">
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