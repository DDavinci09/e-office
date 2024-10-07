<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>unit/tambahUnit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Unit</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($unit as $u) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $u['nama_unit'] ?></td>
                    <td>
                        <a class=" badge badge-success" href="<?= base_url(); ?>unit/jabatan1/<?= $u['id_unit']; ?>">Jabatan</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->