<?php
//Create connection.
$con = new mysqli("localhost", "root", "", "yousefDB");

//check the connection.
if ($con->connect_error) {
    die("Connection error!" . $con->connect_error);

}

?>