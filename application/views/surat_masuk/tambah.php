<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('SuratMasuk/tambah'); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= set_value('no_surat'); ?>">
                            <small class="form-text text-danger"><?= form_error('no_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= set_value('tgl_surat'); ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="text" class="form-control" id="lampiran" name="lampiran" value="<?= set_value('lampiran'); ?>">
                            <small class="form-text text-danger"><?= form_error('lampiran'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_terima">Tanggal Diterima</label>
                            <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?= set_value('tgl_terima'); ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_terima'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_agenda">Nomor Agenda</label>
                            <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="<?= set_value('no_agenda'); ?>">
                            <small class="form-text text-danger"><?= form_error('no_agenda'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari" value="<?= set_value('dari'); ?>">
                            <small class="form-text text-danger"><?= form_error('dari'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                            <select class="form-control" name="kepada" id="kepada" required>
                                <option value="0"> Pilih Tujuan</option>
                                <?php foreach ($jabatan as $jb) { ?>
                                    <option value="<?= $jb['nama_jabatan']; ?>"><?= $jb['nama_jabatan']; ?> </option>
                                <?php } ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kepada'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= set_value('perihal'); ?>">
                            <small class="form-text text-danger"><?= form_error('perihal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status_surat">Status Surat</label>
                            <select class="form-control" name="status_surat" id="status_surat" value="<?= set_value('status_surat'); ?>">
                                <option value="">- - Pilih - -</option>
                                <option value="Asli">Asli</option>
                                <option value="Tebusan">Tebusan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prioritas_surat">Prioritas Surat</label>
                            <select class="form-control" name="prioritas_surat" id="prioritas_surat" value="<?= set_value('prioritas_surat'); ?>">
                                <option value="">- - Pilih - -</option>
                                <option value="Sangat Segera/Kilat">Sangat Segera/Kilat</option>
                                <option value="Segera">Segera</option>
                                <option value="Biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select class="form-control" name="sifat_surat" id="sifat_surat" value="<?= set_value('sifat_surat'); ?>">
                                <option value="">--Pilih--</option>
                                <option value="Sangat Rahasia">Sangat Rahasia</option>
                                <option value="Rahasia">Rahasia</option>
                                <option value="Biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control" id="file" name="userfile" value="<?= set_value('file'); ?>">
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