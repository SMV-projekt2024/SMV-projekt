<?php
session_start();
if ( isset( $_POST["submit"] ) ) {
    $body = $_POST["content"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "INSERT INTO Test (TestBody) VALUES (?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "s", $body);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../prva_stran.php?error=YouCreatedThePost");
    exit();
}
else {
    header("location: ../prva_stran.php?error=NoSubmit");
    exit();
}