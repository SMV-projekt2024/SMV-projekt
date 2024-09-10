<?php
    require_once "database-inc.php";
    require_once "functions-inc.php";


    if(isset($_GET["id"]) && isset($_GET["type"]) ){
        $id = $_GET["id"];
        $type = $_GET["type"];

        if($type == "comment"){
            $sql = "DELETE FROM Comments WHERE CommentsId = $id";
            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
        }
        elseif($type == "post"){
            $sql = "DELETE FROM Posts WHERE Postsid = $id";
            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../posts_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
        }
        else{
            header("location: ../posts_stran.php?error=NoData");
            exit();
        }

        header("location: ../posts_stran.php?error=YouDeleted" . $type);
        exit();

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }


            