<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="description" content="MyFeederAsistance.">
    <meta name="author" content="oktan-tech">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/templates/proui/img/favicon.png">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/templates/proui/img/icon180.png" sizes="180x180">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/templates/proui/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/templates/proui/css/plugins.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/templates/proui/css/main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/templates/proui/css/themes.css">
    <script src="<?= base_url(); ?>assets/templates/proui/js/vendor/modernizr.min.js"></script>
    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="<?= base_url(); ?>assets/templates/proui/js/vendor/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/templates/proui/js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/templates/proui/js/plugins.js"></script><!-- Page content -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="<?= base_url(); ?>assets/templates/proui/js/vendor/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/templates/proui/css/sweetalert2.min.css"></script> -->
    <style>
        .table-responsive {
            margin-bottom: 10px;
            overflow-x: auto;
            min-height: 0.01%;
        }

        .table thead>tr>th {
            font-size: 12px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .badge-pill {
            padding-right: 0.6em;
            padding-left: 0.6em;
            border-radius: 10rem;
        }

        .badge-primary {
            color: #fff;
            background-color: #007bff;
        }

        .badge-secondary {
            color: #fff;
            background-color: #6c757d;
        }

        .badge-success {
            color: #fff;
            background-color: #20d000;
        }

        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .badge-warning {
            color: #fff;
            background-color: #ffc107;
        }

        .badge-info {
            color: #fff;
            background-color: #17a2b8;
        }

        .badge-light {
            color: #212529;
            background-color: #f8f9fa;
        }

        .badge-dark {
            color: #fff;
            background-color: #343a40;
        }
    </style>
</head>

<body>
    <?php if ($content == 'v_login' || $content == 'v_installation') : ?>
        <?php $this->load->view($content); ?>
    <?php else : ?>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-visible-lg sidebar-no-animations">
                <?php $this->load->view('layout/sidebar'); ?>
                <!-- Main Container -->
                <div id="main-container">
                    <?php $this->load->view('layout/topbar'); ?>
                    <?php $this->load->view($content); ?>
                    <?php $this->load->view('layout/footer'); ?>
                </div>
            </div>
        </div>
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php endif; ?>
    <script src="<?= base_url(); ?>assets/templates/proui/js/app.js"></script>
</body>

</html>