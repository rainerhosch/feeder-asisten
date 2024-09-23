<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Sync_feeder.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Sync_feeder extends CI_Controller
{
    private $__token__ = '';
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('masterdata/M_masterdata', 'masterdata');
        $this->load->model('manajemen/M_config_feeder', 'feeder');
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

    public function cek_data()
    {
        if ($this->input->is_ajax_request()) {
            $dataConfig = $this->feeder->get_data()->row();

            // $this->__token__ = get_token();
            $data_post = $this->input->post('table');
            foreach ($data_post as $i => $val) {
                $convert_str = explode(" ", $val);

                if (count($convert_str) === 1) {
                    $str = $convert_str[0];
                    $nm_tbl = $convert_str[0];
                    $param = $convert_str[0];
                } else {
                    $str = $convert_str[0] . '_' . $convert_str[1];
                    $nm_tbl = $convert_str[0] . " " . $convert_str[1];
                    $param = $convert_str[0] . $convert_str[1];
                }

                $table = 'masterdata_' . strtolower($str);
                $field = [
                    0 => 'id_' . strtolower($str),
                    1 => 'nama_' . strtolower($str),
                ];
                $data_simak = $this->masterdata->getData($table, $field)->result_array();
                $jml_simak = count($data_simak);

                // Get Feeder Data
                // $paramFeeder = [
                //     "act" => "Get" . $param,
                //     "token" => get_token($dataConfig),
                //     "filter" => "",
                //     "limit" => "",
                //     "offset" => ""
                // ];
                // $response = service_request($paramFeeder, $dataConfig);
                // $responseArray = json_decode(json_encode($response), true);

                // $message =  $responseArray['error_desc'];
                // // var_dump($response);
                // // die;
                // if ($responseArray['error_desc'] == '') {
                //     $message = 'Data sudah sesuai.';
                // }
                // if ($responseArray['error_code'] == 0) {
                //     $jml_feeder = count($responseArray['data']);
                // } else {
                //     $jml_feeder = 0;
                // }

                $data[] = [
                    'id' => $str,
                    'table' => $nm_tbl,
                    'simak' => $jml_simak,
                    // 'feeder' => $jml_feeder,
                    // 'msg'   => $message
                ];
            }
            // var_dump($paramFeeder);
            // die;

            $response = [
                'status' => true,
                'msg' => 'success',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => false,
                'msg' => 'Invalid Request',
                'data' => null
            ];
        }
        echo json_encode($response);
    }



    public function syncData()
    {
        if ($this->input->is_ajax_request()) {
            $dataConfig = $this->feeder->get_data()->row();
            $data_post = $this->input->post('table');
            $cek_post = explode(" ", $data_post);

            if (count($cek_post) === 1) {
                $create_table = $cek_post[0];
                $param = $cek_post[0];
            } else {
                $create_table = $cek_post[0] . '_' . $cek_post[1];
                $param = $cek_post[0] . $cek_post[1];
            }
            $table = 'masterdata_' . strtolower($create_table);
            $data_simak = $this->masterdata->getData($table)->num_rows();

            $paramFeeder = [
                "act" => "Get" . $param,
                "token" => get_token($dataConfig),
                "filter" => "",
                "limit" => "",
                "offset" => $data_simak
            ];
            // var_dump($paramFeeder);
            // die;
            $response = service_request($paramFeeder, $dataConfig);
            $responseArray = json_decode(json_encode($response), true);
            // dump($responseArray);
            // die;
            if ($responseArray['error_code'] == 0) {
                foreach ($responseArray['data'] as $data) {
                    $insert = $this->masterdata->insertData($table, $data);
                    // var_dump($this->db->last_query());
                    // die;
                }
                $response = [
                    'status' => true,
                    'code' => $responseArray['error_code'],
                    'msg' => 'Sync ' . $data_post . ' Berhasil',
                ];
            } else {
                $response = [
                    'status' => false,
                    'code' => $responseArray['error_code'],
                    'msg' => $responseArray['error_desc'],
                ];
            }
        } else {
            $response = [
                'status' => false,
                'msg' => 'Invalid Request'
            ];
        }
        echo json_encode($response);
    }
}