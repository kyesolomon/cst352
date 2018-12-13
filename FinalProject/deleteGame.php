<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include 'sql/vGconnection.php';
$dbConn = dbConnection("vidBox");

$sql = "DELETE FROM videoGames WHERE gameId = ".$_GET['gameId'];

$statement = $dbConn->prepare($sql);
$statement->execute();


header("Location: main.php");

?>