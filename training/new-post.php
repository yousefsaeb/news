<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['is_admin'])) {


    if ($_SESSION['is_admin'] == 1) {
        include "connect.php";

        $sql = "select * from users";
        $result = $con->query($sql);
        if (isset($row)) {
            $row = $result->fetch_assoc();

        }
        ;
        $row = $result->fetch_assoc();
        if (isset($_POST['isadmin'])) {
            $admin = $_POST['isadmin'];
        }
        //HTML-----------------
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style/style.css" />
            <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
            <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap"
                rel="stylesheet" />


            <title>Dashboard</title>
        </head>

        <body class="crud-body">
            <header></header>

            <section>
                <div class="crud-container">
                    <div class="rt-side-bar">
                        <div class="header">Dashboard</div>
                        <ul>
                            <a href="">
                                <li>الرئيسية</li>
                            </a>
                            <a href="crud.php">
                                <li>الأعضاء</li>

                            </a> <a href="new-post.php">
                                <li>منشور جديد</li>
                            </a>
                            <li>إعلانات جديدة</li>
                            <li>الرئيسية</li>
                            <li>الرئيسية</li>
                            <li>الرئيسية</li>
                            <li>الرئيسية</li>
                            <li>الرئيسية</li>
                        </ul>
                    </div>
                    <a href="signout.php"><button type="button" class="logout-btn">Log out</button></a>
                    <div class="crud-title">منشور جديد</div>
                    <div class="new-post-container">
                        <form action="" method="POST" class="new-post-form">
                            <label for="post-form-title" class="p-f-t-l">عنوان الخبر:</label>
                            <input type="text" name="post-form-title" id="post-form-title" class="post-form-title">

                            <label for="post-form-text" class="p-f-d-l">التفاصيل:</label>
                            <textarea name="post-form-text" id="post-form-text" cols="30" rows="10"
                                class="post-form-text"></textarea>
                            <label for="post-form-text" class="p-f-i-l">أرفق صورة:</label>
                            <input type="file" name="" id="">
                            <input type="submit" value="نشر" class="primary-btn" style="display:block; margin-top:20px">
                        </form>
                    </div>
                </div>

            </section>





            <script src="style/bootstrap.js"></script>
        </body>

        </html>
        <?php

    } else {
        header('location: login.php');
    }
    exit; // Exit to prevent further execution of the script
} elseif (!isset($_SESSION['username'])) {
    header("Location:login.php");
}

$user->update([
    'is_admin' => true
]);

?>