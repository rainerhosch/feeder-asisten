<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Jenjang_pendidikan.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Jenjang_pendidikan extends CI_Controller
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
                $res['data'] = $this->masterdata->getData('masterdata_jenjang_pendidikan', null, null, 'jenjang_didik')->result_array();
            } else {
                $condition = [
                    'id_jenjang_didik' => $data_post['id']
                ];
                $res['data'] = $this->masterdata->getData('masterdata_jenjang_pendidikan', null, $condition)->row_array();
            }

            echo json_encode($res);
        } else {
            handler_404();
        }
    }
}