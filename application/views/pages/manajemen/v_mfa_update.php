<!-- Page content -->
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>

    <div class="block">
        <div class="block-title">
            <h2>Update Aplikasi (MFA Update)</h2>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <p>Klik tombol di bawah ini untuk mengecek pembaruan (update) dari repository Git. Proses ini akan menjalankan perintah <code>git pull</code> di server.</p>
                <button type="button" id="btn-update" class="btn btn-primary"><i class="fa fa-refresh"></i> Cek & Update Aplikasi</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4>Output Proses:</h4>
                <pre id="output-update" style="min-height: 200px; background-color: #f9f9f9; padding: 15px; border: 1px solid #ddd;"></pre>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#btn-update').click(function() {
            var btn = $(this);
            btn.html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
            btn.prop('disabled', true);
            $('#output-update').html('Menjalankan proses update...');
            
            $.ajax({
                url: "<?= base_url() . $dir . '/' . $page ?>/do_update",
                type: "POST",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: "JSON",
                success: function(response) {
                    btn.html('<i class="fa fa-refresh"></i> Cek & Update Aplikasi');
                    btn.prop('disabled', false);
                    
                    if(response.status) {
                        $('#output-update').html(response.output);
                        Swal.fire({
                            title: 'Selesai!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        $('#output-update').html('Gagal menjalankan update.');
                        Swal.fire('Error', 'Gagal menjalankan proses update.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    btn.html('<i class="fa fa-refresh"></i> Cek & Update Aplikasi');
                    btn.prop('disabled', false);
                    $('#output-update').html('Terjadi kesalahan pada server.\n' + error);
                    Swal.fire('Error', 'Terjadi kesalahan pada server.', 'error');
                }
            });
        });
    });
    </script>
</div>