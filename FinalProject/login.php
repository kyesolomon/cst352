<!DOCTYPE html>
<html>
    <head>
        <title>login for games </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
            .center{
                margin: auto;
                width: 50%;
                text-align: center;
            }
            
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <div class="center">
            <h1>Admin Login</h1>
            <br>
            <br>
            <form action = "loginProcess.php" method="post">
                <span class="user">Username:</span> <input type="text" name="username" required /><br>
                <span class="pass">Password:</span> <input type="password" name="password" required /><br>
                <br>
                
                <input class="btn btn-primary btn-lg btn-light" type="submit" value="Login!">
                
            </form>
            
            <form action="index.php">
                <input class="btn btn-primary btn-lg btn-light" type="submit" value="Back to Search">
            </form>
            
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>