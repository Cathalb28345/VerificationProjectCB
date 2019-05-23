<?php
//include("session.php"); // you can uncomment this richard and some of the layot will change on the page.
//connecting to session
?>
<?php include("navBar.php"); ?>
<div class="container">
    <article><p>Hello <a class="navbar-brand" href="#"></a>
        <h2> This is Project 1 HOme Page this is not authenticated.</h2></p>

        <p> The following assignment is worth 15% of your final overall grade. </p>

        <p>The due date for your documentation is 11:00am December 7th. A document outlining how you performed the below
            tasks along with relevant source code snippets and test cases is to be provided.
        </p>
        <p>Create an authentication mechanism for a web application using XAMPP, PHP & MySQL. Your application should
            create the underlying database on requesting the login page as a root user with no password. NB: Please test
            this functionality before mailing me your code as I cannot test your application without your underlying
            database. </p>
        <p>Your authentication mechanism should allow for the following functionality. </p>
        <p>Register with the system. <i> (15% Total) (10% for Code 5% for Documentation)</i></p>
        <ul>
            <li>The system should allow users to register with the system using a username and password.</li>
            <li>Complexity rules regarding the password should be enforced.</li>
            <li>Password storage should be salted and hashed.</li>
        </ul>
        <p>On an unsuccessful authentication attempt <i>(20% Total) (15% for Code 5% for Documentation)</i></p>

        <ul>
            <li>A generic error message is presented back to the end user outlining that the username & password
                combination cannot be authenticated at the moment.
            </li>
            <li>Reflect the supplied username provided in the above message. Ensure that this reflected parameter in not
                susceptible to XSS.
            </li>
            <li>Lockout after 3 attempts for 5 minutes.</li>
        </ul>
        <p>On successful authentication <i>(20% Total) (15% for Code 5% for Documentation))</i></p>
        <ul>
            <li>The system should greet the user by their username.</li>
            <li>Create an active authenticated session.</li>
            <li>Allow for the authenticated user to view some pages (at least two) that an unauthenticated user will not
                have access to.
            </li>
            <li>Allow for the user to logout securely.</li>
        </ul>
        <p>Password Change <i> (15% Total) (10% for Code 5% for Documentation)</i>
        </p>
        <ul>
            <li>Authenticated users should be capable of changing their password.</li>
            <li>Complexity rules regarding the password should be enforced.</li>
            <li>On password change the active session should be expired.</li>
            <li>The user will have to re-authenticate using new credentials to gain access to the system.</li>
            <li>No out of band communication mechanism is required to inform the user that their credentials has been
                updated.
            </li>
            <ul>
                <h4>Testing</h4>
                <p>Your documentation should include test cases and test results for all implemented functionality.</p>
                <br><br>
    </article>

</div>

<?php include 'footer.php' ?>
</body>
</html>
