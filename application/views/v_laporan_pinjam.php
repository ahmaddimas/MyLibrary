<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Peminjaman Buku</h3>
            </div>
            <div class="card-body no-padding">
                <table class="datatable table table-striped primary" cellspacing="0" width="100%" id="tblpinjam">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>ID Anggota</th>
                            <th>Nama</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list_pinjam as $pinjam): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $pinjam->id_transaksi; ?></td>
                            <td><?php echo $pinjam->id_anggota; ?></td>
                            <td><?php echo $pinjam->nama; ?></td>
                            <td><?php echo $pinjam->tgl_pinjam; ?></td>
                            <td><?php echo $pinjam->tgl_kembali; ?></td>
                            <td><?php echo $pinjam->denda; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
