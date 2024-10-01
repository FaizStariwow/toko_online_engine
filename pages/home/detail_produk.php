<?php
// session_start();
include '../../action/security.php';
include '../../action/dashboard/show_detail_produk.php';
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
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-lg-5 pb-5">
                        <img src="../../assets/images/produk/<?= $data['foto_produk'] ?>" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold"><?= $data['nama'] ?></h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(50 Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">Rp.<?= number_format($data['harga'], 0, ',', '.') ?></h3>
                        <p class="mb-4"><?= $data['deskripsi'] ?></p>

                        <div class="d-flex align-items-center mb-4 pt-2">
                            <!-- make form quantity -->
                            <form action="../../action/dashboard/add_cart.php" class="d-flex" method="post">
                                <button class="btn btn-primary mx-3" type="button" id="minus"><i class="ti ti-minus"></i></button>
                                <input class="form-control" type="text" name="qty" id="qty" style="width: 50px;" value="1">
                                <button class="btn btn-primary mx-3" type="button" id="plus"><i class="ti ti-plus"></i></button>

                                <?php
                                if ($data['stok_produk'] == 0) {
                                ?>
                                    <button class="btn btn-danger px-3" id="add-to-cart" type="submit" disabled>STOK HABIS</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-primary px-3" id="add-to-cart" type="submit"><i class="ti ti-shopping-cart mr-1"></i> Add To Cart</button>
                                <?php } ?>

                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
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
    <script>
        $(document).ready(function() {
            var qty = 1;
            $('#plus').click(function() {
                qty += 1;
                $('#qty').val(qty);
            });

            $('#minus').click(function() {
                if (qty > 1) {
                    qty -= 1;
                    $('#qty').val(qty);
                }
            });
        });
    </script>

</body>

</html>