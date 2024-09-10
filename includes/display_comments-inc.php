<?php
    require_once "database-inc.php";
    require_once "functions-inc.php";

    if (isset($_SESSION["username"])){
        $currentUser = $_SESSION["username"];
    }
    else{
        $currentUser = "";
    }

    $sql = "SELECT Users.UsersUsername, Comments.* FROM Users INNER JOIN Posts ON users.UsersId = posts.PostsAuthorId
    INNER JOIN Comments ON Posts.PostsId = Comments.CommentsPostId
    WHERE PostsId = $pageId";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);






    $resultData = mysqli_stmt_get_result($statement);



    displayComments($resultData, $currentUser, $conn);


    mysqli_stmt_close($statement);
