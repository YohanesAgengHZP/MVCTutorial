<div class="container mt-4">

    <div class="row">
        <div class="col-lg-6">
          <?php
          Flasher::flash();
          ?>
        </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            Tambah Data
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
          <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group ">
              <input type="text" class="form-control" placeholder="Cari Mahasiswa.." aria-label="Recipient's username" aria-describedby="basic-addon2" name ="cariMahasiswa" id="cariMahasiswa">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
              </div>
            </div>
          </form>
      </div>
    </div>

    <div class ="row">
        <div class ="col-lg-6">

            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ( $data['mhs'] as $mhs) : ?>
                    <li class="list-group-item ">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/ <?= $mhs['id']?>" class="badge badge-primary float-right" > Detail </a>

                        <a href="<?= BASEURL; ?>/mahasiswa/edit/ <?= $mhs['id']?>" class="badge badge-success float-right mr-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>"> Edit </a>

                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/ <?= $mhs['id']?>" class="badge badge-danger float-right mr-2" onclick="return confirm('yakin?');" > Hapus </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Form Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
              
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda">
              </div>

              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan nim anda">
              </div>

              <div class="form-group">
                <label for="kelas">Pilih Kelas</label>
                <select class="form-control" id="kelas" name="kelas">
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" 
            data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>
        </div>
    </div>
  </div>
</div>