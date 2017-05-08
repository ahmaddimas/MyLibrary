<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Petugas Perpustakaan</h3>
            </div>
                <?php
                $notif = $this->session->flashdata('notif');
                if (!empty($notif)) {
                    echo "<div class='alert alert-info'>$notif</div>";
                }
                ?>
            <div class="card-body no-padding">
                <table class="datatable table table-striped primary" cellspacing="0" width="100%" id="tblBuku">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Petugas</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Telefon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list_anggota as $anggota): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $anggota->id; ?></td>
                            <td><?php echo $anggota->nama; ?></td>
                            <td><?php echo $anggota->jk; ?></td>
                            <td><?php echo $anggota->telp; ?></td>
                            <td><?php echo $anggota->alamat; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
