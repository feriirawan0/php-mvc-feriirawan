<!-- container pertama  -->
<div class="container mt-3">
<!-- Flasher -->
<div class="row">
    <div class="col-lg-6">
        <?php 
        // panggil Flasher masseges nya 
        Flasher::flash();
        // :: (karena static)
        ?>
    </div>
</div>



<!-- modal tombol untuk tambah bs 4 -->
<div class="row mb-3">
    <div class="div col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Mahasiswa
    </button>
    </div>
</div>


<!-- form cari  -->
<div class="row mb-3">
    <div class="div col-lg-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <!-- buttom addons -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit" id="cari">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- 
    Daftar mahasiswa 
    list group badges boostrap 4 
    badge boostrap 4
-->
    <div class="row">
        <div class="div col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                <li class="list-group-item">
                    <?= $mhs['nama']; ?> 
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" 
                    class="badge badge-danger float-right ml-2" onclick="return confirm('Apakah anda yakin ingin menghapus ?')";>
                    Hapus</a>

                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" 
                    class="badge badge-success float-right tampilModalUbah ml-2" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Edit</a> 

                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" 
                    class="badge badge-info float-right ml-2">Detail</a> 
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>



<!-- muncul ketika tombol ditekan -->
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


            <!-- form gruop  -->
            <!-- kirimkan id untuk ubah data yang tipe hidden -->
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placholder="">
                </div>

                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="number" class="form-control" id="nim" name="nim">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <!-- combo box  -->
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Pangan">Teknik Pangan</option>
                        <option value="Teknik Pisikolog">Teknik Pisikolog</option>
                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                    </select>
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <!-- submit agar mengirmkan data  -->
            </form>
            </div>
        </div>
    </div>
</div>