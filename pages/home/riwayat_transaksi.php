<?php 
    include '../../action/security.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-start">Tabel Riwayat Transaksi</h5>

                                <?php
                                if (isset($_SESSION['msg'])) {

                                ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                                        <?= $_SESSION['msg']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } elseif (isset($_SESSION['msg_err'])) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                                        <?= $_SESSION['msg_err']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                unset($_SESSION['msg']);
                                unset($_SESSION['msg_err']);
                                ?>
                                <div class="table-responsive mt-5">
                                    <table class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../action/dashboard/show_riwayat.php';

                                            // include '../../action/transaksi/show_data.php';

                                            // $no = 1;

                                            while ($data = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['nama_user'] ?></td>
                                                    <td><?= $data['tgl_transaksi'] ?></td>
                                                    <td><?= $data['total_harga'] ?></td>
                                                    <td>
                                                        <a href="" data-id="<?=$data['id']?>" data-status="<?= $data['status']?>" >
                                                            <?php if ($data['status'] == 1) { ?>
                                                                <span class="badge bg-warning rounded-3 fw-semibold">Pending</span>
                                                            <?php
                                                            } elseif ($data['status'] == 2) { ?>
                                                                <span class="badge bg-success rounded-3 fw-semibold">Success</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger rounded-3 fw-semibold">Failed</span>
                                                            <?php } ?>
                                                        </a>
                                                        
                                                    </td>
                                                    <td>
                                                    <a href="" class="badge bg-primary text-white text-decoration-none " data-toggle="modal" data-target="#detailTransaksi" data-id="<?= $data['id']?>"> <i class="ti ti-eye" id="detail" ></i></a>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
     <!-- Modal Detail -->
     <div class="modal fade" id="detailTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="fw-bold">Pembeli</p>
                            <p class="fw-bold">No. Hp</p>
                            <p class="fw-bold">Pembayaran</p>
                            <p class="fw-bold">Alamat</p>
                            <p class="fw-bold">Total Harga</p>
                            <p class="fw-bold">Tgl Transaksi</p>
                            <p class="fw-bold">Status</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold" id="pembeli"></p>
                            <p class="fw-bold" id="no_hp"></p>
                            <p class="fw-bold" id="pembayaran"></p>
                            <p class="fw-bold" id="alamat"></p>
                            <p class="fw-bold" id="total"></p>
                            <p class="fw-bold" id="tgl"></p>
                            <span id="status_pembayaran"></span>
                        </div>
                        <!-- <div class="col-md-5">
                            <img src="" alt="" id="foto_produk" width="150px">
                        </div> -->
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-wrap" id="tableDetail">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total Harga</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>No</td>
                                            <td>Produk</td>
                                            <td>Harga</td>
                                            <td>Qty</td>
                                            <td>Total Harga</td>
                                        </tr>

                                    </tbody>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>

    <script>
        $('#editStatus').on('show.bs.modal', function(event) {
            var a = $(event.relatedTarget);
            var id = a.data('id');
            var status = a.data('status');
            console.log(id);

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);
        })

        $('#detailTransaksi').on('show.bs.modal', function(event) {
            var a = $(event.relatedTarget);
            var id = a.data('id');
            $.ajax({
                type: 'post',
                url: '../../action/transaksi/show_detail.php',
                data: {
                    id: id

                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    $('#pembeli').html(obj.pembeli);
                    $('#no_hp').html(obj.no_hp);
                    $('#pembayaran').html(obj.pembayaran);
                    $('#tgl').html(obj.tgl_transaksi);
                    $('#alamat').html(obj.alamat_pengiriman);
                    $('#total').html(obj.total_harga);
                    $('#status_pembayaran').html(obj.status);

                    // status
                    if (obj.status == 1) {
                        $('#status_pembayaran').attr('class', 'badge bg-warning rounded-3 fw-semibold').html('Pending');
                    }
                    if (obj.status == 2) {
                        $('#status_pembayaran').attr('class', 'badge bg-success rounded-3 fw-semibold').html('Success');
                    } else {
                        $('#status_pembayaran').attr('class', 'badge bg-danger rounded-3 fw-semibold').html('Failed');
                    }

                    // image
                    // $('#foto_produk').attr('src', '../../assets/images/produk/' + obj.foto_produk);

                },

                error: function(error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: 'post',
                url: '../../action/transaksi/show_item.php',
                data: {
                    id: id

                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);

                    var table = document.getElementById('tableDetail');
                    var tableBody = table.getElementsByTagName('tbody')[0];
                    if (obj.length == 0) {
                        // clear table
                        tableBody.innerHTML = 'Data Tidak Ada';
                    } else if (obj.length > 0) {
                        tableBody.innerHTML = '';
                        obj.forEach(item => {
                            var newRow = tableBody.insertRow(tableBody.rows.length);
                            newRow.insertCell(0).innerHTML = obj.indexOf(item) + 1;
                            newRow.insertCell(1).innerHTML = item.produk;
                            newRow.insertCell(2).innerHTML = item.harga;
                            newRow.insertCell(3).innerHTML = item.jml_beli;
                            newRow.insertCell(4).innerHTML = item.total_harga;

                        });
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });


        });
    </script>


</body>

</html>