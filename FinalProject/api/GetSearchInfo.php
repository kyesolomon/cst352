<?php
include "../sql/vGconnection.php";
$dbConn = dbConnection("c9");

$search = $_GET['gameSearch'];

function showGame()
{
    global $search;
    global $dbConn;
    
    $sql = "SELECT title
            FROM videoGames
            WHERE title = :search";
            
    // SELECT title from videoGames where title LIKE "c%"        
             
    $stmt = $dbConn->prepare($sql);
    
    $stmt->execute(array(":search" => $search));
    
    $games = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $games;
    
}
    $games = showGame();

    echo json_encode($games);
?>