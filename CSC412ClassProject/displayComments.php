<!DOCTYPE html>
<html lang="en">
    <head>
        <title>What people said</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- Font Awesome Glyphicons -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html#myPage">Artem Tolstov</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html#about">ABOUT</a></li>
                        <li><a href="index.html#projects">PROJECTS</a></li>
                        <li><a href="index.html#portfolio">PORTFOLIO</a></li>
                        <li><a href="index.html#contact">CONTACT</a></li>
                    </ul>
                </div>
        </nav>
        <div class="table-responsive container" style="padding-top: 50px" >

            <?php
            echo "<table class='table-striped'>";
            echo "<col width='10%'>
                  <col width='15%'>";
            echo "<tr><th>Name</th><th>E-mail</th><th>Comment</th></tr>";

            class TableRows extends RecursiveIteratorIterator {

                function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
                }

                function beginChildren() {
                    echo "<tr>";
                }

                function endChildren() {
                    echo "</tr>" . "\n";
                }

            }

            $servername = "setapproject.org";
            $username = "csc412";
            $password = "csc412";
            $dbname = "csc412";
            try {
                $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM rchi");
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                    echo $v;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
            ?> 
        </div>

    </body>
