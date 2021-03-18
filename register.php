<?php

require_once 'includes/database.php';
/** @var mysqli $db */

if (isset($_POST['submit'])) {

    $name = mysqli_escape_string($db, $_POST['name']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $password_repeat = mysqli_escape_string($db, $_POST['password_repeat']);

    require_once 'includes/functions.php';
    if (emptyInput($name, $password, $password_repeat) !== false) {
        header("location: register.php?error=emptyinput");
    }

    if (invalidUser($name) !== false) {
        header("location: register.php?error=nouser");
        exit();
    }

    if (passwordMatch($password, $password_repeat) !== false){
    header("location: register.php?error=nomatch");
    exit();
    }

    if (usernameExist($db, $name) !== false) {
        header("location: register.php?error=email/usernametaken");
        exit();
    }

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
        <p>Registreren</p>
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

        <p>
            <label for="password_repeat">
                <input type="text" name="password_repeat">
            </label>
        </p>

        <button>
            <label for="submit">
                <input type="submit" name="submit" value="Registreren">
            </label>
        </button>

        <button><a href="index.php">terug</a></button>

    </section>

</form>

</body>
</html>


