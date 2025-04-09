<?php

    // Operations with array

    $numbers = array(3,5,7,2,7,8,4,3,5,9);

    // print array with foreach
    foreach ($numbers as $number) {
        echo $number . " ";
    }
    echo "<br>";

    for ($i = 0; $i < count($numbers); $i++) {
        echo $numbers[$i] . " ";
    }
    echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Render examples</h2>
    <ul>
        <?php
            foreach ($numbers as $number) {
                echo "<li>$number</li>";
            }
        ?>
    </ul>
</body>
</html>