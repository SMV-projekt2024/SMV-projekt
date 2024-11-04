<?php
    // TUKAJ ZAENKRAT USVARIMO POVEZAVO S PODATKOVNO BAZO(KI JE SEVEDA SAMO NA MOJEM RAČUNALNIKU) IN PREGLEDA ZA PREDMETI V TABELI
    if (isset($_GET["id"])){
        $id_smeri = $_GET["id"];

        require_once "database-inc.php";
        require_once "functions-inc.php";
        if (isset($_SESSION["username"])){
            $currentUser = $_SESSION["username"];
        }
        else{
            $currentUser = "";
        }

        // $all_posts = $conn->query("SELECT * FROM Posts");
        
        
    
        if (isset($_GET["searchSubmit"])) {
            $search = $_GET["search"];
            $sql = "SELECT * FROM Predmeti 
            WHERE CONCAT(kratica, celo_ime) LIKE '%$search%'
            AND id_smer = $id_smeri";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_execute($statement);
            $resultData = mysqli_stmt_get_result($statement);

            displayPosts($resultData, $currentUser);  // function in functions-inc.php

            mysqli_stmt_close($statement); 
        } 
        else{
            $sql = "SELECT * FROM Predmeti
            WHERE id_smer = $id_smeri";
            
            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_execute($statement);
            $resultData = mysqli_stmt_get_result($statement);

            displayPosts($resultData, $currentUser); /* function in functions-inc.php */

            mysqli_stmt_close($statement);
        }
    }