<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

 include 'sql/vGconnection.php';
 $dbConn = dbConnection("vidBox");

$sql = "DELETE FROM `videoGames` WHERE `gameId` = " . $_GET['gameId'];


$statement = $dbConn->prepare($sql);
$statement->execute();

// kye's attempt: deletes admin instead of record
// if ($stmt->execute()) { 
//   echo "Video game deleted from vidBox";
// } else {
//   echo "ERROR";
// }

header("Location: main.php");

?>