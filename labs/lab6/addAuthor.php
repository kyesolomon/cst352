<?php

session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

if (isset($_GET['addAuthorForm'])) {  //checks whether the form has been submitted

 include '../../sqlConnection.php';
 $dbConn = getConnection("quotes");
    
    
  $firstName = $_GET['authorName'];  
//   $lastName = $_GET['lastName'];
  $gender = $_GET['gender'];
  $dob = $_GET['dob'];
  $dod = $_GET['dod'];
  $country = $_GET['country'];
  $profession = $_GET['profession'];
  $imgUrl = $_GET['imgUrl'];
  $bio = $_GET['bio'];
  
  
  $sql = "INSERT INTO q_author (authorName, gender, dob, dod, coo, profession, imgUrl, bio) 
                 VALUES ( :authorName, :gender, :dob, :dod, :coo, :profession, :imgUrl, :bio);";
                 
  $namedParameters = array();
//   $namedParameters[':fn'] = $firstName;
//   $namedParameters[':lastName'] = $lastName;
  $namedParameters[':authorName'] = $authorName;
  $namedParameters[':gender'] = $gender;
  $namedParameters[':dob'] = $dob;
  $namedParameters[':dod'] = $dod;
  $namedParameters[':coo'] = $coo;
  $namedParameters[':profession'] = $profession;
  $namedParameters[':imgUrl'] = $imgUrl;
  $namedParameters[':bio'] = $bio;

  $stmt = $dbConn->prepare($sql);                 
  $stmt->execute($namedParameters); //This will insert the record!
  
  echo "Author was added!";
 
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New Author </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>

        <h1> Adding New Author</h1>
        
        <form>
            Author full name: <input type="text" name="authorName"/> <br />
            <!--First Name: <input type="text" name="firstName"/> <br />-->
            <!--Last Name: <input type="text" name="lastName"/> <br />-->
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"/>
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"/> 
                <label for="genderFemale">Female</label><br>
            
            Day of birth: <input type="text" name="dob"/> <br />
            Day of death: <input type="text" name="dod"/> <br />
            Country: <input type="text" name="coo"/> <br>
            Profession: <input type="text" name="profession"/> <br>
            
            Image URL: <input type="text" name="imgUrl"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/></textarea>
            
            <br>

            <input type="submit" value="Add Author" name="addAuthorForm" />
        </form>
        
    </body>
</html>