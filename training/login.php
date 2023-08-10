<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['is_admin'])) {
    if ($_SESSION['is_admin'] == 1) {
        header('location: crud.php');
    } else {
        header('location: home.php');
    }
    exit; // Exit to prevent further execution of the script
}
include "connect.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $empty_username = "Username required";
    } elseif (empty($password)) {
        $empty_password = "Password required";
    }
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($row['username'] === $username && $row['password'] === $password && $row['is_admin'] == "0") {

            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['is_admin'] = $row['is_admin'];

            header('location:home.php');
        } elseif ($row['username'] === $username && $row['password'] === $password && $row['is_admin'] == "1") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['is_admin'] = $row['is_admin'];

            header('location:crud.php');

        }
    } else {
        $incorrect_data = "Incorrect Email or Password";

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
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <title>Add user
    </title>
</head>

<body>

    <section>
        <div class="login-container">
            <div class="index-title">تسجيل الدخول</div>
            <form action="" method="POST" class="add-form">
                <?php
                if (isset($empty_username)) {
                    ?>
                    <div class="errormsg">
                        <?php echo $empty_username; ?>
                    </div>
                    <?php
                } ?>
                <?php
                if (isset($empty_password)) {
                    ?>
                    <div class="errormsg">
                        <?php echo $empty_password; ?>
                    </div>
                    <?php
                } ?>
                <?php
                if (isset($incorrect_data)) {
                    ?>
                    <div class="errormsginc">
                        <?php echo $incorrect_data; ?>
                    </div>
                    <?php
                } ?>
                <label for="">الإسم:</label>
                <input type="text" name="username" id="" autocomplete="off">


                <label for="">كلمة المرور:</label>
                <input type="password" name="password" id="">

                <br>


                <button type="submit" class="submit-add-button" name="submit" style="width: 117px;">تسجيل
                    الدخول</button>
                <p>ليس لديك حساب؟ <a class="signup-a" href="signup.php">التسجيل</a></p>
            </form>
        </div>
    </section>

</body>

</html>