<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="section">
                        <div class="section-title">Transaksi Peminjaman</div>
                        <div class="section-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Transaksi</label>
                                <div class="col-md-9">
                                    <input type="text" id="id" class="form-control" value="<?php echo $id; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Anggota</label>
                                <div class="col-md-9">
                                    <select class="select2" id="id_anggota">
                                        <option value="">--- Pilih ID Anggota ---</option>
                                        <?php foreach ($list_anggota as $record): ?>
                                            <option value="<?php echo $record->id_anggota; ?>"><?php echo $record->id_anggota; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama</label>
                                <div class="col-md-9">
                                    <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pinjam</label>
                                <div class="col-md-9">
                                    <input type="text" id="tgl_pinjam" class="form-control" value="<?php echo $tgl_pinjam; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pengembalian</label>
                                <div class="col-md-9">
                                    <input type="text" id="tgl_kembali" class="form-control" value="<?php echo $tgl_kembali; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <div class="section-title">Data Buku</div>
                        <div class="section-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Buku</label>
                                <div class="col-md-9">
                                    <select class="select2" id="id_buku">
                                        <option value="">--- Pilih ID Buku ---</option>
                                        <?php foreach ($list_buku as $record): ?>
                                            <option value="<?php echo $record->id_buku; ?>"><?php echo $record->id_buku; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Judul Buku</label>
                                <div class="col-md-9">
                                    <input type="text" name="judul" id="judul" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pengarang</label>
                                <div class="col-md-9">
                                    <input type="text" name="pengarang" id="pengarang" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Buku</label>
                                <div class="col-md-9">
                                    <input type="text" name="jenis" id="jenis" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="button" name="submit" id="tambah" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>Buku Yang Dipinjam</h3>
            </div>
            <div class="card-body no-padding">
                <table class="table table-striped primary" cellspacing="0" width="100%" id="tblBuku">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Jenis Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="list_buku"><!-- daftar buku yang dipinjam --></tbody>
                </table>
                <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="button" name="pinjam" id="selesai" class="btn btn-success">
                            <i class="fa fa-check"></i> &nbsp; SELESAI
                        </button>
                        <a href="<?php echo base_url('Admin/Peminjaman'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_anggota").change(function(event) {
            var id_anggota = $(this).val();
            if (id_anggota != "") {
                $.ajax({
                    url: "<?php echo base_url('Admin/CariAnggota'); ?>",
                    type: 'post',
                    data: {id: id_anggota},
                    success: function(e){
                        $('#nama').val(e);
                    }
                });
            } else {
                $('#nama').val('');
            }
        });
        $("#id_buku").change(function(event) {
            var id_buku = $(this).val();
            if (id_buku != "") {
                $.ajax({
                    url: "<?php echo base_url('Admin/CariBuku'); ?>",
                    type: 'post',
                    data: {id: id_buku},
                    success: function(e){
                        var data = e.split("|");
                        if (data == 0) {
                            alert("data tidak ditemukan");
                            $("#judul").val('');
                            $("#pengarang").val('');
                            $("#jenis").val('');
                        }else{
                            $("#judul").val(data[0]);
                            $("#pengarang").val(data[1]);
                            $("#jenis").val(data[2]);
                        }
                    }
                });
            } else {
                $("#judul").val('');
                $("#pengarang").val('');
                $("#jenis").val('');
            }
        });

        var no = 1;
        $('#tambah').click(function(event) {
            var id_buku = $('#id_buku').val();
            var judul = $('#judul').val();
            var pengarang = $('#pengarang').val();
            var jenis = $("#jenis").val();
            if (id_buku == "" || judul == "" || pengarang == "" || jenis == "") {
                alert('Data buku tidak ada');
            } else {
                var td = '<td><button type="button" class="btn btn-danger" data-target="'+no+'" id="cancel"><i class="fa fa-close"></i></button></td>';
                $('#list_buku').append('<tr class="'+no+'"><td class="td'+(no)+'">'+(no++)+'</td><td>'+id_buku+'</td><td>'+judul+'</td><td>'+pengarang+'</td><td>'+jenis+'</td>'+td+'</tr>');
            }
        });
        $(document).on('click', '#cancel', function(event) {
            event.preventDefault();
            var target = $(this).attr('data-target');
            // var intarget = parseInt(target)+1;
            $('.'+target).remove();
            no--;
            // $('.'+intarget).attr('class', no);
        });
        $('#selesai').click(function(event) {
            var transaksi = $('#id').val();
            var id_anggota = $('#id_anggota').val();
            var nama = $('#nama').val();
            var tgl_pinjam = $('#tgl_pinjam').val();
            var tgl_kembali = $('#tgl_kembali').val();
            var id_buku = $('#id_buku').val();
            var judul = $('#judul').val();
            var pengarang = $('#pengarang').val();
            var jenis = $("#jenis").val();
            var data = [];
            var tbl = 0;
            $("table#tblBuku").each(function() { tbl = $(this).find('tr').length; });

            if (transaksi == "" || nama == "" || tbl <= 1) {
                alert('Lengkapi formulir');
            } else {
                var arr = [];
                arr[0] = transaksi;
                arr[1] = id_anggota;
                arr[2] = nama;
                arr[3] = tgl_pinjam;
                arr[4] = tgl_kembali;
                data.push(arr);
                $("table#tblBuku tr").each(function() {
                    var arrayOfThisRow = [];
                    var myArray = [];
                    var tableData = $(this).find('td');
                    if (tableData.length > 0) {
                        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
                        myArray.push(arrayOfThisRow[1]);
                    }
                    data.push(myArray);
                });

                $.ajax({
                    url: '<?php echo base_url('Admin/Pinjam'); ?>',
                    type: 'post',
                    data: {data: data},
                    success: function(e) {
                        if (e == "true") {
                            document.location = "<?php echo base_url('Admin/Peminjaman'); ?>";
                        } else {
                            alert('Transaksi Gagal');
                        }
                    }
                });
            }
        });
    });
</script>
