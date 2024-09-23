<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Usergroup.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 27/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Usergroup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        // $this->load->model('manajemen/M_user_group', 'user_group');
    }
    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die;
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/v_' . $this->uri->segment(2);
        $this->load->view('template', $data);
    }
}
