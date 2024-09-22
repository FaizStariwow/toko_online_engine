<!doctype html>
<html lang="en">
<?php  

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
                                unset($_SESSION['msg_err'])
                                ?>
                                <div class="table-responsive mt-5">
                                    <table class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pembeli</th>
                                                <th>Produk</th>
                                                <th>Total Harga</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../action/transaksi/show_data.php';
                                            $no = 1;
                                            while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['pembeli'] ?></td>
                                                    <td><?= $data['produk'] ?></td>
                                                    <td><?= $data['total_harga'] ?></td>
                                                    <td><?= $data['tgl_transaksi'] ?></td>
                                                    <td>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#editStatus" data-id="<?= $data['id'] ?>" data-status="<?= $data['status'] ?>">
                                                            <?php if ($data['status'] == 1) { ?>
                                                                <span class="badge bg-warning rounded-3 fw-semibold">Pending</span>  
                                                            <?php } elseif ($data['status'] == 2) { ?>
                                                                <span class="badge bg-success rounded-3 fw-semibold">Success</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger rounded-3 fw-semibold">Failed</span>
                                                            <?php } ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="" class="badge bg-primary text-white "data-bs-toggle="modal" data-bs-target="#detailTransaksi" data-id="<?= $data['id']?>"><i class="ti ti-eye" ></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../layout/footer.php' ?>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../action/transaksi/update.php" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option selected>Pilih Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Success</option>
                                <option value="3">Failed</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
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
                            <p class="fw-bold">Produk</p>
                            <p class="fw-bold">Pembayaran</p>
                            <p class="fw-bold">Alamat</p>
                            <p class="fw-bold">Total Harga</p>
                            <p class="fw-bold">Jumlah</p>
                            <p class="fw-bold">Tgl Transaksi</p>
                            <p class="fw-bold">Status</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold" id="pembeli"></p>
                            <p class="fw-bold" id="produk"></p>
                            <p class="fw-bold" id="pembayaran"></p>
                            <p class="fw-bold" id="alamat"></p>
                            <p class="fw-bold" id="total"></p>
                            <p class="fw-bold" id="qty"></p>
                            <p class="fw-bold" id="tgl"></p>
                            <span id="status_pembayaran"></span>
                        </div>
                        <div class="col-md-5">
                            <img src="" alt="" id="foto_produk" width="150px">
                        </div>
                    </div>
                        

                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        $('#editStatus').on('show.bs.modal', function(event){
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
                    $('#produk').html(obj.produk);
                    $('#pembayaran').html(obj.pembayaran);
                    $('#qty').html(obj.qty);
                    $('#tgl').html(obj.tgl_transaksi);
                    $('#alamat').html(obj.alamat_pengiriman);
                    $('#total').html(obj.total_harga);
                    $('#status_pembayaran').html(obj.status);

                    // status
                    if(obj.status == 1){
                        $('#status_pembayaran').attr('class','badge bg-warning rounded-3 fw-semibold').html('Pending');
                    }
                    if(obj.status == 2){
                        $('#status_pembayaran').attr('class','badge bg-success rounded-3 fw-semibold').html('Success');
                    }else{
                        $('#status_pembayaran').attr('class','badge bg-danger rounded-3 fw-semibold').html('Failed');
                    }

                    // image
                    $('#foto_produk').attr('src', '../../assets/images/produk/' + obj.foto_produk);
                
                },
                
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>

</body>

</html>