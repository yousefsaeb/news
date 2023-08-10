<?php
include "connect.php";
$id = $_GET['deleteid'];
if (isset($_GET['deleteid'])) {
    $deleted = $_GET['deleteid'];
    $sql = "DELETE FROM `users` WHERE id=$id";
    $fetchadmin = "SELECT username FROM users WHERE id=$id";
    $fetchres = $con->query($fetchadmin);
    $rows = $fetchres->fetch_assoc();
    if ($rows['username'] !== "admin") {
        if (mysqli_query($con, $sql)) {
            header('location:crud.php');

        }
        ;
    } else {
        header('location:crud.php');
    }

}
?>