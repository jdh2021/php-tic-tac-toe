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
                    // ensure value printed is only 'x' or 'p'
                    if(strtolower($_POST[$id]) === "x" | strtolower($_POST[$id]) === "o") {
                        echo "value=$_POST[$id]";
                    } else {
                        $error=true;
                    }

                }
            }
        ?>
    </form>
</body>

</html>