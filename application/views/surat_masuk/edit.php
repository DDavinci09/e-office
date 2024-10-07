<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('SuratMasuk/edit/' . $suratmasuk['id_suratmasuk']); ?>
                    <form action="" method="post">
                        <!-- input id untuk ubah data berdasar id -->
                        <input type="hidden" name="id_suratmasuk" value="<?= $suratmasuk['id_suratmasuk']; ?>">
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $suratmasuk['no_surat']; ?>">
                            <small class="form-text text-danger"><?= form_error('no_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $suratmasuk['tgl_surat']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="text" class="form-control" id="lampiran" name="lampiran" value="<?= $suratmasuk['lampiran']; ?>">
                            <small class="form-text text-danger"><?= form_error('lampiran'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_terima">Tanggal Diterima</label>
                            <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?= $suratmasuk['tgl_terima']; ?>">
                            <small class="form-text text-danger"><?= form_error('tgl_terima'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_agenda">Nomor Agenda</label>
                            <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="<?= $suratmasuk['no_agenda']; ?>">
                            <small class="form-text text-danger"><?= form_error('no_agenda'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari" value="<?= $suratmasuk['dari']; ?>">
                            <small class="form-text text-danger"><?= form_error('dari'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                            <select class="form-control" name="kepada" id="kepada">
                                <?php foreach ($jabatan as $jb) : ?>
                                    <?php if ($jb['nama_jabatan'] == $suratmasuk['kepada']) : ?>
                                        <option value="<?= $jb['nama_jabatan']; ?>" selected><?= $jb['nama_jabatan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jb['nama_jabatan']; ?>"><?= $jb['nama_jabatan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kepada'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $suratmasuk['perihal']; ?>">
                            <small class="form-text text-danger"><?= form_error('perihal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status_surat">Status Surat</label>
                            <select class="form-control" name="status_surat" id="status_surat">
                                <?php foreach ($status as $st) : ?>
                                    <?php if ($st == $suratmasuk['status_surat']) : ?>
                                        <option value="<?= $st; ?>" selected><?= $st; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $st; ?>"><?= $st; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prioritas_surat">Prioritas Surat</label>
                            <select class="form-control" name="prioritas_surat" id="prioritas_surat">
                                <?php foreach ($prioritas as $pr) : ?>
                                    <?php if ($pr == $suratmasuk['prioritas_surat']) : ?>
                                        <option value="<?= $pr; ?>" selected><?= $pr; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $pr; ?>"><?= $pr; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select class="form-control" name="sifat_surat" id="sifat_surat">
                                <?php foreach ($sifat as $sf) : ?>
                                    <?php if ($sf == $suratmasuk['sifat_surat']) : ?>
                                        <option value="<?= $sf; ?>" selected><?= $sf; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $sf; ?>"><?= $sf; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="userfile" value="<?= $suratmasuk['file']; ?>">
                            <small><?= $suratmasuk['file']; ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->