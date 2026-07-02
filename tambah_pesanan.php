<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_pelanggan'];
    $menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga menu
    $q = mysqli_query($koneksi,"SELECT harga FROM menu WHERE id_menu='$menu'");
    $m = mysqli_fetch_array($q);

    $total = $m['harga'] * $jumlah;

    mysqli_query($koneksi,"INSERT INTO pesanan
    (nama_pelanggan,id_menu,jumlah,total_harga)
    VALUES
    ('$nama','$menu','$jumlah','$total')");

    header("Location: pesanan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Tambah Pesanan</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Pelanggan</label>
<input type="text" name="nama_pelanggan" class="form-control" required>
</div>

<div class="mb-3">
<label>Pilih Menu</label>

<select name="id_menu" class="form-control">

<?php

$data=mysqli_query($koneksi,"SELECT * FROM menu");

while($d=mysqli_fetch_array($data)){

?>

<option value="<?= $d['id_menu']; ?>">
<?= $d['nama_menu']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" required>
</div>

<button type="submit" name="simpan" class="btn btn-success">
Simpan
</button>

<a href="pesanan.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>