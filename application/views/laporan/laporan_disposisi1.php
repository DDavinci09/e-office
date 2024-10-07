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
            <td colspan="2">Status Surat : 
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
                Prioritas Surat : 
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
                <br>
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
                Sifat Surat :
                <?php if ($suratmasuk["sifat_surat"] !== 'Sangat Rahasia') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Sangat Rahasia
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
        <tr>
            <td colspan="4">
                <?php $no = 1;
                foreach ($disposisi as $dp) : ?>
                    <?= $no++ ?>. <?= $dp['pengirim']; ?> : <?= $dp['keterangan']; ?> <br>
                <?php endforeach; ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td colspan="2"><b>Disposisi Rektor Kepada : </b>
            <td colspan="2"><b> Petunjuk : </b>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] !== 'Wakil Rektor I') { ?>
                <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Warek I
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Setuju') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Setuju
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Perbaiki') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Perbaiki
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] !== 'Wakil Rektor II') { ?>
                <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Warek II
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Tolak') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Tolak
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Bicarakan dg. Rektor') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Bicarakan dg. Rektor
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] !== 'Wakil Rektor III') { ?>
                <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Warek III
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Teliti & Pendapat') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Teliti & Pendapat
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Bicarakan Bersama') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Bicarakan Bersama
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] !== 'Kepala Biro AUAK') { ?>
                <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Kepala Biro AUAK
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Untuk Diketahui') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Untuk Diketahui
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Ingatkan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Ingatkan
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] !== 'Direktur Pascasarjana') { ?>
                <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Direktur Pascasarjana
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Selesaikan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Selesaikan
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Simpan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Simpan
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] == 'Dekan FEBI') { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                Dekan FEBI
                <?php } else if ($rektor["nama_jabatan"] == 'Dekan FUAD') { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                Dekan FUAD
                <?php } else { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                    Dekan .....
                <?php } ?>               
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Sesuai Catatan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Sesuai Catatan
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Disiapkan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Disiapkan
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if ($rektor["nama_jabatan"] == 'Kepala LPM') { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                Kepala LPM
                <?php } else if ($rektor["nama_jabatan"] == 'Kepala LP2M') { ?>
                <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                Kepala LP2M
                <?php } else { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                    KA. LPM/LP2M
                <?php } ?> 
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Untuk Perhatian') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Untuk Perhatian
            </td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Harap Dihadiri/Diwakili') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Harap Dihadiri/Diwakili
            </td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Edarkan') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Edarkan
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
            <td>
                <?php if ($suratmasuk["petunjuk"] !== 'Jawab') { ?>
                    <img src="assets/img/checkbox 1.png" style="position: center; width: 15px; height: 15px;">
                <?php } else { ?>
                    <img src="assets/img/checkbox 2.png" style="position: center; width: 15px; height: 15px;">
                <?php } ?>
                Jawab
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4">
                <b>Catatan Rektor : </b>
                <br><?= $rektor['keterangan']; ?><br>
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