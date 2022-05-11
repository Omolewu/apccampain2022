<?php   

$servername= "localhost";
$username = "root";
$password = "";
$databasename="Apc-Campaign-2022";
$dbc = new mysqli ($servername, $username, $password, $databasename);

if ($dbc->connect_error) {
    die( $dbc->connect_error);
}else{
    // echo ("connected");
}

?>