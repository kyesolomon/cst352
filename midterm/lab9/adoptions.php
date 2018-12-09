<?php
include "../../sqlConnection.php";
$dbConn = getConnection("pets");

function displayAllPets() {
    global $dbConn;
    
    $sql = "SELECT id , name, type FROM pets ORDER BY name";
    
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    $pets = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    return $pets;
    
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            #carouselExampleIndicators
            {
                width: 400px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <?php
        include "inc/header.php";
        ?>
        <script>
        $(document).ready(function() {
            
            $(".petLink").click(function(event) {
                event.preventDefault();
                var id = ($(this).attr("id"));
                
                $('#myModal').modal('show');
                $.ajax({
                    
                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: { "id": id },
                    success: function(data,status) {
                        
                    
                    $("#petName").html(data.name);
                    $("#petDescription").html(data.description);
                    $("#petImg").attr("src", "img/"+data.pictureURL);
                    $("#type").html(data.type);
                    $("#color").html(data.color);
                    $("#breed").html(data.breed);
                        
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                    }
                
                });//ajax
       
            }); 
            
        });
        </script>
        
        <?php
        $pets = displayAllPets();
        
        foreach($pets as $pet) {
            echo "Name: ". "<a class='petLink' id='".$pet['id']."' href='#'>".$pet['name']. "</a><br>";
            echo "type: ". $pet['type']. '<br><br>';
        
        }
        ?>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="petName"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <div class="modal-body">
                    <div id="petInfo">
                      <!-- this is an html element -->
                     <img id="petImg" src="" width="150"></img><br>
                     Description:<span id="petDescription"></span> <br>
                     Type:<span id="type"></span> <br>
                     Breed:<span id="breed"></span> <br>
                     Color:<span id="color"></span> <br>
         
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>

        
        <?php
        include "inc/footer.php";
        ?>
    </body>
</html>    