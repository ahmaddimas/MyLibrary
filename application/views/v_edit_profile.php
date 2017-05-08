<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="<?php echo base_url('Admin/Profile'); ?>" enctype="multipart/form-data">
                    <div class="section">
                        <div class="section-title">P R O F I L E</div>
                        <div class="section-body">
                            <?php if (!empty($notif)) {
                                echo "<div class='alert alert-danger'>";
                                echo $notif;
                                echo "</div>";
                            } ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Petugas</label>
                                <div class="col-md-9">
                                    <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama</label>
                                <div class="col-md-9">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <div class="radio radio-inline">
                                        <input type="radio" name="jk" id="radio5" value="L" checked>
                                        <label for="radio5">
                                            Laki - Laki
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" name="jk" id="radio6" value="P">
                                        <label for="radio6">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Alamat</label>
                                <div class="col-md-9">
                                    <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
