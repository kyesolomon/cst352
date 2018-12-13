<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include 'sql/vGconnection.php';
$dbConn = dbConnection("c9");

function displayAllGames(){
    global $dbConn;
    
    $sql = "SELECT gameId, title, genre, developer, releaseYear
              FROM videoGames
              ORDER BY title";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($games as $game) {
        
        
        echo "<a   class='btn btn-primary' role='button' href='updateGame.php?gameId=".$game['gameId']."'>update</a> ";
        //echo "[<a href='deleteAuthor.php'>delete</a>] ";
        echo "<form action='deleteGame.php' onsubmit='return confirmDelete()' >";
        echo "  <input type='hidden' name='gameId' value='" . $game['gameId']. "' >";
        echo "  <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form> ";
        echo "<p> " . $game['title'] . "  " . $game['genre'] . "</p>  ";
        echo "<span class='developer'>";
        echo $game['developer'] . "<br><br>";
        echo "</span>";
        echo "<hr>";
        
    }
}

function displayGameAVG() {
    global $dbConn;
    $sql = "SELECT ROUND(AVG(price),2) AS avg FROM `videoGames`";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $avgGames = $stmt->fetch(PDO::FETCH_ASSOC); 
    
    echo $avgGames['avg'];
}

function displayNumGames() {
    global $dbConn;
    $sql = "SELECT COUNT(title) AS num FROM `videoGames`";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $numGames = $stmt->fetch(PDO::FETCH_ASSOC); 
    
    
    echo $numGames['num'];
    // print_r($numGames);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
        
        <meta charset="utf-8">
  
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
    
        <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!--<link rel="stylesheet" type="text/css" href="css/styles.css">-->
        <style>
            
            form {
                display:inline-block;
            }
            body {
                background-image: url("https://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                background: cadetblue;
            }
            
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                
                overflow:scroll;
            }
            h1, h4{
                color: white;
                font-family: 'Bungee', cursive;
            }
            .welcome{
                color: white;
                font-family: 'Bungee', cursive;
            }
            .center {
                text-align:center;
            }
            
        </style>
        
        <script>
            
                function confirmDelete() {
                   var confirmID =  confirm("Do you really want to delete this game?");
                   if(confirmID)
                   {
                        return true;
                   }
                }            
                
              
                
        </script>
        
    </head>
    
    <body>
        <div class="center">
        <h1>  Admin Section</h1>
        <span class="welcome">Welcome <?= $_SESSION['adminName'] ?></span>
        <br>
        <h4 > Number of Games in DB: <?= displayNumGames(); ?></h4>
        <h4> Average Price of Games in DB: $<?= displayGameAVG(); ?></h4>
        <br>
        <br>
        <form action="logout.php">
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="logout" value="Logout"/>
        </form>
        
        <form action="index.php">
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="logout" value="searchGames"/>
        </form>
        </div>
        
        <br><hr><br>
        <div class="jumbotron">
            
            <?=displayAllGames()?>
        
        </div>
        <br /> <br />
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>