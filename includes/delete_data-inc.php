<?php
     require_once "database-inc.php";
     require_once "functions-inc.php";

    if(isset($_GET["id_predmet"])) {
        $id_predmeta = $_GET["id_predmet"];

        $sql = "DELETE FROM Predmeti WHERE id_predmet = $id_predmeta";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        header("location: ../prva_stran.php?&error=DeleteSuccess");
        exit();

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }

            