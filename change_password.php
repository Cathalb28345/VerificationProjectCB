<?php
include("config.php");
include("session.php");
$AlertMessage = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['newPass']) && isset($_POST['ConfirmPass'])) {
        // is form submitted and both sections filled  !null  then (do code)
        $confirmPass = $_POST['ConfirmPass'];
        $password = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $user_name = $login_session;

        $salt = "SELECT hashed_password FROM authusers WHERE user_name = '$user_name'";
        $salt_returned = mysqli_query($dataBaseInit, $salt);
        $row = mysqli_fetch_all($salt_returned, MYSQLI_ASSOC);
        $returned = $row[0]['hashed_password'];
        $array = explode('$', $returned);
        $iterations = 1000;
        $hash = hash("sha256", $password, $array[1], $iterations, 32);//
        $salted_hash = '$' . $array[1] . '$' . $hash;

//        echo $password . "<br>" . $array[1] . "<br>";
//        echo $login_password . "<br>" . $salted_hash;
        if ($login_password != $salted_hash) {
            $AlertMessage = 'Salts do not match what we have sorry about that';
        } elseif (!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $confirmPass)) {
            $AlertMessage = "Follow requested format please or this wont work ";
        } else {
            date_default_timezone_set('Europe/Dublin');
            $timestamp_current = date('Y-m-d h:i:s', time());

            $salt = $timestamp_current;// sets timestamp as salt so will be unigue.
            $hash = hash("sha256", $confirmPass, $salt, $iterations, 32);
            $salted_hash = '$' . $salt . '$' . $hash;

            $query = "UPDATE authusers SET hashed_password = '$salted_hash' WHERE user_name = '$login_session'";
            $queryResult = mysqli_query($dataBaseInit, $query);
            header("location: logout.php");
        }
    }
}
?>

<title>Change Password</title>
<body>
<div class="container">
    <?php include("navBar.php"); ?>

        <h1>Change Password for User : <?php echo "$login_session"; ?></h1>
        <form class="form-group" method="post" action="" autocomplete="off">

            <img class="mb-4" src="favicon.ico" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Would you like to change your password ? </h1>
            <div>
                <label for="password"  name="oldPass" class="sr-only"> Current password</label>
                <input type="password" name="oldPass" id="password" class="form-control" placeholder="Current password" required
                       autofocus><br>
                <br>
            </div>
            <div>
                <label for="newPass" class="sr-only">New Password</label>
                <input type="password" id="newPass" name="newPass" class="form-control" placeholder="New Password" required pattern="(?=^.{6,16}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                       title="Your password must contain at least one upper case, one lower case, one digit, one special character, then length should be between 6-16 characters."><br>
                <br>
            </div>
            <div>
                <label for="ConfirmPass" class="sr-only">Confirm New Password</label>
                <input type="password" id="ConfirmPass" name="ConfirmPass" class="form-control" placeholder="Confirm New Password" required pattern="(?=^.{6,16}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                       title="Your password must contain at least one upper case, one lower case, one digit, one special character, then length should be between 6-16 characters."><br>
                <br>
            </div>

            <input type="submit" name="submit" class="btn btn-primary btn-block form-control" value="Submit">
        </form>
</div>
<?php include 'footer.php' ?>
</body>
</html>
