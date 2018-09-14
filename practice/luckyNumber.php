    <?php
        
    
    function getLuckyNumber() {    
        
            $luckyNumber = rand(1,10);
            
            if ($luckyNumber == 4) {
                
                $luckyNumber = 11;
                
            }
        
            return $luckyNumber;
            
    }   
        
    ?>



<!DOCTYPE html>
<html>
    <head>
        <title> Lucky Number </title>
    </head>
    <body>


        <h1>
            
        MY UNLUCKY NUMBER IS: 
        
        <?php
        
           $lucky =  getLuckyNumber();
           
           echo $lucky * 2;
           
        ?>
        </h1>

    </body>
</html>