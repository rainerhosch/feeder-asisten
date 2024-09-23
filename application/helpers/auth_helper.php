<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : auth_helper.php
 *  File Type             : Helper
 *  File Package          : CI_Helper
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'Code for change the world'
 */
function login_check()
{
    $ci = get_instance();
    $user_id = $ci->session->userdata('user_id');
    if ($user_id === null) {
        $ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda tidak mempunyai akses, silahkan login!</div>');
        redirect('auth');
    }
}

function handler_404()
{
    $ci = get_instance();
    $data['title'] = '404';
    $data['content'] = 'layout/my_error';
    $ci->output->set_status_header('404');
    $ci->load->view('template', $data);
}
