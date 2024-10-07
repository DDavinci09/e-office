<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>unit/tambahJabatan2/<?= $unit['id_unit'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah jabatan</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Unit</th>
                <th scope="col">Nama Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($jabatan as $jb) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $jb['nama_unit'] ?></td>
                    <td><?= $jb['nama_jabatan'] ?></td>
                    <td>
                        <a class="badge badge-danger" href="<?= base_url(); ?>suratmasuk/hapus/<?= $jb['id_unit']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->