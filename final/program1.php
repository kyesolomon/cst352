<!DOCTYPE html>
<html>
    <head>
        <title>CST352 Final: Program 1</title>
        <script src="js/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<style>
		body {
	        text-align: left;
        }

        table {
	        margin: auto;
        }

        th, tr, td {
	        border: 1px solid lightgray;
	        padding: 3px;
        }

        .leftAligned, #rubric td:nth-child(2) {
	        text-align: left;
        }

        .error {
	        color: red;
        }
		</style>
    </head>
    <body>
        <form>
            <h2>Log-in to your account:</h2>
            <input type="text" name="username" id="username"/><br/>
            <input type="text" name="password" id="password"/><br/>
        <button type="button" onclick="loadDoc()">Submit</button>

<p id="welcomePage"></p>
 
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    // if (this.readyState == 4 && this.status == 200) {
    //   document.getElementById("welcomePage").innerHTML = this.responseText;}
    if (this.readyState == 4 || this.status == 200) {
        document.getElementById("welcomePage").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "welcome.php", true);
  xhttp.send();
}
</script>
            
        </form>
        <br><br>
        <h1>Data from fe_login:</h1>
    <?php
            
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        // echo "Connected successfully";
        
        $sql = "SELECT * FROM fe_login";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["studentId"]. " " . $row["username"]. " " . $row["password"]. " " . $row["failedAttempts"] . " " . $row["daysLeftPwdChange"] . "<br> ";
            }
        } else {
            echo "0 results";
        }
        
        echo "<br>";
        $sql ="SELECT studentId FROM fe_lock";
        $result = $conn->query($sql);
        echo  "Locked student ID's: ";
        while($row = $result->fetch_assoc()) {
                echo $row["studentId"]. " ";}
        $conn->close();
    ?>
    <br><br>
    </body>
       
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#99E999">
      <td>1</td>
      <td>The data from the fe_login table is displayed below the Login form  </td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>2</td>
      <td>The locked Student ids (from the fe_lock table) are displayed  </td>
      <td width="20" align="center">10</td>
    </tr>   
     <tr style="background-color:#99E999">
      <td>3</td>
      <td>The welcome.php file is shown when the user enters the right credentials AND the account is NOT locked.</td>
      <td width="20" align="center">10</td>
    </tr>    
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>(AJAX) After typing the username, the number of days left to change the password is shown in red if the value of daysLeftPwdChange is between 1 and 15.
      	Hint: Use a "change" jQuery event, instead of "click"</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>(AJAX) After typing the username, "You must change your Password NOW" is displayed in red if the value of daysLeftPwdChange is 0</td>
      <td width="20" align="center">15</td>
    </tr>      
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>If the account is NOT locked, the "failedAttempts" field is reset to 0 when the user enters the right credentials.</td>
      <td width="20" align="center">15</td>
    </tr>      
    <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The "failedAttempts" field is increased by 1 when entering the wrong password</td>
      <td width="20" align="center">15</td>
    </tr> 
   <tr style="background-color:#FFC0C0">
	 <td>8</td>
	 <td>The message "wrong credentials" is displayed when entering the wrong username/password</td>
	 <td width="20" align="center">10</td>
	</tr>     
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>A new record is inserted in the "fe_lock" table when the "failedAttempts" field has a value of 3.</td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>The message "This account is locked" is displayed when the account is locked and entering the right username/password</td>
      <td width="20" align="center">10</td>
    </tr> 
     <tr style="background-color:#99E999">
      <td>11</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
</html>