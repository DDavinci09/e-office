<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <?php echo form_open_multipart('user/updateuser'); ?>
                <form action="" method="post">
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>">
                            <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->