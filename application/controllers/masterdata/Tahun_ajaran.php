<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Tahun_ajaran.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/20/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Tahun_ajaran extends CI_Controller
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
                $res['data'] = $this->masterdata->getData('masterdata_tahun_ajaran', null, null, 'tahun_ajaran')->result_array();
            } else {
                $condition = [
                    'id' => $data_post['id']
                ];
                $res['data'] = $this->masterdata->getData('masterdata_tahun_ajaran', null, $condition)->row_array();
            }

            echo json_encode($res);
        } else {
            handler_404();
        }
    }

    public function get_data_tahun()
    {
        if ($this->input->is_ajax_request()) {
            $res = $this->masterdata->getData('masterdata_tahun_ajaran', null, null, 'tahun_ajaran')->result_array();

            rsort($res);
            $data['angkatan'][0] = [
                'id' => 0000,
                'tahun' => 'All'
            ];
            $idx = 1;
            foreach ($res as $val) {
                $tahun = (int)substr($val['id_tahun_ajaran'], 0, 4);
                if ($tahun >= 2013 && $tahun <= (int)date('Y')) {
                    $data['angkatan'][$idx]['id'] = (int)$val['id_tahun_ajaran'];
                    $data['angkatan'][$idx]['tahun'] = $val['id_tahun_ajaran'];
                    $idx++;
                }
            }
            echo json_encode($data);
        } else {
            handler_404();
        }
    }
}
