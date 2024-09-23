<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Auth.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_config();
        $this->load->model('manajemen/M_user', 'user');
    }

    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'v_login';
        $this->load->view('template', $data);
    }

    function process_login()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $condition = [
                'username' => $data_post['username'],
            ];
            $cek_user = $this->user->get_data($condition)->row_array();
            if ($cek_user) {
                $verif_password = password_verify($data_post['password'], $cek_user['password']);
                if ($verif_password) {
                    $data_session = [
                        'user_id' => $cek_user['id'],
                        'username' => $cek_user['username'],
                        'email' => $cek_user['email'],
                        'fullname' => $cek_user['first_name'] . ' ' . $cek_user['last_name'],
                        'role' => $cek_user['id_group'],
                        'is_login' => true
                    ];
                    $this->session->set_userdata($data_session);
                    $response = [
                        'status'    => true,
                        'code'      => 200,
                        'message'   => 'Success',
                        'data'      => $cek_user
                    ];
                } else {
                    $response = [
                        'status'    => false,
                        'code'      => 403,
                        'message'   => 'Password salah.',
                        'data'      => 1
                    ];
                }
            } else {
                $response = [
                    'status'    => false,
                    'code'      => 404,
                    'message'   => 'Data pengguna tidak ditemukan.',
                    'data'      => 0
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}
