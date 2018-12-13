<?php

?>
<!DOCTYPE html>
<html>
    <head>
        
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
        
        
        
        <title>
            Game Search DB 
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
        <div class="jumbotron">
            <h1>Game Nation</h1>
            <p>Enter Game by Keyword</p>
            <hr>
            
                
            <form method="GET" >
            <input id="searchGames" class="form-control" name="gameSearch" type="text" placeholder="Search Game Database"/>
            <p id="noTitle"></p>
            <br>
            <input class="btn btn-primary btn-lg btn-light" id="passSearch" type="button" name="submitbtn" value="submit" >
            
            </form>
            
            <form action="login.php">
            <input class="btn btn-primary btn-lg btn-light" id="passSearch" type="submit" name="submitbtn" value="Administration" >    
            </form>
            
            <form action="result.php">
            <input class="btn btn-primary btn-lg btn-light" id="passSearch" type="submit" name="submitbtn" value="Add videoGame" >
            </form>
        </div>
            
        
        <script>
            $(document).ready(function() {
            
                
             $("#passSearch").click(function(event) {
                 event.preventDefault();
                 var titleName = $("input[name=gameSearch]").val();
                 console.log(titleName);
                 
                 $.ajax({
                       type: "GET",
                       url: "api/GetGameInfo.php",
                       dataType: "json",
                       data: {"gameSearch": $("#searchGames").val()},
                       success: function(data,status) {
                          
                          
                          if(data == false)
                          {
                              $("#gameName").html("No game has been found with the title "+ titleName).css("color", "red");
                          }
                          else if(titleName === "")
                          {
                              $("#noTitle").html("Enter a game title").css("color", "green");
                              
                          }
                          else 
                          {
                             $('#myModal').modal('show');
                             $("#gameName").html(data.title).css("color", "black");
                             $("#urlResult").attr("src", data.imgUrl);
                             $("#description").html("<span id='attr'>Description: </span>" + data.description);
                             $("#consoleImg").attr("src", data.consoleLogoURL);
                             //$("#price").html(data.price);
                             $("#seller").html("<span id='attr'>Seller: </span>"+data.seller);
                             $("#developer").html("<span id='attr'>Developer: </span>"+data.developer);
                             $("#genre").html("<span id='attr'>Genre: </span>"+data.genre);
                             $("#releaseYear").html("<span id='attr'>Release Year: </span>"+data.releaseYear);
                             $("#price").html("<span id='attr'>Price: </span>$"+data.price);
                             $("#noTitle").html("");
                          }
                           
                            console.log(data);
                               
                           
                           
                       },
                       complete: function(data,status) {
                           
                       }
                   });//end of ajax call
             });
                
               
                
               
            });
            
        </script>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="gameName"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <div class="modal-body">
                    
                    <img id="urlResult" src="" />
                    <p id="description"></p>
                    <img id="consoleImg" src="" />
                    <p id="price"></p>
                    <p id="seller"></p>
                    <p id="developer"></p>
                    <p id="releaseYear"></p>
                    <p id="genre"></p>
                    <p id="price"></p>
         
                     
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">back to Search</button>
                
              </div>
            </div>
          </div>
        </div>
        
        
            
        
        
    </body>
</html>