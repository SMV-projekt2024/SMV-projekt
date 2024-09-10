<?php
session_start();

if ( isset( $_POST["submit"] ) ) {
    $comment = $_POST["comment"];

    $current_date = date("d/m/Y");
    $currentUserId = $_SESSION["userId"];
    $postId = (int)$_GET["id"];
    echo $postId;
    echo gettype($postId);

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $sql = "INSERT INTO Comments (CommentsText, CommentsDate, CommentsPostId, CommentsAuthourId) VALUES (?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../post.php?id=$postId&error=StatementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssii", $comment, $current_date, $postId, $currentUserId);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../post.php?id=$postId&error=SuccessComment");
    exit();
}
else {
    header("location: ../post.php?id=$postId");
    exit();
}