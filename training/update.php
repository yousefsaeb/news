<?php
include "connect.php";
$id = $_GET['updateid'];
$sql = "select * from users where id=$id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (isset($_POST['isadmin'])) {
        $admin = $_POST['isadmin'];

        $sql = "UPDATE `users` SET is_admin = 1 WHERE id = $id";
        ;
    } elseif (!isset($_POST['isadmin'])) {
        $uncheckedsql = "UPDATE `users` SET is_admin = 0 WHERE id = $id";
        if (!isset($admin) and isset($admin) == false) {
            $con->query($uncheckedsql);
        }
    }
    if ($con->query($sql) == true) {
        header('location:crud.php');
    } else {
        echo "hmmm" . $con->error();
    }
    $sql = "UPDATE users SET username='$username', password='$password', email='$email' WHERE id=$id";
    if ($con->query($sql) == true) {
        header('location:crud.php');

    } else {
        echo "Failed to update data" . $con->error();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

    <title>Update users</title>
</head>

<body>
    <div class="index-title">تعديل البيانات</div>

    <form action="" method="POST" class="add-form">
        <label for="">New username:</label>
        <input type="text" autocomplete="off" name="username" value="<?php

        echo $row['username'];


        ?>" id="" />
        <label for="">New password:</label>
        <input type="password" name="password" id="" value="<?php

        echo $row['password']; ?>">

        <label for="">New email:</label>
        <input type="text" name="email" id="" autocomplete="off" value="<?php

        echo $row['email']; ?>">

        <label for="myCheckbox">Administration:<input type="checkbox" style="min-height:0" name="isadmin"
                id="myCheckbox" <?php
                if ($row['is_admin'] == 1) {
                    echo "checked";
                }
                ?>></label>


        <button type="submit" class="submit-add-button" name="submit" action="crud.php">Submit</button>
        <a href="crud.php"><button type="button" class="back-btn" name="back">back</button></a>



    </form>
</body>

</html>