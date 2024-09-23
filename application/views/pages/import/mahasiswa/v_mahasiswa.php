<style>
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
</style>
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <!-- <?= $this->session->flashdata('icon'); ?>Status koneksi:<br><small><?= $this->session->flashdata('message'); ?></small> -->
                <p><small>Token Connection Time :</small> <i id="time_token"></i></p>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="row">
                        <div class="col-sm-12 text-center" style="margin-bottom: 3px;">
                            <p><strong>Sinkron Mahasiswa</strong></br><small>Simak to Feeder</small></p>
                        </div>
                    </div>
                    <div class="row">
                        <form id="form_sync">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" id="thn_angkatan" name="thn_angkatan">
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-sm btn_sync_all" disabled><i class="hi hi-refresh"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="row">
                        <div class="col-sm-12 text-center" style="margin-bottom: 3px;">
                            <p><strong>Filter Perjurusan</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <form id="form_filter_prodi">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" id="filter_prodi" name="filter_prodi">
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="row">
                        <div class="col-sm-12 text-center" style="margin-bottom: 3px;">
                            <p><strong>Filter Angkatan</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <form id="form_filter_angkatan">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" id="filter_angkatan" name="filter_angkatan">
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-picture"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        +30 <strong>Photos</strong>
                        <small>Gallery</small>
                    </h3>
                </div>
            </a>
        </div>
    </div>

    <div class="block">
        <div class="block-title">
            <h2>Data <?= $page ?></h2>
        </div>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-6 col-xs-5">
                <div class="dataTables_length">
                    <label>
                        <select id="datatable_length" name="datatable_length" aria-controls="edatatable" class="form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 col-xs-7">
                <div id="datatable_filter" class="dataTables_filter">
                    <label>
                        <div class="input-group">
                            <input type="search" class="form-control datatable_filter" placeholder="Cari by name..." aria-controls="datatable">
                            <!-- <span class="input-group-addon"><i class="fa fa-search"></i></span> -->
                        </div>
                    </label>
                </div>
                <!-- <div id="datatable_filter" class="float-end dataTables_filter">
                    <input type="search" class="form-control datatable_filter" placeholder="Cari data" aria-controls="datatable">
                </div> -->
            </div>
        </div>

        <div class="table-responsive">
            <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="">Nim</th>
                        <th class="">Nama</th>
                        <th class="">Jenis Kelamin</th>
                        <th class="">Agama</th>
                        <th class="">Total SKS Diambil</th>
                        <th class="">Tanggal Lahir</th>
                        <th class="">Program Studi</th>
                        <th class="">Status</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Sync Status</th>
                        <!-- <th class="text-center">Action</th> -->
                    </tr>
                </thead>
                <tbody id="data_mahasiswa_tbody">
                    <!-- Load Data by Ajax -->
                </tbody>
            </table>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-12 col-md-5 hidden-xs">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
            </div>
            <!-- Paginate -->
            <div class="col-sm-12 col-md-7 clearfix">
                <div class="dataTables_paginate paging_simple_numbers pagination-rounded" id="pagination">
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/templates/proui/js/pages/tablesDatatables.js"></script>

    <script>
        $(document).ready(function() {
            var prodi_set = '';
            var set_angkatan = '';
            var sec = 180, // 3 menit
                // var sec = 1800, // 30 menit
                countDiv = document.getElementById("time_token"),
                secpass,
                countDown = setInterval(function() {
                    'use strict';
                    secpass();
                }, 1000);

            function secpass() {
                'use strict';
                var min = Math.floor(sec / 60),
                    remSec = sec % 60;
                if (remSec < 10) {
                    remSec = '0' + remSec;
                }
                if (min < 10) {
                    min = '0' + min;
                }
                countDiv.innerHTML = min + ":" + remSec;
                if (sec > 0) {
                    sec = sec - 1;
                } else {
                    clearInterval(countDown);
                    countDiv.innerHTML = 'Token Expired';
                }
            }
            $('#filter_prodi').on('change', function() {
                var cookieValue = $(this).val();
                if (cookieValue != '') {
                    prodi_set = cookieValue;
                    filter_prodi = filter_prodi ? filter_prodi : document.body.className;
                    document.body.className = filter_prodi + ' ' + prodi_set;
                    setCookie('filterProdi', cookieValue, 1);
                } else {
                    deleteAllCookies('filterProdi')
                }
            });
            $('#filter_angkatan').on('change', function() {
                var cookieValue = $(this).val();
                // console.log(cookieValue)
                if (cookieValue != '') {
                    set_angkatan = cookieValue;
                    filter_angkatan = filter_angkatan ? filter_angkatan : document.body.className;
                    document.body.className = filter_angkatan + ' ' + set_angkatan;
                    setCookie('filterAngkatan', cookieValue, 1);
                } else {
                    deleteAllCookies('filterAngkatan')
                }
            });

            function setCookie(cookieName, cookieValue, nDays) {
                var today = new Date();
                var expire = new Date();
                if (nDays == null || nDays == 0)
                    nDays = 1;
                expire.setTime(today.getTime() + 3600000 * 24 * nDays);
                document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString();
                location.reload();
            }

            function deleteAllCookies(cookieName) {
                var cookies = document.cookie.split(";");
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    var eqPos = cookie.indexOf("=");
                    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                    document.cookie = cookieName + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
                    location.reload();
                }
            }
            // console.log(Cookies.get())

            $.ajax({
                url: '<?= base_url() . $dir ?>/prodi/get_data',
                type: 'GET',
                serverSide: true,
                dataType: 'json',
                success: function(response) {
                    let prodiOnCookie = Cookies.get("filterProdi");
                    $("#filter_prodi").empty();
                    let html = `<option class="text-center" value="">--Pilih Filter--</option>`;
                    $.each(response.data, function(i, item) {
                        if (parseInt(item.id) === parseInt(prodiOnCookie)) {
                            html += `<option class="text-center" value="${item.id}" selected>${item.nama_program_studi}</option>`;
                        } else {
                            html += `<option class="text-center" value="${item.id}">${item.nama_program_studi}</option>`;
                        }
                    });
                    $("#filter_prodi").append(html);
                }
            });

            $.ajax({
                url: '<?= base_url() . $dir . '/' . $page ?>/getTahunAngkatanMhs',
                type: 'GET',
                serverSide: true,
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    let angkatanOnCookie = Cookies.get("filterAngkatan");
                    $("#thn_angkatan").empty();
                    let html = ``;
                    $.each(response.angkatan, function(i, value) {
                        if (parseInt(value) === parseInt(angkatanOnCookie)) {
                            html += `<option class="text-center" value="${value}" selected>${value}</option>`;
                        } else {
                            html += `<option class="text-center" value="${value}">${value}</option>`;
                        }
                    });
                    $("#filter_angkatan").append(html);
                }
            });
            $.ajax({
                url: '<?= base_url() . $dir . '/' . $page ?>/getTahunAngkatanMhs',
                type: 'GET',
                serverSide: true,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    $("#thn_angkatan").empty();
                    let html = `<option class="text-center" value="x">--Pilih Angkatan--</option>`;
                    $.each(response.angkatan, function(i, value) {
                        html += `<option class="text-center" value="${value}">Angkatan | ${value}</option>`;
                    });
                    $("#thn_angkatan").append(html);
                }
            });

            $('#thn_angkatan').on('change', function() {
                let thn = $('#thn_angkatan').val();
                if (thn != 'x') {
                    $('.btn_sync_all').prop('disabled', false);
                } else {
                    $('.btn_sync_all').prop('disabled', true);
                }
            });

            const syncData = function() {
                swal.fire({
                    title: 'Menyinkronkan Data',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    timer: 2000,
                    didOpen: () => {
                        swal.showLoading();
                    }
                }).then(
                    () => {},
                    (dismiss) => {
                        if (dismiss === 'timer') {
                            console.log('closed by timer!!!!');
                            swal.fire({
                                title: 'Finished!',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            })
                        }
                    }
                )
            };

            const loader = function() {
                swal.fire({
                    title: 'Menyinkronkan Data',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        swal.showLoading();
                    }
                });
            }

            $('.btn_sync_all').on('click', function() {
                let angkatan = $('#thn_angkatan').val();
                $.ajax({
                    url: '<?= base_url() . $dir . '/' . $page ?>/sync_batch',
                    type: 'POST',
                    data: {
                        data: angkatan
                    },
                    beforeSend: function() {
                        // setting a timeout
                        loader();
                    },
                    // serverSide: true,
                    dataType: 'json',
                    success: function(response) {
                        // loader.close();
                        console.log(response)
                        let icon = '';
                        if (response.status != true) {
                            icon = 'error';
                        } else {
                            icon = 'success';
                        }
                        Swal.fire({
                            icon: icon,
                            title: `<i>${response.res_code}</i>`,
                            html: `<i>${response.msg}.</i></br><b><a target="blank" href="<?= base_url() ?>sync_data/Mahasiswa/detail_mhs/${response.data.id_pd}">Cek Data</a></b>`,
                        }).then(function(isConfirm) {
                            location.reload();
                        });
                    }
                })
            });


            var limit = $('select[name="datatable_length"]').val();
            $('select[name="datatable_length"]').on('change', function() {
                let limit = $(this).val();
                loadPagination(limit);
            });
            loadPagination(limit);

            $(".datatable_filter").keyup(function(e) {
                e.preventDefault();
                let keyword = $(this).val();
                // console.log(keyword)
                loadFilter(keyword);
            });
            $('#pagination').on('click', 'a', function(e) {
                e.preventDefault();
                let limit = $('#datatable_length').val();
                let offset = $(this).attr('data-ci-pagination-page');
                // console.log(offset)
                // limit = limit || 10;
                loadPagination(limit, offset);
            });

            // Load pagination
            function loadFilter(keyword) {
                $.ajax({
                    url: '<?= base_url() . $dir . '/' . $page ?>/get_list_data',
                    type: 'POST',
                    data: {
                        limit: limit,
                        filter: {
                            'search': keyword
                        },
                        url_pagination: 'DataMhs'
                    },
                    serverSide: true,
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        let limit = response.data.limit_per_page;
                        let data_mhs = response.data.mhs;
                        let total_data = response.data.total_data;
                        let offset = response.data.current_page;
                        $('#pagination').html(response.pagination);
                        createTable(data_mhs, total_data, limit, offset);
                    }
                });
            }
            // Load pagination
            function loadPagination(limit, offset) {
                // let filter_prodi = $('select#filter_prodi').find(":selected").text();
                // let filter_angkatan = $('#filter_angkatan').find(":selected").text();
                // console.log(filter_angkatan)
                // console.log(filter_prodi)
                offset = typeof offset !== 'undefined' ? offset : 0;
                let page = offset * limit;
                $.ajax({
                    url: '<?= base_url() . $dir . '/' . $page ?>/get_list_data/' + offset,
                    type: 'POST',
                    data: {
                        offset: offset,
                        limit: limit,
                        filter: {
                            'prodi': Cookies.get("filterProdi"),
                            'angkatan': Cookies.get("filterAngkatan"),
                        },
                        url_pagination: 'DataMhs'
                    },
                    serverSide: true,
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        let limit = response.data.limit_per_page;
                        let data_mhs = response.data.mhs;
                        let total_data = response.data.total_data;
                        let offset = response.data.current_page;
                        $('#pagination').html(response.data.pagination_link);
                        $('ul.pagination li a').addClass('page-link');
                        createTable(data_mhs, total_data, limit, offset);
                    }
                });
            }

            function createTable(data_mhs, total_data, limit, offset) {
                // console.log(data_mhs);
                let html = ``;
                offset = Number(offset);
                // console.log(limit);
                // console.log(total_data);
                $('table#data_mahasiswa_tbody').empty();

                if (data_mhs != 0) {
                    let no = offset + 1;
                    let numEnd = Number(limit) + Number(offset);
                    if (total_data < limit) {
                        numEnd = total_data;
                        $('#pagination').addClass('hidden')
                    } else {
                        $('#pagination').removeClass('hidden')
                    }
                    $('#datatable_info').html(`<strong>${offset+1}</strong>-<strong>${numEnd}</strong> dari <strong>${total_data}</strong> Record`);
                    $.each(data_mhs, function(k, mhs) {
                        html += `<tr>`;
                        html += `<td class="text-center">${no++}</td>`;
                        html += `<td class="">${mhs.nipd}</td>`;
                        html += `<td class=""><a class="btn_detail_mhs" rel="noopener noreferrer" href="javascript:void(0)" id_pd="${mhs.id_pd}" data-toggle="tooltip" title="Lihat Detail"><strong>${mhs.nm_pd}</strong</a></td>`;
                        html += `<td class="">${mhs.jk}</td>`;
                        html += `<td class="">${mhs.nama_agama}</td>`;
                        html += `<td class="">-</td>`;
                        html += `<td class="">${mhs.tgl_lahir}</td>`;
                        html += `<td class="">${mhs.prodi}</td>`;
                        html += `<td class="">${mhs.status}</td>`;
                        html += `<td class="text-center">${mhs.angkatan}</td>`;
                        html += `<td class="text-center">`;
                        if (mhs.id_feeder != '') {
                            html += `<span class="badge badge-pill badge-success">success</span>`;
                        } else {
                            html += `<a href="#" class="btn btn-xs btn-info btn_syn_data" data-nipd="${mhs.nipd}" data-id_pd="${mhs.id_pd}" data-nm_pd="${mhs.nm_pd}"><i class="hi hi-refresh"></i></a>`;

                        }
                        // html += `</td>`;
                        // html += `<td class="text-center">`;
                        // html += `<a class="btn btn-xs btn-success"><i class="gi gi-search"></i></a> `;
                        // html += `<a class="btn btn-xs btn-warning"><i class="hi hi-pencil"></i></a> `;
                        // html += `<a class="btn btn-xs btn-danger"><i class="hi hi-trash"></i></a>`;
                        // html += `</td>`;
                        html += `</tr>`;
                    });
                    no++;
                } else {
                    html += `<tr>`;
                    html += `<td colspan="12" class="text-center"><br>`;
                    html += `<div class='col-lg-12'>`;
                    html += `<div class='alert alert-danger alert-dismissible'>`;
                    html += `<h4><i class='icon fa fa-warning'></i> Data tidak ditemukan!</h4>`;
                    html += `</div>`;
                    html += `</div>`;
                    html += `</td>`;
                    html += `</tr>`;
                }

                $('#data_mahasiswa_tbody').html(html);

                $(".btn_syn_data").on('click', function() {
                    let id_pd = $(this).data('id_pd');
                    let nm_pd = $(this).data('nm_pd');
                    let nipd = $(this).data('nipd');
                    let query = 'Get List Mahasiswa'
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() . $dir . '/' . $page ?>/sync_data',
                        data: {
                            id_pd: id_pd,
                            nm_pd: nm_pd,
                            nipd: nipd,
                            query: query
                        },
                        serverSide: true,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            let icon = '';
                            if (response.status != true) {
                                icon = 'error';
                            } else {
                                icon = 'success';
                            }
                            Swal.fire({
                                icon: icon,
                                title: `<i>${response.res_code}</i>`,
                                html: `<i>${response.msg}.</i></br><b><a target="blank" href="<?= base_url() ?>sync_data/Mahasiswa/detail_mhs/${response.data.id_pd}">Cek Data</a></b>`,
                            }).then(function(isConfirm) {
                                location.reload();
                            });
                        }
                    });
                });

                $(".btn_detail_mhs").on('click', function() {
                    let id_pd = $(this).attr('id_pd');
                    window.open(`<?= base_url() . $dir . '/' . $page ?>/detail/${id_pd}`);
                });
            }
        });
    </script>
</div>