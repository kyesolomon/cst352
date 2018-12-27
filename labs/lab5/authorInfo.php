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
  echo "<img src='" . $record['imgUrl']. "'<br><br>";
  echo "<div id=\"infoBox\">";
  echo "Born: " . $record['dob'] . "<br>";
  echo "Died: ". $record['dod'] . "<br>";
  echo "Gender: " . $record['gender'] . "<br>";
  echo "Country of Origin: " . $record['coo'] . "<br>";
  echo "Profession: " . $record['profession'] . "<br>";
  echo "Bio: " . $record['bio'];
  echo "</div>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
        <style>@import 'styles.css';</style>
    </head>
    <body>

        <h2> Author Info <br></h2>
        <?=displayAuthorInfo()?>
        
        
    </body>
</html>