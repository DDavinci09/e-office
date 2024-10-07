<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_unit">Nama Unit</label>
                            <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= set_value('nama_unit'); ?>">
                            <small class="form-text text-danger"><?= form_error('nama_unit'); ?></small>
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