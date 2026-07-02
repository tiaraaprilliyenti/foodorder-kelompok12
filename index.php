<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#ff9a9e,#fad0c4);
            min-height:100vh;
        }

        .judul{
            color:white;
            font-weight:bold;
            font-size:50px;
        }

        .subjudul{
            color:white;
            font-size:18px;
        }

        .card{
            border:none;
            border-radius:20px;
            box-shadow:0px 8px 20px rgba(0,0,0,.2);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .btn{
            border-radius:30px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="text-center mt-5 mb-5">

        <h1 class="judul">🍔🧋 FoodOrder</h1>

        <p class="subjudul">
            Sistem Pemesanan Makanan Berbasis Web
        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-5 mb-4">

            <div class="card p-4 text-center">

                <h2>🍽</h2>

                <h3>Kelola Menu</h3>

                <p>
                    Tambahkan, ubah, lihat, dan hapus daftar menu makanan serta minuman.
                </p>

                <a href="menu.php" class="btn btn-primary">
                    Buka Menu
                </a>

            </div>

        </div>

        <div class="col-md-5 mb-4">

            <div class="card p-4 text-center">

                <h2>🛒</h2>

                <h3>Kelola Pesanan</h3>

                <p>
                    Kelola seluruh data pesanan pelanggan dengan mudah.
                </p>

                <a href="pesanan.php" class="btn btn-success">
                    Buka Pesanan
                </a>

            </div>

        </div>

    </div>

    <div class="text-center mt-5">

        <small class="text-white">
            © 2026 FoodOrder | Dibuat oleh Kelompok 12
        </small>

    </div>

</div>

</body>
</html>