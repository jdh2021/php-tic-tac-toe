<html>
<head>
<title>PHP Tic Tac Toe</title>
</head>
<body>
    <h2>PHP Tic Tac Toe</h2>
    <form method="POST" action="index.php">
        <?php

        $error=false;
            // create 9 boxes for input fields (3x3) using for loop
            for($id=1; $id<=9; $id+=1) {
                // insert break at 4 and 7 to make three rows
                if ($id === 4 or $id === 7) {
                     echo "<br />";
                }
                echo "<input name=$id type=text size=7>";
                // determine when value has been submitted and is not empty
                if(isset($_POST['submit']) && !empty($_POST[$id])) {
                    // ensure value printed is only 'x' or 'o'
                    if(strtolower($_POST[$id]) === "x" | strtolower($_POST[$id]) === "o") {
                        echo "value=$_POST[$id]";
                        // check for matches across rows at inputs 123, 456, 789
                        for($a=1, $b=2, $c=3; $a<=7, $b<=8, $c<=9; $a+=3, $b+=3, $c+=3) {
                            if($_POST[$a]===$_POST[$b] && $_POST[$b]===$_POST[$c]) {
                                if($_POST[$a]==="x") {
                                    $player_x_wins = true;
                                } elseif ($_POST[$a] ==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                        // check for matches down columns at 147, 258, 369
                        for($a=1, $b=4, $c=7; $a<=3, $b<=6, $c<=9; $a+=1, $b+=1, $c+=1) {
                            if($_POST[$a]===$_POST[$b] && $_POST[$b]===$_POST[$c]) {
                                if($_POST[$a]==="x") {
                                    $player_x_wins = true;
                                } elseif ($_POST[$a] ==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                        // check for diagonal matches at 159, 357
                        for($a=1, $b=5, $c=9; $a<=3, $b<=5, $c<=9; $a+=2, $b+=0, $c-=2) {
                            if($_POST[$a]===$_POST[$b] && $_POST[$b]===$_POST[$c]) {
                                if($_POST[$a]==="x") {
                                    $player_x_wins = true;
                                } elseif ($_POST[$a] ==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                    } else {
                        $error=true;
                    }

                }
            }
        ?>
    </form>
</body>

</html>