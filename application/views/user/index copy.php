<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['username']; ?></h5>
                    <img src="<?= $ttd['img']; ?>" alt="Images" width="200px" height="200px">
                    <a href="<?= base_url(); ?>Signature" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Tanda Tangan</a>
                    <a href="<?= base_url(); ?>Signature/hapus/<?= $ttd['id']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mt-2"><i class="fas fa-download fa-sm text-white-50"></i>Hapus Tanda Tangan</a>	
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->