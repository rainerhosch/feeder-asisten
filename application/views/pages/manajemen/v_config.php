<!-- Page content -->
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>

    <div class="content-header">
        <div class="header-section">
            <h1>
                <?= $this->session->flashdata('icon'); ?>Status
                koneksi:<br><small><?= $this->session->flashdata('message'); ?></small>
            </h1>
        </div>
    </div>
    <div class="block">
        <div class="block-title">
            <h2>Data <?= $page ?></h2>
        </div>
        <div class="row m-5 divInitialData" style="margin-bottom: 5px;" hidden>
            <div class="col-md-2">
                <button class="btn btn-sm btn-info btnInitialData" data-toggle="modal"
                    data-target="#addModal">Initialisasi <i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>NAMA LEMBAGA</th>
                        <th>USERNAME</th>
                        <th>HOST / IP</th>
                        <th>PORT</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody_config_feeder">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Feeder Config</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="form-edit-config">
                        <input type="hidden" id="editId">
                        <div class="form-group">
                            <label for="editHost">Host / Domain</label>
                            <input type="text" class="form-control" id="editHost"
                                placeholder="IP Address atau Domain (contoh: wsfeeder.wastukancana.ac.id)" required>
                        </div>
                        <div class="form-group">
                            <label for="editPort">Port <small class="text-muted">(Kosongkan jika menggunakan domain /
                                    tunnel)</small></label>
                            <input type="text" class="form-control" id="editPort"
                                placeholder="Opsional jika menggunakan domain">
                        </div>
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input type="text" class="form-control" id="editUsername" required>
                        </div>
                        <div class="form-group">
                            <label for="editPassword">Password</label>
                            <input type="password" class="form-control" id="editPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Feeder Config</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="form-config">
                        <div class="form-group">
                            <label for="inputHost">Host / Domain</label>
                            <input type="text" class="form-control" id="inputHost" aria-describedby="hostHelp"
                                placeholder="Enter host, IP address, atau domain FEEDER" value="127.0.0.1" required>
                            <small id="hostHelp" class="form-text text-muted">Bisa diisi IP Address (contoh:
                                180.178.111.253) atau Domain Tunnel (contoh: wsfeeder.wastukancana.ac.id atau
                                https://wsfeeder.wastukancana.ac.id).</small>
                        </div>
                        <div class="form-group">
                            <label for="inputPort">Port <small class="text-muted">(Kosongkan jika menggunakan domain /
                                    tunnel)</small></label>
                            <input type="text" class="form-control" id="inputPort"
                                placeholder="Opsional jika menggunakan domain">
                        </div>
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername"
                                placeholder="Enter Username FEEDER" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword"
                                placeholder="Enter Password FEEDER" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#form-edit-config').on('submit', function (e) {
                e.preventDefault();
                var id = $('#editId').val();
                var username = $('#editUsername').val();
                var password = $('#editPassword').val();
                var host = $('#editHost').val();
                var port = $('#editPort').val();
                $.ajax({
                    url: "<?= base_url() . $dir . '/' . $page ?>/update_data",
                    type: "POST",
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        id: id,
                        host: host,
                        port: port,
                        username: username,
                        password: password
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.code === 200) {
                            title = `Success`;
                            icon = `success`;
                        } else {
                            title = `Error!`;
                            icon = `error`;
                        }
                        Swal.fire({
                            title: response.message,
                            icon: icon,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                            $("#alert_msg").html("");
                            <?php $this->session->unset_userdata('message'); ?>
                            <?php $this->session->unset_userdata('icon'); ?>
                        });
                    }
                });
            });

            $('#form-config').on('submit', function (e) {
                e.preventDefault();
                var username = $('#inputUsername').val();
                var password = $('#inputPassword').val();
                var host = $('#inputHost').val();
                var port = $('#inputPort').val();
                $.ajax({
                    url: "<?= base_url() . $dir . '/' . $page ?>/insert_data",
                    type: "POST",
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        host: host,
                        port: port,
                        username: username,
                        password: password
                    },
                    dataType: "JSON",
                    success: function (response) {
                        // console.log(response)
                        if (response.code === 200) {
                            title = `Success`;
                            icon = `success`;
                        } else {
                            title = `Error!`;
                            icon = `error`;
                        }
                        Swal.fire({
                            title: response.message,
                            icon: icon,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                            $("#alert_msg").html("");
                            <?php $this->session->unset_userdata('message'); ?>
                            <?php $this->session->unset_userdata('icon'); ?>
                        });
                    }
                });
            });
            $.ajax({
                url: "<?= base_url() . $dir . '/' . $page ?>/get_data",
                type: "POST",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);
                    if (response.data === null) {
                        $('.divInitialData').prop('hidden', false);
                    }
                    let html = ``;
                    $.each(response.data, function (i, item) {
                        html += `<tr>`;
                        html += `<td>${item.nm_lembaga}</td>`;
                        html += `<td>${item.username}</td>`;
                        html += `<td>${item.host}</td>`;
                        html += `<td>${item.port ? item.port : '-'}</td>`;
                        html += `<td class="text-center">`;
                        if (item.status_connected === 'Y') {
                            html += `<button type="button" class="btn btn-success btn-xs">Connected</button>`;
                        } else {
                            html += `<button type="button" class="btn btn-warning btn-xs">Disconnected</button>`;

                        }
                        html += `</td>`;
                        html += `<td class="text-center">`;
                        html += `<div class="btn-group">`;
                        html += `<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default btnEdit" data-id="${item.id}" data-host="${item.host}" data-port="${item.port}" data-username="${item.username}" data-password="${item.password}"><i class="fa fa-pencil"></i></a>`;
                        html += `<a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger btnDelete" data-id="${item.id}"><i class="fa fa-trash"></i></a>`;
                        html += `</div>`;
                        html += `</td>`;
                        html += `</tr>`;
                    });
                    $('#tbody_config_feeder').html(html);

                    $('.btnEdit').on('click', function () {
                        var id = $(this).data('id');
                        var host = $(this).data('host');
                        var port = $(this).data('port');
                        var username = $(this).data('username');
                        var password = $(this).data('password');

                        $('#editId').val(id);
                        $('#editHost').val(host);
                        $('#editPort').val(port);
                        $('#editUsername').val(username);
                        $('#editPassword').val(password);

                        $('#editModal').modal('show');
                    });

                    $('.btnDelete').on('click', function () {
                        let id = $(this).data("id");
                        // console.log(id)
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Data configurasi feeder akan di hapus.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "<?= base_url() . $dir . '/' . $page ?>/delete_data",
                                    type: "POST",
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    },
                                    data: {
                                        id: id,
                                    },
                                    dataType: "JSON",
                                    success: function (response) {
                                        if (response.code === 200) {
                                            title = `Success`;
                                            icon = `success`;
                                        } else {
                                            title = `Error!`;
                                            icon = `error`;
                                        }
                                        Swal.fire({
                                            title: response.message,
                                            icon: icon,
                                            showConfirmButton: false,
                                            timer: 1500
                                        }).then(() => {
                                            location.reload();
                                            $("#alert_msg").html("");
                                            <?php $this->session->unset_userdata('message'); ?>
                                            <?php $this->session->unset_userdata('icon'); ?>
                                        });
                                    }
                                });
                            }
                        })
                    });
                }
            });
        });
    </script>
</div>