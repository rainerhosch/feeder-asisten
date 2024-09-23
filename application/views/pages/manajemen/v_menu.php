<div id="page-content">
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
                        <th>MENU</th>
                        <th>TIPE</th>
                        <th class="text-center">ICON</th>
                        <th>PARENT</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody_list_menu">
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
                    $.each(response.data, function(i, menu) {
                        html += `<tr>`;
                        html += `<td class="text-center">${i+1}</td>`;
                        html += `<td>${menu.page_name}</td>`;
                        html += `<td>${menu.type_menu}</td>`;
                        html += `<td class="text-center"><i class="fa ${menu.icon}"></i></td>`;
                        html += `<td>${menu.parent_name}</td>`;
                        html += `<td class="text-center">`;
                        html += `<div class="btn-group">`;
                        html += `<button href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default btnEdit" data-id="${menu.id}"><i class="fa fa-pencil"></i></button>`;
                        html += `<a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger btnDelete" data-id="${menu.id}"><i class="fa fa-times"></i></a>`;
                        html += `</div>`;
                        html += `</td>`;
                        html += `</tr>`;
                    });
                    $('#tbody_list_menu').html(html);
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