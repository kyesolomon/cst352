  
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: checkbox, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>Error is displayed if Number of Cities is not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>Error is displayed if Number of Cities is less than 2 or left blank </td>
      <td align="center">5</td>
    </tr>    
   <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>Error is displayed if Number of Cities is greater than 6 AND only one country is selected, or if size is greater than 12 AND country is "Both" </td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>Header is displayed with info submitted (number of cities and country to visit) </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The right number of random cities is displayed when selecting Mexico or Norway as Country </td>
      <td align="center">15</td>
    </tr> 
   	<tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>If selecting "Both" as Country, there must be at least ONE city of each country</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The names are ordered alphabetically as chosen by the user (asc/desc)</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>City images are displayed if corresponding checkbox is checked</td>
      <td align="center">10</td>
    </tr>       
    <tr style="background-color:#99E999">
      <td>10</td>
      <td>Cities are displayed in a two-column table</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>   
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

<?php
$monthsArray = range("November","February");

function countriesDropdown(){
    global $countriesArray;
    foreach($countriesArray as $country){
        echo "<option value='$country'>$country</option>";
    }
}

function getVacationTable($numberOfLocations,$countryToVisit,$randomDays){
    global $countriesArray;
    
    $countriesTable = array();
    for ($i=0; $i < $numberOfLocations; $i++) {
        $countriesTable[] = $countryToVisit;
    }
}
function displayTable() {
	if (isset($_GET['submit'])) {
		$countryToVisit = $_GET['countryToVisit'];
		$randomDays = $_GET['randomDays'];
		$numberOfLocations = $_GET['numberOfLocations'];
		
		echo "<hr><h1> Select country " . $countryToVisit . "</h1>";

        $countryTable = getVacationTable($numberOfLocations,$countryToVisit,$randomDays);
 		echo "<table border='1' style='margin:0 auto' cellpadding=7>";
 	 	$index = 0;
		for ($rows = 0; $rows < $numberOfLocations; $rows++) {
			echo "<tr>";
			for ($cols = 0; $cols < $numberOfLocations; $cols++) {
			   $countryToDisplay = $countriesTable[$index];
				$index++;
			}//endFor (cols)
			echo "</tr>";
		}//endFor (rows)
		echo "</table>";	
		
	}//endIf (submit)	
}//endFunction
?>
<!DOCTYPE html>
    <head>
        <title>Vacation Spots Generator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<h1><center>Next Vacation Spots</center></h1>				
    </head>
    <body>
    <br />
    <form type="get">		
    Number of cities to visit:<br>
    	<input type="text" name="locations">
    	<br /><br />
    	
    Country to visit:
        <input type="radio" name="Country" value="Mexico"> Mexico
        <input type="radio" name="Country" value="Norway"> Norway
        <input type="radio" name="Country" value="Both"> Both
        <br /><br />
    		
    Display cities to visit in alphabetical order:
    	<input type="radio" name="locationsOrder" value="atoz"> A-Z
        <input type="radio" name="locationsOrder" value="ztoa"> Z-A
    	<br /><br />
    	
    <input type="checkbox" name="displayImages" value="images"> Display Images<br>
		<br /><br />
	<input type="submit" value="Display Cities to Visit!" name="submit" />
		</form>
		<?=displayTable() ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <table>
        <?php
        $rows = isset($_GET['rows']) ? $_GET['rows']:rand(0,3);
        $columns = isset($_GET['cols']) ? $_GET['cols'] : 2;
        $eightball = $_GET['eightball'] == 'eightball' ? true : false;
        $randNum = 0;
        $numArray = range(0, 15);
        $numUsed = array();
        $evenSum = 0;
        $oddSum = 0;
        
        if(!$eightball)
        {
            array_splice($numArray,8,1);
            
        }
        
        shuffle($numArray);
        $numArray = array_slice($numArray, 0, $rows * $columns + 1);
        
        if(isset($_GET['ballOrder'])) {
            $order = $_GET['ballOrder'];
            
            if($order == 'ascending') {
                rsort($numArray);
            }
            
            if($order == 'descending') {
                sort($numArray);
            }
        }
        
    
        for ($i = 0; $i < $rows; $i++)
        {
			//Outer loop creates the table row <tr>
             echo "<tr>";
			//Inner loop creates the table columns <td>
            for($j = 0; $j < $columns; $j++)
            {
                $randNum = array_pop($numArray);
                //$randNum = array_rand($numArray, 1);
                //$randNum = $numArray[$randNum];
				//Inner loop creates the table columns <td>
                echo "<td>";
                if ($randNum % 2 == 0)
                {
                    echo "<img src='img/" . $randNum . ".png' alt='" . $randNum . " city' id='even'>";
                    $evenSum += $randNum;
                } 
                else
                {
                    echo "<img src='img/" . $randNum . ".png' alt='" . $randNum . " city' id='odd'>";
                    $oddSum += $randNum;
                }
                echo "</td>";
                array_push($numUsed, $numArray[$randNum]);
                //unset($numArray[$randNum]);
            }
            echo "</tr>";
            
        }
        
        ?>
    </table>
</body>
</html>