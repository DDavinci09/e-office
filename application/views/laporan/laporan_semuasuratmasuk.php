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
                <small>
                    <small>
                        Jl. Sudirman No. 137 Lima Kaum Batusangkar Telp. (0752) 71150, 71890 Fax. (0752) 71879
                    </small>
                </small>
                <br>
                <small>
                    <small>
                        Website : www.iainbatusangkar.ac.id Email : info@iainbatusangkar.ac.id
                    </small>
                </small>
            </th>
        </tr>
    </table>
    <br>
    <table class="table" border="1" width="100%" cellpadding="1">
        <thead>
            <tr>
                <th scope="col" align="center">NO</th>
                <th scope="col" align="center">Nomor Surat</th>
                <th scope="col" align="center">Dari</th>
                <th scope="col" align="center">Kepada</th>
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
                    <td align="center"><?= $sm['no_surat'] ?></td>
                    <td align="center"><?= $sm['dari'] ?></td>
                    <td align="center"><?= $sm['kepada'] ?></td>
                    <td align="center"><?= date("d-m-Y", strtotime($sm['tgl_surat'])) ?></td>
                    <td align="center"><?= $sm['no_agenda'] ?></td>
                    <td align="center"><?= $sm['lampiran'] ?></td>
                    <td align="center"><?= $sm['perihal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
    </table>
</body>