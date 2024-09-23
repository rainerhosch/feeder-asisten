<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Menu.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 27/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('manajemen/M_menu', 'menu');
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

    function get_data()
    {
        if ($this->input->is_ajax_request()) {
            $data = [];
            $condition = [];
            $dataMenu = $this->menu->get_data()->result_array();
            $data = $dataMenu;
            foreach ($dataMenu as $i => $menu) {
                if ($menu['parent'] != 0) {
                    $parent = $this->menu->get_data(['id' => $menu['parent']])->row_array();
                    $data[$i]['parent_name'] = $parent['page_name'];
                } else {
                    $data[$i]['parent_name'] = '';
                }
            }
            $response = [
                'status'    => true,
                'code'      => 200,
                'message'   => 'Success',
                'data'      => $data
            ];
            echo json_encode($response);
        } else {
            show_404();
        }
    }
}
