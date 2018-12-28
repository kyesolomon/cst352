<?php
//creating connection to database

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAllQuotes() {
    global $dbConn;
    
    $sql = "SELECT * FROM q_author";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    //print_r($records);
    
    foreach ($records as $record) {
        
        echo $record['quote'] . "<br>";
        
    }//end Foreach
    
} //endFunction


function displayRandomQuote() {
    global $dbConn;
    
    $randomRecord = rand(0,31);
    $sql = "SELECT * FROM q_quotes 
            NATURAL JOIN q_author  
            LIMIT $randomRecord,2";
    // $sql = "SELECT `quote`, `authorName` FROM `q_final` LIMIT $randomRecord,2";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    //print_r($records);
    
    foreach ($records as $record) {
        
        echo $record['quote'] . "<br>";
        echo "<a target='authorInfo' href='authorInfo.php?authorId=".$record['authorId']."'>";
        echo  $record['authorName'] . "<br>";
        echo "</a>";
    }
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote </title>
        <style>@import 'styles.css';</style>
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    </head>
    <body>

        <h1> Random Famous Quote </h1>

        
         <?= displayRandomQuote() ?>
         <br><br>
      
        <iframe name="authorInfo" frameborder="0" width="1000" height="500"></iframe>
        
        <!--
        //find out how many records there eare in the quotes table.
        
        -->

    </body>
</html>