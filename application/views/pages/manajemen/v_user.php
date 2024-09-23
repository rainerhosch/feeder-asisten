<!-- Page content -->
<div id="page-content">
    <!-- <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-brush"></i><?= $page ?><br><small>A clean page to help you start!</small>
            </h1>
        </div>
    </div> -->
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>
    <div class="block">
        <div class="block-title">
            <h2>Data <?= $page ?></h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>FULLNAME</th>
                        <th>EMAIL</th>
                        <th>KODE JURUSAN</th>
                        <th class="text-center">AKTIF</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody_list_user">
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/templates/proui/js/pages/tablesDatatables.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?= base_url() . $dir . '/' . $page ?>/get_data",
                type: "POST",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response);
                    let html = ``;
                    $.each(response.data, function(i, user) {
                        html += `<tr>`;
                        html += `<td class="text-center">${i+1}</td>`;
                        html += `<td>${user.first_name} ${user.last_name}</td>`;
                        html += `<td>${user.email}</td>`;
                        html += `<td>${user.kode_jurusan}</td>`;
                        html += `<td class="text-center">${user.aktif}</td>`;
                        html += `<td class="text-center">`;
                        html += `<div class="btn-group">`;
                        html += `<button href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default btnEdit" data-id="${user.id}"><i class="fa fa-pencil"></i></button>`;
                        html += `<a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger btnDelete" data-id="${user.id}"><i class="fa fa-times"></i></a>`;
                        html += `</div>`;
                        html += `</td>`;
                        html += `</tr>`;
                    });
                    $('#tbody_list_user').html(html);
                    $('.btnEdit').on('click', function() {
                        let id = $(this).data("id");
                        console.log(id)
                    });
                    $('.btnDelete').on('click', function() {
                        let id = $(this).data("id");
                        console.log(id)
                    });
                    TablesDatatables.init();
                }
            });
        });
    </script>
</div>
<!-- END Page Content -->