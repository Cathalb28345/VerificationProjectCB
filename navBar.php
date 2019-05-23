<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Security Applications Development - Project 1</title>
    <?php include("styling.php"); ?>

</head>

<body>
<header>
    <br><br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/secure_app/">Secure Applications Development
                <small>Authentication And Hashing Project</small>
            </a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Sign up</a>
                        </li>

                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="page1.php">Page1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="change_password.php">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <p>Logged in as: <?php echo "$login_session"; ?></p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
    </nav>
</header>

