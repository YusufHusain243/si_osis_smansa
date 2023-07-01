<!-- ======= Galeri ======= -->
<section class="team" id="galeri">
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <?php
            foreach ($galeri as $g) {
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="admin/images/<?=$g['foto']?>" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4><?=$g['nama_kegiatan']?></h4>
                            <span><?=$g['keterangan']?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section><!-- End Galeri -->