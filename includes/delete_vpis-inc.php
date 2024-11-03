<?php
     require_once "database-inc.php";
     require_once "functions-inc.php";

    if(isset($_GET["id_vpis"])) {
        $vpisId = $_GET["id_vpis"];
        $userId = $_GET["id_user"];

        $sql = "DELETE FROM Vpisi WHERE id_vpis = $vpisId";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        header("location: ../uporabnik_stran.php?id_user=". $userId);
        exit();

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }