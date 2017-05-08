<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <a href="<?php echo base_url('Admin/Tambah_buku'); ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a> &nbsp; Data Buku
                </h3>
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
                            <th>ID Buku</th>
                            <th>Judul</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Jumlah</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list_buku as $buku): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $buku->id_buku; ?></td>
                            <td><?php echo $buku->judul; ?></td>
                            <td><?php echo $buku->penerbit; ?></td>
                            <td><?php echo $buku->pengarang; ?></td>
                            <td><?php echo $buku->jumlah; ?></td>
                            <td><img src="<?php echo base_url().'assets/images/'.$buku->foto; ?>" alt="" width="100px"></td>
                            <td>
                                <a href="<?php echo base_url('Admin/Tambah_Buku/').$buku->id_buku; ?>" class="btn btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?php echo base_url('Admin/Delete/Buku/').$buku->id_buku; ?>" class="btn btn-danger">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
