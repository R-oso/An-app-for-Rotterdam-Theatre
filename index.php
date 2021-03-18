<?php
session_start();

//Require database and error forms
require_once "includes/database.php";
require_once "includes/functions.php";
/** @var mysqli $db */


if (isset($_POST['submit'])) {
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = $_POST['password'];

    if (emptyInputLogin($username, $password) !== false) {
        header("location: index.php?error=emptyinput");
    }

    LoginUser($db, $username, $password);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

    <form method="post">

        <header>
            <h1>Yo boys</h1>
            <p>Login</p>
        </header>

        <section>

            <p>
                <label for="name">
                    <input type="text" name="username">
                </label>
            </p>

            <p>
                <label for="password">
                    <input type="text" name="password">
                </label>
            </p>

            <button>
                <label for="submit">
                    <input type="submit" name="submit" value="inloggen">
                </label>
            </button>

            <button><a href="register.php">Nog geen account?</a></button>

        </section>

    </form>

</body>
</html>