<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Transaksi Pengembalian</h3>
            </div>
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="section">
                        <div class="section-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Transaksi</label>
                                <div class="col-md-9">
                                    <select class="select2" id="id">
                                        <option value="">--- Pilih ID Transaksi ---</option>
                                        <?php foreach ($list_transaksi as $record): ?>
                                            <option value="<?php echo $record->id_transaksi; ?>"><?php echo $record->id_transaksi; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Anggota</label>
                                <div class="col-md-9">
                                    <input type="text" id="id_anggota" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jumlah Buku</label>
                                <div class="col-md-9">
                                    <input type="text" id="jumlah" class="form-control" value="" readonly>
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
                                    <input type="text" id="tgl_pinjam" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pengembalian</label>
                                <div class="col-md-9">
                                    <input type="text" id="tgl_kembali" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Denda</label>
                                <div class="col-md-9">
                                    <input type="text" name="denda" id="denda" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="section">
                    <div class="section-title"><b>Buku Yang Dipinjam</b></div>
                </div>
                <table class="table table-striped primary" cellspacing="0" width="100%" id="tblBuku">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Jenis Buku</th>
                            <th>Sampul Buku</th>
                        </tr>
                    </thead>
                    <tbody id="list_buku"><!-- daftar buku yang dipinjam --></tbody>
                </table>
                <div class="form-footer">
                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="button" name="selesai" id="selesai" class="btn btn-success">
                                <i class="fa fa-check"></i> &nbsp; SELESAI
                            </button>
                            <a href="<?php echo base_url('Admin/Pengembalian'); ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id").change(function(event) {
            var id_transaksi = $(this).val();
            if (id_transaksi != "") {
                $.ajax({
                    url: "<?php echo base_url('Admin/CariPinjam'); ?>",
                    type: 'post',
                    data: {id: id_transaksi},
                    success: function(e){
                        var data = e.split("|");
                        if (data == 0) {
                            alert("data tidak ditemukan");
                            $("#jumlah").val('');
                            $("#id_anggota").val('');
                            $("#nama").val('');
                            $("#tgl_pinjam").val('');
                            $("#tgl_kembali").val('');
                            $("#denda").val('');
                            $(".daftar").remove();
                        } else {
                            $("#id_anggota").val(data[0]);
                            $("#jumlah").val(data[1]);
                            $("#nama").val(data[2]);
                            $("#tgl_pinjam").val(data[3]);
                            $("#tgl_kembali").val(data[4]);
                            $("#denda").val(data[5]);
                            $(".daftar").remove();
                            for (var i = 1; i <= data[1]; i++) {
                                var index = (5 * i);
                                var img = "<img src='<?php echo base_url(); ?>assets/images/"+data[index+5]+"' width='100px'>";
                                var td = '<td>'+data[index+1]+'</td><td>'+data[index+2]+'</td><td>'+data[index+3]+'</td><td>'+data[index+4]+'</td><td>'+img+'</td>';
                                $('#list_buku').append('<tr class="daftar"><td>'+i+'</td>'+td+'</tr>');
                            }
                        }
                    }
                });
            } else {
                $("#jumlah").val('');
                $("#id_anggota").val('');
                $("#nama").val('');
                $("#tgl_pinjam").val('');
                $("#tgl_kembali").val('');
                $("#denda").val('');
                $(".daftar").remove();
            }
        });
        $('#selesai').click(function(event) {
            var data = [];
            var id_transaksi = $("#id").val();
            data[0] = id_transaksi;
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

            if (id_transaksi !== "") {
                $.ajax({
                    url: '<?php echo base_url("Admin/BukuKembali") ?>',
                    type: 'post',
                    data: {data: data}
                })
                .done(function(e) {
                    window.location = "<?php echo base_url('Admin/Pengembalian') ?>";
                    console.log("success "+e);
                })
                .always(function(e) {
                    console.log("complete");
                });
            } else {
                alert('ID Transaksi Kosong');
            }
        });
    });
</script>
