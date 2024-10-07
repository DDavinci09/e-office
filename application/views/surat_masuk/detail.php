<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $suratmasuk['no_surat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="text" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= date("d-m-Y", strtotime($suratmasuk['tgl_surat'])) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="text" class="form-control" id="lampiran" name="lampiran" value="<?= $suratmasuk['lampiran']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_terima">Tanggal Diterima</label>
                            <input type="text" class="form-control" id="tgl_terima" name="tgl_terima" value="<?= date("d-m-Y", strtotime($suratmasuk['tgl_terima'])) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_agenda">Nomor Agenda</label>
                            <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="<?= $suratmasuk['no_agenda']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari" value="<?= $suratmasuk['dari']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada" value="<?= $suratmasuk['kepada']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $suratmasuk['perihal']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status_surat">Status Surat</label>
                            <input type="text" class="form-control" id="status_surat" name="status_surat" value="<?= $suratmasuk['status_surat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="prioritas_surat">Prioritas Surat</label>
                            <input type="text" class="form-control" id="prioritas_surat" name="prioritas_surat" value="<?= $suratmasuk['prioritas_surat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <input type="text" class="form-control" id="sifat_surat" name="sifat_surat" value="<?= $suratmasuk['sifat_surat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="text" class="form-control" id="file" name="file" value="<?= $suratmasuk['file']; ?>" readonly>
                            <a href="<?= base_url('./assets/file/suratmasuk/') . $suratmasuk['file']; ?>" class="badge badge-danger" target="_blank">Lihat Surat</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->