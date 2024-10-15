<?php
// session_start();
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
                <a href="./produk.php" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i></a>
                <div class="row px-xl-5">
                    <?php
                    include '../../action/dashboard/show_detail_produk.php';
                    ?>
                    <div class="col-lg-5 pb-5">
                        <img src="../../assets/images/produk/<?= $data['foto_produk'] ?>" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold"><?= $data['nama'] ?></h3>
                        <div class="d-flex mb-3">

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



                        <!-- Form Ulasan Baru -->
                        <form action="../../action/dashboard/insert_ulasan.php" method="post">

                            <div class="form-group mb-2 mt-5">
                                <label for="exampleInputPassword1" class="form-label">Ulasan</label>
                                <textarea class="form-control" rows="3" placeholder="Tulis ulasan Anda di sini..." name="ulasan"></textarea>
                                <label for="exampleInputPassword1" class="form-label">Rating</label>
                                <div class="dropdown mb-3" >
                                        <select name="rating" id="" class="form-select">
                                            <option value="">Beri Rating</option>
                                            <option value="5">Sangat Bagus</option>
                                            <option value="4">Bagus</option>
                                            <option value="3">Biasa</option>
                                            <option value="2">Jelek</option>
                                            <option value="1">Sangat Jelek</option>
                                            
                                        </select>
                                    
                                </div>
                                <label for="exampleInputPassword1" class="form-label">Foto Ulasan</label>
                                <input type="file" class="form-control" id="image" name="foto_ulasan">
                                <div class="mt-3" id="gambar"></div>
                            </div>
                            <input type="hidden" name="produk" value="<?= $data['id'] ?>">
                            <div class="mb-4">
                                <button class="btn btn-primary btn-sm mb-5" type="submit">Kirim Ulasan</button>
                            </div>
                            

                            <div class="form-group mb-2">
                                <label for="exampleInputPassword1" class="form-label">Ulasan Para Pembeli</label>
                                <!-- Ulasan 1 -->
                              
                        <?php  
                            include '../../connection/connection.php';
                            $produk_id = $data['id'];
                            $ulasan_sql = "SELECT ulasan.id, ulasan.ulasan, ulasan.foto_ulasan, ulasan.rating, user.nama AS nama_user
                            FROM ulasan
                            JOIN user ON ulasan.user_id = user.id
                            WHERE ulasan.produk_id = $produk_id
                            ";
                            $result = $conn->query($ulasan_sql);
                            if ($result->num_rows > 0) {
                                while ($ulasan = $result->fetch_assoc()) { ?>
                                    <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $ulasan['nama_user'] ?></h5>
                                        <div class="d-flex  list-unstyled">
                                            <p class="card-text">Rating: <?php 
                                            $rating = $ulasan['rating'];
                                            for ($i=1; $i <= 5; $i++) { 
                                                if ($i <= $rating) {
                                                    echo "<li><a class='me-1' href='javascript:void(0)'><i class='ti ti-star text-warning'></i></a></li>";
                                                }
                                            }
                                            ?>
                                            </p>
                                        </div>
                                        <p class="card-text"><?= $ulasan['ulasan'] ?></p>
                                        <div class="mt-2 d-flex flex-column">
                                            <label for="exampleInputtext1" class="form-label">Foto Ulasan</label>
                                            <img src="../../assets/images/produk/<?= $ulasan['foto_ulasan'] ?>" alt="" style="width: 100px;">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                
                            } else { 
                                echo " <br> Belum ada ulasan terkait produk ini";
                            }?>
                            </div>
                            
                                
                        </form>

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
    <script>
        const image = document.getElementById('image');
        image.addEventListener('change', function() {
            const file = this.files[0];
            console.log(file);
            if (file) {
                const foto = document.getElementById('gambar');
                foto.innerHTML = `<img src="${URL.createObjectURL(file)}" width="100px" height="100px" alt="">`;
            }

        });
    </script>
</body>

</html>
