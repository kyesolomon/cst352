<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Spotify</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">
        <h1>Spotify</h1>
        <?php
            include 'inc/functions.php';
            play();
        ?>
        <form>
            <input type="submit" value="Shuffle!" />
        </form> 
        </div>
    </body>
</html>