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

if (!function_exists("updateImg")) {
    function updateImg($old_image_name, $new_image)
    {
        $folder = "public/img/";

        // Eliminar la imagen antigua si existe
        $old_image_path = $folder . $old_image_name;
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        // Obtener la información de la nueva imagen
        $new_image_name = $new_image['name'];
        $new_image_tmp = $new_image['tmp_name'];

        // Obtener la extensión de la imagen
        $infoExtension = pathinfo($new_image_name);
        $extension = $infoExtension['extension'];

        $permitte_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

        // Generar un nombre aleatorio para la nueva imagen
        $random = substr(str_shuffle($permitte_chars), 0, 10);
        $new_image_name = $random . '.' . $extension;

        // Carpeta de destino para guardar la nueva imagen
        $destination = $folder . $new_image_name;

        // Mover la nueva imagen al directorio de destino
        if (!move_uploaded_file($new_image_tmp, $destination)) {
            // Manejar errores si falla la carga de la imagen
            return false;
        }

        return $new_image_name;
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
