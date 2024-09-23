<?php
    // TUKAJ ZAENKRAT USVARIMO POVEZAVO S PODATKOVNO BAZO(KI JE SEVEDA SAMO NA MOJEM RAČUNALNIKU) IN PREGLEDA ZA PREDMETI V TABELI
    

    require_once "database-inc.php";
    require_once "functions-inc.php";
    if (isset($_SESSION["username"])){
        $currentUser = $_SESSION["username"];
    }
    else{
        $currentUser = "";
    }

    // $all_posts = $conn->query("SELECT * FROM Posts");
    
    //$nRows = $all_posts->num_rows;
    $start = 0;
    $nposts_per_page = 6;
    $pages = 4; //ceil($nRows / $nposts_per_page);
   /*
    if (isset($_GET["pageNr"])) {
       $page = $_GET["pageNr"] - 1;
       $start = $page * $nposts_per_page;
       $resultData = $conn->query("SELECT Users.UsersUsername, Posts.* FROM Users INNER JOIN Posts ON users.UsersId = posts.PostsAuthorId
       ORDER BY PostsId DESC
       LIMIT $start, $nposts_per_page");

    displayPosts($resultData, $currentUser);  // function in functions-inc.php

    }*/
    /*else if (isset($_GET["searchSubmit"])) {
        $searchValue = $_GET["search"];
        $sql = "SELECT Users.UsersUsername, Posts.* FROM Users INNER JOIN Posts ON users.UsersId = posts.PostsAuthorId
        WHERE CONCAT(PostsTitle, PostsDescription, PostsBody) LIKE '%$searchValue%'
        ORDER BY PostsId DESC
        LIMIT $start, $nposts_per_page";

        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);

        displayPosts($resultData, $currentUser);  // function in functions-inc.php

        mysqli_stmt_close($statement); 
    } */
    //else{
        $sql = "SELECT kratica, celo_ime FROM Predmeti";
        
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);

        displayPosts($resultData, $currentUser); /* function in functions-inc.php */

        mysqli_stmt_close($statement);
    