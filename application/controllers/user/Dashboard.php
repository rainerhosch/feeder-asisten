<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Dashboard.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 26/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
    }
    public function index()
    {
        // echo '<pre>';
        // var_dump($this->session->userdata());
        // echo '</pre>';
        // die;
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/v_dashboard';
        $this->load->view('template', $data);
    }
}
