<!-- Main Sidebar -->
<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <a href="#" class="sidebar-brand">
            </a>
            <ul class="sidebar-nav" id="sidebar-menu">
                <li class="dashboard">
                    <a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
                <li class="manajemen">
                    <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">MFA Setting</span></a>
                    <ul>
                        <li>
                            <a href="<?= base_url() ?>manajemen/config">Config Feeder</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>manajemen/menu">Menu</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>manajemen/user">User</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>manajemen/usergroup">User Group</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>manajemen/mfa_update">Update Aplikasi</a>
                        </li>
                    </ul>
                </li>
                <?php
                $where = [
                    'id_group' => $this->session->userdata('role')
                ];
                $this->db->select('*');
                $this->db->from('mfa_menu_access');
                $this->db->where($where);
                $user_access = $this->db->get()->result_array();
                foreach ($user_access as $i => $val) {
                    $where = [
                        'id' => $val['id_menu'],
                    ];
                    $this->db->select('*');
                    $this->db->from('mfa_menu');
                    $this->db->where($where);
                    $data_menu = $this->db->get()->row_array();
                    if ($data_menu != null) {
                        if ($data_menu['parent'] == 0) {
                            $dataMenu[] = $data_menu;
                        }
                    }
                }
                foreach ($dataMenu as $i => $key) {
                    $where = [
                        'parent' => $key['id']
                    ];
                    $this->db->select('*');
                    $this->db->from('mfa_menu');
                    $this->db->where($where);
                    $dataMenu[$i]['submenu'] = $this->db->get()->result_array();
                }
                foreach ($dataMenu as $i => $menu) :
                ?>
                    <?php if ($menu['type_menu'] == 'main') : ?>
                        <li class="<?= $menu['url'] ?>">
                            <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa <?= $menu['icon'] ?> sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"><?= $menu['page_name'] ?></span></a>
                            <ul>
                                <?php foreach ($menu['submenu'] as $j => $submenu) : ?>
                                    <li><a href="<?= base_url() ?><?= $menu['url'] ?>/<?= $submenu['nav_act'] ?>"><?= $submenu['page_name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="<?= $menu['url'] ?>">
                            <a href="<?= base_url() ?><?= $menu['nav_act'] ?>"><i class="fa <?= $menu['icon'] ?> sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"><?= $menu['page_name'] ?></span></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
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
        }
        // const urlPieces = [location.protocol, '', location.host, app, dir, crtl, funct]

        const urlPieces = [location.protocol, '//', location.host, location.pathname]
        let url_act = urlPieces.join('')

        $('a[href$="' + url_act + '"]').addClass('active')
        var classList = $('a[href$="' + url + '"]').closest('ul').prop('classList')
        if (classList === undefined) {
            $('li.' + dir).addClass('active')
            $('a[href$="' + location.origin + '/' + app + '/' + dir + '/' + crtl + '"]').addClass('active')
        } else if (classList.length === 0) {
            $('li.' + dir).addClass('active')
        }
    });
</script>
<!-- END Main Sidebar -->