<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="<?php echo base_url('Admin/Tambah_buku'); ?>" enctype="multipart/form-data">
                    <div class="section">
                        <div class="section-title">Tambah Buku</div>
                        <div class="section-body">
                            <?php if (!empty($notif)) {
                                echo "<div class='alert alert-danger'>";
                                echo $notif;
                                echo "</div>";
                            } ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Buku</label>
                                <div class="col-md-9">
                                    <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Judul</label>
                                <div class="col-md-9">
                                    <input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Penerbit</label>
                                <div class="col-md-9">
                                    <input type="text" name="penerbit" class="form-control" value="<?php echo $penerbit; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pengarang</label>
                                <div class="col-md-9">
                                    <input type="text" name="pengarang" class="form-control" value="<?php echo $pengarang; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jumlah Buku</label>
                                <div class="col-md-9">
                                    <input type="text" name="jumlah" class="form-control" value="<?php echo $jumlah; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gambar Sampul</label>
                                <div class="col-md-9">
                                    <?php if (!empty($foto)): ?>
                                        <img src="<?php echo base_url().'assets/images/'.$foto; ?>" alt="" width="150px">
                                        <br><br>
                                    <?php endif; ?>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                        <input type="file" id="foto" name="foto" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="<?php echo $btn; ?>" class="btn btn-primary" value="Save">
                                <a href="<?php echo base_url('Admin/Buku'); ?>" class="btn btn-default" >Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
