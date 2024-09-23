<header class="navbar navbar-default">
    <ul class="nav navbar-nav-custom">
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-nav-custom pull-right">
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <?= $this->session->userdata('fullname'); ?> <img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Account</li>
                <li>
                    <a href="page_ready_user_profile.html">
                        <i class="fa fa-user fa-fw pull-right"></i>
                        Profile
                    </a>
                    <a href="#modal-user-settings" data-toggle="modal">
                        <i class="fa fa-cog fa-fw pull-right"></i>
                        Settings
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?= base_url(); ?>/auth/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- END Header -->