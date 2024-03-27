<?php


if (!function_exists("saveImg")) {
    function saveImg($nameImage, $tempImage)
    {
        $folder = FCPATH . 'img/';
        $infoExtension = explode('.', $nameImage);
        $extension = $infoExtension[1];
        $permitte_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $random = substr(str_shuffle($permitte_chars), 0, 10);
        $nameImg = $random . '.' . $extension;

        if (!file_exists($folder)) {
            mkdir($folder, 0777);
        }

        $route = $folder . $nameImg;
        move_uploaded_file($tempImage, $route);
        return $nameImg;
    }
}

if (!function_exists('deleteImg')) {
    function deleteImg($imageName)
    {

        if ($imageName && file_exists(FCPATH . 'img/' . $imageName)) {

            unlink(FCPATH . 'img/' . $imageName);



            return true;
        }

        return false;
    }
}
