<?php
session_start();
include "connect.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home page</title>
    </head>

    <body>
        Hello
        <?php echo $_SESSION['username'] ?>
        <a href="signout.php"><button type="button">Log out</button></a>
    </body>

    </html>
    <?php
} else {
    header('location:login.php');
}
?>