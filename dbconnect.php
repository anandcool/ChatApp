<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chatroom";

//Creating database connection
$con = mysqli_connect($servername,$username,$password,$database);

//Check connection

if(!$con){
    die('Failed to connect'.mysqli_connect_error());
}

?>