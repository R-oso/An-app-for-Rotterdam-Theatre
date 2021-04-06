<?php
session_start();
require_once 'includes/functions.php';

//If user is not logged in, do not lend permission to this page
if (!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userName"])) {
    header("location: Page_1.php?error=notloggedin");
    die();
}

if (isset($_POST['submit'])) {
    $code = $_POST['code'];

    if (empty($code) !== false) {
        header("location: connect-show.php?error=emptyinput");
        exit();
    }

    else {
        header("Location: watching-show.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Connecting</title>
</head>
<body>

<form method="post">
    <img src="includes/images/logo_tr_1.png" class="logo_2" alt="logo_theaterRotterdam">

    <header class="header_2">
        <h1><?php echo 'Hi';
            echo " ";
            echo htmlentities($_SESSION["userName"]);
            echo ','; ?></h1>
        <p>You can insert the code <br> for the show below!</p>
    </header>

    <div class="form_input form_input_2">
        <label for="code">
            <input type="number" name="code" class="input_field" placeholder="Code" minlength="8">
        </label>
    </div>

    <button class="submit_button_2">
        <label for="submit">
            <input type="submit" name="submit" value="Enter">
        </label>
    </button>



</form>

</body>

<footer>

</footer>

</html>
