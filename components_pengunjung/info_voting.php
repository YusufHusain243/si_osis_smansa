<!-- ======= Informasi Voting Section ======= -->
<section class="features" id="voting">
    <div class="container">
        <div class="section-title">
            <h2>Informasi Voting</h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 text-center">
                <p>
                    Voting Pemilihan Ketua Osis Akan Dilaksanakan Mulai Tanggal <strong><?= $durasi[0]['tanggal_mulai'] ?></strong> Pukul <strong><?= $durasi[0]['jam_mulai'] ?></strong> dan Akan Berakhir Pada Tanggal <strong><?= $durasi[0]['tanggal_berakhir'] ?></strong> Pukul <strong><?= $durasi[0]['jam_berakhir'] ?></strong>. 
                    <br>
                    Silahkan Melakukan Login Terlebih Dahulu Menggunakan NISN Sebagai Username dan Password Untuk Melakukan Voting
                    <br>
                    Waktu Voting Akan Berakhir Dalam 
                    <br>
                    <strong>(<span id="demo"></span>)</strong>
                </p>
                <a href="login.php?page=loginSiswa" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</section><!-- End Informasi Voting Section -->