<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data Kompen
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_kompen" value="<?= $kompen->id_kompen; ?>">
                    <div class="form-group">
                        <label for="dosen">Dosen</label>
                        <input type="text" class="form-control" id="dosen" name="dosen" value="<?= $kompen->dosen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jam_kompen">Jam Kompen</label>
                        <input type="text" class="form-control" id="jam_kompen" name="jam_kompen" value="<?= $kompen->jam_kompen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_tugas">No Tugas</label>
                        <input type="text" class="form-control" id="no_tugas" name="no_tugas" value="<?= $kompen->no_tugas; ?>">
                    </div>
                    <a href="<?= base_url('kompen'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>