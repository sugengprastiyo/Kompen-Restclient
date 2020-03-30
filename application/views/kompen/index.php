<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kompen<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-hapus')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kompen<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <!-- <a href="<?= base_url(); ?>kompen/cetakLaporan" class="btn btn-info">Cetak Data Kompen</a> -->
            <?php
            } else {
            ?>
                <a href="<?= base_url(); ?>kompen/tambah" class="btn btn-primary">Tambah Data Kompen</a>
                <!-- <a href="<?= base_url(); ?>kompen/cetakLaporan" class="btn btn-info">Cetak Data Kompen</a> -->
            <?php
            }
            ?>

        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama/Merk Barang" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>Daftar Kompen</h2>
            <?php if (empty($kompen)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Kompen
                </div>
            <?php endif; ?>
            <table id="listKompen" class="table table-striped table-bordered">
                <thead>

                    <tr style="background-color:darksalmon;color:white">
                        <td>No</td>
                        <td>Dosen</td>
                        <td>Jam Kompen</td>
                        <td>No Tugas</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kompen as $kompen) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $kompen['dosen']; ?>
                            </td>
                            <td>
                                <?= $kompen['jam_kompen'] ?>
                            </td>
                            <td>
                                <?= $kompen['no_tugas'] ?>
                            </td>
                            <td>
                                <?php
                                $status_login = $this->session->userdata('level');
                                if ($status_login == 'admin') {
                                ?>
                                    <a href=" <?php echo base_url(); ?>kompen/hapus/<?= $kompen['id_kompen'] ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                    <a href="<?= base_url(); ?>kompen/edit/<?= $kompen['id_kompen'] ?>" class="btn btn-success float-center">Edit</a>
                                    <a href="<?php echo base_url(); ?>kompen/detail/<?= $kompen['id_kompen'] ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo base_url(); ?>kompen/detail/<?= $kompen['id_kompen'] ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                }
                                ?>
                            </td>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>