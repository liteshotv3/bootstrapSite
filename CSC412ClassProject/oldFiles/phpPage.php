<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Please enter your data below<br>";
echo "Name<br>";
echo "Age<br><br>";
echo "Displays here<br>";

$x = 5;
$y = 10;
static $superVariable = "static variable";

echo "x is " . $x . " y is " . $y . "<br>";

function myFunc() {
    global $x, $y;
    $y = $x + $y;
}
myFunc();
echo "x plus y is " .$y . "<br><br>";




function sayHi($repeats = 10) {
    for($i = 0; $i < $repeats; $i++)
        echo "Hello World!<br>";
    return "Hello World!";
    
}

sayHi(3);
?>



        
       


</body>
</html>