<?php
include("config.php");

$name = '';
$password = '';
$AlertMessage = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $name = $_POST['username'];
        $name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $existing_user_name = mysqli_query($dataBaseInit, "SELECT user_name From authusers WHERE user_name = '$name'");
        //checks for name
        if (mysqli_num_rows($existing_user_name) != 0) {
            $AlertMessage = "There was a problem setting up your account ";
        } elseif (!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password)) {
            $AlertMessage = "Password Not strong enough, try again?  ";
        } else {
            $iterations = '1000';
            date_default_timezone_set('Europe/Dublin');
            $timestamp_current = date('Y-m-d h:i:s', time());

            $salt = $timestamp_current;// sets timestamp as salt so will be unigue.


            $salt = hash('sha256', '$timestamp_current.');
//            $salt = openssl_random_pseudo_bytes(32);
            $hash = hash_pbkdf2("sha256", $password, $salt, $iterations, 32);
//            $hash = hash_pbkdf2("sha256", $password,$new_timestamp, $salt, $iterations, 32);
            echo $hash . "<br>" . $password . "<br>";
            $salted_hash = '$' . $salt . '$' . $hash;
            // add database code here
            $sql = sprintf("INSERT INTO authusers (user_name, hashed_password ) VALUES (
            '%s', '%s')", mysqli_real_escape_string($dataBaseInit, $name),
                mysqli_real_escape_string($dataBaseInit, $salted_hash));
            mysqli_query($dataBaseInit, $sql);
            mysqli_close($dataBaseInit);
            header("location:login.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<div class="container-fluid bg">
    <?php include("navBar.php"); ?>
    <div class="row">
        <div class="col-mid-4 col-sm-4 col-xs-12"></div>
        <div class="col-mid-4 col-sm-4 col-xs-12">
            <form class="form-container" method="post" action="" autocomplete="off">
                <h1>Register</h1>
                <div class="form-group">

                    <img class="mb-4 favicon" src="favicon.ico" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Would you like to sign up ? </h1>
                    <div>
                        <label for="username" class="sr-only">Username </label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                               required
                               autofocus><br>
                    </div>
                    <div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                               required
                               pattern="(?=^.{6,16}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                               title="Your password must contain at least one upper case, one lower case, one digit, one special character, then length should be between 6-16 characters."><br>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Register">
                    <input type="button" class="btn btn-primary btn-block" value="Login"
                           onclick="window.location.href='login.php'"/>
            </form>
            <?php echo "$AlertMessage"; ?>
        </div>

        <div class="col-mid-4 col-sm-4 col-xs-12">
        </div>
    </div>
</div>
</body>
</html>
