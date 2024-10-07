<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>auth/registration" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah user</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">username</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($daftaruser as $user) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $user['username'] ?></td>
                    <td>
                        <!-- <a class=" badge badge-success" href="">Detail</a>
                        <a class=" badge badge-info" href="">Edit</a> -->
                        <a class="badge badge-danger" href="<?= base_url(); ?>admin/hapus/<?= $user['id_user']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->