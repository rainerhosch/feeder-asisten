<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <?= $this->session->flashdata('icon'); ?>Status koneksi:<br><small><?= $this->session->flashdata('message'); ?></small>
            </h1>
        </div>
    </div>
    <div class="block">
        <div class="block-title">
            <h2>Basik Masterdata</h2>
        </div>
        <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Masterdata</th>
                    <th class="text-center">Jumlah Data</th>
                    <!-- <th class="text-center">At Feeder</th> -->
                    <!-- <th class="text-center">Message FEEDER</th> -->
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="masterdata_tbody">
                <!-- Load Data by Ajax -->
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            let datamaster = [
                'Wilayah',
                'Negara',
                'Pekerjaan',
                'Bentuk Pendidikan',
                'Kebutuhan Khusus',
                'Jenjang Pendidikan',
                'Jenis Pendaftaran',
                'Jenis Tinggal',
                'Penghasilan',
                'Alat Transportasi',
                'Agama',
                'Tahun Ajaran',
                'Prodi',
                'Status Mahasiswa',
                'Semester',
                'Jalur Masuk',
                'Pembiayaan'
                // 'Golongan Darah',
            ];
            $.ajax({
                type: "POST",
                url: "<?= base_url() . $dir . '/' . $page ?>/cek_data",
                data: {
                    table: datamaster
                },
                dataType: "json",
                serverSide: true,
                success: function(response) {
                    // console.log(response.data);
                    let html = ``;
                    let no = 1;
                    $.each(response.data, function(i, value) {
                        html += `<tr>`;
                        html += `<td class="text-center">${no}</td>`;
                        html += `<td class="text-center">${value.table}</td>`;
                        html += `<td class="text-center">${value.simak}</td>`;
                        // html += `<td class="text-center">${value.feeder}</td>`;
                        // if (value.simak < value.feeder) {
                        //     html += `<td class="text-center" style="width:15%">Terdapat data baru di feeder.</td>`;
                        //     html += `<td class="text-center"><button class="btn btn-sm btn-info" id="${value.id}" value="${value.id}"><i class="hi hi-refresh"></i></button></td>`;
                        // } else {
                        //     html += `<td class="text-center" style="width:15%">${value.msg}</td>`;
                        //     html += `<td class="text-center"><i class="hi hi-ok"></i></td>`;
                        // }

                        // if(value.simak > 0){

                        // } 
                        html += `<td class="text-center"><button class="btn btn-xs btn-info" id="${value.id}" value="${value.id}"><i class="hi hi-refresh"></i> FEEDER</button></td>`;
                        html += `</tr>`;
                        no++;
                    });
                    $("#masterdata_tbody").html(html);
                    $.each(response.data, function(i, val) {
                        $(`#${val.id}`).on('click', function() {
                            let id = val.id;
                            let tbl = val.table;
                            console.log(id)
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url() . $dir . '/' . $page ?>/syncData",
                                data: {
                                    id: id,
                                    table: tbl
                                },
                                dataType: "json",
                                beforeSend: function() {
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
                                success: function(response) {
                                    // console.log(response)
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
                                }
                            });
                        });
                    });
                }
            });
        });
    </script>
</div>