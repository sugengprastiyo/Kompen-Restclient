<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Informasi Kompen
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Nama Dosen</b></label>
                        <?php echo $kompen->dosen; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Jam Kompen</b></label>
                        <?= $kompen->jam_kompen; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>No Tugas</b></label>
                        <?= $kompen->no_tugas; ?>
                    </p>
                    <a href="<?= base_url('kompen'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>