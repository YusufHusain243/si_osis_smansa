<!-- ======= Team Section ======= -->
<section class="team" id="struktur">
    <div class="container">
        <div class="section-title">
            <h2>Struktur Organisasi</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <?php
            foreach ($struktur_organisasi as $so) {
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="admin/images/<?=$so['foto']?>" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4><?=$so['nama']?></h4>
                            <span><?=$so['jabatan']?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section><!-- End Team Section -->