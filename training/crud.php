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

                            </a>
                            <a href="new-post.php">
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
                    <div class="crud-title">لوحة التحكم</div>

                    <a href="add-user.php"><button class="add-btn" type="button">Add user</button></a>

                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Edit/Delete</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th>" . $row['id'] . "</th>


                        <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" ?>
                                <a href="<?php echo "update.php?updateid=" . $row['id'] ?>" name="updateid"> <button
                                        class="primary-btn" id="<?php ?>">Edit</button></a>
                                <a href="<?php echo "delete.php?deleteid=" . $row['id'] ?>" .<?php

                                     ?> name="deleteid"> <button
                                        class="secondary-btn">Delete</button></a>
                                <input type="checkbox" name="isadmin" method="POST" <?php
                                if ($row['is_admin'] == 1) {
                                    echo "checked";
                                }
                                ?> disabled>


                                <?php "</td>
                        </tr>";
                            } ?>

                            </tr>
                        </tbody>
                    </table>
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