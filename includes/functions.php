<?php

function emptyInput($name, $password, $password_repeat) {

    $result;
    if (empty($name) || empty($password) || empty($password_repeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function invalidUser($name) {

    $result;
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function passwordMatch($password, $password_repeat) {

    $result;
    if ($password !== $password_repeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function usernameExist($db, $name) {

    $result;
    $sql = "SELECT * from inloggegevens WHERE Name = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    }
    else {
        $result = false;
        return $result;

    }
}

function createUser($db, $name, $password) {

    $sql = "INSERT INTO inloggegevens (`Name`, `Password`) 
                     VALUES (?, ?);";

    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: register.php?error=stmtfailed");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $name,$hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //header('Location: account_made.php');

}

function emptyInputLogin($username, $password) {

    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function LoginUser($db, $username, $password) {
$userExists = usernameExist($db, $username, $username);
    if ($userExists == false) {
        //header("location: Page_1.php?error=wronglogin");
        exit();
    }
    $passwordHash = $userExists['Password'];
    $checkPassword = password_verify($password, $passwordHash);

    if ($checkPassword == false) {
        //header("location: Page_1.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword == true) {
        session_start();
        require_once 'index.php';
        $_SESSION['loggedIn'] = $userExists['Customer_ID'];
        $_SESSION['userName'] = $userExists['Name'];
        //header("location: Page_2.php");
        session_write_close();
    }
}

