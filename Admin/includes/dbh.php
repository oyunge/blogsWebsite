<?php 

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "blogs";

$con = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$con){
    die("connection failed".mysqli_connect_error());
}