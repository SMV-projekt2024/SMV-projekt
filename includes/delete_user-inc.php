<?php
     require_once "database-inc.php";
     require_once "functions-inc.php";

    if(isset($_GET["id_user"])) {
        $userId = $_GET["id_user"];

        $sql = "DELETE FROM Users WHERE UsersId = $userId";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        header("location: ../vsi_uporabniki.php?delete=success");
        exit();

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }