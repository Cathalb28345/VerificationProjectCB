<?php
include("config.php");
session_start();
// function to start session
$AlertMessage = '';
$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    //collecting info of user logging in
    $hash_of_user = $ip . $user_agent;
    $iterations = 1000;

    // Get current timestamp
    date_default_timezone_set('Europe/Dublin');
    $timestamp_current = date('Y-m-d h:i:s', time());
    $timestamp_five_mins_ago = date('Y-m-d h:i:s', time() - 5 * 60);
    $timestamp_five_mins_ahead = date('Y-m-d h:i:s', time() + 5 * 60);

    $salt = $timestamp_current;// sets timestamp as salt so will be unigue.
    $hashed = hash_pbkdf2("sha256", $hashed, $salted, $iterations_of_run, 32);//
    $hash = hash("sha256", $hash_of_user, $salt, $iterations, 32);//
    $sanitized_user_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING);

    $Result = mysqli_query($dataBaseInit, "SELECT * FROM authusers WHERE user_name = '$sanitized_user_name'");
    $row = mysqli_fetch_array($Result);
    $lockout = $row['lockout'];

    if ($timestamp_current < $row['logins']) {
        $AlertMessage = "You had 3 attempts! You are blocked for 5 minutes try again later";
        echo $AlertMessage;
    } else {
        mysqli_query($dataBaseInit, "INSERT INTO `ip` (`hashed_user_agent_Ip` ,`time_stamp`) VALUES ('$hash','$timestamp_current')");
        //inserts into the ip table
        $real_escape_password = mysqli_real_escape_string($dataBaseInit, $_POST['password']);
        $salt = "SELECT hashed_password FROM authusers WHERE user_name = '$sanitized_user_name'";
        $salt_cleaned = mysqli_query($dataBaseInit, $salt);
        $row = mysqli_fetch_all($salt_cleaned, MYSQLI_ASSOC);
        $array = (array)$row;
        //checking if it exists
        if (empty($array)) {
            $AlertMessage = "Your name($sanitized_user_name) or Password is invalid";
        } else {
            $returned = $row[0]['hashed_password'];
            $array = explode('$', $returned);
            $iterations = 1000;
            $hash = hash("sha256", $real_escape_password, $array[1], $iterations, 32);//
            $salted_hash = '$' . $array[1] . '$' . $hash;
            //appending salt
            $name_result = mysqli_query($dataBaseInit, "SELECT id FROM authusers WHERE user_name = '$sanitized_user_name' AND hashed_password = '$salted_hash'");
            $name_count = mysqli_num_rows($name_result);
            // check db
            if ($name_count == 1) {
                $queryResult = mysqli_query($dataBaseInit, "SELECT id FROM authusers WHERE user_name = '$sanitized_user_name' AND hashed_password = '$salted_hash'");
                $count = mysqli_num_rows($queryResult);
                $query = "UPDATE ip SET active = False ";
                $queryResult = mysqli_query($dataBaseInit, $query);

                $_SESSION['username'] = $sanitized_user_name;
                header("location:page1.php");
            } else {
                $lockout++;
                $sql = "UPDATE authusers SET lockout = '" . $lockout . "' WHERE user_name = '$sanitized_user_name'";
                $dataBaseInit->query($sql);
                if ($lockout > 2) {
                    $sql = "UPDATE authusers SET logins = '" . $timestamp_five_mins_ahead . "'  WHERE user_name = '$sanitized_user_name'";
                    $dataBaseInit->query($sql);
                }
            }
            mysqli_close($dataBaseInit);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login form</title>
</head>
<body>

<div class="container-fluid bg">
    <?php include "navBar.php"; ?>
    <div class="row">
        <div class="col-mid-4 col-sm-4 col-xs-12"></div>
        <div class="col-mid-4 col-sm-4 col-xs-12">
            <form class="form-container" method="post" action="" autocomplete="off">
                <h1>Login</h1>
                <img class="mb-4 favicon" src="favicon.ico" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Would you like to sign in ? </h1>
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
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
                <input type="button" class="btn btn-primary btn-block" value="Register"
                       onclick="window.location.href='register.php'"/>
                <br/>
                <?php echo "$AlertMessage"; ?>
            </form>
        </div>
        <div class="col-mid-4 col-sm-4 col-xs-12"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>
