<?php

//General settings
$host       = "localhost";
$name       = "root";
$password   = "";
$database   = "theater_rotterdam";

$db = mysqli_connect($host, $name, $password, $database)
or die("Error: " . mysqli_connect_error());