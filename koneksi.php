<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_simulasi_pbo_ti_1d_enzinaufalfaiz";

$db = mysqli_connect($host, $user, $pass, $dbname);

if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>