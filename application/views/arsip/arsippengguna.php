<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Dari</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Diarsipkan Pada</th>
                <th scope="col">Perihal</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($arsip as $ar) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $ar['no_surat'] ?></td>
                    <td><?= $ar['dari'] ?></td>
                    <td><?= date("d-m-Y", strtotime($ar['tgl_surat'])) ?></td>
                    <td><?= date("d-m-Y h:m:s", strtotime($ar['tgl_arsip'])) ?></td>
                    <td><?= $ar['perihal'] ?></td>
                    <td>
                        <a class="badge badge-primary" href="<?= base_url(); ?>disposisi/tracking/<?= $ar['id_suratmasuk']; ?>">Lihat Disposisi</a>
                        <a href="<?= base_url('./assets/file/suratmasuk/') . $ar['file']; ?>" class="badge badge-danger" target="_blank">Lihat</a>
                        <br>
                        <a class="badge badge-success" href="<?= base_url(); ?>suratmasuk/detail/<?= $ar['id_suratmasuk']; ?>">Detail</a>
                        <a class="badge badge-success" href="<?= base_url(); ?>laporan/index/<?= $ar['id_suratmasuk']; ?>" target="_blank">Laporan</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->