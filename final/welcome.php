<!DOCTYPE html>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";

        // $mysqli = new mysqli("servername", "username", "password", "dbname");
        // if($mysqli->connect_error) {
        //   exit('Could not connect');
        // }
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        // echo "Connected successfully";
        
        $sql = "SELECT username FROM fe_login";
        $result = $conn->query($sql);
        
        $row = $result->fetch_assoc(); 
        
            echo "Hello " . $row["username"];
        
        
        $conn->close();
        
        // $stmt = $conn->prepare(sql);
        // $stmt->bind_param("s", $_GET['q']);
        // $stmt->execute();
        // $stmt->store_result();
        // $stmt->bind_result($username);
        // $stmt->fetch();
        // $stmt->close();
    ?>
<html>
    <head>
        <title>This is the welcome page.</title>
        <h1>Keep coming back, it works!</h1>
    </head>
    <body>

    </body>
</html>