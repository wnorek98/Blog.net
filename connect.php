<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blog";

    $connect = mysqli_connect($servername, $username, $password, $database);

    if(!$connect)
    {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }

?>