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
        <?php if (isset($subpage)) : ?>
            <li><?= $page ?></li>
            <li><a href=""><?= $subpage ?></a></li>
        <?php else : ?>
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
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="detail">DETAIL MAHASISWA</button>
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="histori_pendidikan">HISTORI PENDIDIKAN & AKTIVITAS</button>
                <!-- <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="aktifitas_perkuliahan">AKTIVITAS PERKULIAHAN</button> -->
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="prestasi">PRESTASI</button>
                <button href="javascript:void(0)" class="btn btn-md btn-default btn_nav" style="border-radius: 15px;" id="transkrip">TRANSKRIP</button>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6 text-left">
                <button class="btn btn-xs btn-success" style="border-radius: 15px;" id="btnBackToList" data-url="<?= base_url() . $dir . '/' . $page; ?>"><i class="fa fa-reply"></i></button>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-xs btn-warning" style="border-radius: 15px;" id="btnEdit">Edit | <i class="fa fa-pencil"></i></button>
                <button class="btn btn-xs btn-success hidden" style="border-radius: 15px;" id="btnSave">Simpan | <i class="fa fa-clipboard"></i></button>
                <button class="btn btn-xs btn-default hidden" style="border-radius: 15px;" id="btnBatalEdit">Batal <i class="hi hi-remove"></i></button>
                <button class="btn btn-xs btn-danger" style="border-radius: 15px;" id="btnDelete">Delete <i class="fa fa-trash"></i></button>
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
                            <label class="control-label" for="data_mhs_nama">Nama <span style="color: red;">*</span></label>
                            <!-- <input type="hidden" id="data_mhs_id_feeder" name="data_mhs_id_feeder" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['id_feeder']; ?>" readonly> -->
                            <input type="hidden" id="data_mhs_id" name="data_mhs_id" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['id_pd']; ?>" readonly>
                            <input type="text" id="data_mhs_nama" name="data_mhs_nama" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['nama']; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tempat_lahir">Tempat Lahir <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tempat_lahir" name="data_mhs_tempat_lahir" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['tmpt_lahir']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_jk">Jenis Kelamin <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_jk" name="data_mhs_jk" disabled>
                            </select>
                            <!-- <input type="text" id="data_mhs_jk" name="data_mhs_jk" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['jk']; ?>" readonly> -->
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nama_ibu">Nama Ibu <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nama_ibu" name="data_mhs_nama_ibu" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['nama_ibu']; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tgl_lahir">Tanggal Lahir <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tgl_lahir" name="data_mhs_tgl_lahir" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['tgl_lahir']; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_agama">Agama <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_agama" name="data_mhs_agama" disabled>
                            </select>
                            <!-- <input type="text" id="data_mhs_agama" name="data_mhs_agama" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['agama']; ?>" readonly> -->
                        </div>
                        <!-- END First Step -->
                    </div>
                </div>
            </div>
            <hr>
            <div id="exTab3" class="card row" style="margin-bottom: 20px;">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#tab-mhs" data-toggle="tab">Alamat</a>
                        </li>
                        <li>
                            <a href="#tab-ortu" data-toggle="tab">Orang Tua</a>
                        </li>
                        <li>
                            <a href="#tab-wali" data-toggle="tab">Wali</a>
                        </li>
                        <li>
                            <a href="#tab-kebutuhankhusus" data-toggle="tab">Kebutuhan Khusus</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content clearfix card-body">
                    <div class="tab-pane active" id="tab-mhs">
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_negara">Kewarganegaraan <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_negara" name="data_mhs_negara" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nik">NIK <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nik" name="data_mhs_nik" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['nik']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nisn">NISN <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nisn" name="data_mhs_nisn" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['nisn']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_npwp">NPWP</label>
                            <input type="text" id="data_mhs_npwp" name="data_mhs_npwp" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['npwp']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_jln">Jalan</label>
                            <input type="text" id="data_mhs_jln" name="data_mhs_jln" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['jalan']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="data_mhs_dusun">Dusun</label>
                            <input type="text" id="data_mhs_dusun" name="data_mhs_dusun" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['dusun']; ?>" readonly>
                        </div>
                        <div class="col-md-1">
                            <label class="control-label" for="data_mhs_rt">RT</label>
                            <input type="text" id="data_mhs_rt" name="data_mhs_rt" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['rt']; ?>" readonly>
                        </div>
                        <div class="col-md-1">
                            <label class="control-label" for="data_mhs_rw">RW</label>
                            <input type="text" id="data_mhs_rw" name="data_mhs_rw" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['rw']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tlp">Telephone</label>
                            <input type="text" id="data_mhs_tlp" name="data_mhs_tlp" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['tlp']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_hp">Handphone</label>
                            <input type="text" id="data_mhs_hp" name="data_mhs_hp" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['no_hp']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="data_mhs_kelurahan">Kelurahan <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_kelurahan" name="data_mhs_kelurahan" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['kelurahan']; ?>" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" for="data_mhs_kode_pos">Kode Pos</label>
                            <input type="text" id="data_mhs_kode_pos" name="data_mhs_kode_pos" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['kode_pos']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_kecamatan">Kecamatan <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_kecamatan" name="data_mhs_kecamatan" disabled>
                            </select>
                            <!-- <input type="text" id="data_mhs_kecamatan" name="data_mhs_kecamatan" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['kecamatan']; ?>" readonly> -->
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_terima_kps">Penerima KPS <span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_terima_kps" name="data_mhs_terima_kps" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_email">Email</label>
                            <input type="text" id="data_mhs_email" name="data_mhs_email" class="form-control ui-wizard-content" value="<?= $detail_mhs['alamat']['email']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_jns_tinggal">Jenis Tinggal</label>
                            <select class="form-control form-control-sm" id="data_mhs_jns_tinggal" name="data_mhs_jns_tinggal" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_alat_transportasi">Alat Transportasi</label>
                            <select class="form-control form-control-sm" id="data_mhs_alat_transportasi" name="data_mhs_alat_transportasi" disabled>
                            </select>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-ortu">
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nik_ayah">NIK Ayah <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nik_ayah" name="data_mhs_nik_ayah" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['nik_ayah']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nik_ibu">NIK Ibu <span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nik_ibu" name="data_mhs_nik_ibu" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['nik_ibu']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nama_ayah">Nama Ayah<span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nama_ayah" name="data_mhs_nama_ayah" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['nama_ayah']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nama_ibu">Nama ibu<span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_nama_ibu" name="data_mhs_nama_ibu" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['nama_ibu']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tgl_lahir_ayah">Tanggal Lahir Ayah<span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tgl_lahir_ayah" name="data_mhs_tgl_lahir_ayah" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['tgl_lahir_ayah']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tgl_lahir_ibu">Tanggal Lahir ibu<span style="color: red;">*</span></label>
                            <input type="text" id="data_mhs_tgl_lahir_ibu" name="data_mhs_tgl_lahir_ibu" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_ortu']['tgl_lahir_ibu']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pendidikan_ayah">Pendidikan Ayah<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_pendidikan_ayah" name="data_mhs_pendidikan_ayah" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pendidikan_ibu">Pendidikan ibu<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_pendidikan_ibu" name="data_mhs_pendidikan_ibu" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pekerjaan_ayah">Pekerjaan Ayah<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_pekerjaan_ayah" name="data_mhs_pekerjaan_ayah" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pekerjaan_ibu">Pekerjaan ibu<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_pekerjaan_ibu" name="data_mhs_pekerjaan_ibu" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_penghasilan_ayah">Penghasilan Ayah<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_penghasilan_ayah" name="data_mhs_penghasilan_ayah" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_penghasilan_ibu">Penghasilan ibu<span style="color: red;">*</span></label>
                            <select class="form-control form-control-sm" id="data_mhs_penghasilan_ibu" name="data_mhs_penghasilan_ibu" disabled>
                            </select>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-wali">
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_nama_wali">Nama Wali </label>
                            <input type="text" id="data_mhs_nama_wali" name="data_mhs_nama_wali" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_wali']['nama_wali']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_tgl_lahir_wali">Tanggal Lahir Wali </label>
                            <input type="text" id="data_mhs_tgl_lahir_wali" name="data_mhs_tgl_lahir_wali" class="form-control ui-wizard-content" value="<?= $detail_mhs['data_wali']['tgl_lahir_wali']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pendidikan_wali">Pendidikan Wali </label>
                            <select class="form-control form-control-sm" id="data_mhs_pendidikan_wali" name="data_mhs_pendidikan_wali" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_pekerjaan_wali">Pekerjaan Wali </label>
                            <select class="form-control form-control-sm" id="data_mhs_pekerjaan_wali" name="data_mhs_pekerjaan_wali" disabled>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_penghasilan_wali">Penghasilan Wali </label>
                            <select class="form-control form-control-sm" id="data_mhs_penghasilan_wali" name="data_mhs_penghasilan_wali" disabled>
                            </select>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-kebutuhankhusus">
                        <div class="col-md-6">
                            <label class="control-label" for="data_mhs_kebutuhan_khusus">Kebutuhan Khusus Mahasiswa</label>
                            <select class="form-control form-control-sm" id="data_mhs_kebutuhan_khusus" name="data_mhs_kebutuhan_khusus" disabled>
                            </select>
                            <!-- <input type="text" id="data_mhs_kebutuhan_khusus" name="data_mhs_kebutuhan_khusus" class="form-control ui-wizard-content" value="<?= $detail_mhs['data']['kebutuhan_khusus']; ?>" readonly> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="row card">
            <div class="card-body" style="color: white; background-color: #272727; border-radius: 5px; margin-bottom:10px;">
                <h4>Keterangan :</h4>
                <p>
                    - Fitur ini di gunakan untuk menampilkan dan mengelola data mahasiswa , baik itu mahasiswa baru maupun perubahan data mahasiswa</br>
                    - Perubahan Nama Mahasiswa, Tanggal Lahir dan Nama Ibu Kandung hanya dapat di lakukan pada laman <a href="http://pddikti.kemdikbud.go.id">http://pddikti.kemdikbud.go.id</a></br>
                    - Pastikan semua kolom yang di inputkan sesuai dengan aturan yang berlaku</br>
                    - Setelah menambahkan mahasiswa baru, lakukan registrasi mahasiswa pada histori pendidikan</br>
                    - KPS = Kartu Perlindungan Sosial</br>
                    - Bila ingin menghapus data Mahasiswa, pastikan data lain sudah di hapus terlebih dahulu. Antara Lain :</p>
                <p>
                    1. Data KRS & Nilai Mahasiswa</br>
                    2. Data Aktivitas Perkuliahan Mahasiswa</br>
                    3. Data Kelulusan Mahasiswa</br>
                    4. Data Histori Pendidikan Mahasiswa
                </p>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/templates/proui/js/tokenChecker.js"></script>
    <script>
        $(document).ready(function() {

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

            $('.btn_nav').each(function(i, btn) {
                $(`button#${btn.id}`).on('click', function() {
                    window.location.href = `${location.origin}/${app}/${dir}/${crtl}/${btn.id}?${query}`;
                });
            })

            var id_jk = "<?= $detail_mhs['data']['jk']; ?>";
            var id_agama = <?= $detail_mhs['data']['agama']; ?>;
            var id_negara = "<?= $detail_mhs['alamat']['kewargnegaraan']; ?>";
            var id_terima_kps = "<?= $detail_mhs['alamat']['terima_kps']; ?>";
            var id_jns_tinggal = "<?= $detail_mhs['alamat']['jenis_tinggal']; ?>";
            var id_transportasi = "<?= $detail_mhs['alamat']['alat_transportasi']; ?>";
            var id_kebutuhan_khusus_mhs = "<?= $detail_mhs['data']['kebutuhan_khusus']; ?>";
            var id_will = "<?= $detail_mhs['alamat']['kecamatan']; ?>";

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

            html_keb_khusus = ``;
            if (id_kebutuhan_khusus_mhs === '1') {
                html_keb_khusus += `<option value="1" selected>Ya</option>`;
                html_keb_khusus += `<option value="0">Tidak</option>`;
            } else {
                html_keb_khusus += `<option value="1">Ya</option>`;
                html_keb_khusus += `<option value="0" selected>Tidak</option>`;
            }
            $("#data_mhs_kebutuhan_khusus").append(html_keb_khusus);
            $("#data_mhs_kebutuhan_khusus").on('change', function() {
                let data = $(this).val();
                if (data === '1') {
                    console.log('Show option kebutuhan khusus');

                    // $.ajax({
                    //     url: '<?= base_url() ?>masterdata/kebutuhan_khusus/get_data',
                    //     type: 'POST',
                    //     dataType: 'json',
                    //     success: function(response) {
                    //         console.log(response);
                    //         $("#data_mhs_kebutuhan_khusus").empty();
                    //         html = ``;
                    //         $.each(response.data, function(i, item) {
                    //             if (item.id_kebutuhan_khusus === id_kebutuhan_khusus_mhs) {
                    //                 html += `<option value="${item.id_kebutuhan_khusus}" selected>${item.nama_kebutuhan_khusus}</option>`;
                    //             } else {
                    //                 html += `<option value="${item.id_kebutuhan_khusus}">${item.nama_kebutuhan_khusus}</option>`;
                    //             }
                    //         });
                    //         $("#data_mhs_kebutuhan_khusus").append(html);
                    //     }
                    // });
                } else {
                    console.log('Not Show')
                }

            });

            // kps
            html_kps = ``;
            if (id_terima_kps === '1') {
                html_kps += `<option value="1" selected>Ya</option>`;
                html_kps += `<option value="0">Tidak</option>`;
            } else {
                html_kps += `<option value="1">Ya</option>`;
                html_kps += `<option value="0" selected>Tidak</option>`;
            }
            $("#data_mhs_terima_kps").append(html_kps);
            $.ajax({
                url: '<?= base_url() ?>masterdata/agama/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#data_mhs_agama").empty();
                    html = ``;
                    $.each(response.data, function(i, item) {
                        if (parseInt(item.id_agama) === parseInt(id_agama)) {
                            html += `<option value="${item.id_agama}" selected>${item.nama_agama}</option>`;
                        } else {
                            html += `<option value="${item.id_agama}">${item.nama_agama}</option>`;
                        }
                    });
                    $("#data_mhs_agama").append(html);
                }
            });
            $.ajax({
                url: '<?= base_url() ?>masterdata/negara/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#data_mhs_negara").empty();
                    html = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_negara === id_negara) {
                            html += `<option value="${item.id_negara}" selected>${item.nama_negara}</option>`;
                        } else {
                            html += `<option value="${item.id_negara}">${item.nama_negara}</option>`;
                        }
                    });
                    $("#data_mhs_negara").append(html);
                }
            });
            $.ajax({
                url: '<?= base_url() ?>masterdata/wilayah/get_data',
                type: 'POST',
                data: {
                    id_negara: id_negara
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response.data);
                    $("#data_mhs_kecamatan").empty();
                    html = ``;
                    let kab = ``;
                    let prov = ``;
                    $.each(response.data, function(i, item) {
                        let id_kab = item.id_wilayah.substring(0, 4);
                        let id_prov = item.id_wilayah.substring(0, 2);
                        if (id_kab === item.id_wilayah.substring(0, 4) && item.nama_wilayah.substring(0, 3) === 'Kab') {
                            kab = item.nama_wilayah;
                        }
                        if (id_prov === item.id_wilayah.substring(0, 2) && item.nama_wilayah.substring(0, 4) === 'Prov') {
                            prov = item.nama_wilayah;
                        }
                        if (item.id_wilayah === id_will) {
                            html += `<option value="${item.id_wilayah}" selected>${item.nama_wilayah} - ${kab} - ${prov}</option>`;
                        } else {
                            html += `<option value="${item.id_wilayah}">${item.nama_wilayah} - ${kab} - ${prov}</option>`;
                        }
                    });
                    $("#data_mhs_kecamatan").append(html);
                }
            });
            $.ajax({
                url: '<?= base_url() ?>masterdata/jenis_tinggal/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#data_mhs_jns_tinggal").empty();
                    html = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_jenis_tinggal === id_jns_tinggal) {
                            html += `<option value="${item.id_jenis_tinggal}" selected>${item.nama_jenis_tinggal}</option>`;
                        } else {
                            html += `<option value="${item.id_jenis_tinggal}">${item.nama_jenis_tinggal}</option>`;
                        }
                    });
                    $("#data_mhs_jns_tinggal").append(html);
                }
            });
            $.ajax({
                url: '<?= base_url() ?>masterdata/alat_transportasi/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#data_mhs_alat_transportasi").empty();
                    html = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_alat_transportasi === id_transportasi) {
                            html += `<option value="${item.id_alat_transportasi}" selected>${item.nama_alat_transportasi}</option>`;
                        } else {
                            html += `<option value="${item.id_alat_transportasi}">${item.nama_alat_transportasi}</option>`;
                        }
                    });
                    $("#data_mhs_alat_transportasi").append(html);
                }
            });

            // ############## field ORTU ######
            var id_pendidikan_ayah = "<?= $detail_mhs['data_ortu']['pendidikan_ayah']; ?>";
            var id_pendidikan_ibu = "<?= $detail_mhs['data_ortu']['pendidikan_ibu']; ?>";
            var id_pendidikan_wali = "<?= $detail_mhs['data_wali']['pendidikan_wali']; ?>";
            $.ajax({
                url: '<?= base_url() ?>masterdata/jenjang_pendidikan/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    let html = ``;
                    let html_2 = ``;
                    let html_3 = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_jenjang_didik === id_pendidikan_ayah) {
                            html += `<option value="${item.id_jenjang_didik}" selected>${item.nama_jenjang_didik}</option>`;
                        } else {
                            html += `<option value="${item.id_jenjang_didik}">${item.nama_jenjang_didik}</option>`;
                        }
                        if (item.id_jenjang_didik === id_pendidikan_ibu) {
                            html_2 += `<option value="${item.id_jenjang_didik}" selected>${item.nama_jenjang_didik}</option>`;
                        } else {
                            html_2 += `<option value="${item.id_jenjang_didik}">${item.nama_jenjang_didik}</option>`;
                        }
                        if (item.id_jenjang_didik === id_pendidikan_wali) {
                            html_3 += `<option value="${item.id_jenjang_didik}" selected>${item.nama_jenjang_didik}</option>`;
                        } else {
                            html_3 += `<option value="${item.id_jenjang_didik}">${item.nama_jenjang_didik}</option>`;
                        }
                    });
                    $("#data_mhs_pendidikan_ayah").append(html);
                    $("#data_mhs_pendidikan_ibu").append(html_2);
                    $("#data_mhs_pendidikan_wali").append(html_3);
                }
            });

            // #### field pekerjaan
            var id_pekerjaan_ayah = "<?= $detail_mhs['data_ortu']['pekerjaan_ayah']; ?>";
            var id_pekerjaan_ibu = "<?= $detail_mhs['data_ortu']['pekerjaan_ibu']; ?>";
            var id_pekerjaan_wali = "<?= $detail_mhs['data_wali']['pekerjaan_wali']; ?>";
            $.ajax({
                url: '<?= base_url() ?>masterdata/pekerjaan/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    let html = ``;
                    let html_2 = ``;
                    let html_3 = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_pekerjaan === id_pekerjaan_ayah) {
                            html += `<option value="${item.id_pekerjaan}" selected>${item.nama_pekerjaan}</option>`;
                        } else {
                            html += `<option value="${item.id_pekerjaan}">${item.nama_pekerjaan}</option>`;
                        }
                        if (item.id_pekerjaan === id_pekerjaan_ibu) {
                            html_2 += `<option value="${item.id_pekerjaan}" selected>${item.nama_pekerjaan}</option>`;
                        } else {
                            html_2 += `<option value="${item.id_pekerjaan}">${item.nama_pekerjaan}</option>`;
                        }
                        if (item.id_pekerjaan === id_pekerjaan_wali) {
                            html_3 += `<option value="${item.id_pekerjaan}" selected>${item.nama_pekerjaan}</option>`;
                        } else {
                            html_3 += `<option value="${item.id_pekerjaan}">${item.nama_pekerjaan}</option>`;
                        }
                    });
                    $("#data_mhs_pekerjaan_ayah").append(html);
                    $("#data_mhs_pekerjaan_ibu").append(html_2);
                    $("#data_mhs_pekerjaan_wali").append(html_3);
                }
            });
            // #### field penghasilan
            var id_penghasilan_ayah = "<?= $detail_mhs['data_ortu']['penghasilan_ayah']; ?>";
            var id_penghasilan_ibu = "<?= $detail_mhs['data_ortu']['penghasilan_ibu']; ?>";
            var id_penghasilan_wali = "<?= $detail_mhs['data_wali']['penghasilan_wali']; ?>";
            $.ajax({
                url: '<?= base_url() ?>masterdata/penghasilan/get_data',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    let html = ``;
                    let html_2 = ``;
                    let html_3 = ``;
                    $.each(response.data, function(i, item) {
                        if (item.id_penghasilan === '0') {
                            item.nama_penghasilan = '-';
                        }
                        if (item.id_penghasilan === id_penghasilan_ayah) {
                            html += `<option value="${item.id_penghasilan}" selected>${item.nama_penghasilan}</option>`;
                        } else {
                            html += `<option value="${item.id_penghasilan}">${item.nama_penghasilan}</option>`;
                        }
                        if (item.id_penghasilan === id_penghasilan_ibu) {
                            html_2 += `<option value="${item.id_penghasilan}" selected>${item.nama_penghasilan}</option>`;
                        } else {
                            html_2 += `<option value="${item.id_penghasilan}">${item.nama_penghasilan}</option>`;
                        }
                        if (item.id_penghasilan === id_penghasilan_wali) {
                            html_3 += `<option value="${item.id_penghasilan}" selected>${item.nama_penghasilan}</option>`;
                        } else {
                            html_3 += `<option value="${item.id_penghasilan}">${item.nama_penghasilan}</option>`;
                        }
                    });
                    $("#data_mhs_penghasilan_ayah").append(html);
                    $("#data_mhs_penghasilan_ibu").append(html_2);
                    $("#data_mhs_penghasilan_wali").append(html_3);
                }
            });


            $('#btnBackToList').on('click', function() {
                let url = $(this).data('url')
                window.location.href = url;
            });
            // Edit Button
            $('#btnEdit').on('click', function() {
                // alert('Nyanyi DIR DUR DAENG, untuk mengakses modul edit.')
                $('#btnEdit').addClass('hidden');
                $('#btnDelete').addClass('hidden');
                $('#btnSave').removeClass('hidden');
                $('#btnBatalEdit').removeClass('hidden');

                $('input').removeAttr('readonly');
                $('select').removeAttr('disabled');
            });

            // Delete button
            $('#btnDelete').on('click', function() {
                alert('modul tidak aktif.')
            });

            $('#btnBatalEdit').on('click', function() {
                location.reload();
            });

            // Save button
            $('#btnSave').on('click', function() {
                let data = $('form#form_update_biodata').serialize();
                $.ajax({
                    url: "<?= base_url() . $dir . '/' . $page ?>/update_data",
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response)
                        if (response.status === true) {
                            title = response.icon;
                            icon = response.icon;
                        } else {
                            title = response.icon;
                            icon = response.icon;
                        }
                        Swal.fire({
                            title: response.message,
                            icon: icon,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            });

            // form submit
            // $('#form_update_biodata').on('submit', function(e) {
            //     let data = $('form#form_update_biodata').serialize();
            //     console.log(data)
            // });

        });
    </script>
</div>