<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Mfa_update.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Mfa_update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/v_' . $this->uri->segment(2);
        $this->load->view('template', $data);
    }
}
