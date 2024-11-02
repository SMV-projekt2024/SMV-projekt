<?php
    session_start();
    require_once "database-inc.php";
    require_once "functions-inc.php"; 

    

    if (!isset($_SESSION["userId"])) {
        header("Location: ../prva_stran.php?login");
    }
    else{
        $currentUserId = $_SESSION["userId"]; 
    $id_predmet = $_GET['id'];

    // 2. Check if the user is enrolled in the subject
    $sql = "SELECT * FROM Vpisi WHERE id_user = ? AND id_predmet = ?";


    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ii", $currentUserId, $id_predmet);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    
    if (mysqli_num_rows($resultData) == 0) {
        header("Location: ./kljuc.php?id_predmet=" . $id_predmet);
    }
    


    
    }


    

