<?php

// VARIABEL KONEKSI
    $server     = "localhost";
    $user       = "root";
    $passw      = "";
    $db    = "db_spp";

// KONEKSI KE DATABASE
$koneksi = mysqli_connect($server,$user,$passw,$db);
// Koneksi Secara Prosedural
$mysqli=new mysqli($server,$user,$passw,$db);
$mysqli->select_db($db);
$mysqli->query("SET NAMES 'utf8'");
$database=$db;
// CEK KONEKSI

if($koneksi){
    // echo "Koneksi Suksses";
} else {
    echo "Koneksi Gagal";
    echo "<br>".mysqli_connect_error();
}       