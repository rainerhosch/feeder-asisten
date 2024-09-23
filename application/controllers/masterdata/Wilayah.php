<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Wilayah.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Wilayah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('masterdata/M_masterdata', 'masterdata');
    }
    public function get_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $idNegara = $data_post['id_negara'];
            $condition = [
                'id_negara' => $idNegara,
                'SUBSTR(id_wilayah, 1,3) !=' => '000'
            ];
            $res['data'] = $this->masterdata->getData('masterdata_wilayah', null, $condition, 'wilayah')->result_array();

            echo json_encode($res);
        } else {
            handler_404();
        }
    }
}
