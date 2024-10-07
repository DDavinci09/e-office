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
        <tr>
            <th colspan="4" align="center">Lembar Disposisi</th>
        </tr>
    </table>
    <table border="1" width="100%" cellpadding="1">
        <tr>
            <td>Nomor Surat</td>
            <td><?= $suratmasuk['no_surat'] ?></td>
            <td colspan="2">
                Status : 
                <?php if ($suratmasuk["status_surat"] !== 'Asli') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Asli
                <?php if ($suratmasuk["status_surat"] !== 'Tebusan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Tebusan
            </td>
        </tr>
        <tr>
            <td>Tanggal Surat</td>
            <td><?= date("d-m-Y", strtotime($suratmasuk['tgl_surat'])) ?></td>
            <td colspan="2" rowspan="2">
                Prioritas :
                <?php if ($suratmasuk["prioritas_surat"] !== 'Sangat Segera/Kilat') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Sangat Segera/Kilat
                <br>
                <?php if ($suratmasuk["prioritas_surat"] !== 'Segera') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Segera
                <?php if ($suratmasuk["prioritas_surat"] !== 'Biasa') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Biasa
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td><?= $suratmasuk['lampiran'] ?></td>
        </tr>
        <tr>
            <td>Diterima Tanggal</td>
            <td><?= date("d-m-Y", strtotime($suratmasuk['tgl_terima'])) ?></td>
            <td colspan="2" rowspan="2">
                Sifat :
                <?php if ($suratmasuk["sifat_surat"] !== 'Sangat Rahasia') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Sangat Rahasia
                    <br>
                <?php if ($suratmasuk["sifat_surat"] !== 'Rahasia') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Rahasia
                <?php if ($suratmasuk["sifat_surat"] !== 'Biasa') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Biasa
            </td>
        </tr>
        <tr>
            <td>Nomor Agenda</td>
            <td><?= $suratmasuk['no_agenda'] ?></td>
        </tr>
        <tr>
            <td>Dari</td>
            <td colspan="3"><?= $suratmasuk['dari'] ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td colspan="3"><?= $suratmasuk['perihal'] ?></td>
        </tr>
        <tr>
            <td colspan="4">
                <b>Diteruskan Kepada :</b> 
            </td>
        </tr>
            <?php $no = 1;
                foreach ($disposisi as $dp) : ?>
        <tr>
            <td colspan="1">
                    <?= $no++ ?>. <?= $dp['pengirim']; ?>
            </td>
            <td colspan="3">
                    : <?= $dp['keterangan']; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="2"><b>Disposisi Rektor Kepada : </b>
            <td colspan="2"><b> Petunjuk : </b>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["pengirim"] !== 'Rektor') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;"> ...............
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;"> 
                    <?= $rektor["nama_jabatan"]; ?>
                <?php } ?>
            </td>
            <td colspan="2">
            <?php if ($rektor["pengirim"] !== 'Rektor') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;"> ...............
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;"> 
                    <?= $rektor["petunjuk"]; ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <b>Catatan Rektor : </b>
                <br><?= $rektor['keterangan']; ?><br><br>
            </td>
        </tr>
        <tr>
            <td>Tanggal Penyelesain</td>
            <td colspan="3"><?= date("d-m-Y h:m:s", strtotime($suratmasuk['tgl_arsip'])) ?></td>
        </tr>
        <tr>
            <td>Penerima</td>
            <td colspan="3"><?= $suratmasuk['pengarsip'] ?></td>
        </tr>
    </table>
</body>