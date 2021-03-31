<?php

//Require database
require_once 'includes/database.php';
/** @var mysqli $db */

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = mysqli_escape_string($db, $_POST['password_repeat']);

    require_once 'includes/functions.php';
    if (emptyInput($name, $email, $password, $password_repeat) !== false) {
        header("location: register.php?error=emptyinput");
        exit();

    }

    if (invalidUser($name) !== false) {
        header("location: register.php?error=nouser");
        exit();
    }

    if (passwordMatch($password, $password_repeat) !== false){
        header("location: register.php?error=nomatch");
        exit();
    } else

    if (usernameExist($db, $name, $email) !== false) {
        header("location: register.php?error=email/usernametaken");
        exit();
    }

        createUser($db, $name, $email, $password);

}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
</head>

<body>

<form method="post">

    <header>
        <h1>Creating your account</h1>
        <p>Registrating</p>
    </header>

    <section class="login">

        <img src="includes/images/logo_tr_1.png" class="logo" alt="logo_theaterRotterdam">

        <div class="form_input">
            <label for="name">
                <input type="text" name="name" class="input_field" placeholder="Your username">
            </label>
        </div>

        <div class="form_input">
            <label for="email">
                <input type="email" name="email" class="input_field" placeholder="Your email adress">
            </label>
        </div>

        <div class="form_input">
            <label for="password">
                <input type="text" name="password" class="input_field" placeholder="Your password">
            </label>
        </div>

        <div class="form_input">
            <label for="password_repeat">
                <input type="text" name="password_repeat" class="input_field"
                       placeholder="Please enter your password again">
            </label>
        </div>

        <button class="submit_button">
            <label for="submit">
                <input type="submit" name="submit" value="Registrate" class="submit_input">
            </label>
        </button>

        <button class="button_register"><a href="login.php">Back to logging in</a></button>

    </section>
</form>

</body>
</html>


