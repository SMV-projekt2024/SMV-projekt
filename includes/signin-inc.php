<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    if ( emptySignIn($username, $password) !== false) {
        header("location: ../prva_stran.php?error=emptyInput");
        exit();
    }

    signInUser($conn, $username, $password);
}
else {
    header("location: ../prva_stran.php?error=emptyInput");
    exit();
}