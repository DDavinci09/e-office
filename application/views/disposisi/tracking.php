<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Disposisi Ke</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Penerima</th>
                <th scope="col">Isi Disposisi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($disposisi as $dp) : ?>
                <tr>
                    <td><b><?= $i++; ?></b></td>
                    <td><b><?= $dp['pengirim'] ?></b></td>
                    <td><b><?= $dp['nama_jabatan'] ?></b></td>
                    <td><b><?= $dp['keterangan'] ?></b></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->