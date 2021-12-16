<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan</title>

<body onload="window.print()">
    <!-- /.box-header -->
    <h3 class="center"> Laporan Peminjaman</h3>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id peminjaman</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Di Kembali</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->id_pm; ?></td>
                        <td><?= $row->nama_anggota; ?></td>
                        <td><?= $row->judul_buku; ?></td>
                        <td><?= mediumdate_indo($row->tgl_pinjam); ?></td>
                        <td><?= mediumdate_indo($row->tgl_kembali); ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>