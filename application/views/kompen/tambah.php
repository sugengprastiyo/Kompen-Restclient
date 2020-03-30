<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: limegreen;color:white">
                Form Tambah Data Kompen
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Dosen</label>
                        <input type="text" class="form-control" name="dosen" placeholder="Nama Dosen">
                        <label for="no_hp" style="margin-top: 10px">Jam Kompen</label>
                        <input type="number" class="form-control" name="jam_kompen" placeholder="Jam Kompen">
                        <label for="no_hp" style="margin-top: 10px">No Tugas</label>
                        <input type="number" class="form-control" name="no_tugas" placeholder="No Tugas">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data Kompen</button>
                </form>
            </div>
        </div>
    </div>
</div>