<!doctype html>
<html lang="en">
    <?php
    include '../../action/pembayaran/show_detail.php';

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
            <!-- Content   -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Pembayaran</h5>
                                <form action="../../action/pembayaran/update.php" method="post">
                                    <input type="hidden" name="id" id="" value="<?= $data['id']?>">
                                    <div class="mb-3 mt-4">
                                        <label for="exampleInputtext1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" name="nama" value="<?= $data['nama']?>" autofocus>
                                    </div>
                                    <div class="d-flex">
                                        <a href="./" class="btn btn-secondary me-3">Cancel</a>
                                        <input type="submit" class="btn btn-primary" value="Save"></input>
                                    </div>
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