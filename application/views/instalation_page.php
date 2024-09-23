<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .background-image {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1;
            display: block;
            background-image: url('../assets/dist/img/pexels-two-dreamers-2753112.jpg');
            backdrop-filter: blur(5px);
        }

        .desc-app {
            text-align: center;
            margin-bottom: 3px;
        }

        .desc-app p {
            font-size: 12px;
            color: #585858;
        }

        .about-app {
            text-align: center;
            margin-top: 5px;
        }

        .about-app p {
            font-size: 12px;
            color: #495057;
        }

        .about-app a {
            font-size: 12px;
            font-weight: 600;
            color: #495057;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page background-image">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>MF</b>A</a>
        </div>
        <div class="desc-app">
            <p>Aplikasi feeder client untuk mempermudah proses pelaporan data perguruan tinggi.</p>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="<?= base_url() ?>installation/Fa_config/install" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="conf_hostname" name="conf_hostname" placeholder="localhost" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-server"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="conf_username" name="conf_username" placeholder="nama user db" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="password db">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="conf_database" name="conf_database" placeholder="nama database" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-database"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <div class="text-right col-4">
                            <button type="submit" class="btn btn-primary btn-block">Install</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="about-app">
            <p> &copy; <?= $title; ?> made with <a href="">❤️ By <a href="#">RZ-OKTAN</a></a>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>