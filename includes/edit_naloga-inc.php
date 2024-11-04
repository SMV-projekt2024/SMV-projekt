<?php
     require_once "database-inc.php";
     require_once "functions-inc.php";

    if(isset($_GET["id_naloga"])) {
        $nalogaId = $_GET["id_naloga"];
        if(isset($_POST["submit"])){
            $naslov = $_POST["naslov"];
            $opis = $_POST["opis"];
            $navodilo = $_POST["navodila"];

            $sql = "UPDATE Naloge
                SET naslov = COALESCE(NULLIF(?, ''), naslov),
                    opis = COALESCE(NULLIF(?, ''), opis),
                    navodilo = COALESCE(NULLIF(?, ''), navodilo)
                WHERE id_naloga = ?;";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_bind_param($statement, "sssi",$naslov, $opis, $navodilo, $nalogaId);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);

            header("location: ../naloga.php?id=". $nalogaId ."&error=EditSuccess");
            exit();

        }
        else{
            header("location: ../posts_stran.php?error=NoData");
            exit();
        }
        
        

    }
    else{
        header("location: ../posts_stran.php?error=NoData");
        exit();
    }