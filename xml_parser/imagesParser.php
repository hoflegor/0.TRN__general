<?php

function imagesParser($url, $path)
{
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    $raw = curl_exec($ch);
    curl_close($ch);

    $fp = fopen($path . basename($url), 'x');

    fwrite($fp, $raw);

    fclose($fp);
}


