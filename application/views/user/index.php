<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>user/updateuser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Update Profil</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_unit">Unit</label>
                            <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $unit['nama_unit']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= $jabatan['nama_jabatan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ttd">Tanda Tangan Digital</label><br>
                            <img src="<?= $ttd['img']; ?>" alt="Images" width="200px" height="200px"><br>
                            <a href="<?= base_url(); ?>Signature" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Tanda Tangan</a>
                            <a href="<?= base_url(); ?>Signature/hapus/<?= $ttd['id']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mt-2"><i class="fas fa-download fa-sm text-white-50"></i>Hapus Tanda Tangan</a>	
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->