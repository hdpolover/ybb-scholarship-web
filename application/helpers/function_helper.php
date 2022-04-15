<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64')) {
    function convertToBase64($path)
    {
        // $path = FCPATH.$path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}

if (!function_exists('ej')) {
    function ej($params)
    {
        echo json_encode($params);

        exit;
    }
}