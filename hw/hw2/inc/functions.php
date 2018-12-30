<?php
    $songsList = array("Hold On (Good Charlotte)", "Waving Thru a Window (Dear Evan Hansen)", "How to Save a Life (The Fray)", "Who You Are (Jessie J)", "1-800-273-8255 (Logic)", "Try (P!nk)", "In My Blood (Shawn Mendes)", "Spotify");

    // $songsList = array("spotify", "charlotte", "evan", "fray", "jessie", "logic", "pink", "shawn");
    function displaySymbol($randomValue, $pos){
        switch ($randomValue){
            case 0: $symbol = "spotify";
            echo "Welcome to Kye's Spotify playlist!<br>";
            break;
            case 1: $symbol = "charlotte";
            echo "Hold On by Good Charlotte<br>";
            break;
            case 2: $symbol = "evan";
            echo "You Will Be Found from Dear Evan Hansen<br>";
            break;
            case 3: $symbol = "fray";
            echo "How to Save a Life by The Fray<br>";
            break;
            case 4: $symbol = "jessie";
            echo "Who You Are by Jessie J<br>";
            break;
            case 5: $symbol = "logic";
            echo "1-800-273-8255 by Logic feat. Alessia Cara, Khalid<br>";
            break;
            case 6: $symbol = "pink";
            echo "Try by P!nk<br>";
            break;
            case 7: $symbol = "shawn";
            echo "In My Blood by Shawn Mendes<br>";
            break;
        }
        echo "<br><img id = 'reel$pos' src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) .">";
    }
    function displayPoints($randomSong0, $randomSong2, $randomSong3, $randomSong4, $randomSong5, $randomSong6, $randomSong7){
        echo "<div id='output'>";

            switch($randomSong0){
                case 0: $totalPoints = "Press shuffle to play a random song from this playlist.";
                break;
                case 1: $totalPoints = "Hold On by Good Charlotte";
                break;
                case 2: $totalPoints = "You Will Be Found from Dear Evan Hansen";
                break;
                case 3: $totalPoints = "How to Save a Life by The Fray";
                break;
                case 4: $totalPoints = "Who You Are by Jessie J";
                break;
                case 5: $totalPoints = "1-800-273-8255 by Logic feat. Alessia Cara, Khalid";
                break;
                case 6: $totalPoints = "Try by P!nk";
                break;
                case 7: $totalPoints = "In My Blood by Shawn Mendes";
                break;
            }
            echo "<br><br>$totalPoints<br><br>";

        echo "</div>";
    }
    function displaySongs(){
        $sort = rand(0,3);
        $songsList = array("Hold On (Good Charlotte)", "Waving Thru a Window (Dear Evan Hansen)", "How to Save a Life (The Fray)", "Who You Are (Jessie J)", "1-800-273-8255 (Logic)", "Try (P!nk)", "In My Blood (Shawn Mendes)", "Spotify");
        foreach ($songsList as $value){
            $value = "song.mp3";
            echo "<audio controls>
            <source src=". $value . "type=\"audio/mpeg\">
            Your browser does not support the audio tag.
            </audio>";
        }
        shuffle($songsList);
        print_r(array_values($songsList));
        echo "There are " . count($songsList) . " songs in Kye's playlist!";
    }
    function play(){
        ${"randomValue" . $i } = rand(0,7);
        displaySymbol(${"randomValue". $i}, $i);
        displayPoints($randomSong0, $randomSong1, $randomSong2, $randomSong3, $randomSong4, $randomSong5, $randomSong6, $randomSong7);
        for($i=0; $i<1; $i++){
            displaySongs(${"songsList". $i}, $i);
        }
    }
?>