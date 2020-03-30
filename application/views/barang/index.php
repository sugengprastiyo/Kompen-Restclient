  <div class="container mt-3">
      <div class="row">
          <div class="col-lg-12">
              <h2>Daftar Barang</h2>
              <table class="table table-striped table-bordered" id="listBarang">
                  <thead style="background-color: #67c7c5;color:white">
                      <tr>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">No Tugas</th>
                          <th scope="col">Merk</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($barang as $br) :
                        ?>
                          <tr>
                              <td><?= $br['nama_barang'] ?></td>
                              <td><?= $no++; ?></td>
                              <td><?= $br['merk'] ?></td>
                          </tr>
                      <?php
                        endforeach;
                        ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>