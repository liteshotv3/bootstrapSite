<?php

// Fetching variables of the form which travels in URL
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['comments'];


$servername = "setapproject.org";
$username = "csc412";
$password = "csc412";
$dbname = "csc412";
try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //echo "<div class = 'mydiv'>Connected successfully\n</div>";

    $sql = "INSERT INTO rchi (name, email, comment)
            VALUES ('$name', '$email', '$message')";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "<div class = 'mydiv'> New record created successfully</div>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

/* Redirect browser */
header("Location: displayComments.php");
 
/* Make sure that code below does not get executed when we redirect. */
exit;
?>