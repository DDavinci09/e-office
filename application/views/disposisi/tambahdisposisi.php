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
                        <input type="hidden" name="id_disposisi" value="<?= $disposisi['id_disposisi']; ?>">
                        <div class="form-group">
                            <label for="unit"><b>Nama Unit</b></label>
                            <select class="form-control" name="unit" id="unit" required>
                                <option value="0"><b>Pilih Unit</b></option>
                                <?php foreach ($unit as $u) { ?>
                                    <option value="<?= $u['id_unit']; ?>"><?= $u['nama_unit']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan"><b>Nama Jabatan</b></label>
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value=""> Pilih Jabatan </option>
                            </select>
                        </div>
                        <?php if ($this->session->userdata('id_jabatan') == '1') { ?>
                            <div class="form-group">
                                <label for="petunjuk"><b>Petunjuk</b></label>
                                <select class="form-control" name="petunjuk" id="petunjuk" value="<?= set_value('petunjuk'); ?>">
                                    <option value=""> - - Pilih - - </option>
                                    <option value="Setuju">Setuju</option>
                                    <option value="Tolak">Tolak</option>
                                    <option value="Perbaiki">Perbaiki</option>
                                    <option value="Bicarakan dg. Rektor">Bicarakan dg. Rektor</option>
                                    <option value="Teliti & Pendapat">Teliti & Pendapat</option>
                                    <option value="Bicarakan Bersama">Bicarakan Bersama</option>
                                    <option value="Untuk Diketahui">Untuk Diketahui</option>
                                    <option value="Ingatkan">Ingatkan</option>
                                    <option value="Selesaikan">Selesaikan</option>
                                    <option value="Simpan">Simpan</option>
                                    <option value="Sesuai Catatan">Sesuai Catatan</option>
                                    <option value="Untuk Perhatian">Untuk Perhatian</option>
                                    <option value="Harap Dihadiri/Diwakili">Harap Dihadiri/Diwakili</option>
                                    <option value="Edarkan">Edarkan</option>
                                    <option value="Jawab">Jawab</option>
                                </select>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="keterangan"><b>Isi Disposisi</b></label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= set_value('keterangan'); ?>">
                            <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
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