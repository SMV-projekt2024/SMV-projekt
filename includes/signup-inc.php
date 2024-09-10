<?php

if ( isset( $_POST["submit"] ) ) {
    $UserName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    if ( emptySignUp($UserName, $email, $password, $passwordRepeat) !== false) {
        header("location: ../prva_stran.php?error=emptyInput");
        exit();
    }
    if ( invalidUsername($UserName) !== false) {
        header("location: ../prva_stran.php?error=invalidUsername");
        exit();
    }
    if ( invalidEmail($email) !== false) {
        header("location: ../prva_stran.php?error=invalidEmail");
        exit();
    }
    if ( checkPassword($password, $passwordRepeat) !== false) {
        header("location: ../prva_stran.php?error=differentPasswords");
        exit();
    }
    if ( UsernameTaken($conn, $UserName, $email) !== false) {
        header("location: ../prva_stran.php?error=UsernameTaken");
        exit();
    }
    /*---add password more than 8 char----------*/

    createUser($conn, $UserName, $email, $password);
}
else {
    header("location: ../prva_stran.php");
    exit();
}