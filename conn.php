<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "best_pizza_place";

    $conn = mysqli_connect($server, $user, $pass, $dbname);
    if(!$conn) {
        die("connection failer:" . mysqli_connect_error());
    }

?>