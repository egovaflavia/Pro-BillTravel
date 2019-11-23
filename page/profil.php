<?php
$ambil = $koneksi->query("SELECT * FROM tb_profil WHERE profil_id = 1");
$pecah = $ambil->fetch_object();
?>
<section class="services py-5" id="services">
    <div class="container py-md-5">
        <h3 class="heading text-center mb-3 mb-sm-5">Profil BIL Transport </h3>
        <div class="row service-grid-grids text-center">
            <div class="col-lg-12 col-md-12 service-grid service-grid1 mb-4">
                <p class="mt-3">
                    <?php echo $pecah->profil_ket ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php include('page/testimoni.php'); ?>
<?php include('page/map.php'); ?>