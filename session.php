<?php
include('config.php');
session_start();
//function to start session

$user_check_active = $_SESSION['username'];

$session_check_active = mysqli_query($dataBaseInit, "SELECT user_name From authusers WHERE user_name = '$user_check_active'");
$session_password_active = mysqli_query($dataBaseInit, "SELECT hashed_password From authusers WHERE user_name = '$user_check_active'");

$row = mysqli_fetch_array($session_check_active, MYSQLI_ASSOC);
$col = mysqli_fetch_array($session_password_active, MYSQLI_ASSOC);

$login_session = $row['user_name'];
$login_password = $col['hashed_password'];

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    die();
}
?>
