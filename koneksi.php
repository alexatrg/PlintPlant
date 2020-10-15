<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "sw5_uas";

    try{
        $dbConn = new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUsername,$dbPassword);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $err){
        echo $err->getMessage();
    }
?>