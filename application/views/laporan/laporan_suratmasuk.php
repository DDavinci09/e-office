<head>
    <style>
        .line-title {
            border-style: inset;
            border-top: 1px #000;
        }
    </style>
</head>

<body>
    <table border="1" width="100%" cellpadding="1">
        <tr>
            <td align="center">
                <img src="assets/img/logo.jpg" style="position: center; width: 70px; height: auto;">
            </td>
            <th colspan="3" align="center">
                KEMENTRIAN AGAMA REPUBLIK INDONESIA
                <br>
                UNIVERSITAS ISLAM NEGERI MAHMUD YUNUS
                <br>
                BATUSANGKAR
                <br>
                LAPORAN SURAT MASUK
            </th>
        </tr>
    </table>
    <h8>Jumlah Surat Masuk dari <?= date("d-m-Y", strtotime($mulai_tgl)) ?> sampai <?= date("d-m-Y", strtotime($sampai_tgl)) ?> : <?= $totalsurat; ?></h8>
    <br>
    <table class="table" border="1" width="100%" cellpadding="1">
        <thead>
            <tr>
                <th scope="col" align="center">NO</th>
                <th scope="col" align="center">Nomor Surat</th>
                <th scope="col" align="center">Dari</th>
                <th scope="col" align="center">Tanggal Surat</th>
                <th scope="col" align="center">Nomor Agenda</th>
                <th scope="col" align="center">Lampiran</th>
                <th scope="col" align="center">Perihal</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            foreach ($suratmasuk as $sm) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td><?= $sm['no_surat'] ?></td>
                    <td><?= $sm['dari'] ?></td>
                    <td><?= date("d-m-Y", strtotime($sm['tgl_surat'])) ?></td>
                    <td><?= $sm['no_agenda'] ?></td>
                    <td><?= $sm['lampiran'] ?></td>
                    <td><?= $sm['perihal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <!-- </table>

    <br><br>
    <table width="100%">
        <tr>
            <th align="center">
                <span>Kepala Sub Bagian Tata Usaha, Humas dan Rumah Tangga</span>
                <br>
                <img src="<?= $ttd['img']; ?>" alt="Images" width="200px" height="100px">
                <br>
                <span>Kasubag TUHRT</span>
            </th>
        </tr>
    </table> -->
</body>