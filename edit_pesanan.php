<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_pelanggan'];
    $menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    $q = mysqli_query($koneksi, "SELECT harga FROM menu WHERE id_menu='$menu'");
    $m = mysqli_fetch_array($q);

    $total = $m['harga'] * $jumlah;

    mysqli_query($koneksi, "UPDATE pesanan SET
        nama_pelanggan='$nama',
        id_menu='$menu',
        jumlah='$jumlah',
        total_harga='$total'
        WHERE id_pesanan='$id'");

    header("Location: pesanan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Edit Pesanan</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Pelanggan</label>
<input type="text" name="nama_pelanggan" class="form-control" value="<?= $d['nama_pelanggan']; ?>" required>
</div>

<div class="mb-3">
<label>Pilih Menu</label>

<select name="id_menu" class="form-control">

<?php

$menu = mysqli_query($koneksi, "SELECT * FROM menu");

while($m = mysqli_fetch_array($menu)){

?>

<option value="<?= $m['id_menu']; ?>" <?php if($m['id_menu']==$d['id_menu']) echo "selected"; ?>>
<?= $m['nama_menu']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" value="<?= $d['jumlah']; ?>" required>
</div>

<button type="submit" name="update" class="btn btn-warning">
Update
</button>

<a href="pesanan.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>