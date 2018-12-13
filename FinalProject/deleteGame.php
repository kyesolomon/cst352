<?php
//session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include 'sql/vGconnection.php';
$dbConn = dbConnection("vidBox");

$sql = "DROP videoGames.gameId WHERE gameId = " . $_GET['gameId'];
$stmt = $dbConn->prepare($sql);
// $stmt->execute();
if ($stmt->execute()) { 
   echo "Video game deleted from vidBox";
} else {
   echo "ERROR";
}

header("Location: index.php");

?>