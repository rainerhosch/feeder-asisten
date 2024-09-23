<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : feeder_helper.php
 *  File Type             : Helper
 *  File Package          : CI_Helper
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'Code for change the world'
 */
function dump($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function get_token(object $data)
{
    if (check_token($data)['status'] == '1') {
        return check_token($data)['token'];
    } else {
        return check_token($data)['error'];
        //exit();
    }
}
function check_token(object $config)
{
    $ci = get_instance();
    // $ci->db->select('username, password');
    // $ci->db->from('conf_feeder');
    // $ci->db->where();
    // $config = $ci->db->get()->row();
    if (isset($config)) {
        $dec_username = mfaDecrypt($config->username);
        $dec_password = mfaDecrypt($config->password);
        if ($dec_username != null || $dec_password != null) {
            $data = array(
                'act' => 'GetToken',
                'username' => mfaDecrypt($config->username),
                'password' => mfaDecrypt($config->password)
            );
            $result = service_request($data, $config);
            // dump($result);
            // die;
            if ($result->error_code == 0) {
                $token = $result->data->token;
                $data_param = [
                    'token' => $token,
                    'act' => 'GetProfilPT'
                ];
                $response = service_request($data_param, $config);
                $data_pt = $response->data[0];
                $data_session = [
                    'message' => 'Terhubung ke feeder, ' . $data_pt->nama_perguruan_tinggi,
                    'icon' => '<i class="fa fa-chain"></i>'
                ];
                $array_return = [
                    'status' => 1,
                    'error' => $ci->session->set_flashdata($data_session),
                    'token' => $token
                ];
                return $array_return;
            } else {
                $data_session = [
                    'message' => $result->error_desc,
                    'icon' => '<i class="fa fa-chain-broken"></i>'
                ];

                $array_return = [
                    'status' => 0,
                    'error' => $ci->session->set_flashdata($data_session),
                    'token' => ''
                ];
                return $array_return;
                //exit();
            }
        } else {
            $data_session = [
                'message' => 'Username atau password Feeder, tidak valid.!',
                'icon' => '<i class="fa fa-chain-broken"></i>'
            ];
            $array_return = [
                'status' => 0,
                'error' => $ci->session->set_flashdata($data_session),
                'token' => null
            ];
            return $array_return;
        }
    } else {
        $data_session = [
            'message' => 'Data config feeder tidak ditemukan.!',
            'icon' => '<i class="fa fa-chain-broken"></i>'
        ];
        $array_return = [
            'status' => 0,
            'error' => $ci->session->set_flashdata($data_session),
            'token' => null
        ];
        return $array_return;
    }
}
function get_api_endpoint(object $config)
{
    $url = 'http://' . $config->host . ':' . $config->port . '/ws/live2.php'; // gunakan live
    return $url;
}

function service_request($data, object $config)
{
    $url = get_api_endpoint($config);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = 'Content-Type: application/json';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    $data = json_encode($data);

    // dump($data);
    // die;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    if ($result == null) {
        $res = [
            'error_code' => 500,
            'error_desc' => 'Tidak dapat terhubung ke FEEDER, pastikan HOST atau PORT sudah sesuai.',
            'data' => NULL
        ];
        $result = json_encode($res);
    }
    curl_close($ch);
    // dump($result == null);
    // print_r($result);
    // die;

    return json_decode($result);
}