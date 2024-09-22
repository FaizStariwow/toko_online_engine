<!doctype html>
<html lang="en">
<?php 
    include '../../action/produk/show_detail.php';

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
            <!-- Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="index.php" class="btn btn-danger float-md-start">
                                    <i class="ti ti-arrow-left"></i>
                                </a>
                                <h5 class="card-title d-flex justify-content-center">Edit Product</h5>
                                <form action="../../action/produk/update.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="" value="<?= $data['id']?>">
                                    <div class="mb-3 mt-4">
                                        <label for="exampleInputtext1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputtext1" name="nama"  value="<?= $data['nama']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                        <select name="kategori_produk_id" id="" class="form-select">
                                            <option value="">Pilih Kategori</option>
                                            <?php 
                                            include '../../action/kategori/show_data.php';

                                            while($kategori= $result->fetch_assoc()){
                                            ?>
                                        <option value="<?= $kategori['id']?>" <?= $kategori['id'] == $data['kategori_produk_id'] ? 'selected' : ''?>><?= $kategori['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="harga" value="<?= $data['harga']?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                        <textarea class="form-control"  name="deskripsi"><?= $data['deskripsi']?></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                                        <input type="file" class="form-control" id="image" name="foto">
                                        <img class="mt-3" src="../../assets/images/produk/<?= $data['foto_produk']?>" alt="" width="100px" id="foto">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Stok</label>
                                        <input type="text" class="form-control" value="<?= $data['stok_produk']?>" name="stok">
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

    <script>
        const image = document.getElementById('image');
        image.addEventListener('change', function(){
            const file = this.files[0];
            console.log(file);
            if(file){
                const foto = document.getElementById('gambar');
                foto.innerHTML = `<img src="${URL.createObjectURL(file)}" width="100px" height="100px" alt="">`;
            }

        });

    </script>

</body>

</html>