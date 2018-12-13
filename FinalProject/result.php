<?php
session_start();




if(isset($_GET['addGameForm']))
{
    include "sql/vGconnection.php";
    $dbConn = dbConnection("c9");
    
    
    $title = $_GET['gameTitle'];
    $price = $_GET['gamePrice'];
    $genre = $_GET['gameGenre'];
    $imgUrl = $_GET['gameURL'];
    $sellerId = $_GET['gameSeller'];
    
    $developer = $_GET['gameDeveloper'];
    $consoleId = $_GET['gameConsole'];
    $releaseYear =$_GET['gameYear'];
    
    $description = $_GET['gameDescription'];
    
    $sql = "INSERT INTO videoGames2(gameId, title, genre, developer, imgUrl, releaseYear, description, consoleId, sellerId, price)
            VALUES(NULL, :title, :genre, :developer, :imgUrl, :releaseYear, :description, :consoleId, :sellerId, :price);";
            
    $nameParameters = array();

    $nameParameters[":title"] = $title;
    $nameParameters[":genre"] = $genre;
    $nameParameters[":developer"] = $developer;
    $nameParameters[":imgUrl"] = $imgUrl;
    $nameParameters[":releaseYear"] = $releaseYear;
    $nameParameters[":description"] = $description;
    $nameParameters[":consoleId"] = $consoleId;
    $nameParameters[":sellerId"] = $sellerId;
    $nameParameters[":price"] = $price;
    
    $statement = $dbConn->prepare($sql);
    $statement->execute($nameParameters);
    
    
}





?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Game</title>
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
         <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
             <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>
            
        </title>
        
        <style>
            h1, p, input{
                font-family: 'Bungee', cursive;
                
            }
            .btn {
                float: right;
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                height: 400px;
                overflow:scroll;
                
            }
            body {
                background-image: url("https://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                /*background-color: #38343e;*/
            }
            #searchGames {
                background: white;
            }
            
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1>Dont see the game you like? Add it </h1>
            <hr>
            <form>
              <div class="form-group">
                
                <input type="text" id="title" name="gameTitle" class="form-control" id="exampleFormControlInput1" placeholder="Title of Game">
                <p id="ErrorMessage"></p>
              </div>
              
              <div class="form-group">
                
                <input type="text" class="form-control" name="gameGenre" id="exampleFormControlInput1" placeholder="Genre">
              </div>
              
              <div class="form-group">
                
                <input type="text" class="form-control" name="gamePrice" id="exampleFormControlInput1" placeholder="Price">
              </div>
              
              <div class="form-group">
                
                <input type="text" class="form-control" name="gameDeveloper" id="exampleFormControlInput1" placeholder="Publisher / Developer">
              </div>
              
              <div class="form-group">
                
                <input type="text" class="form-control" name="gameURL" id="exampleFormControlInput1" placeholder="image URL of game">
              </div>
              
              <div class="form-group">
                
                <input type="text" class="form-control" name="gameYear" id="exampleFormControlInput1" placeholder="Year Of Release">
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Seller</label>
                <select name="gameSeller" class="form-control" id="exampleFormControlSelect1">
                  <option value="1">Amazon</option>
                  <option value="2">Best Buy</option>
                  <option value="3">eBay</option>
                  <option value="4">GameStop</option>
                  <option value="5">Target</option>
                  <option value="6">Walmart</option>
                  
                  
                </select>
              </div>
              
              
              
              
              <div class="form-group">
                  
                  <textarea type="text" class="form-control" name="gameDescription" rows="5" id="comment" placeholder="Description"></textarea>
              </div>
              
              
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Connsole</label>
                <select name="gameConsole" class="form-control" id="exampleFormControlSelect1">
                  <option value="1">PS4</option>
                  <option value="2">PS3</option>
                  <option value="3">Xbox One</option>
                  <option value="4">Xbox 360</option>
                  <option value="5">Nintendo Switch</option>
                  <option value="6">Wii</option>
                  <option value="7">Wii U</option>
                  
                </select>
              </div>
              
              
             
              
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="addGameForm" value="Add Game">  
            </form>
            
            
            
            
            <form action="index.php">
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="submitbtn" value="Back to search">
            </form>
            
        </div>
        
        <script>
            $(document).ready(function(){
                
                
                $("#title").change(function(){
                   $.ajax({
                       type: "GET",
                       url: "api/VerifyNewGame.php",
                       dataType: "json",
                       data: {"title": $("#title").val()},
                       success: function(data,status) {
                           
                           if(data == false)
                           {
                               $("#ErrorMessage").html("No game with said title exists").css("color", "green");
                           } 
                           else 
                           {
                               $("#ErrorMessage").html("Game with that title already Exists").css("color", "red");
                               
                           }
                           
                       },
                       complete: function(data,status) {
                           
                       }
                   });//end of ajax call
                });
            });
        </script>
        
    </body>
</html>