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
                        <form action="../../action/dashboard/checkout_act.php" method="POST">
                            <!-- Informasi Pengguna -->
                            <h4 class="mb-3">Informasi Pengguna</h4>
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="firstName" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" value="<?= $_SESSION['nama'] ?>" readonly required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email'] ?>" readonly required>
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
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="province" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="province" name="province" required>
                                </div>
                            </div>

                            <!-- Metode Pembayaran -->
                            <h4 class="mb-3 mt-4">Metode Pembayaran</h4>
                            <div class="my-3">
                                <?php
                                include '../../action/pembayaran/show_data.php';

                                while ($pembayaran = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="form-check">
                                        <input id="<?= $pembayaran['nama'] ?>" name="pembayaran" type="radio" class="form-check-input" value="<?= $pembayaran['id'] ?>" required>
                                        <label class="form-check-label" for="credit"><?= $pembayaran['nama'] ?></label>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Tombol Submit -->
                    </div>

                    <!-- Ringkasan Pesanan -->
                    <div class="col-md-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <?php
                            include '../../action/dashboard/show_list.php';


                            $jmlData = $conn->query("select count(*) as jml from keranjang");
                            $jml = mysqli_fetch_assoc($jmlData);
                            $totalHarga = $conn->query("select sum(total_harga) as tot from keranjang");
                            $tot = mysqli_fetch_assoc($totalHarga);
                            ?>
                            <span class="text-muted">Ringkasan Pesanan</span>
                            <span class="badge bg-primary rounded-pill"><?= $jml['jml'] ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                            $produkId = [];
                            $jmlBeli = [];
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0"><?= $data['produk'] ?></h6>
                                        <small class="text-muted"><?= $data['deskripsi'] ?></small>
                                    </div>
                                    <span class="text-muted">Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></span>
                                </li>
                            <?php
                                array_push($jmlBeli, $data['jumlah']);
                                array_push($produkId, $data['id']);
                            } ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (IDR)</span>
                                <strong>Rp <?= $tot['tot'] == true ? number_format($tot['tot'], 0, ',', '.') : 0 ?></strong>
                            </li>
                        </ul>
                        <input type="hidden" name="total_harga" value="<?= $tot['tot'] ?>">
                        <input type="hidden" name="produkId" value="<?= implode(',', $produkId) ?>">
                        <input type="hidden" name="jmlBeli" value="<?= implode(',', $jmlBeli) ?>">
                        <!-- Tombol Submit -->
                        <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
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