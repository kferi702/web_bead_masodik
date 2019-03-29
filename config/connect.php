<?php

    $host = '127.0.0.1';
    $susername = 'root';
    $spassword = '';
    $db = 'beadbazis_kovacs_ferenc';
    $port = '3306';

    $conn = new mysqli($host, $susername, $spassword, $db, $port);

    if ($conn ===FALSE) {
        die("Hiba a csatlakozásnál ");
    }
    if (!$conn ->set_charset("utf8")){
    echo "A karakterkódolást nem sikerült beállítani!";
    }



