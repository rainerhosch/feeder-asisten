<style>
    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius)
    }

    .card>hr {
        margin-right: 0;
        margin-left: 0
    }

    .card>.list-group {
        border-top: inherit;
        border-bottom: inherit
    }

    .card>.list-group:first-child {
        border-top-width: 0;
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius)
    }

    .card>.list-group:last-child {
        border-bottom-width: 0;
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        border-bottom-left-radius: var(--bs-card-inner-border-radius)
    }

    .card>.card-header+.list-group,
    .card>.list-group+.card-footer {
        border-top: 0
    }

    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color)
    }

    .card-title {
        margin-bottom: var(--bs-card-title-spacer-y)
    }

    .card-subtitle {
        margin-top: calc(-.5 * var(--bs-card-title-spacer-y));
        margin-bottom: 0
    }

    .card-text:last-child {
        margin-bottom: 0
    }

    .card-link+.card-link {
        margin-left: var(--bs-card-spacer-x)
    }

    .card-header {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        margin-bottom: 0;
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color)
    }

    .card-header:first-child {
        border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0
    }

    .card-footer {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-top: var(--bs-card-border-width) solid var(--bs-card-border-color)
    }

    .card-footer:last-child {
        border-radius: 0 0 var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius)
    }

    .card-header-tabs {
        margin-right: calc(-.5 * var(--bs-card-cap-padding-x));
        margin-bottom: calc(-1 * var(--bs-card-cap-padding-y));
        margin-left: calc(-.5 * var(--bs-card-cap-padding-x));
        border-bottom: 0
    }

    .card-header-tabs .nav-link.active {
        background-color: var(--bs-card-bg);
        border-bottom-color: var(--bs-card-bg)
    }

    .card-header-pills {
        margin-right: calc(-.5 * var(--bs-card-cap-padding-x));
        margin-left: calc(-.5 * var(--bs-card-cap-padding-x))
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: var(--bs-card-img-overlay-padding);
        border-radius: var(--bs-card-inner-border-radius)
    }

    .card-img,
    .card-img-bottom,
    .card-img-top {
        width: 100%
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius)
    }

    .card-img,
    .card-img-bottom {
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        border-bottom-left-radius: var(--bs-card-inner-border-radius)
    }

    .card-group>.card {
        margin-bottom: var(--bs-card-group-margin)
    }

    @media (min-width:576px) {
        .card-group {
            display: flex;
            flex-flow: row wrap
        }

        .card-group>.card {
            flex: 1 0 0%;
            margin-bottom: 0
        }

        .card-group>.card+.card {
            margin-left: 0;
            border-left: 0
        }

        .card-group>.card:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .card-group>.card:not(:last-child) .card-header,
        .card-group>.card:not(:last-child) .card-img-top {
            border-top-right-radius: 0
        }

        .card-group>.card:not(:last-child) .card-footer,
        .card-group>.card:not(:last-child) .card-img-bottom {
            border-bottom-right-radius: 0
        }

        .card-group>.card:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .card-group>.card:not(:first-child) .card-header,
        .card-group>.card:not(:first-child) .card-img-top {
            border-top-left-radius: 0
        }

        .card-group>.card:not(:first-child) .card-footer,
        .card-group>.card:not(:first-child) .card-img-bottom {
            border-bottom-left-radius: 0
        }
    }

    .header-section {
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
    }

    .header-section h1 i {
        font-size: 40px;
        float: right;
        margin: 2px 0 0 10px;
        color: #eaedf1;
        margin: 0 0 0 10px;
        line-height: 64px;
    }

    .form-control#thn_angkatan,
    #filter_angkatan,
    #filter_prodi {
        font-size: 11px;
        padding: 6px 8px;
        max-width: 100%;
        margin: 1px 0;
        color: #394263;
        border-color: #dbe1e8;
    }

    /* .form-control#thn_angkatan {
        text-align: left;
        font-weight: 600;
        display: block;
        white-space: nowrap;
        min-height: 1.2em;
        padding: 0px 2px 1px;
    } */

    #exTab3 .nav-pills {
        margin-left: 30%;
        margin-bottom: 10px;
    }

    #exTab3 .nav-pills>li>a {
        border-radius: 5px 0 5px 0;
    }

    #exTab3 .nav-pills>li.active>a,
    .nav-pills>li.active>a:hover,
    .nav-pills>li.active>a:focus,
    .dropdown-menu>li>a:hover,
    .dropdown-menu>li>a:focus,
    .dropdown-menu>.active>a,
    .dropdown-menu>.active>a:hover,
    .dropdown-menu>.active>a:focus,
    .nav .open>a,
    .nav .open>a:hover,
    .nav .open>a:focus {
        color: #fff;
        background-color: #045976;
    }

    #exTab3 .tab-content {
        margin-bottom: 10px;
        background-color: #fcfcfc78;
        padding: 5px 15px;
    }

    .col-btn {
        margin-bottom: 20px;
    }
