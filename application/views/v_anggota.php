<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <a href="<?php echo base_url('Admin/Tambah_Anggota'); ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a> &nbsp; Data Anggota Perpustakaan
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
                            <th>ID Anggota</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Telefon</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($list_anggota as $anggota): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $anggota->id_anggota; ?></td>
                            <td><?php echo $anggota->nama; ?></td>
                            <td><?php echo $anggota->jk; ?></td>
                            <td><?php echo $anggota->telp; ?></td>
                            <td><?php echo $anggota->alamat; ?></td>
                            <td><img src="<?php echo base_url().'assets/images/'.$anggota->foto; ?>" alt="" width="100px"></td>
                            <td>
                                <a href="<?php echo base_url('Admin/Tambah_Anggota/').$anggota->id_anggota; ?>" class="btn btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?php echo base_url('Admin/Delete/Anggota/').$anggota->id_anggota; ?>" class="btn btn-danger">
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
