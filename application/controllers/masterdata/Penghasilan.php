<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Penghasilan.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Penghasilan extends CI_Controller
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
            if ($data_post == null) {
                $res['data'] = $this->masterdata->getData('masterdata_penghasilan', null, null, 'penghasilan')->result_array();
            } else {
                $condition = [
                    'id_penghasilan' => $data_post['id']
                ];
                $res['data'] = $this->masterdata->getData('masterdata_penghasilan', null, $condition)->row_array();
            }

            echo json_encode($res);
        } else {
            handler_404();
        }
    }
}
