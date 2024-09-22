<!doctype html>
<html lang="en">
<?php
include '../../action/transaksi/show_detail.php';

include '../../action/security.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RPL CRUD</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include '../layout/sidebar.php'; ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include '../layout/header.php'; ?>
            <!--  Header End -->
            <!-- Content   -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="index.php" class="btn btn-danger float-md-start">
                                    <i class="ti ti-arrow-left"></i>
                                </a>
                                <h5 class="card-title d-flex justify-content-center">Edit User</h5>
                                <form action="../../action/transaksi/update.php" method="post">
                                    <input type="hidden" name="id" id="" value="<?= $data['id'] ?>">
                                    <div class="mb-3 mt-4">
                                        <label for="exampleInputEmail1" class="form-label">User</label>
                                        <select name="user_id" id="" class="form-select">
                                            <option value="">Pilih user</option>
                                            <?php
                                            include '../../action/user/show_data.php';
                                            while ($data_user = $result->fetch_assoc()) { ?>
                                                <option value="<?= $data_user['id'] ?>" <?= $data_user['id'] == $data['user_id'] ? 'selected' : '' ?>><?= $data_user['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Produk</label>
                                        <select name="produk_id" id="" class="form-select">
                                            <option value="">Pilih produk</option>
                                            <?php
                                            include '../../action/produk/show_data.php';
                                            while ($data_produk = $result->fetch_assoc()) { ?>
                                                <option value="<?= $data_produk['id'] ?>" <?= $data_produk['id'] == $data['produk_id'] ? 'selected' : '' ?>><?= $data_produk['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
                                        <select name="pembayaran_id" id="" class="form-select">
                                            <option value="">Pilih metode pembayaran</option>
                                            <?php
                                            include '../../connection/connection.php';
                                            $sql = "SELECT * FROM pembayaran";
                                            $result = $conn->query($sql);
                                            while ($data_pembayaran = $result->fetch_assoc()) { ?>
                                                <option value="<?= $data_pembayaran['id'] ?>" <?= $data_pembayaran['id'] == $data['pembayaran_id'] ? 'selected' : '' ?>><?= $data_pembayaran['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                                        <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value="<?= $data['alamat_pengiriman'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_harga" class="form-label">Total Harga</label>
                                        <input type="text" class="form-control" id="total_harga" name="total_harga" value="<?= $data['total_harga'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                                        <input type="text" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?= $data['tgl_transaksi'] ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" value="<?= $data['status'] ?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Save"></input>
                                </form>
                            </div>
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