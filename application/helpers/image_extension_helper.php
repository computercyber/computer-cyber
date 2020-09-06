<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");

function get_mimes_from_url($resource, $fileName, $pathTo)
{
    $typeString = null;
    $typeInt = exif_imagetype($resource);
    switch ($typeInt) {
        case IMG_GIF:
            $typeString = 'gif';
            break;
        case IMG_JPG:
            $typeString = 'jpg';
            break;
        case IMG_JPEG:
            $typeString = 'jpeg';
            break;
        case IMG_PNG:
            $typeString = 'png';
            break;
        case IMG_WBMP:
            $typeString = 'wbmp';
            break;
        case IMG_XPM:
            $typeString = 'xpm';
            break;
        default:
            $typeString = 'unknown';
    }

    $img = $pathTo . $fileName;
    file_put_contents($img, file_get_contents($resource));
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */