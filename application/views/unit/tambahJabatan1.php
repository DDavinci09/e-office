<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <!-- input id untuk disposisi berdasar id -->
                        <input type="hidden" name="id_unit" value="<?= $unit['id_unit']; ?>">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= set_value('nama_jabatan'); ?>">
                            <small class="form-text text-danger"><?= form_error('nama_jabatan'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->