</style>
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <?php if (isset($subpage)): ?>
            <li><?= $page ?></li>
            <li><a href=""><?= $subpage ?></a></li>
        <?php else: ?>
            <li><a href=""><?= $page ?></a></li>
        <?php endif; ?>
    </ul>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <!-- <?= $this->session->flashdata('icon'); ?>Status koneksi:<br><small><?= $this->session->flashdata('message'); ?></small> -->
                <p><small>Token Connection Time :</small> <i id="time_token"></i></p>
            </h1>
        </div>
    </div>
    <div class="block">
        <div class="row">
            <div class="col-md-12 text-center col-btn">
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;"
                    id="detail">DETAIL MAHASISWA</button>
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;"
                    id="histori_pendidikan">HISTORI PENDIDIKAN & AKTIVITAS</button>
                <!-- <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="aktifitas_perkuliahan">AKTIVITAS PERKULIAHAN</button> -->
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;"
                    id="prestasi">PRESTASI</button>
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;"
                    id="transkrip">TRANSKRIP</button>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6 text-left">
                <button class="btn btn-xs btn-success" style="border-radius: 15px;" id="btnBackToList"
                    data-url="<?= base_url() . $dir . '/' . $page; ?>"><i class="fa fa-reply"></i></button>
            </div>
        </div>

        <form action="#" method="post" id="form_update_biodata">
            <div class="row" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h4>Data <?= $page ?></h4>
                    </div>
                    <div class="card-body">
                        <!-- END Step Info -->
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nama">Nama <span
                                    style="color: red;">*</span></label>
                            <!-- <input type="hidden" id="data_mhs_id_feeder" name="data_mhs_id_feeder" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['id_feeder']; ?>" readonly> -->
                            <input type="hidden" id="data_mhs_id" name="data_mhs_id"
                                class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['id_pd']; ?>"
                                readonly>
                            <input type="text" id="data_mhs_nama" name="data_mhs_nama"
                                class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['nama']; ?>"
                                readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tempat_lahir">Tempat Lahir <span
                                    style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tempat_lahir" name="data_mhs_tempat_lahir"
                                class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['tmpt_lahir']; ?>"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_jk">Jenis Kelamin <span
                                    style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_jk" name="data_mhs_jk" disabled>
                            </select>
                            <!-- <input type="text" id="data_mhs_jk" name="data_mhs_jk" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['jk']; ?>" readonly> -->
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tgl_lahir">Tanggal Lahir <span
                                    style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tgl_lahir" name="data_mhs_tgl_lahir"
                                class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['tgl_lahir']; ?>"
                                readonly>
                        </div>
                        <!-- END First Step -->
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- History  -->
    <div class="block">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6 text-left">
                <h4>History dan Restore Pendidikan Mahasiswa</h4>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <table class="table table-bordered dataTable" id="table_histori_pendidikan">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Jenis Pendaftaran</th>
                        <th>Jalur Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>Program Studi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $detail_mhs['histori_pendidikan']['nim'] ?></td>
                        <td><?= $detail_mhs['histori_pendidikan']['jenis_daftar'] ?></td>
                        <td><?= $detail_mhs['histori_pendidikan']['jalur_masuk'] ?></td>
                        <td><?= $detail_mhs['histori_pendidikan']['tanggal_daftar'] ?></td>
                        <td><?= $detail_mhs['histori_pendidikan']['nama_program_studi'] ?></td>
                        <?php if ($detail_mhs['histori_pendidikan']['sync_status'] == 1): ?>
                            <td class="text-center"><i class="fas fa-check"> Telah tersinkron</i> </td>
                        <?php elseif ($detail_mhs['histori_pendidikan']['sync_status'] == 0): ?>
                            <td class="text-center"><a class="btn btn-xs btn-primary" id="btnSyncHistori">Sync</a></td>
                        <?php else: ?>
                            <td class="text-center"><i class="fa fa-link"></i>
                                <?= $detail_mhs['histori_pendidikan']['msg_sync'] ?> </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Aktivitas -->
    <!-- <div class="block">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6 text-left">
                <h4>Aktivitas Perkuliahan Mahasiswa</h4>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <table class="table table-bordered dataTable" id="table_histori_pendidikan">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Semester <span style="color: red;">*</span></th>
                        <th>Status</th>
                        <th>IPS</th>
                        <th>IPK</th>
                        <th>JLM SKS Semester</th>
                        <th>JLM SKS Dikontrak</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $detail_mhs['histori_pendidikan']['nim'] ?> - <?= $detail_mhs['data']['nama']; ?></td>
                        <td><?= $detail_mhs['histori_pendidikan']['jenis_daftar'] ?></td>
                        <td>AKTIF</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <?php if ($detail_mhs['aktivitas_perkuliahan']['sync_status'] == 1): ?>
                            <td class="text-center"><i class="fas fa-check"> Telah tersinkron</i> </td>
                        <?php elseif ($detail_mhs['aktivitas_perkuliahan']['sync_status'] == 0): ?>
                            <td class="text-center"><a class="btn btn-xs btn-primary" id="btnSyncAktivitas">Sync</a></td>
                        <?php else: ?>
                            <td class="text-center"><i class="fa fa-link"></i>
                                <?= $detail_mhs['aktivitas_perkuliahan']['msg_sync'] ?> </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->

    <script src="<?= base_url(); ?>assets/templates/proui/js/tokenChecker.js"></script>
    <script>
        $(document).ready(function () {

            var url = window.location.href;
            var segments = url.split('/');
            var host = segments[2];
            var app = segments[3];
            var dir = segments[4];
            var crtl = segments[5];

            if (segments[6] != undefined) {
                var funct = segments[6].split('?')[0];
                var query = segments[6].split('?')[1]
                // console.log(query)
            }
            $(`button#${funct}`).addClass('btn-primary');

            $('.btn_nav').each(function (i, btn) {
                $(`button#${btn.id}`).on('click', function () {
                    window.location.href = `${location.origin}/${app}/${dir}/${crtl}/${btn.id}?${query}`;
                });
            });

            var id_jk = "<?= $detail_mhs['data']['jk']; ?>";
            var id_agama = <?= $detail_mhs['data']['agama']; ?>;
            var id_pd = "<?= $detail_mhs['data']['id_pd'] ?>";

            // jk
            html_jk = ``;
            if (id_jk === 'L') {
                html_jk += `<option value="L" selected>Laki-laki</option>`;
                html_jk += `<option value="P">Perempuan</option>`;
            } else {
                html_jk += `<option value="L">Laki-laki</option>`;
                html_jk += `<option value="P" selected>Perempuan</option>`;
            }
            $("#data_mhs_jk").append(html_jk);
            $('#btnBackToList').on('click', function () {
                let url = $(this).data('url')
                window.location.href = url;
            });



            // $('#btnSyncAktivitas').on('click', function () {
            //     console.log(123)
            //     // sync_aktivitas_mahasiswa
            //     $.ajax({
            //         type: "POST",
            //         url: `<?= base_url() . $dir . '/' . $page ?>/sync_aktivitas_mahasiswa`,
            //         data: {
            //             id_pd: id_pd,
            //         },
            //         dataType: "json",
            //         beforeSend: function () {
            //             Swal.fire({
            //                 // title: 'Uploading...',
            //                 html: 'Please wait...',
            //                 allowEscapeKey: false,
            //                 allowOutsideClick: false,
            //                 didOpen: () => {
            //                     Swal.showLoading()
            //                 }
            //             });
            //         },
            //         success: function (response) {
            //             console.log(response)
            //         }

            //     })
            // })


            $('#btnSyncHistori').on('click', function () {
                // console.log(id_pd)
                $.ajax({
                    type: "POST",
                    url: `<?= base_url() . $dir . '/' . $page ?>/sync_${funct}`,
                    data: {
                        id_pd: id_pd,
                    },
                    dataType: "json",
                    beforeSend: function () {
                        Swal.fire({
                            // title: 'Uploading...',
                            html: 'Please wait...',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function (response) {
                        console.log(response)
                        if (response.status === true) {
                            title = `Success`;
                            icon = `success`;
                        } else {
                            title = `Error!`;
                            icon = `error`;
                        }
                        Swal.fire({
                            html: response.msg,
                            icon: icon,
                            showConfirmButton: true,
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        swal.fire({
                            icon: 'error',
                            html: '<h5>Koneksi Server Terputus! Seperti aku dengan dia.</h5>'
                        }).then(() => {
                            location.reload();
                        });
                    }
                });

            });

        });
    </script>
</div>