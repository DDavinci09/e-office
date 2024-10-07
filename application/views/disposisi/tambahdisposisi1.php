<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <!-- input id untuk disposisi berdasar id -->
                        <input type="hidden" name="id_suratmasuk" value="<?= $suratmasuk['id_suratmasuk']; ?>">
                        <input type="hidden" name="pengirim" value="<?= $jabatan['nama_jabatan']; ?>">
                        <div class="form-group">
                            <label for="unit">Nama Unit</label>
                            <select class="form-control" name="unit" id="unit" required>
                                <option value="0"> Pilih Unit</option>
                                <?php foreach ($unit as $u) { ?>
                                    <option value="<?= $u['id_unit']; ?>"><?= $u['nama_unit']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Nama Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value=""> Pilih Jabatan </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <embed src="<?= base_url('./assets/file/suratmasuk/') . $suratmasuk['file']; ?>" width="600" height="600"></embed> -->
    </div>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->