<?php

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAuthorInfo(){
  global $dbConn;
  
  $authorId = $_GET['authorId'];
  
  $sql = "SELECT * FROM q_author WHERE authorId = $authorId";
  
  $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $record = $stmt->fetch(PDO::FETCH_ASSOC); //We expect only ONE record
 
  //print_r($record);
  
  echo "Bio: " . $record['bio'] . "<br>";
  echo "Day of Birth" . $record['dob'] . "<br>";
  echo "Day of Dead: ". $record['dod'] . "<br>";
 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
    </head>
    <body>

        <h2> Author Info </h2>

        <br>
        
        <?=displayAuthorInfo()?>
        
    </body>
</html>