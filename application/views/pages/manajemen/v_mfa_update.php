<!-- Page content -->
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        <li><?= $dir ?></li>
        <li><a href=""><?= $page ?></a></li>
    </ul>

    <!-- <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-cogs"></i>Status koneksi:<br><small><?= $this->session->flashdata('message'); ?></small>
            </h1>
        </div>
    </div> -->
    <div class="block">
        <div class="block-title">
            <h2>App Info</h2>
        </div>
        <div class="row m-5 divInitialData" style="margin-bottom: 5px;" hidden>
            <div class="col-md-2">
                <button class="btn btn-sm btn-info btnInitialData" data-toggle="modal" data-target="#addModal">Initialisasi <i class="fa fa-plus"></i></button>
            </div>
        </div>
        <p>...</p>
    </div>
</div>