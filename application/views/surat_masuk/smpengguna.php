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
                <th scope="col">Perihal</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Penerima</th>
                <th scope="col">Isi Disposisi</th>
                <th scope="col">View</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($disposisi as $dp) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $dp['no_surat'] ?></td>
                    <td><?= $dp['perihal'] ?></td>
                    <td><?= $dp['pengirim'] ?></td>
                    <td><?= $dp['nama_jabatan'] ?></td>
                    <td><?= $dp['keterangan'] ?></td>
                    <td>
                        <a href="<?= base_url('./assets/file/suratmasuk/') . $dp['file']; ?>" class="badge badge-danger" target="_blank">File</a>
                        <a class="badge badge-success" href="<?= base_url(); ?>suratmasuk/detail/<?= $dp['id_suratmasuk']; ?>">Detail</a>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>disposisi/tracking/<?= $dp['id_suratmasuk']; ?>" class="badge badge-primary" >Lihat Disposisi</a>
                        <a class="badge badge-info" href="<?= base_url(); ?>disposisi/tambahdisposisi/<?= $dp['id_suratmasuk']; ?>/<?= $dp['id_disposisi'] ?>">Disposisi</a>
                        <a class="badge badge-success" href="<?= base_url(); ?>arsip/arsipSurat/<?= $dp['id_suratmasuk'] ?>">Arsip</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->