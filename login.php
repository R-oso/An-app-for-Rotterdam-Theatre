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
        header("location: login.php?error=emptyinput");
    }

    LoginUser($db, $username, $password);

}


?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

<form method="post">

    <header>
        <h1>Creating your account</h1>
        <p>Login</p>
    </header>

    <div class="wrapper">

        <section class="login">

            <div class="form_input">
                <label for="username" class="form_label">
                    <input type="text" name="username" class="input_field"
                           placeholder="Your username">
                </label>
            </div>

            <div class="form_input">
                <label for="password" class="form_label">
                    <input type="text" name="password" class="input_field"
                           placeholder="Your password">
                </label>
            </div>

            <button class="submit_button">
                <label for="submit">
                    <input type="submit" name="submit" value="Inloggen" class="submit_input">
                </label>
            </button>

            <button class="button_register"><a href="register.php">Nog geen account?</a></button>

        </section>
    </div>

</form>

</body>
</html>