<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>        
        <form action="<?= base_url('laporan/laporansuratmasuk') ?>" method="POST" target="_blank">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="date" class="form-control" name="mulai_tanggal" required>
            </div>
            -
            <div class="col-auto">
                <input type="date" class="form-control" name="sampai_tanggal" required>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Download</button>
            </div>
        </div>
        </form>
        <form action="<?= base_url('suratmasuk/daftarsurat') ?>" method="POST">
        <div class="input-group">
        <input type="text" class="form-control" name="keyword" placeholder="Cari Data">
                            <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit"></input>
                            </div>
                        </div>
        </form>
    </div>
    <div class="row">
        <a class="btn btn-success" href="<?= base_url(); ?>laporan/suratmasuk" target="_blank">Download All</a> 
    </div>
    <h4 class="row mt-1">Result : <?= $total_rows; ?></h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Dari</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Perihal</th>
                <th scope="col">Status Surat</th>
                <th scope="col">Sifat Surat</th>
                <th scope="col">View</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($suratmasuk as $sm) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $sm['no_surat'] ?></td>
                    <td><?= $sm['dari'] ?></td>
                    <td><?= date("d-m-Y", strtotime($sm['tgl_surat'])) ?></td>
                    <td><?= $sm['perihal'] ?></td>
                    <td><?= $sm['status_surat'] ?></td>
                    <td><?= $sm['sifat_surat'] ?></td>
                    <td>
                        <a class="badge badge-success" href="<?= base_url(); ?>suratmasuk/detail/<?= $sm['id_suratmasuk']; ?>">Detail</a>
                        <a href="<?= base_url('./assets/file/suratmasuk/') . $sm['file']; ?>" class="badge badge-danger" target="_blank">Lihat</a>
                    </td>
                    <td>
                        <a class="badge badge-primary" href="<?= base_url(); ?>disposisi/tracking/<?= $sm['id_suratmasuk']; ?>">Lihat Disposisi</a>
                        <a class="badge badge-danger" href="<?= base_url(); ?>suratmasuk/hapus/<?= $sm['id_suratmasuk']; ?>">Hapus</a>
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