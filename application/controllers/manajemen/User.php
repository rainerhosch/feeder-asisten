<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : User.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 26/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('manajemen/M_menu', 'menu');
        $this->load->model('manajemen/M_user', 'user');
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
    function get_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $dataUser = $this->user->get_data()->result_array();
            foreach ($dataUser as $i => $val) {
                if ($val['kode_jurusan'] == null) {
                    $dataUser[$i]['kode_jurusan'] = '-';
                }
            }
            if (!$dataUser) {
                $response = [
                    'status'    => false,
                    'code'      => 404,
                    'message'   => 'Data tidak ada.',
                    'data'      => null
                ];
            } else {
                $response = [
                    'status'    => true,
                    'code'      => 200,
                    'message'   => 'Success',
                    'data'      => $dataUser
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }
    public function get_user_acces_menu()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = [
                'id_group' => $data_post['user_group']
            ];
            $user_access = $this->menu->get_user_access($where)->result_array();
            foreach ($user_access as $i => $val) {
                $where = [
                    'id' => $val['id_menu'],
                ];
                $data_menu = $this->menu->get_data($where)->row_array();
                if ($data_menu['parent'] == 0) {
                    $data[] = $data_menu;
                }
            }
            foreach ($data as $i => $key) {
                $data[$i]['submenu'] = $this->menu->get_data(['parent' => $key['id']])->result_array();
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
