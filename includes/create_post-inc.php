<?php
session_start();
if ( isset( $_POST["submit"] ) ) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $img = $_POST["imgUrl"];
    $body = $_POST["body"];
    $branch = $_POST["branch"];

    $current_date = date("d/m/Y");

    $currentUserId = $_SESSION["userId"];

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "INSERT INTO Posts (PostsTitle, PostsDescription, PostsImgUrl, PostsDate, PostsBody, PostsAuthorId, PostsBranch) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "sssssis", $title, $description, $img, $current_date, $body, $currentUserId, $branch);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../prva_stran.php?error=YouCreatedThePost");
    exit();
}
else {
    header("location: ../prva_stran.php");
    exit();
}