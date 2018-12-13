<?php


include "../sql/vGconnection.php";
$dbConn = dbConnection("c9");


if(!isset($_GET['submitBtn']))
{
    global $dbConn; 
    global $search;
    function getGameInfo()
    {
        $search = $_GET['gameSearch'];
        global $dbConn;
        $sql = "SELECT * FROM `videoGames` 
                NATURAL join sellerInfo 
                NATURAL join consoleInfo WHERE title LIKE :search";
        $statement = $dbConn->prepare($sql);
        $statement->execute(array(":search" => '%'. $search .'%'));
        $gameInfo = $statement->fetch();
        return $gameInfo;
        
    }
    $game = getGameInfo();
    
    
    echo json_encode($game); 


}

?>