<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Dashboard Sinkronisasi</a>
            </li>
        </ul>
    </div>
    <!-- END Dashboard Header -->

    <!-- Filter Section -->
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-4">
            <label for="dash_filter_prodi"><strong>Filter Prodi:</strong></label>
            <select class="form-control" id="dash_filter_prodi">
                <option value="">-- Semua Prodi --</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="dash_filter_angkatan"><strong>Filter Angkatan:</strong></label>
            <select class="form-control" id="dash_filter_angkatan">
                <option value="0">-- Semua Angkatan --</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>&nbsp;</label>
            <button class="btn btn-primary btn-block" id="btn_apply_filter">
                <i class="fa fa-filter"></i> Terapkan Filter
            </button>
        </div>
    </div>
    <!-- END Filter Section -->

    <!-- Summary Cards -->
    <div class="row" id="summary-cards">
        <div class="col-md-4">
            <div class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background">
                        <i class="gi gi-user text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-primary" id="card_total">
                        <i class="fa fa-spinner fa-spin"></i>
                    </h2>
                    <span class="text-muted">Total Mahasiswa</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-success">
                        <i class="fa fa-check text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-success" id="card_synced">
                        <i class="fa fa-spinner fa-spin"></i>
                    </h2>
                    <span class="text-muted">Tersinkronisasi</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-danger">
                        <i class="fa fa-times text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-danger" id="card_unsynced">
                        <i class="fa fa-spinner fa-spin"></i>
                    </h2>
                    <span class="text-muted">Belum Sinkron</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Summary Cards -->

    <!-- Progress Bar -->
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><strong>Progress</strong> Sinkronisasi</h2>
                </div>
                <div class="block-content-full">
                    <div class="progress progress-striped active" style="height: 28px; margin-bottom: 5px;">
                        <div class="progress-bar progress-bar-success" id="progress_synced" role="progressbar" style="width: 0%; line-height: 28px; font-size: 13px; font-weight: bold;">
                            0%
                        </div>
                        <div class="progress-bar progress-bar-danger" id="progress_unsynced" role="progressbar" style="width: 0%; line-height: 28px; font-size: 13px; font-weight: bold;">
                            0%
                        </div>
                    </div>
                    <div class="text-center text-muted" style="font-size: 12px;">
                        <span class="label label-success"><i class="fa fa-check"></i> Tersinkronisasi</span>
                        &nbsp;
                        <span class="label label-danger"><i class="fa fa-times"></i> Belum Sinkron</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Progress Bar -->

    <!-- Breakdown Tables -->
    <div class="row">
        <!-- Breakdown Per Prodi -->
        <div class="col-md-6">
            <div class="block full">
                <div class="block-title">
                    <h2><strong>Statistik</strong> Per Prodi</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-vcenter" id="table_by_prodi">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:40px;">No</th>
                                <th>Program Studi</th>
                                <th class="text-center" style="width:70px;">Total</th>
                                <th class="text-center" style="width:70px;"><i class="fa fa-check text-success"></i> Sync</th>
                                <th class="text-center" style="width:80px;"><i class="fa fa-times text-danger"></i> Belum</th>
                                <th class="text-center" style="width:100px;">Progress</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_prodi">
                            <tr>
                                <td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat data...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Breakdown Per Prodi -->

        <!-- Breakdown Per Angkatan -->
        <div class="col-md-6">
            <div class="block full">
                <div class="block-title">
                    <h2><strong>Statistik</strong> Per Angkatan</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-vcenter" id="table_by_angkatan">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:40px;">No</th>
                                <th>Angkatan</th>
                                <th class="text-center" style="width:70px;">Total</th>
                                <th class="text-center" style="width:70px;"><i class="fa fa-check text-success"></i> Sync</th>
                                <th class="text-center" style="width:80px;"><i class="fa fa-times text-danger"></i> Belum</th>
                                <th class="text-center" style="width:100px;">Progress</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_angkatan">
                            <tr>
                                <td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat data...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Breakdown Per Angkatan -->
    </div>
    <!-- END Breakdown Tables -->

</div>
<!-- END Page Content -->

