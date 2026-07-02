<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_menu'];
    $kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($koneksi,"INSERT INTO menu
    (nama_menu,id_kategori,harga,stok,deskripsi)
    VALUES
    ('$nama','$kategori','$harga','$stok','$deskripsi')");

    header("Location: menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Tambah Menu</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text" name="nama_menu" class="form-control" required>
</div>

<div class="mb-3">
<label>Kategori</label>

<select name="id_kategori" class="form-control">

<?php

$data=mysqli_query($koneksi,"SELECT * FROM kategori");

while($d=mysqli_fetch_array($data)){

?>

<option value="<?= $d['id_kategori']; ?>">
<?= $d['nama_kategori']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<button type="submit" name="simpan" class="btn btn-success">
Simpan
</button>

<a href="menu.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>