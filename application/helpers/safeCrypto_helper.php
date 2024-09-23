<?php
function stringInsert($str, $insertstr, $pos)
{
    $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
    return $str;
}
function mfaEncrypt($data_array)
{
    $salt = "MFA";
    $array_data = array($data_array);
    $dt = json_encode($data_array);
    $encode_json = base64_encode($dt);
    $json_after_salt = stringInsert($encode_json, $salt, 3);

    return $json_after_salt;
}

function mfaDecrypt($data)
{
    $replace_encode = substr_replace($data, '', 3, 3);
    $decode = base64_decode($replace_encode);
    $json_sys = json_decode($decode);
    // if ($json_sys == null) {
    //     return 'Invalid data.';
    // }
    return $json_sys;
}
