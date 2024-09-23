<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Prodi.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('import/M_prodi', 'prodi');
    }

    public function get_data()
    {
        if ($this->input->is_ajax_request()) {
            $data = [];
            $condition = [
                'id !=' => '99'
            ];
            $dataProdi = $this->prodi->get_data($condition)->result_array();
            $data = $dataProdi;
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
