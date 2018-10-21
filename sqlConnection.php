<?php
// creating connection to database

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function getConnection($dbname) {
    $host = "localhost";  //c9
    //$dbname = "quotes";
    $username = "root";
    $password = "";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>