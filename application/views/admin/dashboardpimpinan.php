<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <a class="col-xl-3 col-md-6 mb-4" href="<?= base_url(); ?>disposisi/suratmasukpengguna">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Surat Masuk Baru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahsuratbaru ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-xl-3 col-md-6 mb-4" href="<?= base_url(); ?>disposisi/disposisipengguna">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Surat Masuk Dalam Disposisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suratdalamdisposisi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-xl-3 col-md-6 mb-4" href=" <?= base_url(); ?>arsip/arsipPengguna">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Arsip Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlaharsipsurat ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsuratmasukpengguna ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->