<?php
function getLuckyNumber() {    
        
            $luckyNumber = rand(0,2);
            
            if ($luckyNumber == 4) {
                
                $luckyNumber = 11;
                
            }
        
            return $luckyNumber;
            
    }   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta char="utf-8" />
        <title>Rock, Paper, Scissors </title>
    </head>
    <body>

    </body>
</html>