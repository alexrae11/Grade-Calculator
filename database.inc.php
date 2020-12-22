<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "grading_calculator";

$connection = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);                              // connection to the database is created

if (!$connection) {
    die("Failed to connect to database: " . mysqli_connect_error());                                         // connection is checked
}
