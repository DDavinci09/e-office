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
                <th scope="col">Status Surat</th>
                <th scope="col">Sifat Surat</th>
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
                    <td><?= ++$start; ?></td>
                    <td><?= $sm['no_surat'] ?></td>
                    <td><?= $sm['dari'] ?></td>
                    <td><?= date("d-m-Y", strtotime($sm['tgl_surat'])) ?></td>
                    <td><?= $sm['status_surat'] ?></td>
                    <td><?= $sm['sifat_surat'] ?></td>
                    <td><?= $sm['perihal'] ?></td>
                    <td>
                        <a href="<?= base_url('./assets/file/suratmasuk/') . $sm['file']; ?>" class="badge badge-danger" target="_blank">Lihat</a>
                        <a class="badge badge-success" href="<?= base_url(); ?>suratmasuk/detail/<?= $sm['id_suratmasuk']; ?>">Detail</a>
                    </td>
                    <td>
                        <a class=" badge badge-info" href="<?= base_url(); ?>disposisi/tracking/<?= $sm['id_suratmasuk']; ?>"> Lihat Disposisi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->pagination->create_links(); ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->