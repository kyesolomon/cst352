<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include 'sql/vGconnection.php';
$dbConn = dbConnection("c9");

function getGameInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM 'videoGames' WHERE gameId = "  . $_GET['gameId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;

}

if (isset($_GET['gameId'])) {
    
  $gameInfo = getGameInfo();
  //print_r($authorInfo);
  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h2><?=$gameInfo['title']?> <?=$gameInfo['genre']?></h2>
         <?=$gameInfo['description']?><br>
        <img src="<?=$gameInfo['imgUrl']?>" height="100" />
    </body>
</html>