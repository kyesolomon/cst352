<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

$sql = "DELETE FROM q_author WHERE authorId = " . $_GET['authorId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();

echo "Author was deleted!";

header("Location: main.php");

?>