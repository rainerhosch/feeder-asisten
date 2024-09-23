<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Config.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : dd/mm/yyyy
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Config extends CI_Controller
{
    private $__token__ = '';
    public function __construct()
    {
        parent::__construct();
        login_check();
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

    function get_data()
    {
        // dump();
        // die;
        if ($this->input->is_ajax_request()) {
            $data = [];
            $Conf = $this->feeder->get_data()->row();
            if (count((array)$Conf) > 0) {
                $this->__token__ = get_token($Conf);
                $dataConfig = $this->feeder->get_data()->result_array();
                $data = $dataConfig;
                foreach ($dataConfig as $i => $val) {
                    if (isset($this->__token__)) {
                        $data[$i]['status_connected'] = "Y";
                        $data_param = [
                            'token' => $this->__token__,
                            'act' => 'GetProfilPT'
                        ];
                        $response = service_request($data_param, $Conf);
                        $data_pt = $response->data[0];
                        $data[$i]['nm_lembaga'] = $data_pt->nama_perguruan_tinggi;
                    }
                    $data[$i]['username'] = mfaDecrypt($val['username']);
                }
                if (!$data) {
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
                        'data'      => $data
                    ];
                }
            } else {
                $response = [
                    'status'    => false,
                    'code'      => 500,
                    'message'   => 'Data config feeder tidak ada.',
                    'data'      => null
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    function insert_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $data_insert = [
                'id_pt'        => null,
                'username'          => mfaEncrypt($data_post['username']),
                'password'          => mfaEncrypt($data_post['password']),
                'host'              => $data_post['host'],
                'port'              => $data_post['port'],
                // 'id_sp'             => null,
                // 'live'              => '',
                // 'status_connected'  => '',
            ];
            $insert = $this->feeder->insert_data($data_insert);
            if (!$insert) {
                $response = [
                    'status'    => false,
                    'code'      => 500,
                    'message'   => 'Inisialisasi gagal..',
                    'data'      => null
                ];
            } else {
                $response = [
                    'status'    => true,
                    'code'      => 200,
                    'message'   => 'Success',
                    'data'      => 1
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function delete_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $delete = $this->feeder->delete_data(['id' => $data_post['id']]);
            if (!$delete) {
                $response = [
                    'status'    => false,
                    'code'      => 500,
                    'message'   => 'Internal Server Error',
                    'data'      => null
                ];
            } else {
                $response = [
                    'status'    => true,
                    'code'      => 200,
                    'message'   => 'Data konfig berhasil dihapus',
                    'data'      => 1
                ];
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }
}
