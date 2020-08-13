<?php
    error_reporting(0);
    $servername = $_GET["servername"];
    $port = $_GET["port"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $dbname = $_GET["dbname"];

    $travinh_conn = "host=".$servername." port=".$port." dbname=".$dbname." user=".$username." password=".$password;
    $travinh_db = pg_connect($travinh_conn);

    $khanh = "cụabsuicajs";
    if (!$travinh_db) {
        echo "fail";
        exit;
    } else {
        echo "success";
    }