<script>
$(document).ready(function () {

    // Load Prodi dropdown
    $.ajax({
        url: '<?= base_url() ?>import/prodi/get_data',
        type: 'GET',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (response) {
            let html = '<option value="">-- Semua Prodi --</option>';
            $.each(response.data, function (i, item) {
                html += '<option value="' + item.id_prodi + '">' + item.nama_program_studi + ' (' + item.nama_jenjang_pendidikan + ')</option>';
            });
            $('#dash_filter_prodi').html(html);
        }
    });

    // Load Angkatan dropdown
    $.ajax({
        url: '<?= base_url() ?>masterdata/tahun_ajaran/get_data_tahun',
        type: 'GET',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (response) {
            let html = '<option value="0">-- Semua Angkatan --</option>';
            $.each(response.angkatan, function (i, value) {
                if (value.id != 0) {
                    html += '<option value="' + value.id + '">' + value.tahun + '</option>';
                }
            });
            $('#dash_filter_angkatan').html(html);
        }
    });

    // Apply filter button
    $('#btn_apply_filter').on('click', function () {
        loadStats();
    });

    // Also allow filter on change directly
    $('#dash_filter_prodi, #dash_filter_angkatan').on('change', function () {
        loadStats();
    });

    function loadStats() {
        let prodi = $('#dash_filter_prodi').val();
        let angkatan = $('#dash_filter_angkatan').val();

        // Show loading state
        $('#card_total, #card_synced, #card_unsynced').html('<i class="fa fa-spinner fa-spin"></i>');
        $('#tbody_prodi, #tbody_angkatan').html('<tr><td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat data...</td></tr>');

        $.ajax({
            url: '<?= base_url() ?>user/dashboard/get_stats',
            type: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            data: {
                prodi: prodi,
                angkatan: angkatan
            },
            dataType: 'json',
            success: function (res) {
                if (!res.status) return;

                // Update summary cards
                let total = parseInt(res.totals.total) || 0;
                let synced = parseInt(res.totals.synced) || 0;
                let unsynced = parseInt(res.totals.unsynced) || 0;

                $('#card_total').text(total.toLocaleString('id-ID'));
                $('#card_synced').text(synced.toLocaleString('id-ID'));
                $('#card_unsynced').text(unsynced.toLocaleString('id-ID'));

                // Update progress bar
                let pctSynced = total > 0 ? ((synced / total) * 100).toFixed(1) : 0;
                let pctUnsynced = total > 0 ? ((unsynced / total) * 100).toFixed(1) : 0;

                $('#progress_synced').css('width', pctSynced + '%').text(pctSynced + '%');
                $('#progress_unsynced').css('width', pctUnsynced + '%').text(pctUnsynced + '%');

                // Populate Prodi table
                let htmlProdi = '';
                if (res.by_prodi.length === 0) {
                    htmlProdi = '<tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>';
                } else {
                    $.each(res.by_prodi, function (i, row) {
                        let rowTotal = parseInt(row.total) || 0;
                        let rowSynced = parseInt(row.synced) || 0;
                        let rowUnsynced = parseInt(row.unsynced) || 0;
                        let rowPct = rowTotal > 0 ? ((rowSynced / rowTotal) * 100).toFixed(1) : 0;

                        let barClass = 'progress-bar-danger';
                        if (rowPct >= 75) barClass = 'progress-bar-success';
                        else if (rowPct >= 40) barClass = 'progress-bar-warning';

                        htmlProdi += '<tr>';
                        htmlProdi += '<td class="text-center">' + (i + 1) + '</td>';
                        htmlProdi += '<td>' + row.nama_prodi + '</td>';
                        htmlProdi += '<td class="text-center"><strong>' + rowTotal + '</strong></td>';
                        htmlProdi += '<td class="text-center text-success"><strong>' + rowSynced + '</strong></td>';
                        htmlProdi += '<td class="text-center text-danger"><strong>' + rowUnsynced + '</strong></td>';
                        htmlProdi += '<td>';
                        htmlProdi += '  <div class="progress progress-mini" style="margin-bottom:0;">';
                        htmlProdi += '    <div class="progress-bar ' + barClass + '" style="width:' + rowPct + '%"></div>';
                        htmlProdi += '  </div>';
                        htmlProdi += '  <small class="text-muted">' + rowPct + '%</small>';
                        htmlProdi += '</td>';
                        htmlProdi += '</tr>';
                    });
                }
                $('#tbody_prodi').html(htmlProdi);

                // Populate Angkatan table
                let htmlAngkatan = '';
                if (res.by_angkatan.length === 0) {
                    htmlAngkatan = '<tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>';
                } else {
                    $.each(res.by_angkatan, function (i, row) {
                        let rowTotal = parseInt(row.total) || 0;
                        let rowSynced = parseInt(row.synced) || 0;
                        let rowUnsynced = parseInt(row.unsynced) || 0;
                        let rowPct = rowTotal > 0 ? ((rowSynced / rowTotal) * 100).toFixed(1) : 0;

                        let barClass = 'progress-bar-danger';
                        if (rowPct >= 75) barClass = 'progress-bar-success';
                        else if (rowPct >= 40) barClass = 'progress-bar-warning';

                        htmlAngkatan += '<tr>';
                        htmlAngkatan += '<td class="text-center">' + (i + 1) + '</td>';
                        htmlAngkatan += '<td><strong>Angkatan ' + row.angkatan + '</strong></td>';
                        htmlAngkatan += '<td class="text-center"><strong>' + rowTotal + '</strong></td>';
                        htmlAngkatan += '<td class="text-center text-success"><strong>' + rowSynced + '</strong></td>';
                        htmlAngkatan += '<td class="text-center text-danger"><strong>' + rowUnsynced + '</strong></td>';
                        htmlAngkatan += '<td>';
                        htmlAngkatan += '  <div class="progress progress-mini" style="margin-bottom:0;">';
                        htmlAngkatan += '    <div class="progress-bar ' + barClass + '" style="width:' + rowPct + '%"></div>';
                        htmlAngkatan += '  </div>';
                        htmlAngkatan += '  <small class="text-muted">' + rowPct + '%</small>';
                        htmlAngkatan += '</td>';
                        htmlAngkatan += '</tr>';
                    });
                }
                $('#tbody_angkatan').html(htmlAngkatan);
            },
            error: function () {
                $('#card_total').text('Error');
                $('#card_synced').text('Error');
                $('#card_unsynced').text('Error');
            }
        });
    }

    // Auto-load stats on page load
    loadStats();
});
</script>