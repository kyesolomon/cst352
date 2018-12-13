




<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include 'sql/vGconnection.php';
$dbConn = dbConnection("vidBox");

function displayAllGames(){
    global $dbConn;
    
    $sql = "SELECT title, genre, developer, releaseYear
              FROM videoGames
              ORDER BY title";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($games as $game) {
        
        echo "<div class='main'>";
        echo "<a   class='btn btn-primary' role='button' href='updateGame.php?gameId=".$game['gameId']."'>update</a> ";
        //echo "[<a href='deleteAuthor.php'>delete</a>] ";
        echo "<form action='deleteGame.php'  onsubmit='return confirmDelete()'  >";
        echo "  <input type='hidden' name='gameId' value='".$game['gameId']."' >";
        echo "  <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form> ";
        echo "<a onclick='openModal()' target='gameModal'  href='gameInfo.php?gameId=".$game['gameId']."'> " . $game['title'] . "  " . $game['genre'] . "</a>  ";
        echo "<span class='developer'>";
        echo $game['developer'] . "<br><br>";
        echo "</span>";
        echo "</div>";
        
    }
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
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                
            }
            
        </style>
        
        <script>
            
                function confirmDelete() {
                   return confirm("Do you really want to delete this author?");
                }            
                
                function openModal() {
                    
                    $('#myModal').modal("show");
                    
                }
                
        </script>
        
    </head>
    
    <body>
        <div class="center">
        <h1>  Admin Section</h1>
        <span class="welcome">Welcome <?= $_SESSION['adminName'] ?></span>
        </div>
        
        <br><hr><br>
        <div class="center">
       
        <form action="logout.php">
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="logout" value="Logout"/>
        </form>
        
        <form action="index.php">
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="logout" value="searchGames"/>
        </form>
        </div>
        <br /> <br />
        
        <?=displayAllGames()?>
        
        
        

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Game Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="gameModal" width='450'height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>