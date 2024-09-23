<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Kebutuhan_khusus.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Kebutuhan_khusus extends CI_Controller
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
                // $condition = [
                //     'SUBSTR(nama_kebutuhan_khusus, 3, 1)=' => '-'
                // ];
                $res['data'] = $this->masterdata->getData('masterdata_kebutuhan_khusus', null, null, 'kebutuhan_khusus')->result_array();
            } else {
                $condition = [
                    'id_kebutuhan_khusus' => $data_post['id']
                ];
                $res['data'] = $this->masterdata->getData('masterdata_kebutuhan_khusus', null, $condition)->row_array();
            }

            echo json_encode($res);
        } else {
            handler_404();
        }
    }
}
