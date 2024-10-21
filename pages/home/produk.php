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
            <div class="container-fluid">
                <div class="row">
                    <!-- make form search -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari Produk" name="search">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    include '../../connection/connection.php';
                    
                    if(isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = $_GET['search'];
                        $query = "SELECT * FROM produk WHERE nama LIKE '%$search%'";
                    } else {
                        $query = "SELECT * FROM produk";
                    }
                    $result = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2 h-100 d-flex">
                            <div class="position-relative">
                                <a href="./detail_produk.php?id=<?= $row['id'] ?>"><img src="../../assets/images/produk/<?php echo $row['foto_produk']; ?>" class="card-img-top rounded-0" alt="<?php echo $row['nama']; ?>"></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4 mt-auto">
                                <h6 class="fw-semibold fs-4"><?php echo $row['nama']; ?></h6>
                                <small>Stok <?= $row['stok_produk'] == 0 ? 'Habis' : $row['stok_produk'] ?></small>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo '<li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
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