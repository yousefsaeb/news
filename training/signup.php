<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $searchname = "SELECT username from users where username like '$username'";
    $resultname = $con->query($searchname);
    $searchemail = "SELECT email from users where email like '$email'";
    $resultemail = $con->query($searchemail);

    if (strlen($username) > 4) {
        if ($resultname->num_rows < 1) {
            if ($resultemail->num_rows < 1) {
                if (!empty($password)) {
                    $sql = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$password', '$email');";
                    if ($con->query($sql)) {
                        $signuped= "Congrats! Created successfully!";
                    }
                } else {

                    $password_required = "Password required";

                }

            } elseif (empty($email)) {
                $email_required = "email required";
            } else {
                $email_used = "email already used";
            }
        } else {
            $username_used = "username is used already";
        }
    } elseif ($username === empty($username)) {
        $username_required = "username required";
    } else {
        $short_username = "short username";
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />            <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap"
                rel="stylesheet" />


    <title>Add user</title>
</head>

<body>
    <section>
        <div class="login-container">
        <div class="index-title">التسجيل</div>

        <form action="" method="POST" class="add-form">
        <?php
                if (isset($signuped)) {
                     ?><div class="successmsg"><?php echo $signuped; ?></div><?php
                }?>
                <?php
                if (isset($username_used)) {
                     ?><div class="errormsg"><?php echo $username_used; ?></div><?php
                }?>

<?php
                if (isset($email_required)) {
                     ?><div class="errormsg"><?php echo $email_required; ?></div><?php
                }?>
                 <?php
                if (isset($short_username)) {
                     ?><div class="errormsg"><?php echo $short_username; ?></div><?php
                }?>
                 <?php
                if (isset($email_used)) {
                     ?><div class="errormsg"><?php echo $email_used; ?></div><?php
                }?>
                 <?php
                if (isset($password_required)) {
                     ?><div class="errormsg"><?php echo $password_required; ?></div><?php
                }?>
           
            <label for="">إسم المستخدم:</label>
            <input type="text" name="username" id=""autocomplete="off">


            <label for="">كلمة المرور:</label>
            <input type="password" name="password" id="">

            <label for="">الإيميل:</label>
            <input type="text" name="email" id=""autocomplete="off">

        
<br>
           
            <button type="submit" class="submit-add-button" name="submit">تسجيل</button>
            <a href="login.php"><button type="button" class="back-btn" name="back">الرجوع</button></a>

        </form></div>
    </section>
</body>

</html>