<div class="btn-floating" id="help-actions">
    <div class="btn-bg"></div>
    <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
        <i class="icon fa fa-plus"></i>
        <span class="help-text">Tambah</span>
    </button>
    <div class="toggle-content">
        <ul class="actions">
            <li>
                <a href="<?php echo base_url('Admin/Buku'); ?>">Tambah Buku</a>
            </li>
            <li>
                <a href="<?php echo base_url('Admin/Anggota'); ?>">Tambah Anggota</a>
            </li>
            <li>
                <a href="<?php echo base_url('Admin/Peminjaman'); ?>">Transaksi Peminjaman</a>
            </li>
            <li>
                <a href="<?php echo base_url('Admin/Pengembalian'); ?>">Transaksi Pengembalian</a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card card-banner card-chart card-green no-br">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Grafik peminjaman buku</div>
                </div>
                <ul class="card-action">
                    <li>
                        <a href="/">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="ct-chart-sale"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-green-light">
            <div class="card-body">
                <i class="icon fa fa-book fa-4x"></i>
                <div class="content">
                    <div class="title">Jumlah Buku</div>
                    <div class="value">
                        <span class="sign"></span><?php echo $jml_buku; ?></div>
                </div>
            </div>
        </a>

    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-blue-light">
            <div class="card-body">
                <i class="icon fa fa-users fa-4x"></i>
                <div class="content">
                    <div class="title">Jumlah Anggota</div>
                    <div class="value">
                        <span class="sign"></span><?php echo $jml_anggota; ?></div>
                </div>
            </div>
        </a>

    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-yellow-light">
            <div class="card-body">
                <i class="icon fa fa-check fa-4x"></i>
                <div class="content">
                    <div class="title">Jumlah Peminjaman</div>
                    <div class="value">
                        <span class="sign"></span><?php echo $jml_pinjam; ?></div>
                </div>
            </div>
        </a>

    </div>
</div>
