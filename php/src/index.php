<html>
<head>
<title>PHP Tic Tac Toe</title>
</head>
<body>
    <h2>PHP Tic Tac Toe</h2>
    <form method="POST" action="index.php">
        <?php

        $error=false;
        $player_x_wins=false;
        $player_o_wins=false;
        $input_count=0;
        $character_entered=null;

            // create 9 boxes for input fields (3x3) using for loop
            for($id=1; $id<=9; $id+=1) {
                // insert break prior 4 and 7 to make three rows
                if ($id === 4 or $id === 7) {
                     echo "<br />";
                }
                echo "<input name=$id type=text size=7";
                // determine when value has been submitted and is not empty
                if(isset($_POST['submit']) && !empty($_POST[$id])) {
                    // ensure value printed is only 'x' or 'o'
                    $input_character = strtolower($_POST[$id]);
                    if($input_character === "x" | $input_character === "o") {
                        // add 1 to input count each time a value is submitted. max input count is 9. 
                        $input_count+=1;
                        echo " value=".$input_character." readonly>";
                        // check for matches across rows at inputs 123, 456, 789
                        for($a=1, $b=2, $c=3; $a<=7, $b<=8, $c<=9; $a+=3, $b+=3, $c+=3) {
                            if((strtolower($_POST[$a])===strtolower($_POST[$b]) && strtolower($_POST[$b])===strtolower($_POST[$c]))) {
                                if(strtolower($_POST[$a])==="x") {
                                    $player_x_wins = true;
                                } elseif (strtolower($_POST[$a])==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                        // check for matches down columns at 147, 258, 369
                        for($a=1, $b=4, $c=7; $a<=3, $b<=6, $c<=9; $a+=1, $b+=1, $c+=1) {
                            if((strtolower($_POST[$a])===strtolower($_POST[$b]) && strtolower($_POST[$b])===strtolower($_POST[$c]))) {
                                if(strtolower($_POST[$a])==="x") {
                                    $player_x_wins = true;
                                } elseif (strtolower($_POST[$a])==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                        // check for diagonal matches at 159, 357
                        for($a=1, $b=5, $c=9; $a<=3, $b<=5, $c>=7; $a+=2, $b+=0, $c-=2) {
                            if((strtolower($_POST[$a])===strtolower($_POST[$b]) && strtolower($_POST[$b])===strtolower($_POST[$c]))) {
                                if(strtolower($_POST[$a])==="x") {
                                    $player_x_wins = true;
                                } elseif (strtolower($_POST[$a])==="o") {
                                    $player_o_wins = true;
                                }
                            }
                        }
                    } else {
                        echo ">";
                        $error=true;
                    }
                }
                else {
                    echo ">";
                }
            }
        ?>
        <br />
        <br />
        <?php 
        if ($player_x_wins) {
            echo "<button name=start type=submit>Restart Game</button><br /><br />";
            echo "Player X won!";
        } elseif($player_o_wins) {
            echo "<button name=start type=submit>Restart Game</button><br /><br />";
            echo "Player O won!";
        } elseif($input_count===9 && !$player_x_wins && !$player_o_wins ) {
            echo "<button name=start type=submit>Restart Game</button><br /><br />";
            echo "It's a draw!";
        } elseif($error) {
            echo "<button name=submit type=submit>Complete Turn</button><br /><br />";
            echo "Please only enter 'x' or 'o'!";
        } else {
            echo "<button name=submit type=submit>Complete Turn</button><br /><br />";
            echo "Enter 'x' or 'o' and then click 'Complete Turn'";
        }
    ?>    
    </form>
</body>

</html>