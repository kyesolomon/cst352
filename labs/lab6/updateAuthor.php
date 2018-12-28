<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function getAuthorInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `q_author` WHERE authorId = "  . $_GET['authorId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateAuthorForm'])) { // User submitted the form
    
    $sql = "UPDATE `q_author` 
            SET   authorName = :authorName,
                  gender    = :gender,
                  dob       = :dob,
                  dod       = :dod,
                  profession= :profession,
                  coo   = :coo,
                  imgUrl   = :imgUrl,
                  bio       = :bio
              WHERE authorId = " . $_GET['authorId'];
    $np = array();
    $np[":authorName"] = $_GET['authorName'];
    $np[":dob"]       = $_GET['dob'];
    $np[":dod"]       = $_GET['dod'];
    $np[":profession"] = $_GET['profession'];
    $np[":coo"]    = $_GET['coo'];
    $np[":imgUrl"]    = $_GET['imgUrl'];
    $np[":bio"]        = $_GET['bio'];
    $np[":gender"]     = $_GET['gender'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Author info was updated!";
    
}



if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();
    //print_r($authorInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Update Author</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>
        
        <h1> Updating Author Info </h1>
        
          <form>
            <input type="hidden" name="authorId" value="<?= $authorInfo['authorId'] ?>" />
            Full name: <input type="text" name="authorName" value="<?= $authorInfo['authorName'] ?>"/> <br/>
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"  
            
              <?php
              
                 if ($authorInfo['gender'] == "M") {
                     
                     echo " checked ";
                     
                 }
              
              ?>

            />
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"  <?= ($authorInfo['gender'] == "F")?"checked":"" ?> /> 
                <label for="genderFemale">Female</label><br>
            
            Day of birth: <input type="text" name="dob"  value="<?= $authorInfo['dob'] ?>"/> <br />
            Day of death: <input type="text" name="dod"  value="<?= $authorInfo['dod'] ?>"/> <br />
            Country: <input type="text" name="coo"   value="<?= $authorInfo['coo'] ?>"/> <br>
            Profession: <input type="text" name="profession" value="<?= $authorInfo['profession'] ?>"/> <br>
            
            Image URL: <input type="text" name="imgUrl" value="<?= $authorInfo['imgUrl'] ?>" size="40"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/> <?= $authorInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Author" name="updateAuthorForm" />
        </form>
        

    </body>
</html>