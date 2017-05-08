<!DOCTYPE html>
<html>
    <head>
        <title>Perpustakaan Moklet</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flat-admin.css">

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/blue-sky.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/blue.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/red.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/yellow.css">

        <script src="<?php echo base_url(); ?>assets/js/jquery.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="app app-default">

            <aside class="app-sidebar fixed" id="sidebar">
                <div class="sidebar-header">
                    <a class="sidebar-brand" href="<?php echo base_url('Admin'); ?>">
                        <span class="highlight">Moklet Perpus</span>
                        Admin</a>
                    <button type="button" class="sidebar-toggle">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="sidebar-menu">
                    <ul class="sidebar-nav">
                        <li class="<?php if($active == 'dashboard') echo 'active'; ?>">
                            <a href="<?php echo base_url('Admin'); ?>">
                                <div class="icon">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                </div>
                                <div class="title">Dashboard</div>
                            </a>
                        </li>
                        <li class="<?php if($active == 'buku') echo 'active'; ?>">
                            <a href="<?php echo base_url('Admin/Buku'); ?>">
                                <div class="icon">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                                <div class="title">Buku</div>
                            </a>
                        </li>
                        <li class="dropdown <?php if($active == 'anggota') echo 'active'; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="title">Anggota</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="section">
                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                        Perpustakaan</li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Anggota'); ?>">Anggota</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Petugas'); ?>">Petugas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown <?php if($active == 'transaksi') echo 'active'; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                </div>
                                <div class="title">Transaksi</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="section">
                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                        Transaksi Buku</li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Peminjaman'); ?>">Peminjaman</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Pengembalian'); ?>">Pengembalian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown <?php if($active == 'laporan') echo 'active'; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </div>
                                <div class="title">Laporan</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="section">
                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                        Laporan Transaksi Buku</li>
                                    <li class="line"></li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Laporan_Pinjam'); ?>">Peminjaman</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Admin/Laporan_Kembali'); ?>">Pengembalian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

            <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
                <div class="dropdown-background">
                    <div class="bg"></div>
                </div>
                <div class="dropdown-container">
                    {{list}}
                </div>
            </script>
            <div class="app-container">

                <nav class="navbar navbar-default" id="navbar">
                    <div class="container-fluid">
                        <div class="navbar-collapse collapse in">
                            <ul class="nav navbar-nav navbar-mobile">
                                <li>
                                    <button type="button" class="sidebar-toggle">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </li>
                                <li class="logo">
                                    <a class="navbar-brand" href="<?php echo base_url('Admin'); ?>">
                                        <span class="highlight">Moklet Perpus</span>
                                        Admin</a>
                                </li>
                                <li>
                                    <button type="button" class="navbar-toggle">
                                        <img class="profile-img" src="">
                                    </button>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="navbar-title" style="text-transform: uppercase"><?php echo $active; ?></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown profile">
                                    <a href="<?php echo base_url('Admin/Profile'); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                        <img class="profile-img" src="<?php echo base_url(); ?>assets/images/no_profile.png">
                                        <div class="title">Profile</div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="profile-info">
                                            <h4 class="username"><?php echo $nama; ?></h4>
                                        </div>
                                        <ul class="action">
                                            <li>
                                                <a href="<?php echo base_url('Admin/Profile'); ?>">
                                                    Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('Authentication/Logout'); ?>">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- load view -->
                <?php $this->load->view($main_view); ?>

                <footer class="app-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="footer-copyright">
                                Copyright © 2016 SMK Telkom Malang | Ahmad Dimas Abid Muttaqi
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

    </body>
</html>
