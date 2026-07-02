<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_menu'];
    $kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($koneksi,"UPDATE menu SET
    nama_menu='$nama',
    id_kategori='$kategori',
    harga='$harga',
    stok='$stok',
    deskripsi='$deskripsi'
    WHERE id_menu='$id'");

    header("Location: menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2>Edit Menu</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text" name="nama_menu" class="form-control" value="<?= $d['nama_menu']; ?>" required>
</div>

<div class="mb-3">
<label>Kategori</label>

<select name="id_kategori" class="form-control">

<?php
$kategori = mysqli_query($koneksi,"SELECT * FROM kategori");

while($k = mysqli_fetch_array($kategori)){
?>

<option value="<?= $k['id_kategori']; ?>"
<?php if($k['id_kategori']==$d['id_kategori']) echo "selected"; ?>>

<?= $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" value="<?= $d['harga']; ?>" required>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" value="<?= $d['stok']; ?>" required>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"><?= $d['deskripsi']; ?></textarea>
</div>

<button type="submit" name="update" class="btn btn-warning">
Update
</button>

<a href="menu.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>