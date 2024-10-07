<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>suratmasuk/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Surat Masuk</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Dari</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Perihal</th>
                <th scope="col">View</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($suratmasuk as $sm) : ?>
                <tr>
                    <td><b><?= $i++; ?></b></td>
                    <td><b><?= $sm['no_surat'] ?></b></td>
                    <td><b><?= $sm['dari'] ?></b></td>
                    <td><b><?= date("d-m-Y", strtotime($sm['tgl_surat'])) ?></b></td>
                    <td><b><?= $sm['perihal'] ?></b></td>
                    <td>
                        <a class="badge badge-success" href="<?= base_url(); ?>suratmasuk/detail/<?= $sm['id_suratmasuk']; ?>">Detail</a>
                        <a href="<?= base_url('./assets/file/suratmasuk/') . $sm['file']; ?>" class="badge badge-danger" target="_blank">Lihat</a>
                    </td>
                    <td>
                    <?php if ($sm['statuskirim'] == '0') { ?>
                        <a class=" badge badge-info" href="<?= base_url(); ?>disposisi/tambahdisposisi1/<?= $sm['id_suratmasuk']; ?>">Kirim</a>
                        <?php } else { ?>
                        <a class=" badge badge-success">Telah dikirim</a>
                        <?php } ?>
                        <a class="badge badge-primary" href="<?= base_url(); ?>disposisi/tracking/<?= $sm['id_suratmasuk']; ?>">Lihat Disposisi</a><br>
                        <a class=" badge badge-info" href="<?= base_url(); ?>suratmasuk/edit/<?= $sm['id_suratmasuk']; ?>">Edit</a>
                        <a class="badge badge-danger" href="<?= base_url(); ?>suratmasuk/hapus/<?= $sm['id_suratmasuk']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->