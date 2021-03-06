<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM tb_paket WHERE paket_id = $id");
$pecah = $ambil->fetch_object();
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-1">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="col-lg-12">
                            <a href="index.php?page=data_paket" class="btn btn-primary ">Kembali</a>
                            <div class="m-t-25 card">
                                <div class="card-header">
                                    <strong>Edit</strong> paket Perjalanan
                                </div>
                                <div class="card-body card-block ">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class="form-control-label">Nama Paket</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input value="<?php echo $pecah->paket_id ?>" type="hidden" name="id">
                                            <input value="<?php echo $pecah->paket_nama ?>" type="text" name="judul" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Detail</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea id="summernote" class="form-control" name="detail" cols="20" rows="50"><?php echo $pecah->paket_detail ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class="form-control-label">Harga</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input value="<?php echo $pecah->paket_harga ?>" type="number" name="harga" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Foto</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="edit" type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Edit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['edit'])) {
                        $id       = $_POST['id'];
                        $judul    = $_POST['judul'];
                        $detail   = $_POST['detail'];
                        $harga    = $_POST['harga'];

                        $nama      = $_FILES['foto']['name'];
                        $temporari = $_FILES['foto']['tmp_name'];
                        $dir       = "images/";
                        move_uploaded_file($temporari, $dir . $nama);

                        $edit = $koneksi->query("UPDATE tb_paket SET    `paket_nama`='$judul',
                                                                        `paket_harga`='$harga', 
                                                                        `paket_detail`='$detail', 
                                                                        `paket_foto`='$nama'
                                                                        WHERE `paket_id` = '$id' ");

                        if ($edit) {
                            echo "<script>alert('Data berhasil di edit');window.location='index.php?page=data_paket';</script>";
                        } else {
                            echo "<script>alert('Data gagal di edit');window.location='index.php?page=aksi_paket/tambah';</script>";
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?php echo date('Y') ?> PT. Putra Bill Tranposrts. Mediatama by <a href="https://www.instagram.com/egovaflavia/" target="_blank">Egova</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>