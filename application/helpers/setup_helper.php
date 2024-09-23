<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : setup_helper.php
 *  File Type             : Helper
 *  File Package          : CI_Helper
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'Code for change the world'
 */
function check_config($data = null)
{
    $filename = 'database.php';
    $filePath = APPPATH . '/config' . '/';
    $file = $filePath . $filename;
    include($file);
    if ($db['default']['database'] == '') {
        redirect(base_url('installation/Fa_config'));
    }
}
function installation($data = null)
{
    $createDB = create_database($data['conf_database']);
    if ($createDB['status'] == true) {
        $updateConfigDB = create_dbconfig($data);
        if ($updateConfigDB['status'] == true) {
            return TRUE;
        } else {
            echo json_encode($updateConfigDB);
        }
    } else {
        echo json_encode($createDB);
    }
}

function create_dbconfig($data)
{
    $filename = 'database.php';
    $filePath = APPPATH . '/config' . '/';
    $file = $filePath . $filename;
    $filedata = file($file);
    $newdata = array();
    $data_param = [
        0 => [
            'param' => "'hostname' => 'localhost'",
            'set_update' => "\t'hostname' => '" . $data['conf_hostname'] . "',\n"
        ],
        2 => [
            'param' => "'username' => 'root'",
            'set_update' => "\t'username' => '" . $data['conf_username'] . "',\n"
        ],
        3 => [
            'param' => "'password' => ''",
            'set_update' => "\t'password' => '" . $data['conf_password'] . "',\n"
        ],
        4 => [
            'param' => "'database' => ''",
            'set_update' => "\t'database' => '" . $data['conf_database'] . "',\n"
        ],
    ];
    $newtext = "\t'hostname' => '" . $data['conf_hostname'] . "',\n";

    foreach ($filedata as $i => $filerow) {
        foreach ($data_param as $j => $val) {
            if (strstr($filerow, $data_param[$j]['param']))
                $filerow = $data_param[$j]['set_update'];
        }
        $newdata[] = $filerow;
    }

    // echo '<pre>';
    // var_dump($data_param);
    // echo '</pre>';
    // die;
    $update_config = file_put_contents($file, $newdata);
    if ($update_config) {
        $response = [
            'status' => true,
            'msg'   => 'SUCCESS UPDATE CONFIG DB.'
        ];
    } else {
        $response = [
            'status' => false,
            'msg'   => 'ERROR UPDATE CONFIG DB.'
        ];
    }
    return $response;
}

function create_database($dbname)
{
    $ci = get_instance();
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $result = $ci->db->query($sql);
    if ($result) {
        $response = [
            'status' => true,
            'msg'   => 'SUCCESS CREATE DB ' . $dbname . ''
        ];
    } else {
        $response = [
            'status' => true,
            'msg'   => 'ERROR CREATE DB ' . $dbname . ''
        ];
    }
    return $response;
}
