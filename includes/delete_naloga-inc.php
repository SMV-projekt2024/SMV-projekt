<?php
     require_once "database-inc.php";
     require_once "functions-inc.php";

    if(isset($_GET["id_naloga"])) {
        $id_naloga = $_GET["id_naloga"];
        $id_predmeta = $_GET["id_predmeta"];

        $sql = "DELETE FROM Naloge WHERE id_naloga = $id_naloga";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        header("location: ../post.php?id=". $id_predmeta ."&delete=success");
        exit();

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }