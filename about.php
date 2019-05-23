<?php
      include("session.php");
      //including the session
?>

  <title>About</title>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>

<body>
<!--  <nav class="navbar navbar-inverse">-->
<!--   <div class="container-fluid">-->
<!--     <div class="navbar-header">-->
<!--       <a class="navbar-brand" href="#">User : --><?php //echo "$login_session";?><!--</a>-->
<!--     </div>-->
<!--     <ul class="nav navbar-nav">-->
<!--       <li class="active"><a href="home.php">Home</a></li>-->
<!--       <li><a href="about.php">About</a></li>-->
<!--       <li><a href="page2.php">Page 2</a></li>-->
<!--     </ul>-->
<!--     <ul class="nav navbar-nav navbar-right">-->
<!--       <li><a href="change_password.php"><span class="glyphicon glyphicon-user"></span>Change Password</a></li>-->
<!--       <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>-->
<!--     </ul>-->
<!--   </div>-->
<!-- </nav>-->

  <div class="container">
      <?php
      include 'navBar.php';
      //including the session
      ?>
      <br>
      <article>
          <h3>Project 1 about page UNAUTHENTICATED</h3>
          <p>  The following assignment is worth 15% of your final overall grade.    </p>

          <p>The due date for your documentation is 11:00am December 7th. A document outlining how you performed the below tasks along with relevant source code snippets and test cases is to be provided.
          </p>
          <p>Create an authentication mechanism for a web application using XAMPP, PHP & MySQL. Your application should create the underlying database on requesting the login page as a root user with no password. NB: Please test this functionality before mailing me your code as I cannot test your application without your underlying database.   </p>
          <p>Your authentication mechanism should allow for the following functionality. </p>
          <p>Register with the system.  <i> (15% Total) (10% for Code 5% for Documentation)</i></p>
          <ul>
              <li>The system should allow users to register with the system using a username and password.</li>
              <li>Complexity rules regarding the password should be enforced.</li>
              <li>Password storage should be salted and hashed.</li>
          </ul>
          <p>On an unsuccessful authentication attempt <i>(20% Total) (15% for Code 5% for Documentation)</i></p>

          <ul>
              <li>A generic error message is presented back to the end user outlining that the username & password combination cannot be authenticated at the moment. </li>
              <li>Reflect the supplied username provided in the above message. Ensure that this reflected parameter in not susceptible to XSS. </li>
              <li>Lockout after 3 attempts for 5 minutes.</li>
          </ul>
          <p>On successful authentication <i>(20% Total) (15% for Code 5% for Documentation))</i></p>
          <ul>
              <li>The system should greet the user by their username.</li>
              <li>Create an active authenticated session.</li>
              <li>Allow for the authenticated user to view some pages (at least two) that an unauthenticated user will not have access to.</li>
              <li>Allow for the user to logout securely.</li>
          </ul>
          <p>Password Change  <i>  (15% Total) (10% for Code 5% for Documentation)</i>
          </p>
          <ul>
              <li>Authenticated users should be capable of changing their password.</li>
              <li>Complexity rules regarding the password should be enforced.</li>
              <li>On password change the active session should be expired.</li>
              <li>The user will have to re-authenticate using new credentials to gain access to the system.</li>
              <li>No out of band communication mechanism is required to inform the user that their credentials has been updated.</li>
              <ul>
                  <h4>Testing</h4>
                  <p>Your documentation should include test cases and test results for all implemented functionality.</p>
                  <br><br>
      </article>

  </div>

  <?php include 'footer.php' ?>
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  <!-- External bootstrap lib-->
</body>
</html>
