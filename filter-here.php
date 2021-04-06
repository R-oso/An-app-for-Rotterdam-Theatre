<?php
session_start();

//If user is not logged in, do not lend permission to this page
if (!isset($_SESSION["loggedIn"]) && !isset($_SESSION["userName"])) {
    header("location: Page_1.php?error=notloggedin");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Connected</title>
</head>
<body>

<form method="post">
    <img src="includes/images/logo_tr_1.png" class="logo_2" alt="logo_theaterRotterdam">

    <header class="header_2">
        <h1>You are watching</h1>
        <h2>Astro Angels</h2>
        <p><a href="filter-here.php"> We'll let you know <br> when to check your phone.</a></p>
    </header>

</form>

</body>

<footer>

</footer>

</html>

