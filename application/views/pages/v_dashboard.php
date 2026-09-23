<!-- Page content -->
<div id="page-content">

    <style>
        /* Dashboard Custom Styles */
        .dash-filter-section {
            background: #fff;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }

        .dash-filter-section label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            margin-bottom: 6px;
            display: block;
        }

        .dash-filter-section .form-control {
            height: 38px;
        }

        .dash-filter-section .btn {
            height: 38px;
        }

        /* Summary Cards */
        .stat-card {
            background: #fff;
            border-radius: 6px;
            padding: 24px 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
            position: relative;
            overflow: hidden;
            min-height: 120px;
        }

        .stat-card .stat-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            opacity: 0.15;
        }

        .stat-card .stat-value {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .stat-card .stat-label {
            font-size: 13px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card.card-total .stat-value {
            color: #3498db;
        }

        .stat-card.card-total .stat-icon {
            background: #3498db;
            color: #fff;
        }

        .stat-card.card-synced .stat-value {
            color: #27ae60;
        }

        .stat-card.card-synced .stat-icon {
            background: #27ae60;
            color: #fff;
        }

        .stat-card.card-unsynced .stat-value {
            color: #e74c3c;
        }

        .stat-card.card-unsynced .stat-icon {
            background: #e74c3c;
            color: #fff;
        }

        /* Progress Section */
        .progress-section {
            background: #fff;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
        }

        .progress-section .progress-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
        }

        .progress-section .progress {
            height: 24px;
            border-radius: 12px;
            margin-bottom: 10px;
            background: #ecf0f1;
        }

        .progress-section .progress-bar {
            line-height: 24px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 12px;
        }

        .progress-section .progress-legend {
            text-align: center;
            font-size: 12px;
        }

        /* Breakdown Tables */
        .breakdown-block {
            background: #fff;
            border-radius: 6px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
            overflow: hidden;
        }

        .breakdown-block .breakdown-header {
            padding: 14px 20px;
            border-bottom: 2px solid #3498db;
            background: #f8f9fa;
        }

        .breakdown-block .breakdown-header h4 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        .breakdown-block .breakdown-header h4 i {
            margin-right: 8px;
            color: #3498db;
        }

        .breakdown-block .table {
            margin-bottom: 0;
        }

        .breakdown-block .table thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #6c757d;
            padding: 10px 12px;
            white-space: nowrap;
        }

        .breakdown-block .table tbody td {
            padding: 10px 12px;
            vertical-align: middle;
            font-size: 13px;
        }

        .breakdown-block .progress-mini {
            height: 8px;
            border-radius: 4px;
            margin-bottom: 2px;
            background: #ecf0f1;
        }

        .breakdown-block .progress-mini .progress-bar {
            border-radius: 4px;
        }

        .breakdown-block .pct-text {
            font-size: 11px;
            color: #999;
        }
    </style>

    <!-- Dashboard Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Dashboard Sinkronisasi Mahasiswa</a>
            </li>
        </ul>
    </div>
    <!-- END Dashboard Header -->

    <!-- Filter Section -->
    <div class="dash-filter-section">
        <div class="row">
            <div class="col-md-5">
                <label for="dash_filter_prodi">Program Studi</label>
                <select class="form-control" id="dash_filter_prodi">
                    <option value="">-- Semua Prodi --</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="dash_filter_angkatan">Tahun Angkatan</label>
                <select class="form-control" id="dash_filter_angkatan">
                    <option value="0">-- Semua Angkatan --</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-block" id="btn_apply_filter">
                    <i class="fa fa-refresh"></i> Muat Ulang Data
                </button>
            </div>
        </div>
    </div>
    <!-- END Filter Section -->

    <!-- Summary Cards -->
    <div class="row" id="summary-cards">
        <div class="col-md-4">
            <div class="stat-card card-total">
                <div class="stat-icon"><i class="fa fa-users"></i></div>
                <div class="stat-value" id="card_total"><i class="fa fa-spinner fa-spin" style="font-size:24px;"></i>
                </div>
                <div class="stat-label">Total Mahasiswa</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card card-synced">
                <div class="stat-icon"><i class="fa fa-check-circle"></i></div>
                <div class="stat-value" id="card_synced"><i class="fa fa-spinner fa-spin" style="font-size:24px;"></i>
                </div>
                <div class="stat-label">Tersinkronisasi</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card card-unsynced">
                <div class="stat-icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="stat-value" id="card_unsynced"><i class="fa fa-spinner fa-spin" style="font-size:24px;"></i>
                </div>
                <div class="stat-label">Belum Sinkron</div>
            </div>
        </div>
    </div>
    <!-- END Summary Cards -->

    <!-- Progress Bar -->
    <div class="progress-section">
        <div class="progress-title"><i class="fa fa-bar-chart"></i> Progress Keseluruhan</div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" id="progress_synced" role="progressbar" style="width: 0%;">0%
            </div>
            <div class="progress-bar progress-bar-danger" id="progress_unsynced" role="progressbar" style="width: 0%;">
                0%</div>
        </div>
        <div class="progress-legend">
            <span class="label label-success"><i class="fa fa-check"></i> Tersinkronisasi</span>
            &nbsp;&nbsp;
            <span class="label label-danger"><i class="fa fa-times"></i> Belum Sinkron</span>
        </div>
    </div>
    <!-- END Progress Bar -->

    <!-- Breakdown Tables -->
    <div class="row">
        <!-- Breakdown Per Prodi -->
        <div class="col-md-6">
            <div class="breakdown-block">
                <div class="breakdown-header">
                    <h4><i class="fa fa-graduation-cap"></i> Statistik Per Program Studi</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table_by_prodi">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:35px;">No</th>
                                <th>Program Studi</th>
                                <th class="text-center" style="width:60px;">Total</th>
                                <th class="text-center" style="width:55px;">Sync</th>
                                <th class="text-center" style="width:60px;">Belum</th>
                                <th class="text-center" style="width:90px;">Progress</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_prodi">
                            <tr>
                                <td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Breakdown Per Angkatan -->
        <div class="col-md-6">
            <div class="breakdown-block">
                <div class="breakdown-header">
                    <h4><i class="fa fa-calendar"></i> Statistik Per Angkatan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table_by_angkatan">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:35px;">No</th>
                                <th>Angkatan</th>
                                <th class="text-center" style="width:60px;">Total</th>
                                <th class="text-center" style="width:55px;">Sync</th>
                                <th class="text-center" style="width:60px;">Belum</th>
                                <th class="text-center" style="width:90px;">Progress</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_angkatan">
                            <tr>
                                <td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breakdown Tables -->

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
                        html += '<option value="' + item.id + '">' + item.nama_program_studi + ' (' + item.nama_jenjang_pendidikan + ')</option>';
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

            // Also filter on change
            $('#dash_filter_prodi, #dash_filter_angkatan').on('change', function () {
                loadStats();
            });

            function numberFormat(num) {
                return parseInt(num).toLocaleString('id-ID');
            }

            function loadStats() {
                let prodi = $('#dash_filter_prodi').val();
                let angkatan = $('#dash_filter_angkatan').val();

                // Loading state
                let spinner = '<i class="fa fa-spinner fa-spin" style="font-size:24px;"></i>';
                $('#card_total, #card_synced, #card_unsynced').html(spinner);
                let rowLoading = '<tr><td colspan="6" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat...</td></tr>';
                $('#tbody_prodi, #tbody_angkatan').html(rowLoading);

                $.ajax({
                    url: '<?= base_url() ?>user/dashboard/get_stats',
                    type: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    data: { prodi: prodi, angkatan: angkatan },
                    dataType: 'json',
                    success: function (res) {
                        if (!res.status) return;

                        let total = parseInt(res.totals.total) || 0;
                        let synced = parseInt(res.totals.synced) || 0;
                        let unsynced = parseInt(res.totals.unsynced) || 0;

                        // Cards
                        $('#card_total').text(numberFormat(total));
                        $('#card_synced').text(numberFormat(synced));
                        $('#card_unsynced').text(numberFormat(unsynced));

                        // Progress
                        let pctSynced = total > 0 ? ((synced / total) * 100).toFixed(1) : 0;
                        let pctUnsynced = total > 0 ? ((unsynced / total) * 100).toFixed(1) : 0;
                        $('#progress_synced').css('width', pctSynced + '%').text(pctSynced + '%');
                        $('#progress_unsynced').css('width', pctUnsynced + '%').text(pctUnsynced + '%');

                        // Prodi table
                        renderBreakdownTable('#tbody_prodi', res.by_prodi, 'nama_prodi');

                        // Angkatan table
                        let angkatanData = res.by_angkatan.map(function (row) {
                            row.display_name = 'Angkatan ' + row.angkatan;
                            return row;
                        });
                        renderBreakdownTable('#tbody_angkatan', angkatanData, 'display_name');
                    },
                    error: function () {
                        let errText = '<span class="text-danger" style="font-size:16px;">Error</span>';
                        $('#card_total, #card_synced, #card_unsynced').html(errText);
                    }
                });
            }

            function renderBreakdownTable(tbodySelector, data, nameField) {
                let html = '';
                if (!data || data.length === 0) {
                    html = '<tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>';
                } else {
                    $.each(data, function (i, row) {
                        let t = parseInt(row.total) || 0;
                        let s = parseInt(row.synced) || 0;
                        let u = parseInt(row.unsynced) || 0;
                        let pct = t > 0 ? ((s / t) * 100).toFixed(1) : 0;

                        let barClass = 'progress-bar-danger';
                        if (pct >= 75) barClass = 'progress-bar-success';
                        else if (pct >= 40) barClass = 'progress-bar-warning';

                        html += '<tr>';
                        html += '<td class="text-center">' + (i + 1) + '</td>';
                        html += '<td>' + row[nameField] + '</td>';
                        html += '<td class="text-center"><strong>' + numberFormat(t) + '</strong></td>';
                        html += '<td class="text-center"><span style="color:#27ae60;font-weight:600;">' + numberFormat(s) + '</span></td>';
                        html += '<td class="text-center"><span style="color:#e74c3c;font-weight:600;">' + numberFormat(u) + '</span></td>';
                        html += '<td class="text-center">';
                        html += '  <div class="progress progress-mini" style="margin-bottom:2px;">';
                        html += '    <div class="progress-bar ' + barClass + '" style="width:' + pct + '%"></div>';
                        html += '  </div>';
                        html += '  <span class="pct-text">' + pct + '%</span>';
                        html += '</td>';
                        html += '</tr>';
                    });
                }
                $(tbodySelector).html(html);
            }

            // Auto-load on page load
            loadStats();
        });
    </script>
</div>
<!-- END Page Content -->