<?php


function emptyInput($name, $email, $password, $password_repeat) {

    $result;
    if (empty($name) || empty($email) || empty($password) || empty($password_repeat)) {
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

function usernameExist($db, $name, $email) {
    $result;

    $sql = "SELECT * from profiles WHERE Name = ? or Email = ?;";
    $stmt = $db->prepare($sql);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }

    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $resultData = $stmt->get_result();
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    }
    else {
        $result = false;
        return $result;

    }
}

function createUser($db, $name, $email,  $password) {
    $sql = "INSERT INTO profiles (`Name`, `Email`, `Password`) 
                     VALUES (?, ?, ?);";

    $stmt = $db->prepare($sql);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $name, $email, $hash);
        $stmt->execute();
        $stmt->close();
    }
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
        header("location: login.php?error=wronglogin");
        exit();
    }
    $passwordHash = $userExists['Password'];
    $checkPassword = password_verify($password, $passwordHash);

    if ($checkPassword == false) {
        header("location: login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword == true) {
        session_start();
        require_once 'login.php';
        $_SESSION['loggedIn'] = $userExists['Customer_ID'];
        $_SESSION['userName'] = $userExists['Name'];
        header("location: connect-show.php");
        session_write_close();
    }
}

