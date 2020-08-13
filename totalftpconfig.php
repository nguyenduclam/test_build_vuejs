<?php
    error_reporting(0);
    $servername = $_GET["servername"];
    $port = $_GET["port"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $path = $_GET["path"];

    $conn_id = ftp_connect($servername) or die("Couldn't connect to $servername");
    $login_result = ftp_login($conn_id, $username, $password);

    if((!$conn_id) || (!$login_result))
    {
        echo "fail";
    }
    else
    {
        echo "success";
        ftpCreateFolderIfNotExist($conn_id,$path);
    }

//Create Folder trên ftp
function ftpCreateFolderIfNotExist($conn_id,$folderPath)
{
    $parts = explode('/',$folderPath);
    foreach($parts as $part){
        if(!@ftp_chdir($conn_id, $part))
        {
            ftp_mkdir($conn_id, $part);
            ftp_chdir($conn_id, $part);
        }
    }
    //Chỉ định conn_id quay lại thư mục gốc
    ftp_chdir($conn_id, "\\");
}
