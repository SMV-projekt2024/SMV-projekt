<?php

if ( isset( $_POST["submit"] ) ) {
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $UserName = $_POST["username"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    if ( emptySignUp($ime, $priimek, $UserName, $email, $password, $passwordRepeat) !== false) {
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

    createUser($conn,$ime, $priimek, $UserName, $email, $password);
}
else {
    header("location: ../prva_stran.php");
    exit();
}