<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}


include 'sql/vGconnection.php';
$dbConn = dbConnection("vidBox");

function getGameInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `videoGame` WHERE gameId = "  . $_GET['gameId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateGameForm'])) { // User submitted the form
    
    $sql = "UPDATE `videoGames` 
            SET   title = :title,
                  genre  = :genre,
                  developer    = :developer,
                  imgUrl       = :imgUrl,
                  releaseYear      = :releaseYear,
                  description = :description,
                  price   = :price
                  
                  
              WHERE gameId = " . $_GET['gameId'];
    $np = array();
    $np[":title"] = $_GET['title'];
    $np[":genre"]  = $_GET['genre'];
    $np[":developer"]       = $_GET['developer'];
    $np[":imgUrl"]       = $_GET['imgUrl'];
    $np[":releaseYear"] = $_GET['releaseYear'];
    $np[":description"]    = $_GET['description'];
    $np[":price"]    = $_GET['price'];
    
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Game info was updated!";
    
}



if (isset($_GET['gameId'])) {
    
    $authorInfo = getGameInfo();
    //print_r($authorInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Game </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            h1, p, input{
                font-family: 'Bungee', cursive;
                
            }
            h1 {
                text-align: center;
                color: white;
            }
            .btn {
                float: right;
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                
            }
            body {
                background-image: url("https://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                /*background-color: #38343e;*/
            }
            #searchGames {
                background: white;
            }
            .modal-body{
                background-image: url("img/modalBack.jpg");
                color: white;
            }
            .modal-footer{
                background: white;
            }
            #attr{
                color: #e6d5e6; 
                
            }
            
        </style>
    </head>
    <body>
        
        <h1> Updating Game Info </h1>
        <br><br>
          <form>
            <div class="upgame">
                <div class="jumbotron">
                <input type="hidden" name="gameId" value="<?= $gameInfo['gameId'] ?>" />
                <span class="title">Title:</span> <input type="text" name="title" value="<?= $gameInfo['title'] ?>" /> <br />
                <span class="genre">Genre:</span> <input type="text" name="genre"   value="<?= $gameInfo['genre'] ?>"/> <br />
                <span class="developer">Developer:</span> 
                <span class="url">Image URL:</span> <input type="text" name="imageUrl" value="<?= $authorInfo['imgUrl'] ?>" size="40"/><br>
                <span class="ry">Release Year:</span> <input type="text" name="ry"  value="<?= $gameInfo['releaseYear'] ?>"/> <br />
                <span class="description">Description:</span>
                <textarea name="description" cols="50" rows="5"/> <?= $gameInfo['description'] ?> </textarea><br>
                
               <span class="price"> Price:</span> <input type="text" name="price"   value="<?= $gameInfo['price'] ?>"/> <br><br>
    
                <input type="submit" value="Update Game" name="updateGameForm" />
                </div>
            </div>
        </form>
        
        
        
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
        <iframe name="authorModal" width='450'height='200'></iframe>
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