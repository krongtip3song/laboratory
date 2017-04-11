<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 12/4/2560
 * Time: 1:11
 */
$file = $_GET['idfile'];
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}