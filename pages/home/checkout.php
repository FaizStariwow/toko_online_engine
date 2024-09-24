<?php 
    include '../../action/security.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include '../layout/sidebar.php'; ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include '../layout/header.php'; ?>
            <!--  Header End -->
            <!-- Content -->
            <div class="container my-5">
    <h1 class="mb-4">Checkout</h1>

    <!-- Row utama -->
    <div class="row">
        <!-- Form Checkout -->
        <div class="col-md-8">
            <form action="proses_checkout.php" method="POST">
                <!-- Informasi Pengguna -->
                <h4 class="mb-3">Informasi Pengguna</h4>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>

                <!-- Alamat Pengiriman -->
                <h4 class="mb-3 mt-4">Alamat Pengiriman</h4>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat lengkap" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="postalCode" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="postalCode" name="postal_code" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="province" class="form-label">Provinsi</label>
                        <select class="form-select" id="province" name="province" required>
                            <option value="">Pilih...</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Banten">Banten</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                        </select>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <h4 class="mb-3 mt-4">Metode Pembayaran</h4>
                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="payment_method" type="radio" class="form-check-input" value="credit_card" required>
                        <label class="form-check-label" for="credit">Kartu Kredit</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="payment_method" type="radio" class="form-check-input" value="debit_card" required>
                        <label class="form-check-label" for="debit">Kartu Debit</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="payment_method" type="radio" class="form-check-input" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Lanjutkan Pembayaran</button>
            </form>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="col-md-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Ringkasan Pesanan</span>
                <span class="badge bg-primary rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Produk 1</h6>
                        <small class="text-muted">Deskripsi singkat</small>
                    </div>
                    <span class="text-muted">Rp 100.000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Produk 2</h6>
                        <small class="text-muted">Deskripsi singkat</small>
                    </div>
                    <span class="text-muted">Rp 50.000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Produk 3</h6>
                        <small class="text-muted">Deskripsi singkat</small>
                    </div>
                    <span class="text-muted">Rp 25.000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (IDR)</span>
                    <strong>Rp 175.000</strong>
                </li>
            </ul>
        </div>
    </div>
</div>

        </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>